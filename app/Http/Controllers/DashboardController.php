<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Only pass totals for server-rendered cards; time-series data is fetched via API
        $data = $this->generateMockData();
        return view('dashboard', ['totals' => $data['totals']]);
    }

    public function data(Request $request)
    {
        // Accept optional query params for start/end and plan (mocked)
        $start = $request->query('start');
        $end = $request->query('end');
        $plan = $request->query('plan');

        // For mock data, we'll ignore actual date ranges but vary randomness when filters change
        $seed = 0;
        if ($start) $seed += crc32($start);
        if ($end) $seed += crc32($end);
        if ($plan) $seed += crc32($plan);

        // Use the seed to slightly vary generated numbers
        mt_srand($seed);
        $data = $this->generateMockData();
        mt_srand(); // reset
        return response()->json($data);
    }

    private function generateMockData()
    {
        $labels = [];
        $start = \Carbon\Carbon::now()->subDays(29);
        for ($i = 0; $i < 30; $i++) {
            $labels[] = $start->copy()->addDays($i)->format('M j');
        }

        $new = array_map(fn($i) => 3000 + ($i * 50) + rand(-200, 200), range(0, 29));
        $upgrades = array_map(fn($i) => 800 + ($i * 20) + rand(-80, 80), range(0, 29));
        $reactivations = array_map(fn($i) => 400 + rand(-50, 50), range(0, 29));
        $existing = array_map(fn($i) => 2000 + ($i * 30) + rand(-150, 150), range(0, 29));
        $downgrades = array_map(fn($i) => 150 + rand(-30, 30), range(0, 29));
        $churn = array_map(fn($i) => 50 + rand(-20, 20), range(0, 29));

        $totals = [
            'total_mrr' => array_sum($new) + array_sum($existing) + array_sum($upgrades) - array_sum($downgrades) - array_sum($churn),
            'new_mrr' => array_sum($new),
            'upgrades' => array_sum($upgrades),
            'downgrades' => array_sum($downgrades),
            'arpu' => 10000,
            'reactivations' => array_sum($reactivations),
            'existing' => array_sum($existing),
            'churn' => array_sum($churn),
        ];

        return [
            'labels' => $labels,
            'new' => $new,
            'upgrades' => $upgrades,
            'reactivations' => $reactivations,
            'existing' => $existing,
            'downgrades' => $downgrades,
            'churn' => $churn,
            'totals' => $totals,
        ];
    }
}
