@extends('układ')

@section('content')

<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded shadow-md" style="background-color: #55524a; border-color: #a1a1a1;">
        <div class="flex flex-col items-center justify-center text-center mb-6">
            <img src="{{ asset($klient->profilowe ? 'storage/' . $klient->profilowe : 'storage/profile/brak.jpg') }}" 
            alt="Zdjęcie {{ $klient->imie }} {{ $klient->nazwisko }}" 
            class="w-80 h-80 object-cover rounded-lg border-4 border-[#FFD700] shadow-lg">
        </div>

        <h3 class="text-2xl font-bold mb-2 text-yellow-500">{{ $klient->imie }} {{ $klient->nazwisko }}</h3>
        <p class="text-lg text-gray-200">{{ $klient->email }}</p>
        <p class="text-lm text-gray-400">
            {{ $klient->telefon ? implode('-', str_split($klient->telefon, 3)) : 'Brak telefonu' }}
        </p>
        

        <div class="border-t border-gray-200 py-4">
            <h4 class="text-xl font-semibold mb-2 text-yellow-500">Szczegóły klienta</h4>
            <ul class="space-y-2 text-gray-200">
                <li>
                    <strong>Data Urodzenia:</strong> 
                    {{ \Carbon\Carbon::parse($klient->data_urodzenia)->format('d.m.Y') ?? 'Brak informacji' }}
                    ({{ \Carbon\Carbon::parse($klient->data_urodzenia)->age }} lat)
                </li>
                <li><strong>Waga:</strong> {{ $klient->waga ?? 'Brak informacji' }} kg</li>
                <li><strong>Wzrost:</strong> {{ $klient->wzrost ?? 'Brak informacji' }} cm</li>
                <li><strong>Płeć:</strong> 
                    {{ $klient->plec === 'K' ? 'Kobieta' : ($klient->plec === 'M' ? 'Mężczyzna' : 'Brak informacji') }}
                </li>
                <li>
                    <strong>Data zapisana:</strong> 
                    {{ $klient->data_zapisania->format('d-m-Y') ?? 'Brak daty' }} 
                    | 
                    <strong>Status:</strong> 
                    <span class="{{ $klient->aktywny ? 'text-green-500' : 'text-red-500' }}">
                        {{ $klient->aktywny ? 'Aktywny' : 'Nieaktywny' }}
                    </span>
                    <li><strong>Notatki:</strong> {{ $klient->notatki ?? 'Brak informacji' }}</li>
                </li>
            </ul>
        </div>

        <!-- Przycisk do edytowania danych klienta -->
        <button id="editClientButton" class="mt-4 bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-400 focus:outline-none">
            Edytuj dane klienta
        </button>

        <!-- Formularz edycji danych klienta, początkowo ukryty -->
        <div id="editClientForm" class="hidden border-t border-gray-200 py-4 mt-4">
            <h4 class="text-xl font-semibold mb-2 text-yellow-500">Edytuj dane klienta</h4>
        
            <form action="{{ route('klient.updateClientData', $klient->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <label for="telefon" class="block text-gray-200">Numer telefonu:</label>
                <input type="text" name="telefon" value="{{ $klient->telefon }}" class="w-full p-2 mt-2 rounded-md border border-gray-300 bg-gray-800 text-white">
        
                <label for="waga" class="block text-gray-200 mt-4">Waga:</label>
                <input type="number" name="waga" value="{{ $klient->waga }}" class="w-full p-2 mt-2 rounded-md border border-gray-300 bg-gray-800 text-white">
        
                <label for="data_zapisania" class="block text-gray-200 mt-4">Data zapisu:</label>
                <input type="date" name="data_zapisania" value="{{ now()->format('Y-m-d') }}" class="w-full p-2 mt-2 rounded-md border border-gray-300 bg-gray-800 text-white">

                <label for="notatki" class="block text-gray-200 mt-4">Notatki:</label>
                <textarea name="notatki" class="w-full p-2 mt-2 rounded-md border border-gray-300 bg-gray-800 text-white">{{ $klient->notatki }}</textarea>
        
                <button type="submit" class="mt-4 bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-400 focus:outline-none">
                    Zaktualizuj
                </button>
            </form>
        </div>
        

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Sukces!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
    </div>
</div>

<script>
    // Funkcja, która pokazuje/ukrywa formularz po kliknięciu przycisku
    document.getElementById('editClientButton').addEventListener('click', function() {
        const form = document.getElementById('editClientForm');
        form.classList.toggle('hidden');
    });
</script>

@endsection
