<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityDashboardController extends Controller
{
    public function index()
    {
        $municipalities = Municipality::orderBy('name')->get();
        
        $totalMobilized = $municipalities->sum('mobilized');
        $totalGoal = $municipalities->sum('goal');
        $totalPercentage = $totalGoal > 0 ? round(($totalMobilized / $totalGoal) * 100, 1) : 0;

        return view('municipalities.dashboard', compact('municipalities', 'totalMobilized', 'totalGoal', 'totalPercentage'));
    }

    public function largeScreen()
    {
        $municipalities = Municipality::orderBy('name')->get();
        
        $totalMobilized = $municipalities->sum('mobilized');
        $totalGoal = $municipalities->sum('goal');
        $totalPercentage = $totalGoal > 0 ? round(($totalMobilized / $totalGoal) * 100, 1) : 0;

        return view('municipalities.dashboard-large', compact('municipalities', 'totalMobilized', 'totalGoal', 'totalPercentage'));
    }
}
