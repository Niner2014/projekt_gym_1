@extends('układ')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 mt-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-[#1A1A1A]">Dodaj Klienta</h1>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('klient.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="profilowe" class="block text-sm font-medium text-[#1A1A1A]">Zdjęcie profilowe (opcjonalne)</label>
            <input type="file" id="profilowe" name="profilowe" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black" />
        </div>
        <div class="mb-4">
            <label for="imie" class="block text-sm font-medium text-[#1A1A1A]">Imię</label>
            <input type="text" id="imie" name="imie" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black" value="{{ old('imie') }}" />
        </div>
        <div class="mb-4">
            <label for="nazwisko" class="block text-sm font-medium text-[#1A1A1A]">Nazwisko</label>
            <input type="text" id="nazwisko" name="nazwisko" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black" value="{{ old('nazwisko') }}" />
        </div>
        <div class="mb-4">
            <label for="plec" class="block text-sm font-medium text-[#1A1A1A]">Płeć</label>
            <select id="plec" name="plec" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black">
                <option value="">Wybierz płeć</option>
                <option value="M" {{ old('plec') == 'M' ? 'selected' : '' }}>Mężczyzna</option>
                <option value="K" {{ old('plec') == 'K' ? 'selected' : '' }}>Kobieta</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-[#1A1A1A]">Email</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black" value="{{ old('email') }}" />
        </div>
        <div class="mb-4">
            <label for="telefon" class="block text-sm font-medium text-[#1A1A1A]">Telefon</label>
            <input type="text" id="telefon" name="telefon" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black" value="{{ old('telefon') }}" />
        </div>
        <div class="mb-4">
            <label for="wiek" class="block text-sm font-medium text-[#1A1A1A]">Wiek</label>
            <input type="number" id="wiek" name="wiek" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black" value="{{ old('wiek') }}" />
        </div>
        <div class="mb-4">
            <label for="waga" class="block text-sm font-medium text-[#1A1A1A]">Waga</label>
            <input type="number" id="waga" name="waga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black" value="{{ old('waga') }}" />
        </div>
        <div class="mb-4">
            <label for="wzrost" class="block text-sm font-medium text-[#1A1A1A]">Wzrost</label>
            <input type="number" id="wzrost" name="wzrost" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black" value="{{ old('wzrost') }}" />
        </div>
        <div class="mb-4">
            <label for="notatki" class="block text-sm font-medium text-[#1A1A1A]">Notatki</label>
            <textarea id="notatki" name="notatki" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#FFD700] focus:border-[#FFD700] text-black">{{ old('notatki') }}</textarea>
        </div>
        <button type="submit" class="bg-[#FFD700] text-black py-2 px-4 rounded-md hover:bg-[#FFC700]">Dodaj Klienta</button>
    </form>
</div>
@endsection