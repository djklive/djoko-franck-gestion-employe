<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-user me-2 text-indigo-600"></i>
            Détails utilisateur
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-xl p-6 border border-gray-100">

                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                        <span class="text-indigo-700 font-bold text-2xl">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $user->name }}</h3>
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
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <span class="text-gray-500 text-xs uppercase tracking-wide">Email</span>
                        <p class="font-medium text-gray-800 mt-1">{{ $user->email }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <span class="text-gray-500 text-xs uppercase tracking-wide">Employé lié</span>
                        <p class="font-medium text-gray-800 mt-1">
                            @if($user->employee)
                                {{ $user->employee->first_name }} {{ $user->employee->last_name }}
                            @else
                                <span class="text-gray-400">Non lié</span>
                            @endif
                        </p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <span class="text-gray-500 text-xs uppercase tracking-wide">Créé le</span>
                        <p class="font-medium text-gray-800 mt-1">
                            {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y à H:i') }}
                        </p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('users.edit', $user) }}"
                       class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition flex items-center gap-2">
                        <i class="fa-solid fa-pen"></i> Modifier
                    </a>
                    <a href="{{ route('users.index') }}"
                       class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                        Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>