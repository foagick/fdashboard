import Chart from 'chart.js/auto';
import flatpickr from 'flatpickr';

async function fetchData() {
    // accept optional query string passed through
    const q = (window.__DASH_QUERY__ && new URLSearchParams(window.__DASH_QUERY__)) || null;
    const url = q ? ('/api/dashboard/mock?' + q.toString()) : '/api/dashboard/mock';
    const res = await fetch(url);
    if (!res.ok) throw new Error('Failed to fetch dashboard data');
    return await res.json();
}

function setupChart(labels, series) {
    const ctx = document.getElementById('mrrChart').getContext('2d');
    const datasets = [
        { label: 'Existing', data: series.existing || [], backgroundColor: '#4f46e5' },
        { label: 'New MRR', data: series.new || [], backgroundColor: '#ef4444' },
        { label: 'Upgrades', data: series.upgrades || [], backgroundColor: '#10b981' },
        { label: 'Reactivations', data: series.reactivations || [], backgroundColor: '#8b5cf6' },
        { label: 'Downgrades', data: series.downgrades || [], backgroundColor: '#94a3b8' },
        { label: 'Churn', data: series.churn || [], backgroundColor: '#f97316' }
    ];

    const chart = new Chart(ctx, {
        type: 'bar',
        data: { labels: labels, datasets },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            scales: {
                x: { stacked: true, grid: { display: false }, ticks: { color: '#9aa3b2' } },
                y: { stacked: true, ticks: { color: '#9aa3b2' }, grid: { color: 'rgba(255,255,255,0.03)' } }
            },
            elements: { bar: { borderRadius: 6, borderSkipped: false } },
            plugins: { legend: { labels: { color: '#cbd5e1' } }, tooltip: { enabled: false } }
        }
    });

    // create external tooltip container
    let tt = document.querySelector('.chart-tooltip');
    if (!tt) {
        tt = document.createElement('div');
        tt.className = 'chart-tooltip';
        tt.style.display = 'none';
        document.body.appendChild(tt);
    }

    // external tooltip handler
    chart.options.plugins.tooltip.external = function(context) {
        const tooltipModel = context.tooltip;
        if (!tooltipModel || tooltipModel.opacity === 0) { tt.style.display = 'none'; return; }

        const title = tooltipModel.title || [];
        const dataPoints = tooltipModel.dataPoints || [];

    const titleHtml = `<div class="tt-header"><div class="tt-title">MRR Breakdown</div><div class="tt-date">${title[0] || ''}</div></div>`;
    let listHtml = '<ul class="tt-list">';
        // show items in same order as datasets
        dataPoints.forEach(dp => {
            const label = dp.dataset.label || '';
            const rawVal = dp.raw ?? (dp.parsed && dp.parsed.y) ?? 0;
            const value = Number(rawVal);
            const color = Array.isArray(dp.dataset.backgroundColor) ? dp.dataset.backgroundColor[0] : dp.dataset.backgroundColor;
            // tighter row, smaller dot, right-aligned value
            listHtml += `<li class="tt-row"><div class="left"><span class="dot" style="background:${color}"></span><div class="label">${label}</div></div><div class="value">$${value.toLocaleString()}</div></li>`;
        });
        const net = dataPoints.reduce((s, d) => s + Number(d.raw ?? (d.parsed && d.parsed.y) ?? 0), 0);
        listHtml += `</ul><div class="tt-net"><div class="net-label">NET MRR</div><div class="net-value">$${net.toLocaleString()}</div></div>`;

        tt.innerHTML = titleHtml + listHtml;
        tt.style.display = 'block';

    // position tooltip near the caret, adjust to avoid overflow
    const canvasRect = chart.canvas.getBoundingClientRect();
    const caretX = canvasRect.left + (tooltipModel.caretX || 0);
    const caretY = canvasRect.top + (tooltipModel.caretY || 0);
    // prefer to the right of caret, but flip if near viewport edge
    const ttWidth = Math.min(320, window.innerWidth - 40);
    tt.style.maxWidth = ttWidth + 'px';
    let left = (caretX + 12);
    if (left + ttWidth > window.innerWidth - 20) left = caretX - ttWidth - 12;
    let top = (caretY - 12);
    if (top < 10) top = 10;
    tt.style.left = left + 'px';
    tt.style.top = top + 'px';
    };

    return chart;
}

