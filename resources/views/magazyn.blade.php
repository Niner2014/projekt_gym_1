@extends('układ')

@section('content')
@include('partials._hero')

<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-bold text-center text-yellow-500 mb-6">Stan magazynowy produktów</h1>

    <div class="overflow-x-auto bg-gray-800 rounded-lg shadow-md">
        <table class="min-w-full table-auto text-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Produkt</th>
                    <th class="py-2 px-4 border-b">Opis</th>
                    <th class="py-2 px-4 border-b">Ilość w magazynie</th>
                    <th class="py-2 px-4 border-b">Cena</th>
                    <th class="py-2 px-4 border-b">Stan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Produkt 1 -->
                <tr>
                    <td class="py-2 px-4 border-b">
                        <img src="{{ asset('images/product1.jpg') }}" alt="Białko Whey" class="w-16 h-16 object-cover rounded-md">
                    </td>
                    <td class="py-2 px-4 border-b">Wysokobiałkowy suplement diety, idealny dla sportowców.</td>
                    <td class="py-2 px-4 border-b">
                        <input type="number" class="bg-gray-700 text-white w-20 text-center rounded-md border border-gray-600" value="10" min="0">
                    </td>
                    <td class="py-2 px-4 border-b">199,99 PLN</td>
                    <td class="py-2 px-4 border-b text-green-400">Dostępny</td>
                </tr>
                <!-- Produkt 2 -->
                <tr>
                    <td class="py-2 px-4 border-b">
                        <img src="{{ asset('images/product2.jpg') }}" alt="Kreatyna Monohydrat" class="w-16 h-16 object-cover rounded-md">
                    </td>
                    <td class="py-2 px-4 border-b">Suplement wspomagający zwiększenie siły i masy mięśniowej.</td>
                    <td class="py-2 px-4 border-b">
                        <input type="number" class="bg-gray-700 text-white w-20 text-center rounded-md border border-gray-600" value="5" min="0">
                    </td>
                    <td class="py-2 px-4 border-b">129,99 PLN</td>
                    <td class="py-2 px-4 border-b text-red-400">Brak w magazynie</td>
                </tr>
                <!-- Produkt 3 -->
                <tr>
                    <td class="py-2 px-4 border-b">
                        <img src="{{ asset('images/product3.jpg') }}" alt="BCAA" class="w-16 h-16 object-cover rounded-md">
                    </td>
                    <td class="py-2 px-4 border-b">Aminokwasy rozgałęzione wspomagające regenerację mięśni.</td>
                    <td class="py-2 px-4 border-b">
                        <input type="number" class="bg-gray-700 text-white w-20 text-center rounded-md border border-gray-600" value="20" min="0">
                    </td>
                    <td class="py-2 px-4 border-b">89,99 PLN</td>
                    <td class="py-2 px-4 border-b text-green-400">Dostępny</td>
                </tr>
                <!-- Produkt 4 -->
                <tr>
                    <td class="py-2 px-4 border-b">
                        <img src="{{ asset('images/product4.jpg') }}" alt="Odzież Sportowa" class="w-16 h-16 object-cover rounded-md">
                    </td>
                    <td class="py-2 px-4 border-b">Komfortowa odzież do treningów na siłowni i w terenie.</td>
                    <td class="py-2 px-4 border-b">
                        <input type="number" class="bg-gray-700 text-white w-20 text-center rounded-md border border-gray-600" value="12" min="0">
                    </td>
                    <td class="py-2 px-4 border-b">79,99 PLN</td>
                    <td class="py-2 px-4 border-b text-green-400">Dostępny</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4 flex justify-end">
            <button class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-6 rounded-md">
                Zapisz zmiany
            </button>
        </div>
    </div>
</div>

@endsection
