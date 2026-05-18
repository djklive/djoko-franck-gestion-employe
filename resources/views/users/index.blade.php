<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fa-solid fa-users-gear me-2 text-indigo-600"></i>
                Gestion des utilisateurs
            </h2>
            <a href="{{ route('users.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center gap-2">
                <i class="fa-solid fa-user-plus"></i>
                Nouvel utilisateur
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-circle-xmark"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                <table class="w-full text-left min-w-max">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-gray-600 text-sm">#</th>
                            <th class="px-6 py-3 text-gray-600 text-sm">Utilisateur</th>
                            <th class="px-6 py-3 text-gray-600 text-sm">Email</th>
                            <th class="px-6 py-3 text-gray-600 text-sm">Rôle</th>
                            <th class="px-6 py-3 text-gray-600 text-sm">Employé lié</th>
                            <th class="px-6 py-3 text-gray-600 text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-500">{{ $user->id }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <span class="text-indigo-700 font-bold text-xs">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <span class="font-medium text-gray-800">{{ $user->name }}</span>
                                    @if($user->id === auth()->id())
                                        <span class="text-xs bg-indigo-100 text-indigo-600 px-2 py-0.5 rounded-full">Vous</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->role === 'admin')
                                    <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fa-solid fa-shield-halved me-1"></i>Admin
                                    </span>
                                @elseif($user->role === 'rh')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fa-solid fa-user-tie me-1"></i>RH
                                    </span>
                                @else
                                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fa-solid fa-user me-1"></i>Employé
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($user->employee)
                                    <span class="text-gray-700">
                                        {{ $user->employee->first_name }}
                                        {{ $user->employee->last_name }}
                                    </span>
                                @else
                                    <span class="text-gray-400 text-sm">Non lié</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('users.show', $user) }}"
                                   class="text-blue-600 hover:underline text-sm">
                                    <i class="fa-solid fa-eye"></i> Voir
                                </a>
                                <a href="{{ route('users.edit', $user) }}"
                                   class="text-yellow-600 hover:underline text-sm">
                                    <i class="fa-solid fa-pen"></i> Modifier
                                </a>
                                @if($user->id !== auth()->id())
                                <form action="{{ route('users.destroy', $user) }}"
                                      method="POST"
                                      onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">
                                        <i class="fa-solid fa-trash"></i> Supprimer
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                <i class="fa-solid fa-users text-4xl mb-2 block"></i>
                                Aucun utilisateur trouvé.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
                <div class="p-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>