function setupUI() {
    const dp = flatpickr('#dateRange', { mode: 'range', onChange: (selectedDates, str, instance)=>{
        if (selectedDates.length === 2) {
            const a = selectedDates[0].toISOString().slice(0,10);
            const b = selectedDates[1].toISOString().slice(0,10);
            document.getElementById('currentRange').textContent = `${a} → ${b}`;
            // store query for subsequent fetches
            window.__DASH_QUERY__ = `start=${encodeURIComponent(a)}&end=${encodeURIComponent(b)}`;
            // live update
            fetch('/api/dashboard/mock?' + window.__DASH_QUERY__).then(r=>r.json()).then(loadAndRender);
        }
    } });

    const modalBackdrop = document.getElementById('modalBackdrop');
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');
    const applyFilters = document.getElementById('applyFilters');
    if (openModal) openModal.addEventListener('click', ()=> modalBackdrop.style.display='flex');
    if (closeModal) closeModal.addEventListener('click', ()=> modalBackdrop.style.display='none');
    if (applyFilters) applyFilters.addEventListener('click', ()=> {
        modalBackdrop.style.display='none';
        // collect filter values from modal inputs (mocked names)
        const modal = document.querySelector('.modal');
        const country = modal.querySelector('input')?.value || '';
        const plan = modal.querySelector('select')?.value || '';
        const qs = [];
        if (window.__DASH_QUERY__) qs.push(window.__DASH_QUERY__);
        if (country) qs.push('country=' + encodeURIComponent(country));
        if (plan && plan !== 'All') qs.push('plan=' + encodeURIComponent(plan));
        const qstr = qs.length ? qs.join('&') : '';
        window.__DASH_QUERY__ = qstr;
        fetch('/api/dashboard/mock' + (qstr ? ('?' + qstr) : '') ).then(r=>r.json()).then(loadAndRender);
    });

    document.getElementById('metric')?.addEventListener('change', function(){
        if (this.value === 'ARPU') {
            // simple ARPU demo: scale down
            chart.data.datasets.forEach(d=> d.data = d.data.map(v=> Math.round(v/100)) );
        } else {
            chart.data.datasets[0].data = series.existing;
            chart.data.datasets[1].data = series.new;
            chart.data.datasets[2].data = series.upgrades;
            chart.data.datasets[3].data = series.reactivations;
            chart.data.datasets[4].data = series.downgrades;
            chart.data.datasets[5].data = series.churn;
        }
        chart.update();
    });
}

// helper to apply payload to UI
let chart;
function loadAndRender(payload) {
    const { labels, new: _new, upgrades, reactivations, existing, downgrades, churn, totals } = payload;
    const series = { new: _new, upgrades, reactivations, existing, downgrades, churn };

    // update cards
    try {
        const map = ['total_mrr','new_mrr','upgrades','downgrades','arpu','reactivations','existing','churn'];
        document.querySelectorAll('#cards .card').forEach((card, idx)=>{
            const key = map[idx];
            const el = card.querySelector('.value');
            if (el && totals[key] !== undefined) el.textContent = '$' + Number(totals[key]).toLocaleString();
        });
    } catch(e){ console.warn('cards update failed', e); }

    if (!chart) {
        chart = setupChart(labels, series);
    } else {
        // update datasets gracefully
        chart.data.labels = labels;
        chart.data.datasets.forEach(ds => {
            const k = ds.label.toLowerCase().replace(/ /g,'');
            if (k === 'existing' && series.existing) ds.data = series.existing;
            if (k === 'newmrr' || k === 'new') ds.data = series.new;
            if (k === 'upgrades' && series.upgrades) ds.data = series.upgrades;
            if (k === 'reactivations' && series.reactivations) ds.data = series.reactivations;
            if (k === 'downgrades' && series.downgrades) ds.data = series.downgrades;
            if (k === 'churn' && series.churn) ds.data = series.churn;
        });
        chart.update();
    }
}

// init - fetch data then initialize chart and UI
fetchData().then(payload => {
    loadAndRender(payload);
    setupUI();
}).catch(err => console.error('Dashboard fetch error', err));

// pill toggle handlers
document.getElementById('btn-mrr')?.addEventListener('click', ()=>{
    document.getElementById('btn-mrr').classList.add('active');
    document.getElementById('btn-arpu').classList.remove('active');
});
document.getElementById('btn-arpu')?.addEventListener('click', ()=>{
    document.getElementById('btn-arpu').classList.add('active');
    document.getElementById('btn-mrr').classList.remove('active');
});
