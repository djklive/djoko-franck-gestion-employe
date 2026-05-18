<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page introuvable - Gestion RH</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="max-w-md mx-auto text-center px-6">

        {{-- Icône --}}
        <div class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fa-solid fa-map-location-dot text-yellow-500 text-4xl"></i>
        </div>

        {{-- Code erreur --}}
        <h1 class="text-8xl font-bold text-yellow-500 mb-2">404</h1>

        {{-- Message --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-3">
            Page introuvable
        </h2>
        <p class="text-gray-500 mb-8">
            La page que vous recherchez n'existe pas ou a été déplacée.
            Vérifiez l'URL ou retournez au dashboard.
        </p>

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