<?php

namespace App\Http\Controllers;

use App\Models\PositionHistory;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionHistoryController extends Controller
{
    public function index()
    {
        $histories = PositionHistory::with(['employee', 'position'])
                        ->orderBy('start_date', 'desc')
                        ->paginate(15);
        return view('position-histories.index', compact('histories'));
    }

    public function create()
    {
        $employees = Employee::all();
        $positions = Position::all();
        return view('position-histories.create', compact('employees', 'positions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'position_id' => 'required|exists:positions,id',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after:start_date',
            'reason'      => 'nullable|string',
        ]);

        PositionHistory::create($validated);

        return redirect()->route('position-histories.index')
                         ->with('success', 'Historique ajouté avec succès.');
    }

    public function show(PositionHistory $positionHistory)
    {
        $positionHistory->load(['employee', 'position']);
        return view('position-histories.show', compact('positionHistory'));
    }

    public function edit(PositionHistory $positionHistory)
    {
        $employees = Employee::all();
        $positions = Position::all();
        return view('position-histories.edit', compact('positionHistory', 'employees', 'positions'));
    }

    public function update(Request $request, PositionHistory $positionHistory)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'position_id' => 'required|exists:positions,id',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after:start_date',
            'reason'      => 'nullable|string',
        ]);

        $positionHistory->update($validated);

        return redirect()->route('position-histories.index')
                         ->with('success', 'Historique modifié avec succès.');
    }

    public function destroy(PositionHistory $positionHistory)
    {
        $positionHistory->delete();

        return redirect()->route('position-histories.index')
                         ->with('success', 'Historique supprimé avec succès.');
    }
}