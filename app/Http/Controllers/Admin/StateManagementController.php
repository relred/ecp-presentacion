<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateManagementController extends Controller
{
    public function index()
    {
        $states = State::orderBy('name')->get();
        return view('admin.states.index', compact('states'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'states' => 'required|array',
            'states.*.id' => 'required|exists:states,id',
            'states.*.goal' => 'required|integer|min:0',
            'states.*.mobilized' => 'required|integer|min:0'
        ]);

        foreach ($request->states as $stateData) {
            State::where('id', $stateData['id'])
                ->update([
                    'goal' => $stateData['goal'],
                    'mobilized' => $stateData['mobilized']
                ]);
        }

        return redirect()->back()->with('success', 'Datos actualizados exitosamente.');
    }
}
