<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion RH - Entreprise</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    {{-- Navbar --}}
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div style="width:40px;height:40px;background:#4F46E5;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                    <span style="color:white;font-weight:bold;font-size:13px;">GRH</span>
                </div>
                <span class="text-xl font-bold text-gray-800">Gestion RH</span>
            </div>
            <div class="flex gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-gray-600 px-5 py-2 rounded-lg text-center hover:bg-gray-100 transition">
                        Se connecter
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 text-white px-5 py-2 rounded-lg text-center hover:bg-indigo-700 transition">
                        S'inscrire
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="bg-indigo-600 text-white py-24">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <div style="width:80px;height:80px;background:white;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
                <span style="color:#4F46E5;font-weight:bold;font-size:22px;">GRH</span>
            </div>
            <h1 class="text-5xl font-bold mb-6">
                Gestion des Employés d'Entreprise
            </h1>
            <p class="text-xl text-indigo-100 mb-10 max-w-2xl mx-auto">
                Un outil RH moderne pour gérer vos employés, départements,
                postes et l'historique des changements en toute simplicité.
            </p>
            @auth
                <a href="{{ route('dashboard') }}"
                   class="bg-white text-indigo-600 font-bold px-8 py-4 rounded-lg hover:bg-indigo-50 transition text-lg">
                    Accéder au Dashboard →
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="bg-white text-indigo-600 font-bold px-8 py-4 rounded-lg hover:bg-indigo-50 transition text-lg">
                    Commencer maintenant →
                </a>
            @endauth
        </div>
    </section>

    {{-- Fonctionnalités --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                Tout ce dont vous avez besoin
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                    <i class="fa-solid fa-building"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Départements</h3>
                    <p class="text-gray-500 text-sm">
                        Organisez votre entreprise en départements clairs et structurés.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                    <i class="fa-solid fa-briefcase"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Postes</h3>
                    <p class="text-gray-500 text-sm">
                        Définissez et gérez tous les postes disponibles dans votre entreprise.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                    <i class="fa-solid fa-users"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Employés</h3>
                    <p class="text-gray-500 text-sm">
                        Gérez les informations de vos employés avec recherche et filtres avancés.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Historique</h3>
                    <p class="text-gray-500 text-sm">
                        Suivez l'évolution de carrière de chaque employé avec l'historique des postes.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-white border-t py-8">
        <div class="max-w-7xl mx-auto px-6 text-center text-gray-500 text-sm">
            © {{ date('Y') }} Gestion RH — Développé avec Laravel {{ app()->version() }}
        </div>
    </footer>

</body>
</html>