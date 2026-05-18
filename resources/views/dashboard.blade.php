<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-house me-2 text-indigo-600"></i>
            Tableau de bord RH
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Message de bienvenue --}}
            <div class="bg-indigo-600 rounded-2xl p-6 mb-8 text-white flex items-center gap-4 shadow">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-indigo-600 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Bonjour, {{ Auth::user()->name }} 👋</h3>
                    <p class="text-indigo-100 text-sm mt-1">
                        Voici un aperçu de votre entreprise aujourd'hui.
                    </p>
                </div>
            </div>

            {{-- Cartes statistiques --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

                <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-users text-purple-600"></i>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">{{ $totalEmployees }}</span>
                    </div>
                    <p class="text-gray-500 text-sm font-medium">Employés</p>
                    <a href="{{ route('employees.index') }}"
                       class="text-purple-600 text-xs hover:underline mt-1 block">
                        Voir tous →
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-building text-blue-600"></i>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">{{ $totalDepartments }}</span>
                    </div>
                    <p class="text-gray-500 text-sm font-medium">Départements</p>
                    <a href="{{ route('departments.index') }}"
                       class="text-blue-600 text-xs hover:underline mt-1 block">
                        Voir tous →
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-briefcase text-green-600"></i>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">{{ $totalPositions }}</span>
                    </div>
                    <p class="text-gray-500 text-sm font-medium">Postes</p>
                    <a href="{{ route('positions.index') }}"
                       class="text-green-600 text-xs hover:underline mt-1 block">
                        Voir tous →
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-clock-rotate-left text-orange-600"></i>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">{{ $totalHistories }}</span>
                    </div>
                    <p class="text-gray-500 text-sm font-medium">Changements de poste</p>
                    <a href="{{ route('position-histories.index') }}"
                       class="text-orange-600 text-xs hover:underline mt-1 block">
                        Voir tous →
                    </a>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

                {{-- Employés par département --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-chart-bar text-indigo-600"></i>
                        Employés par département
                    </h3>
                    @forelse($employeesByDepartment as $dept)
                    <div class="mb-3">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-700 font-medium">{{ $dept->name }}</span>
                            <span class="text-gray-500">{{ $dept->employees_count }} employé(s)</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2">
                            @php
                                $percent = $totalEmployees > 0
                                    ? ($dept->employees_count / $totalEmployees) * 100
                                    : 0;
                            @endphp
                            <div class="bg-indigo-500 h-2 rounded-full transition-all"
                                 style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-400 text-sm text-center py-4">
                        Aucun département créé.
                        <a href="{{ route('departments.create') }}" class="text-indigo-600 hover:underline">
                            Créer un département
                        </a>
                    </p>
                    @endforelse
                </div>

                {{-- Derniers employés recrutés --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-user-plus text-indigo-600"></i>
                        Derniers recrutements
                    </h3>
                    @forelse($latestEmployees as $employee)
                    <div class="flex items-center gap-3 mb-3 pb-3 border-b border-gray-50 last:border-0 last:mb-0">
                        <div class="w-9 h-9 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-indigo-700 font-bold text-xs">
                                {{ strtoupper(substr($employee->first_name, 0, 1)) }}{{ strtoupper(substr($employee->last_name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-800 truncate">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </p>
                            <p class="text-xs text-gray-500 truncate">
                                {{ $employee->currentPosition->title ?? '-' }} •
                                {{ $employee->department->name ?? '-' }}
                            </p>
                        </div>
                        <span class="text-xs text-gray-400 flex-shrink-0">
                            {{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}
                        </span>
                    </div>
                    @empty
                    <p class="text-gray-400 text-sm text-center py-4">
                        Aucun employé créé.
                        <a href="{{ route('employees.create') }}" class="text-indigo-600 hover:underline">
                            Ajouter un employé
                        </a>
                    </p>
                    @endforelse
                </div>

            </div>

            {{-- Raccourcis rapides --}}
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-bolt text-indigo-600"></i>
                    Actions rapides
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <a href="{{ route('employees.create') }}"
                       class="flex flex-col items-center gap-2 p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition text-center">
                        <i class="fa-solid fa-user-plus text-purple-600 text-xl"></i>
                        <span class="text-purple-700 text-sm font-medium">Nouvel employé</span>
                    </a>
                    <a href="{{ route('departments.create') }}"
                       class="flex flex-col items-center gap-2 p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition text-center">
                        <i class="fa-solid fa-building-circle-arrow-right text-blue-600 text-xl"></i>
                        <span class="text-blue-700 text-sm font-medium">Nouveau département</span>
                    </a>
                    <a href="{{ route('positions.create') }}"
                       class="flex flex-col items-center gap-2 p-4 bg-green-50 rounded-xl hover:bg-green-100 transition text-center">
                        <i class="fa-solid fa-briefcase text-green-600 text-xl"></i>
                        <span class="text-green-700 text-sm font-medium">Nouveau poste</span>
                    </a>
                    <a href="{{ route('employees.index') }}"
                       class="flex flex-col items-center gap-2 p-4 bg-orange-50 rounded-xl hover:bg-orange-100 transition text-center">
                        <i class="fa-solid fa-magnifying-glass text-orange-600 text-xl"></i>
                        <span class="text-orange-700 text-sm font-medium">Rechercher</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>