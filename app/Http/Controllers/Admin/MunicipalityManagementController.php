<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityManagementController extends Controller
{
    public function index()
    {
        $municipalities = Municipality::orderBy('name')->get();
        return view('admin.municipalities.index', compact('municipalities'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'municipalities' => 'required|array',
            'municipalities.*.id' => 'required|exists:municipalities,id',
            'municipalities.*.goal' => 'required|integer|min:0',
            'municipalities.*.mobilized' => 'required|integer|min:0'
        ]);

        foreach ($request->municipalities as $munData) {
            Municipality::where('id', $munData['id'])
                ->update([
                    'goal' => $munData['goal'],
                    'mobilized' => $munData['mobilized']
                ]);
        }

        return redirect()->back()->with('success', 'Datos actualizados exitosamente.');
    }
}
