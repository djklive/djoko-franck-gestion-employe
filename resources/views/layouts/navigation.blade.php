<nav x-data="{ open: false }" class="bg-indigo-700 border-b border-indigo-800 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <span class="text-indigo-700 font-bold text-xs">GRH</span>
                    </div>
                    <span class="text-white font-bold text-lg hidden sm:block">Gestion RH</span>
                </a>

                <!-- Liens desktop -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 space-x-1">
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium transition
                       {{ request()->routeIs('dashboard') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600' }}">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('departments.index') }}"
                       class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium transition
                       {{ request()->routeIs('departments.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600' }}">
                        <i class="fa-solid fa-building"></i>
                        <span>Départements</span>
                    </a>
                    <a href="{{ route('positions.index') }}"
                       class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium transition
                       {{ request()->routeIs('positions.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600' }}">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Postes</span>
                    </a>
                    <a href="{{ route('employees.index') }}"
                       class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium transition
                       {{ request()->routeIs('employees.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600' }}">
                        <i class="fa-solid fa-users"></i>
                        <span>Employés</span>
                    </a>
                    <a href="{{ route('position-histories.index') }}"
                       class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium transition
                       {{ request()->routeIs('position-histories.*') ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600' }}">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span>Historique</span>
                    </a>
                </div>
            </div>

            <!-- Menu utilisateur desktop -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-2 rounded-lg text-sm transition">
                            <i class="fa-solid fa-circle-user text-lg"></i>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fa-solid fa-user-pen me-2 text-gray-500"></i>
                            {{ __('Mon profil') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket me-2 text-gray-500"></i>
                                {{ __('Se déconnecter') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Bouton hamburger mobile -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="text-indigo-100 hover:text-white p-2 rounded-lg focus:outline-none">
                    <i x-show="!open" class="fa-solid fa-bars text-xl"></i>
                    <i x-show="open" class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu mobile -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-indigo-800">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
               {{ request()->routeIs('dashboard') ? 'bg-indigo-900 text-white' : 'text-indigo-100 hover:bg-indigo-700' }}">
                <i class="fa-solid fa-house w-5"></i> Dashboard
            </a>
            <a href="{{ route('departments.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
               {{ request()->routeIs('departments.*') ? 'bg-indigo-900 text-white' : 'text-indigo-100 hover:bg-indigo-700' }}">
                <i class="fa-solid fa-building w-5"></i> Départements
            </a>
            <a href="{{ route('positions.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
               {{ request()->routeIs('positions.*') ? 'bg-indigo-900 text-white' : 'text-indigo-100 hover:bg-indigo-700' }}">
                <i class="fa-solid fa-briefcase w-5"></i> Postes
            </a>
            <a href="{{ route('employees.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
               {{ request()->routeIs('employees.*') ? 'bg-indigo-900 text-white' : 'text-indigo-100 hover:bg-indigo-700' }}">
                <i class="fa-solid fa-users w-5"></i> Employés
            </a>
            <a href="{{ route('position-histories.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium
               {{ request()->routeIs('position-histories.*') ? 'bg-indigo-900 text-white' : 'text-indigo-100 hover:bg-indigo-700' }}">
                <i class="fa-solid fa-clock-rotate-left w-5"></i> Historique
            </a>
        </div>
        <div class="border-t border-indigo-700 pt-3 pb-3 px-3">
            <div class="flex items-center gap-3 px-3 mb-3">
                <i class="fa-solid fa-circle-user text-2xl text-indigo-200"></i>
                <div>
                    <p class="text-white font-medium text-sm">{{ Auth::user()->name }}</p>
                    <p class="text-indigo-300 text-xs">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-indigo-100 hover:bg-indigo-700">
                <i class="fa-solid fa-user-pen w-5"></i> Mon profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-indigo-100 hover:bg-indigo-700">
                    <i class="fa-solid fa-right-from-bracket w-5"></i> Se déconnecter
                </button>
            </form>
        </div>
    </div>
</nav>