<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $states = State::all();
        
        $totalMobilized = $states->sum('mobilized');
        $totalGoal = $states->sum('goal');
        $nationalPercentage = $totalGoal > 0 ? round(($totalMobilized / $totalGoal) * 100, 1) : 0;

        return view('dashboard', compact('states', 'totalMobilized', 'totalGoal', 'nationalPercentage'));
    }
}
