<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de l'historique
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <span class="text-gray-500 text-sm">Employé</span>
                        <p class="font-medium">
                            {{ $positionHistory->employee->first_name ?? '-' }}
                            {{ $positionHistory->employee->last_name ?? '' }}
                        </p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-sm">Poste</span>
                        <p class="font-medium">{{ $positionHistory->position->title ?? '-' }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-sm">Date début</span>
                        <p class="font-medium">{{ $positionHistory->start_date }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-sm">Date fin</span>
                        <p class="font-medium">{{ $positionHistory->end_date ?? 'En cours' }}</p>
                    </div>
                    <div class="col-span-2">
                        <span class="text-gray-500 text-sm">Raison</span>
                        <p class="font-medium">{{ $positionHistory->reason ?? '-' }}</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('position-histories.edit', $positionHistory) }}"
                       class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                        Modifier
                    </a>
                    <a href="{{ route('position-histories.index') }}"
                       class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300">
                        Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>