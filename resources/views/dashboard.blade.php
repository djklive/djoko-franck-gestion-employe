<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord RH') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> -->

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Departments -->
                <a href="{{ route('departments.index') }}"
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50">
                    <div class="text-blue-600 text-4xl mb-3">🏢</div>
                    <h3 class="text-lg font-semibold text-gray-900">Departements</h3>
                    <p class="text-gray-500 text-sm mt-1">Gerer les departements</p>
                </a>

                <!-- Postes -->
                <a href="{{ route('positions.index') }}"
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50">
                    <div class="text-green-600 text-4xl mb-3">💼</div>
                    <h3 class="text-lg font-semibold text-gray-900">Postes</h3>
                    <p class="text-gray-500 text-sm mt-1">Gerer les postes</p>
                </a>

                <!-- Employes -->
                <a href="{{ route('employees.index') }}"
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-50">
                    <div class="text-purple-600 text-4xl mb-3">👥</div>
                    <h3 class="text-lg font-semibold text-gray-900">Employes</h3>
                    <p class="text-gray-500 text-sm mt-1">Gerer les employes</p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
