<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- keep local styles if needed --}}
        <style>
            @import url('https://fonts.bunny.net/css?family=instrument-sans:400,500,600');
            .font-inter{font-family:Instrument Sans, system-ui, sans-serif}
        </style>
    </head>
    <body class="bg-[#0F0F1A] text-white font-inter">
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-[#151521] p-5 flex flex-col justify-between">
                <div>
                    <div class="text-lg font-bold mb-6 flex items-center gap-2">
                        <div class="bg-[#3B82F6] text-white px-2 py-1 rounded-md text-sm font-semibold">MW</div>
                        My Workspace
                    </div>
                    <nav class="space-y-6">
                        <div>
                            <h3 class="uppercase text-xs text-gray-400 mb-2">Dashboard</h3>
                            <div class="bg-[#1C1C28] rounded-lg py-2 px-3 flex items-center gap-2">📊 Dashboard</div>
                        </div>

                        <div>
                            <h3 class="uppercase text-xs text-gray-400 mb-2">Analysis</h3>
                            <ul class="space-y-2 text-gray-400">
                                <li>User Analysis</li>
                                <li>Content Analysis</li>
                                <li>Survey Report</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="uppercase text-xs text-gray-400 mb-2">Management</h3>
                            <ul class="space-y-2 text-gray-400">
                                <li>Content Upload</li>
                                <li>Content Management</li>
                                <li>Category & Tags</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="uppercase text-xs text-gray-400 mb-2">Affiliate</h3>
                            <ul class="space-y-2 text-gray-400">
                                <li>Analytics</li>
                                <li>Campaign</li>
                                <li>Affiliate</li>
                                <li>Sales & Commissions</li>
                                <li>Setting</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="uppercase text-xs text-gray-400 mb-2">API Management</h3>
                        </div>
                    </nav>
                </div>

                <div class="text-xs text-gray-500">
                    <p>Invite people</p>
                    <p>Help & Support</p>
                    <div class="mt-4 bg-[#1C1C28] px-3 py-2 rounded-md">App version 3.1</div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-8">
                <div class="flex items-center gap-2 text-gray-400 mb-4">
                    <a href="#" onclick="history.back();return false" class="flex items-center gap-2 text-gray-400 no-underline">
                        <span>←</span>
                        <span>Back</span>
                    </a>
                </div>

                <section class="bg-[#151521] rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-8">
            <h2 class="text-lg font-semibold tracking-wide">Revenue</h2>
            <div class="flex items-center text-sm text-gray-300">
              <button class="px-3 py-1.5 bg-[#3B82F6] rounded text-white">MRR</button>
              <button class="px-3 py-1.5 text-gray-500 bg-[#1C1C28] rounded">ARPU</button>
              </div>
              <div class="flex items-center gap-4 text-sm text-gray-300">
              <span class="ml-10 text-gray-400">Jan 2, 2024</span>
              <span class="text-gray-400">Last 30 Days ▼</span>
            </div>
          </div>


                    <!-- Metric Cards -->
                    <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4 mb-8">
                        <div class="bg-[#1C1C28] rounded-lg p-4">
                            <p class="text-gray-400 text-sm">Total MRR</p>
                            <h3 class="text-xl font-bold">${{ number_format($totals['total_mrr'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-4">
                            <p class="text-gray-400 text-sm">New MRR</p>
                            <h3 class="text-xl font-bold">${{ number_format($totals['new_mrr'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-4">
                            <p class="text-gray-400 text-sm">Upgrades</p>
                            <h3 class="text-xl font-bold">${{ number_format($totals['upgrades'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-4">
                            <p class="text-gray-400 text-sm">Downgrades</p>
                            <h3 class="text-xl font-bold">${{ number_format($totals['downgrades'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-4">
                            <p class="text-gray-400 text-sm">ARPU</p>
                            <h3 class="text-xl font-bold">${{ number_format($totals['arpu'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-4">
                            <p class="text-gray-400 text-sm">Reactivations</p>
                            <h3 class="text-xl font-bold">${{ number_format($totals['reactivations'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-4">
                            <p class="text-gray-400 text-sm">Existing</p>
                            <h3 class="text-xl font-bold">${{ number_format($totals['existing'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-4">
                            <p class="text-gray-400 text-sm">Churn</p>
                            <h3 class="text-xl font-bold">${{ number_format($totals['churn'], 0) }}</h3>
                        </div>
                    </div>

                    <!-- Legend -->
                    <div class="w-full flex flex-wrap justify-end gap-4 text-xs text-gray-400 mb-4">
                        <span class="flex items-center gap-1"><span class="w-2 h-2 bg-red-400 rounded-full"></span> Total MRR</span>
                        <span class="flex items-center gap-1"><span class="w-2 h-2 bg-blue-400 rounded-full"></span> New MRP</span>
                        <span class="flex items-center gap-1"><span class="w-2 h-2 bg-green-400 rounded-full"></span> Reactivations</span>
                        <span class="flex items-center gap-1"><span class="w-2 h-2 bg-emerald-300 rounded-full"></span> Upgrades</span>
                        <span class="flex items-center gap-1"><span class="w-2 h-2 bg-indigo-400 rounded-full"></span> Existing</span>
                        <span class="flex items-center gap-1"><span class="w-2 h-2 bg-purple-400 rounded-full"></span> Downgrades</span>
                        <span class="flex items-center gap-1"><span class="w-2 h-2 bg-pink-400 rounded-full"></span> Churn</span>
                    </div>

                    <!-- Chart Placeholder -->
                    <div class="h-80 bg-[#1C1C28] rounded-lg flex items-center justify-center text-gray-500">
                        <canvas id="mrrChart" class="w-full h-full max-h-80"></canvas>
                    </div>
                </section>
            </main>
        </div>

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Wait for DOM content
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('mrrChart').getContext('2d');

                // Sample labels (could be replaced by server-side data)
                const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];

                const data = {
                    labels: labels,
                    datasets: [
                        { label: 'Total MRR', data: [12000,15000,18000,20000,22000,25000,27000], backgroundColor: '#F87171' },
                        { label: 'New MRR', data: [3000,4000,3500,4200,4800,5000,5200], backgroundColor: '#3B82F6' },
                        { label: 'Reactivations', data: [2000,2500,2400,3000,3100,3200,3300], backgroundColor: '#34D399' },
                        { label: 'Upgrades', data: [1000,1200,1300,1400,1500,1600,1800], backgroundColor: '#A7F3D0' },
                        { label: 'Existing', data: [5000,6000,6200,6300,6400,6600,6800], backgroundColor: '#818CF8' },
                        { label: 'Downgrades', data: [500,600,550,580,600,620,640], backgroundColor: '#C084FC' },
                        { label: 'Churn', data: [200,300,250,270,280,290,300], backgroundColor: '#F472B6' }
                    ]
                };

                const config = {
                    type: 'bar',
                    data: data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: { mode: 'index', intersect: false },
                        scales: {
                            x: { stacked: true, ticks: { color: '#A0A0B2' }, grid: { color: 'rgba(255,255,255,0.03)' } },
                            y: { stacked: true, ticks: { color: '#A0A0B2' }, grid: { color: 'rgba(255,255,255,0.03)' } }
                        },
                        plugins: {
                            legend: { display: false },
                            tooltip: { mode: 'index', intersect: false, displayColors: true }
                        }
                    }
                };

                // Destroy existing chart instance on reloads (hot reloads in dev)
                if (window._mrrChart instanceof Chart) {
                    window._mrrChart.destroy();
                }

                window._mrrChart = new Chart(ctx, config);
            });
        </script>
    </body>
</html>
