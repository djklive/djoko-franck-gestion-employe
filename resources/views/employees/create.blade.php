<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nouvel employé
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if($errors->any())
                    <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Prénom *</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                   placeholder="Ex: Jean">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nom *</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                   placeholder="Ex: Dupont">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                               placeholder="Ex: jean.dupont@entreprise.com">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Téléphone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                               placeholder="Ex: +237 6XX XXX XXX">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Date d'embauche *</label>
                        <input type="date" name="hire_date" value="{{ old('hire_date') }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Département *</label>
                        <select name="department_id"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">-- Choisir un département --</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Poste *</label>
                        <select name="position_id"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">-- Choisir un poste --</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}"
                                    {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                    {{ $position->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700">
                            Enregistrer
                        </button>
                        <a href="{{ route('employees.index') }}"
                           class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>