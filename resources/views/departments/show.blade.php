<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails du département
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <span class="text-gray-500 text-sm">Nom</span>
                    <p class="text-lg font-semibold">{{ $department->name }}</p>
                </div>
                <div class="mb-6">
                    <span class="text-gray-500 text-sm">Description</span>
                    <p class="text-gray-700">{{ $department->description ?? 'Aucune description' }}</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('departments.edit', $department) }}"
                       class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                        Modifier
                    </a>
                    <a href="{{ route('departments.index') }}"
                       class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300">
                        Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>