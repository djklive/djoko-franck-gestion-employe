<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('employee')
                     ->orderBy('role')
                     ->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $employees = Employee::whereNull('user_id')->get();
        return view('users.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|string|min:8|confirmed',
            'role'        => 'required|in:admin,rh,employee',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        // Lier à un employé si sélectionné
        if (!empty($validated['employee_id'])) {
            Employee::where('id', $validated['employee_id'])
                    ->update(['user_id' => $user->id]);
        }

        return redirect()->route('users.index')
                         ->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(User $user)
    {
        $employees = Employee::where(function($query) use ($user) {
            $query->whereNull('user_id')
                  ->orWhere('user_id', $user->id);
        })->get();

        return view('users.edit', compact('user', 'employees'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $user->id,
            'password'    => 'nullable|string|min:8|confirmed',
            'role'        => 'required|in:admin,rh,employee',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        // Détacher l'ancien employé lié
        Employee::where('user_id', $user->id)
                ->update(['user_id' => null]);

        $user->update([
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'role'  => $validated['role'],
            'password' => !empty($validated['password'])
                ? Hash::make($validated['password'])
                : $user->password,
        ]);

        // Lier au nouvel employé si sélectionné
        if (!empty($validated['employee_id'])) {
            Employee::where('id', $validated['employee_id'])
                    ->update(['user_id' => $user->id]);
        }

        return redirect()->route('users.index')
                         ->with('success', 'Utilisateur modifié avec succès.');
    }

    public function destroy(User $user)
    {
        // Empêcher la suppression de son propre compte
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')
                             ->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        // Détacher l'employé lié
        Employee::where('user_id', $user->id)
                ->update(['user_id' => null]);

        $user->delete();

        return redirect()->route('users.index')
                         ->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function show(User $user)
    {
        $user->load('employee');
        return view('users.show', compact('user'));
    }
}