<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\PositionHistory;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with(['department', 'currentPosition'])
            ->when($request->search, function ($query, $search) {
                $query->where('first_name', 'like', "%$search%")
                      ->orWhere('last_name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })
            ->when($request->department_id, function ($query, $dept) {
                $query->where('department_id', $dept);
            })
            ->when($request->position_id, function ($query, $pos) {
                $query->where('position_id', $pos);
            })
            ->paginate(15);

        $departments = Department::all();
        $positions = Position::all();

        return view('employees.index', compact('employees', 'departments', 'positions'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email',
            'phone'         => 'nullable|string|max:20',
            'hire_date'     => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'position_id'   => 'required|exists:positions,id',
        ]);

        $employee = Employee::create($validated);

        // Enregistrer l'historique du poste initial
        PositionHistory::create([
            'employee_id' => $employee->id,
            'position_id' => $employee->position_id,
            'start_date'  => $employee->hire_date,
            'reason'      => 'Poste initial',
        ]);

        return redirect()->route('employees.index')
                         ->with('success', 'Employé créé avec succès.');
    }

    public function show(Employee $employee)
    {
        $employee->load(['department', 'currentPosition', 'positionHistories.position']);
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email,' . $employee->id,
            'phone'         => 'nullable|string|max:20',
            'hire_date'     => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'position_id'   => 'required|exists:positions,id',
        ]);

        // Si le poste a changé, enregistrer dans l'historique
        if ($employee->position_id != $validated['position_id']) {
            // Fermer l'entrée précédente
            PositionHistory::where('employee_id', $employee->id)
                ->whereNull('end_date')
                ->update(['end_date' => now()]);

            // Créer une nouvelle entrée
            PositionHistory::create([
                'employee_id' => $employee->id,
                'position_id' => $validated['position_id'],
                'start_date'  => now(),
                'reason'      => $request->reason ?? 'Changement de poste',
            ]);
        }

        $employee->update($validated);

        return redirect()->route('employees.index')
                         ->with('success', 'Employé modifié avec succès.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Employé supprimé avec succès.');
    }

    public function monProfil()
    {
        $employee = Employee::with(['department', 'currentPosition', 'positionHistories.position'])
            ->where('user_id', auth()->id())
            ->first();

        if (!$employee) {
            return view('employees.no-profil');
        }

        return view('employees.mon-profil', compact('employee'));
    }
}