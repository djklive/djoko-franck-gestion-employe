<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-3">
            <span class="text-white font-bold text-lg">GRH</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Créer un compte</h1>
        <p class="text-gray-500 text-sm mt-1">Rejoignez votre espace RH</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="name" value="Nom complet" />
            <div class="relative mt-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <i class="fa-solid fa-user text-sm"></i>
                </span>
                <x-text-input id="name" class="block w-full pl-9" type="text"
                    name="name" :value="old('name')" required autofocus
                    placeholder="Jean Dupont" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="email" value="Adresse email" />
            <div class="relative mt-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <i class="fa-solid fa-envelope text-sm"></i>
                </span>
                <x-text-input id="email" class="block w-full pl-9" type="email"
                    name="email" :value="old('email')" required
                    placeholder="votre@email.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" value="Mot de passe" />
            <div class="relative mt-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <i class="fa-solid fa-lock text-sm"></i>
                </span>
                <x-text-input id="password" class="block w-full pl-9" type="password"
                    name="password" required placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-6">
            <x-input-label for="password_confirmation" value="Confirmer le mot de passe" />
            <div class="relative mt-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <i class="fa-solid fa-lock text-sm"></i>
                </span>
                <x-text-input id="password_confirmation" class="block w-full pl-9"
                    type="password" name="password_confirmation" required
                    placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 text-white py-4 rounded-lg font-semibold hover:bg-indigo-700 transition flex items-center justify-center gap-2">
            <i class="fa-solid fa-user-plus"></i>
            Créer mon compte
        </button>

        <p class="text-center text-sm text-gray-500 mt-4">
            Déjà un compte ?
            <a href="{{ route('login') }}" class="text-indigo-600 font-medium hover:underline">
                Se connecter
            </a>
        </p>
    </form>
</x-guest-layout>