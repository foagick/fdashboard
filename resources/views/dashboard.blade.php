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
      <aside class="hidden md:flex w-64 bg-[#151521] px-6 py-8 flex-col justify-between border-r border-[#1C1C28]">
        <div>
          <!-- Header with Avatar and Workspace -->
          <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
              <div class="bg-[#3B82F6] w-8 h-8 flex items-center justify-center rounded-md text-sm font-semibold">MW</div>
              <span class="font-semibold text-gray-100 text-[15px]">My Workspace</span>
            </div>
            <div class="w-8 h-8 bg-gray-400 rounded-full overflow-hidden">
              <img src="https://via.placeholder.com/32" alt="Profile" class="w-full h-full object-cover" />
            </div>
          </div>

          <!-- Search box -->
          <div class="relative mb-8">
            <input
              type="text"
              class="w-full bg-[#1C1C28] text-gray-300 text-sm rounded-md py-2 pl-9 pr-3 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#3B82F6]"
            />
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute left-2.5 top-2.5 w-4 h-4 text-gray-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
          </div>

          <!-- Navigation -->
          <ul class="space-y-3">
            <li>
              <button class="w-full flex items-center justify-start gap-3 text-sm font-medium text-gray-200 px-4 py-2.5 bg-[#1C1C28] rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18M3 9h18M9 21V9" />
                </svg>
                Dashboard
              </button>
            </li>

            <!-- Analysis Dropdown -->
            <li>
              <button id="analysisBtn" class="w-full flex items-center justify-between text-sm text-gray-300 px-4 py-2.5 hover:bg-[#1C1C28] rounded-md">
                <div class="flex items-center gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 12h18M3 20h18" />
                  </svg>
                  Analysis
                </div>
                <svg id="analysisIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform transition-transform duration-200">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                </svg>
              </button>
              <ul id="analysisMenu" class="ml-8 mt-2 space-y-2 text-gray-400 text-sm hidden">
                <li class="flex items-center gap-2"><span>•</span>User Analysis</li>
                <li class="flex items-center gap-2"><span>•</span>Content Analysis</li>
                <li class="flex items-center gap-2"><span>•</span>Survey Report</li>
              </ul>
            </li>

            <!-- Management Dropdown -->
            <li>
              <button id="managementBtn" class="w-full flex items-center justify-between text-sm text-gray-300 px-4 py-2.5 hover:bg-[#1C1C28] rounded-md">
                <div class="flex items-center gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                  </svg>
                  Management
                </div>
                <svg id="managementIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform transition-transform duration-200">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                </svg>
              </button>
              <ul id="managementMenu" class="ml-8 mt-2 space-y-2 text-gray-400 text-sm hidden">
                <li class="flex items-center gap-2"><span>•</span>Content Upload</li>
                <li class="flex items-center gap-2"><span>•</span>Content Management</li>
                <li class="flex items-center gap-2"><span>•</span>Category & Tags</li>
              </ul>
            </li>

            <!-- Affiliate Dropdown -->
            <li>
              <button id="affiliateBtn" class="w-full flex items-center justify-between text-sm text-gray-300 px-4 py-2.5 hover:bg-[#1C1C28] rounded-md">
                <div class="flex items-center gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5-6h3m-3 6h3m-9 0h3m-3-6h3" />
                  </svg>
                  Affiliate
                </div>
                <svg id="affiliateIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform transition-transform duration-200">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                </svg>
              </button>
              <ul id="affiliateMenu" class="ml-8 mt-2 space-y-2 text-gray-400 text-sm hidden">
                <li class="flex items-center gap-2"><span>•</span>Analytics</li>
                <li class="flex items-center gap-2"><span>•</span>Campaign</li>
                <li class="flex items-center gap-2"><span>•</span>Affiliate</li>
                <li class="flex items-center gap-2"><span>•</span>Sales & Commissions</li>
                <li class="flex items-center gap-2"><span>•</span>Setting</li>
              </ul>
            </li>

            <li>
              <button class="w-full flex items-center gap-3 text-sm text-gray-300 px-4 py-2.5 hover:bg-[#1C1C28] rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 12h18M3 20h18" />
                </svg>
                API Management
              </button>
            </li>
          </ul>
        </div>

        <div class="text-xs text-gray-500 space-y-2">
          <p>Invite people</p>
          <p>Help & Support</p>
          <div class="bg-[#1C1C28] px-3 py-2 rounded-md mt-4">App version 3.1</div>
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


                    <!-- Metric Cards Adjusted: 4 columns x 3 rows -->
                    <div class="grid grid-cols-4 gap-6 mb-10">
                        <div class="bg-[#1C1C28] rounded-lg p-5 flex justify-between items-center">
                            <p class="text-gray-400 text-sm">Total MRR</p>
                            <h3 class="text-2xl font-bold">${{ number_format($totals['total_mrr'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-5 flex justify-between items-center">
                            <p class="text-gray-400 text-sm">New MRR</p>
                            <h3 class="text-2xl font-bold">${{ number_format($totals['new_mrr'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-5 flex justify-between items-center">
                            <p class="text-gray-400 text-sm">Upgrades</p>
                            <h3 class="text-2xl font-bold">${{ number_format($totals['upgrades'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-5 flex justify-between items-center">
                            <p class="text-gray-400 text-sm">Downgrades</p>
                            <h3 class="text-2xl font-bold">${{ number_format($totals['downgrades'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-5 flex justify-between items-center">
                            <p class="text-gray-400 text-sm">ARPU</p>
                            <h3 class="text-2xl font-bold">${{ number_format($totals['arpu'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-5 flex justify-between items-center">
                            <p class="text-gray-400 text-sm">Reactivations</p>
                            <h3 class="text-2xl font-bold">${{ number_format($totals['reactivations'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-5 flex justify-between items-center">
                            <p class="text-gray-400 text-sm">Existing</p>
                            <h3 class="text-2xl font-bold">${{ number_format($totals['existing'], 0) }}</h3>
                        </div>
                        <div class="bg-[#1C1C28] rounded-lg p-5 flex justify-between items-center">
                            <p class="text-gray-400 text-sm">Churn</p>
                            <h3 class="text-2xl font-bold">${{ number_format($totals['churn'], 0) }}</h3>
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
        <script>
      // Sidebar Dropdown Interactions
      const dropdowns = [
        { btn: 'analysisBtn', menu: 'analysisMenu', icon: 'analysisIcon' },
        { btn: 'managementBtn', menu: 'managementMenu', icon: 'managementIcon' },
        { btn: 'affiliateBtn', menu: 'affiliateMenu', icon: 'affiliateIcon' }
      ];

      dropdowns.forEach(({ btn, menu, icon }) => {
        const button = document.getElementById(btn);
        const list = document.getElementById(menu);
        const arrow = document.getElementById(icon);

        button.addEventListener('click', () => {
          list.classList.toggle('hidden');
          arrow.classList.toggle('rotate-180');
        });
      });

      // Chart.js stacked bar chart
      const ctx = document.getElementById('revenueChart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
          datasets: [
            { label: 'Total MRR', data: [12000, 15000, 18000, 20000, 22000, 25000, 27000], backgroundColor: '#F87171' },
            { label: 'New MRR', data: [3000, 4000, 3500, 4200, 4800, 5000, 5200], backgroundColor: '#3B82F6' },
            { label: 'Reactivations', data: [2000, 2500, 2400, 3000, 3100, 3200, 3300], backgroundColor: '#34D399' },
            { label: 'Upgrades', data: [1000, 1200, 1300, 1400, 1500, 1600, 1800], backgroundColor: '#A7F3D0' },
            { label: 'Existing', data: [5000, 6000, 6200, 6300, 6400, 6600, 6800], backgroundColor: '#818CF8' },
            { label: 'Downgrades', data: [500, 600, 550, 580, 600, 620, 640], backgroundColor: '#C084FC' },
            { label: 'Churn', data: [200, 300, 250, 270, 280, 290, 300], backgroundColor: '#F472B6' }
          ]
        },
        options: {
          responsive: true,
          interaction: { mode: 'index', intersect: false },
          scales: {
            x: { stacked: true, ticks: { color: '#A0A0B2' }, grid: { color: 'rgba(255,255,255,0.05)' } },
            y: { stacked: true, ticks: { color: '#A0A0B2' }, grid: { color: 'rgba(255,255,255,0.05)' } }
          },
          plugins: {
            legend: { display: false },
            tooltip: {
              titleColor: '#FFFFFF',
              bodyColor: '#FFFFFF',
              backgroundColor: '#1C1C28',
              borderColor: '#3B82F6',
              borderWidth: 1,
              displayColors: false
            }
          }
        }
      });
    </script>
    </body>
</html>
