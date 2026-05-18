<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès non autorisé - Gestion RH</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="max-w-md mx-auto text-center px-6">

        {{-- Icône --}}
        <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fa-solid fa-lock text-red-500 text-4xl"></i>
        </div>

        {{-- Code erreur --}}
        <h1 class="text-8xl font-bold text-red-500 mb-2">403</h1>

        {{-- Message --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-3">
            Accès non autorisé
        </h2>
        <p class="text-gray-500 mb-8">
            Vous n'avez pas les permissions nécessaires pour accéder à cette page.
            Contactez votre administrateur si vous pensez que c'est une erreur.
        </p>

        {{-- Infos rôle --}}
        @auth
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 mb-6 text-left">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-circle-user text-indigo-600"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">
                        Rôle :
                        <span class="font-semibold
                            @if(Auth::user()->role === 'admin') text-indigo-600
                            @elseif(Auth::user()->role === 'rh') text-green-600
                            @else text-orange-600
                            @endif">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endauth

        {{-- Boutons --}}
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ url()->previous() }}"
               class="flex items-center justify-center gap-2 bg-gray-200 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-300 transition font-medium">
                <i class="fa-solid fa-arrow-left"></i>
                Retour
            </a>
            @auth
            <a href="{{ route('dashboard') }}"
               class="flex items-center justify-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition font-medium">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}"
               class="flex items-center justify-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition font-medium">
                <i class="fa-solid fa-right-to-bracket"></i>
                Se connecter
            </a>
            @endauth
        </div>

    </div>

</body>
</html>