<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-house me-2 text-indigo-600"></i>
            Tableau de bord RH
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Message de bienvenue -->
            <div class="bg-indigo-600 rounded-2xl p-6 mb-8 text-white flex items-center gap-4 shadow">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-indigo-600 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Bonjour, {{ Auth::user()->name }} 👋</h3>
                    <p class="text-indigo-100 text-sm mt-1">
                        Bienvenue sur votre espace de gestion des ressources humaines.
                    </p>
                </div>
            </div>

            <!-- Cards navigation -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="{{ route('departments.index') }}"
                   class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition group border border-gray-100">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-200 transition">
                        <i class="fa-solid fa-building text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Départements</h3>
                    <p class="text-gray-500 text-sm mt-1">Gérer les départements</p>
                    <div class="mt-4 text-blue-600 text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                        Accéder <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>
                </a>

                <a href="{{ route('positions.index') }}"
                   class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition group border border-gray-100">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-200 transition">
                        <i class="fa-solid fa-briefcase text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Postes</h3>
                    <p class="text-gray-500 text-sm mt-1">Gérer les postes</p>
                    <div class="mt-4 text-green-600 text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                        Accéder <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>
                </a>

                <a href="{{ route('employees.index') }}"
                   class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition group border border-gray-100">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-200 transition">
                        <i class="fa-solid fa-users text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Employés</h3>
                    <p class="text-gray-500 text-sm mt-1">Gérer les employés</p>
                    <div class="mt-4 text-purple-600 text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                        Accéder <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>
                </a>

                <a href="{{ route('position-histories.index') }}"
                   class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition group border border-gray-100">
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-orange-200 transition">
                        <i class="fa-solid fa-clock-rotate-left text-orange-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Historique</h3>
                    <p class="text-gray-500 text-sm mt-1">Historique des postes</p>
                    <div class="mt-4 text-orange-600 text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                        Accéder <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>