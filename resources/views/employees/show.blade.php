<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de l'employé
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Infos employé --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    👤 {{ $employee->first_name }} {{ $employee->last_name }}
                </h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="text-gray-500 text-sm">Email</span>
                        <p class="font-medium">{{ $employee->email }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-sm">Téléphone</span>
                        <p class="font-medium">{{ $employee->phone ?? '-' }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-sm">Département</span>
                        <p class="font-medium">{{ $employee->department->name ?? '-' }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-sm">Poste actuel</span>
                        <p class="font-medium">{{ $employee->currentPosition->title ?? '-' }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-sm">Date d'embauche</span>
                        <p class="font-medium">{{ $employee->hire_date }}</p>
                    </div>
                </div>
                <div class="flex gap-3 mt-6">
                    <a href="{{ route('employees.edit', $employee) }}"
                       class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                        Modifier
                    </a>
                    <a href="{{ route('employees.index') }}"
                       class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300">
                        Retour
                    </a>
                </div>
            </div>

            {{-- Historique des postes --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    📋 Historique des postes
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-4 py-3 text-gray-600">Poste</th>
                                <th class="px-4 py-3 text-gray-600">Date début</th>
                                <th class="px-4 py-3 text-gray-600">Date fin</th>
                                <th class="px-4 py-3 text-gray-600">Raison</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employee->positionHistories as $history)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">{{ $history->position->title ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $history->start_date }}</td>
                                <td class="px-4 py-3">{{ $history->end_date ?? 'En cours' }}</td>
                                <td class="px-4 py-3 text-gray-500">{{ $history->reason ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center text-gray-500">
                                    Aucun historique disponible.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>