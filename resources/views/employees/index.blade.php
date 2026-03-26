<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Employés
            </h2>
            <a href="{{ route('employees.create') }}"
               class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                + Nouvel employé
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Formulaire de recherche --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-4 mb-6">
                <form method="GET" action="{{ route('employees.index') }}"
                      class="flex flex-col sm:flex-row flex-wrap gap-3">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Rechercher par nom ou email..."
                           class="border rounded px-3 py-2 flex-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <select name="department_id"
                            class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option value="">Tous les départements</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ request('department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="position_id"
                            class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option value="">Tous les postes</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}"
                                {{ request('position_id') == $position->id ? 'selected' : '' }}>
                                {{ $position->title }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit"
                            class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                        Rechercher
                    </button>
                    <a href="{{ route('employees.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                        Réinitialiser
                    </a>
                </form>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left min-w-max">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-gray-600">#</th>
                                <th class="px-6 py-3 text-gray-600">Nom complet</th>
                                <th class="px-6 py-3 text-gray-600">Email</th>
                                <th class="px-6 py-3 text-gray-600">Département</th>
                                <th class="px-6 py-3 text-gray-600">Poste</th>
                                <th class="px-6 py-3 text-gray-600">Date d'embauche</th>
                                <th class="px-6 py-3 text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $employee->id }}</td>
                                <td class="px-6 py-4 font-medium">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $employee->email }}</td>
                                <td class="px-6 py-4">{{ $employee->department->name ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $employee->currentPosition->title ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $employee->hire_date }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('employees.show', $employee) }}"
                                    class="text-blue-600 hover:underline">Voir</a>
                                    <a href="{{ route('employees.edit', $employee) }}"
                                    class="text-yellow-600 hover:underline">Modifier</a>
                                    <form action="{{ route('employees.destroy', $employee) }}"
                                        method="POST"
                                        onsubmit="return confirm('Supprimer cet employé ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Aucun employé trouvé.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="p-4">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>