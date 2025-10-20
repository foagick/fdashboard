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
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold">Revenue</h2>
                        <div class="flex items-center gap-4 text-sm text-gray-300">
                            <span>MRR</span>
                            <span class="text-gray-500">ARPU</span>
                            <span class="ml-8">🗓 Jan 2, 2024</span>
                            <span>Last 30 Days ▼</span>
                        </div>
                    </div>

                                <div class="flex items-center justify-between gap-4 mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="pill-group" role="tablist" aria-label="metric toggle">
                                            <button id="btn-mrr" class="px-3 py-1 rounded-md bg-white/5 text-sm">MRR</button>
                                            <button id="btn-arpu" class="px-3 py-1 rounded-md text-sm text-gray-400">ARPU</button>
                                        </div>
                                        <div id="currentRange" class="text-sm text-gray-400">Last 30 days</div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <input id="dateRange" placeholder="Last 30 Days" class="rounded-md bg-[#0b0f14] px-3 py-2 text-sm" />
                                        <button id="openModal" class="rounded-md bg-[#1C1C28] px-3 py-2 text-sm">Filters</button>
                                    </div>
                                </div>

                    <!-- Metric Cards -->
                    <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-8">
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
                    </div>

                    <!-- Legend -->
                    <div class="flex flex-wrap gap-4 text-xs text-gray-400 mb-4">
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

        {{-- Modal markup for filters (kept from previous) --}}
        <div id="modalBackdrop" style="display:none;" class="fixed inset-0 bg-black/60 flex items-center justify-center">
            <div class="bg-[#0b1220] p-6 rounded-lg max-w-xl w-11/12">
                <h3 class="text-lg font-semibold text-white mb-2">Filters</h3>
                <div class="flex gap-4">
                    <label class="flex-1 text-sm text-gray-400">Country
                        <input id="filter-country" class="mt-2 w-full rounded-md bg-[#071018] p-2 text-white border border-white/5" />
                    </label>
                    <label class="w-32 text-sm text-gray-400">Plan
                        <select id="filter-plan" class="mt-2 w-full rounded-md bg-[#071018] p-2 text-white border border-white/5"><option>All</option><option>Pro</option></select>
                    </label>
                </div>
                <div class="mt-4 flex justify-end gap-3">
                    <button id="closeModal" class="px-3 py-2 rounded-md border border-white/10 text-gray-300">Close</button>
                    <button id="applyFilters" class="px-3 py-2 rounded-md bg-blue-600">Apply</button>
                </div>
            </div>
        </div>

        <!-- Scripts: keep the original Vite check and fallback to CDNs -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
                @vite(['resources/css/dashboard.css','resources/js/dashboard.js'])
        @else
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script>
                        fetch('/api/dashboard/mock')
                                .then(r => r.json())
                                .then(payload => {
                                        const { labels, new: _new, upgrades, reactivations, existing, downgrades, churn } = payload;
                                        const series = { new: _new, upgrades, reactivations, existing, downgrades, churn };
                                        const ctx = document.getElementById('mrrChart').getContext('2d');
                                        new Chart(ctx, { type: 'bar', data: { labels, datasets: [
                                                { label: 'Existing', data: series.existing, backgroundColor: '#3b82f6' },
                                                { label: 'New MRR', data: series.new, backgroundColor: '#ef4444' },
                                                { label: 'Upgrades', data: series.upgrades, backgroundColor: '#10b981' },
                                                { label: 'Reactivations', data: series.reactivations, backgroundColor: '#8b5cf6' },
                                                { label: 'Downgrades', data: series.downgrades, backgroundColor: '#94a3b8' },
                                                { label: 'Churn', data: series.churn, backgroundColor: '#f97316' }
                                        ] }, options: { responsive:true, maintainAspectRatio:false, scales:{x:{stacked:true},y:{stacked:true}} } });

                                        flatpickr('#dateRange', { mode: 'range' });
                                        // wire modal
                                        document.getElementById('openModal')?.addEventListener('click', ()=> document.getElementById('modalBackdrop').style.display='flex');
                                        document.getElementById('closeModal')?.addEventListener('click', ()=> document.getElementById('modalBackdrop').style.display='none');
                                });
                </script>
        @endif
    </body>
</html>
