<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Départements
            </h2>
            <a href="{{ route('departments.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Nouveau département
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

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left min-w-max">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-gray-600">#</th>
                                <th class="px-6 py-3 text-gray-600">Nom</th>
                                <th class="px-6 py-3 text-gray-600">Description</th>
                                <th class="px-6 py-3 text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $department)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $department->id }}</td>
                                <td class="px-6 py-4 font-medium">{{ $department->name }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $department->description ?? '-' }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('departments.show', $department) }}"
                                    class="text-blue-600 hover:underline">Voir</a>
                                    <a href="{{ route('departments.edit', $department) }}"
                                    class="text-yellow-600 hover:underline">Modifier</a>
                                    <form action="{{ route('departments.destroy', $department) }}"
                                        method="POST"
                                        onsubmit="return confirm('Supprimer ce département ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    Aucun département trouvé.
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