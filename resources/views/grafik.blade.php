@extends('układ')

@section('content')
@include('partials._hero')

<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-bold text-center text-yellow-500 mb-6">Grafik Miesiąca</h1>

    <form method="POST" action="{{ route('grafik.zapisz') }}">
        @csrf
        <table class="min-w-full table-auto text-center">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Dzień</th>
                    <th class="border px-4 py-2">Zmiana poranna</th>
                    <th class="border px-4 py-2">Zmiana wieczorna</th>
                    <th class="border px-4 py-2">Zmiana dodatkowa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grafiki as $grafik)
                    <tr>
                        <td class="border px-4 py-2">{{ $grafik->day }}</td>
                        <td class="border px-4 py-2">
                            <input type="text" name="day_{{ $grafik->day }}_desc1" value="{{ $grafik->desc1 }}" class="border px-2 py-1 w-full text-black">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="text" name="day_{{ $grafik->day }}_desc2" value="{{ $grafik->desc2 }}" class="border px-2 py-1 w-full text-black">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="text" name="day_{{ $grafik->day }}_desc3" value="{{ $grafik->desc3 }}" class="border px-2 py-1 w-full text-black">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="mt-6 text-center">
            <label for="admin_code" class="block text-lg mb-2">Podaj kod admina:</label>
            <input type="password" name="admin_code" id="admin_code" class="border px-4 py-2 w-64 text-center mb-4" placeholder="Kod admina" required>

            <button type="submit" class="bg-accentYellow text-black px-4 py-2 rounded hover:bg-yellow-500">
                Zapisz zmiany
            </button>
        </div>
    </form>
</div>

@endsection
