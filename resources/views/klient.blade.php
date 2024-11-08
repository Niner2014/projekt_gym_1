@extends('układ')

@section('content')

<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded shadow-md" style="background-color: #55524a; border-color: #a1a1a1;">
        <div class="flex flex-col items-center justify-center text-center mb-6">
            <img src="{{ asset($klient->profilowe ? 'storage/' . $klient->profilowe : 'storage/profile/brak.jpg') }}" 
            alt="Zdjęcie {{ $klient->imie }} {{ $klient->nazwisko }}" 
            class="w-80 h-80 object-cover rounded-lg border-4 border-[#FFD700] shadow-lg">
       

            <h3 class="text-2xl font-bold mb-2 text-yellow-500">{{ $klient->imie }} {{ $klient->nazwisko }}</h3>
            <p class="text-lg text-gray-200">{{ $klient->email }}</p>
            <p class="text-sm text-gray-400">{{ $klient->telefon ?? 'Brak telefonu' }}</p>
        </div>

        <div class="border-t border-gray-200 py-4">
            <h4 class="text-xl font-semibold mb-2 text-yellow-500">Szczegóły klienta</h4>
            <ul class="space-y-2 text-gray-200">
                <li><strong>Wiek:</strong> {{ $klient->wiek ?? 'Brak informacji' }} lat</li>
                <li><strong>Waga:</strong> {{ $klient->waga ?? 'Brak informacji' }} kg</li>
                <li><strong>Wzrost:</strong> {{ $klient->wzrost ?? 'Brak informacji' }} cm</li>
                <li><strong>Płeć:</strong> {{ ucfirst($klient->plec) ?? 'Brak informacji' }}</li>
                <li><strong>Data zapisana:</strong> {{ $klient->data_zapisania->format('d-m-Y') ?? 'Brak daty' }}</li>
            </ul>
        </div>

        <div class="border-t border-gray-200 py-4">
            <h4 class="text-xl font-semibold mb-2 text-yellow-500">Notatki</h4>
            <p class="text-gray-200">{{ $klient->notatki ?? 'Brak notatek' }}</p>
        </div>

        <!-- Formularz do aktualizacji notatek -->
        <form action="{{ route('klient.updateNotatki', $klient->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="notatki" class="block text-lg font-medium text-yellow-500">Notatki</label>
                <textarea name="notatki" id="notatki" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md" required>{{ old('notatki', $klient->notatki) }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Zaktualizuj notatki</button>
        </form>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Sukces!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
    </div>
</div>

@endsection
