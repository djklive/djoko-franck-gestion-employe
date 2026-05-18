<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionHistoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard — accessible à tous les connectés
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    
    // Gestion utilisateurs — Admin seulement
    Route::resource('users', UserController::class)
        ->middleware('role:admin');

    // Profil — accessible à tous
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Mon profil employé — accessible à l'employé connecté
    Route::get('/mon-profil', [EmployeeController::class, 'monProfil'])
        ->name('employee.profil');

    // Départements — Admin seulement
    Route::resource('departments', DepartmentController::class)
        ->middleware('role:admin');

    // Postes — Admin seulement
    Route::resource('positions', PositionController::class)
        ->middleware('role:admin');

    // Employés — Admin et RH peuvent voir/créer/modifier
    // Seul Admin peut supprimer
    Route::resource('employees', EmployeeController::class)
        ->except(['destroy'])
        ->middleware('role:admin,rh');

    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])
        ->name('employees.destroy')
        ->middleware('role:admin');

    // Historique — Admin et RH
    Route::resource('position-histories', PositionHistoryController::class)
        ->except(['destroy'])
        ->middleware('role:admin,rh');

    Route::delete('/position-histories/{positionHistory}',
        [PositionHistoryController::class, 'destroy'])
        ->name('position-histories.destroy')
        ->middleware('role:admin');
});

require __DIR__.'/auth.php';