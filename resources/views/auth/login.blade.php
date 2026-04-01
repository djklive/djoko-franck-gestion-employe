<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-3">
            <span class="text-white font-bold text-lg">GRH</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Connexion</h1>
        <p class="text-gray-500 text-sm mt-1">Accédez à votre espace RH</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" value="Adresse email" />
            <div class="relative mt-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <i class="fa-solid fa-envelope text-sm"></i>
                </span>
                <x-text-input id="email" class="block w-full pl-9" type="email"
                    name="email" :value="old('email')" required autofocus
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

        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                <input type="checkbox" name="remember"
                       class="rounded border-gray-300 text-indigo-600">
                Se souvenir de moi
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-indigo-600 hover:underline">
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 text-white py-4 rounded-lg font-semibold hover:bg-indigo-700 transition flex items-center justify-center gap-2">
            <i class="fa-solid fa-right-to-bracket"></i>
            Se connecter
        </button>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-500 mt-4">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:underline">
                    S'inscrire
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>