<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Historique des postes
            </h2>
            <a href="{{ route('position-histories.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                + Nouvel historique
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
                                <th class="px-6 py-3 text-gray-600">Employé</th>
                                <th class="px-6 py-3 text-gray-600">Poste</th>
                                <th class="px-6 py-3 text-gray-600">Date début</th>
                                <th class="px-6 py-3 text-gray-600">Date fin</th>
                                <th class="px-6 py-3 text-gray-600">Raison</th>
                                <th class="px-6 py-3 text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($histories as $history)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $history->id }}</td>
                                <td class="px-6 py-4 font-medium">
                                    {{ $history->employee->first_name ?? '-' }}
                                    {{ $history->employee->last_name ?? '' }}
                                </td>
                                <td class="px-6 py-4">{{ $history->position->title ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $history->start_date }}</td>
                                <td class="px-6 py-4">
                                    @if($history->end_date)
                                        {{ $history->end_date }}
                                    @else
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                                            En cours
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $history->reason ?? '-' }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('position-histories.edit', $history) }}"
                                    class="text-yellow-600 hover:underline">Modifier</a>
                                    <form action="{{ route('position-histories.destroy', $history) }}"
                                        method="POST"
                                        onsubmit="return confirm('Supprimer cet historique ?')">
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
                                    Aucun historique trouvé.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>