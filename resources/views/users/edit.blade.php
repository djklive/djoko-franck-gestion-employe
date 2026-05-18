<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-user-pen me-2 text-indigo-600"></i>
            Modifier l'utilisateur
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-xl p-6 border border-gray-100">

                @if($errors->any())
                    <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fa-solid fa-user text-gray-400 me-1"></i>Nom complet *
                        </label>
                        <input type="text" name="name"
                               value="{{ old('name', $user->name) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fa-solid fa-envelope text-gray-400 me-1"></i>Email *
                        </label>
                        <input type="email" name="email"
                               value="{{ old('email', $user->email) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fa-solid fa-lock text-gray-400 me-1"></i>
                            Nouveau mot de passe
                            <span class="text-gray-400 font-normal text-sm">(laisser vide pour ne pas changer)</span>
                        </label>
                        <input type="password" name="password"
                               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="Minimum 8 caractères">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fa-solid fa-lock text-gray-400 me-1"></i>Confirmer le mot de passe
                        </label>
                        <input type="password" name="password_confirmation"
                               class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="Répétez le mot de passe">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fa-solid fa-shield-halved text-gray-400 me-1"></i>Rôle *
                        </label>
                        <select name="role"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>
                                Admin — Accès total
                            </option>
                            <option value="rh" {{ old('role', $user->role) === 'rh' ? 'selected' : '' }}>
                                RH — Gestion des employés
                            </option>
                            <option value="employee" {{ old('role', $user->role) === 'employee' ? 'selected' : '' }}>
                                Employé — Voir son profil uniquement
                            </option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fa-solid fa-link text-gray-400 me-1"></i>
                            Lier à un employé
                            <span class="text-gray-400 font-normal text-sm">(optionnel)</span>
                        </label>
                        <select name="employee_id"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">-- Aucun employé lié --</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ old('employee_id', $user->employee?->id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition flex items-center gap-2">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Mettre à jour
                        </button>
                        <a href="{{ route('users.index') }}"
                           class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>