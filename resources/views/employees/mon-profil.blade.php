<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-id-card me-2 text-indigo-600"></i>
            Mon Profil
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Infos personnelles --}}
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                        <span class="text-indigo-700 font-bold text-xl">
                            {{ strtoupper(substr($employee->first_name, 0, 1)) }}{{ strtoupper(substr($employee->last_name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </h3>
                        <p class="text-indigo-600 font-medium">
                            {{ $employee->currentPosition->title ?? '-' }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <span class="text-gray-500 text-xs uppercase tracking-wide">Email</span>
                        <p class="font-medium text-gray-800 mt-1">{{ $employee->email }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <span class="text-gray-500 text-xs uppercase tracking-wide">Téléphone</span>
                        <p class="font-medium text-gray-800 mt-1">{{ $employee->phone ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <span class="text-gray-500 text-xs uppercase tracking-wide">Département</span>
                        <p class="font-medium text-gray-800 mt-1">{{ $employee->department->name ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <span class="text-gray-500 text-xs uppercase tracking-wide">Date d'embauche</span>
                        <p class="font-medium text-gray-800 mt-1">
                            {{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Historique des postes --}}
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-clock-rotate-left text-indigo-600"></i>
                    Mon historique de postes
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left min-w-max">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-4 py-3 text-gray-600 text-sm">Poste</th>
                                <th class="px-4 py-3 text-gray-600 text-sm">Date début</th>
                                <th class="px-4 py-3 text-gray-600 text-sm">Date fin</th>
                                <th class="px-4 py-3 text-gray-600 text-sm">Raison</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employee->positionHistories as $history)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">{{ $history->position->title ?? '-' }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($history->start_date)->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">
                                    @if($history->end_date)
                                        {{ \Carbon\Carbon::parse($history->end_date)->format('d/m/Y') }}
                                    @else
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                            En cours
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-gray-500">{{ $history->reason ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center text-gray-400">
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