<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'historique
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

                <form action="{{ route('position-histories.update', $positionHistory) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Employé *</label>
                        <select name="employee_id"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">-- Choisir un employé --</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ old('employee_id', $positionHistory->employee_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Poste *</label>
                        <select name="position_id"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">-- Choisir un poste --</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}"
                                    {{ old('position_id', $positionHistory->position_id) == $position->id ? 'selected' : '' }}>
                                    {{ $position->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Date début *</label>
                            <input type="date" name="start_date"
                                   value="{{ old('start_date', $positionHistory->start_date) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Date fin</label>
                            <input type="date" name="end_date"
                                   value="{{ old('end_date', $positionHistory->end_date) }}"
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Raison</label>
                        <input type="text" name="reason"
                               value="{{ old('reason', $positionHistory->reason) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                            Mettre à jour
                        </button>
                        <a href="{{ route('position-histories.index') }}"
                           class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>