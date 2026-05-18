<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\PositionHistory;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques globales
        $totalEmployees   = Employee::count();
        $totalDepartments = Department::count();
        $totalPositions   = Position::count();
        $totalHistories   = PositionHistory::count();

        // Employés par département
        $employeesByDepartment = Department::withCount('employees')
            ->orderBy('employees_count', 'desc')
            ->get();

        // 5 derniers employés recrutés
        $latestEmployees = Employee::with(['department', 'currentPosition'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Département avec le plus d'employés
        $topDepartment = Department::withCount('employees')
            ->orderBy('employees_count', 'desc')
            ->first();

        return view('dashboard', compact(
            'totalEmployees',
            'totalDepartments',
            'totalPositions',
            'totalHistories',
            'employeesByDepartment',
            'latestEmployees',
            'topDepartment'
        ));
    }
}