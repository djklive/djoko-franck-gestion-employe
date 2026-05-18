<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-id-card me-2 text-indigo-600"></i>
            Mon Profil
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100 text-center">
                <i class="fa-solid fa-user-xmark text-gray-300 text-6xl mb-4"></i>
                <h3 class="text-xl font-bold text-gray-700 mb-2">
                    Aucun profil employé trouvé
                </h3>
                <p class="text-gray-500 text-sm">
                    Votre compte n'est pas encore lié à un profil employé.
                    Contactez votre administrateur RH.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>