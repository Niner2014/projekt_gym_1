@extends('układ')

@section('content')
@include('partials._hero')

<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-bold text-center text-yellow-500 mb-6">Stan magazynowy produktów</h1>

   
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('magazyn.update') }}" method="POST">
        @csrf
        @method('PUT')   

        <div class="overflow-x-auto bg-gray-800 rounded-lg shadow-md">
            <table class="min-w-full table-auto text-white">
                <thead>
                    <tr>
                        <th class="py-2 px-2 border-b">Produkt</th>
                        <th class="py-2 px-2 border-b">Ilość w magazynie</th>
                        <th class="py-2 px-2 border-b">Cena</th>
                        <th class="py-2 px-4 border-b">Stan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produkty as $produkt)
                    <tr>
                        <td class="py-2 px-4 border-b">
                            <img src="{{ asset($produkt->zdjecie ? 'storage/' . $produkt->zdjecie : 'storage/produkty/brak.jpg') }}" 
                            alt="{{ $produkt->name }}" 
                            class="w-16 h-16 object-cover rounded-md"
                            class="py-2 px-4 border-b">{{ $produkt->name }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            <input type="number" name="products[{{ $produkt->id }}][stock]" class="bg-gray-700 text-white w-20 text-center rounded-md border border-gray-600" value="{{ $produkt->stock }}" min="0">
                        </td>
                        <td class="py-2 px-4 border-b">{{ $produkt->price }} PLN</td>
                        <td class="py-2 px-4 border-b">
                            @if ($produkt->stock > 0)
                                <span class="text-green-400">Dostępny</span>
                            @else
                                <span class="text-red-400">Brak w magazynie</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-6 rounded-md">
                    Zapisz zmiany
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
