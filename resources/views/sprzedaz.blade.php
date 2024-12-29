@extends('układ')

@section('content')
@include('partials._hero')

<div class="container mx-auto my-8 px-4 flex space-x-8">
    <!-- Główna sekcja kalkulatora sprzedaży -->
    <div class="w-2/3 bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-yellow-500 mb-6">Kalkulator sprzedaży</h1>
    
        <form action="#" method="POST" class="space-y-6">
            <!-- Wybór produktu -->
            <div>
                <label for="produkt" class="text-white text-xl">Wybierz produkt:</label>
                <select id="produkt" class="bg-gray-700 text-white w-full py-2 px-4 rounded-md border border-gray-600">
                    @foreach ($produkty as $produkt)
                        <option value="product{{ $produkt->id }}" 
                            @if ($produkt->stock == 0) 
                                disabled 
                                class="text-red-500" 
                            @endif>
                            {{ $produkt->name }} - {{ number_format($produkt->price, 2) }} PLN 
                            @if ($produkt->stock == 0)
                                (Niedostępny)
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
    
            <!-- Wprowadzenie ilości -->
            <div>
                <label for="ilosc" class="text-white text-xl">Ilość:</label>
                <input type="number" id="ilosc" class="bg-gray-700 text-white w-full py-2 px-4 rounded-md border border-gray-600" value="1" min="1">
            </div>
    
            <!-- Przycisk do dodania przedmiotu do koszyka -->
            <div class="flex justify-end">
                <button type="button" id="dodaj" class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-6 rounded-md">Dodaj do koszyka</button>
            </div>
        </form>
    </div>
    
    <!-- Boczne wyświetlanie dostępnych przedmiotów -->
    <div class="w-1/3 bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl text-white mb-4">Dostępne produkty</h2>
        <ul class="space-y-4 text-white">
            @foreach ($produkty as $produkt)
            <li class="{{ $produkt->stock == 0 ? 'text-red-500' : 'text-white' }}">
                {{ $produkt->name }} - {{ number_format($produkt->price, 2) }} PLN
                @if ($produkt->stock == 0)
                    <span class="text-red-500 ml-2">(Niedostępny)</span>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Podsumowanie koszyka -->
<div class="container mx-auto my-8 px-4 bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl text-white mb-4">Twój koszyk</h2>
    <ul id="koszyk" class="space-y-4 text-white">
        <!-- Produkty dodane do koszyka pojawią się tutaj -->
    </ul>

    <!-- Podsumowanie -->
    <div class="mt-4 text-white">
        <p class="text-xl">Całkowita cena: <span id="cena_koszyka">0,00 PLN</span></p>
        <button id="sprzedaz" class="bg-green-500 hover:bg-green-400 text-white py-2 px-6 rounded-md mt-4">Dokonaj sprzedaży</button>
    </div>
</div>


<script>
    const produkty = @json($produkty);
    let koszyk = [];

    // Dodawanie produktów do koszyka
    document.getElementById('dodaj').addEventListener('click', () => {
        const produktId = document.getElementById('produkt').value;
        const ilosc = parseInt(document.getElementById('ilosc').value, 10);
        const wybranyProdukt = produkty.find(produkt => 'product' + produkt.id === produktId);

        if (!wybranyProdukt) {
            alert("Wybrany produkt nie istnieje.");
            return;
        }

        const iloscWKoszyku = koszyk
            .filter(item => item.produktId === produktId)
            .reduce((sum, item) => sum + item.ilosc, 0);

        if (ilosc + iloscWKoszyku > wybranyProdukt.stock) {
            alert(`Nie możesz dodać więcej niż ${wybranyProdukt.stock} sztuk produktu "${wybranyProdukt.name}" Brak więcej produktu na stanie.`);
            return;
        }

        const istniejącyProdukt = koszyk.find(item => item.produktId === produktId);
        if (istniejącyProdukt) {
            istniejącyProdukt.ilosc += ilosc;
            istniejącyProdukt.cenaCalosci = istniejącyProdukt.ilosc * wybranyProdukt.price;

            const li = document.querySelector(`#koszyk li[data-produkt-id="${produktId}"]`);
            li.textContent = `${wybranyProdukt.name} - ${istniejącyProdukt.ilosc} szt. - ${istniejącyProdukt.cenaCalosci.toFixed(2)} PLN`;
        } else {
            const cenaCalosci = wybranyProdukt.price * ilosc;
            koszyk.push({ produktId, ilosc, cenaCalosci });

            const li = document.createElement('li');
            li.setAttribute('data-produkt-id', produktId);
            li.textContent = `${wybranyProdukt.name} - ${ilosc} szt. - ${cenaCalosci.toFixed(2)} PLN`;
            document.getElementById('koszyk').appendChild(li);
        }

        const cenaKoszyka = koszyk.reduce((sum, item) => sum + item.cenaCalosci, 0);
        document.getElementById('cena_koszyka').textContent = `${cenaKoszyka.toFixed(2)} PLN`;
    });

    // Sprzedaż
    document.getElementById('sprzedaz').addEventListener('click', async () => {
        if (koszyk.length === 0) {
            alert('Koszyk jest pusty!');
            return;
        }

        try {
            const response = await fetch('{{ route("sprzedaz.zapisz") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ koszyk })
            });

            const result = await response.json();
            if (response.ok) {
                alert('Sprzedano. Zapisano zmiany!');
                koszyk = [];
                document.getElementById('koszyk').innerHTML = '';
                document.getElementById('cena_koszyka').textContent = '0,00 PLN';
                location.reload();
            } else {
                alert(result.message || 'Wystąpił problem!');
            }
        } catch (error) {
            console.error(error);
            alert('Błąd podczas realizacji sprzedaży.');
        }
    });

    // Generowanie rejestru dobowego (na razie sztywno)
    document.getElementById('generuj-rejestr').addEventListener('click', () => {
        alert('Rejestr dobowy został wygenerowany!');
    });
</script>
<div class="container mx-auto my-8 px-4">
    <div class="flex justify-center">
        <button id="generujRejestr" class="bg-red-500 hover:bg-red-400 text-white py-2 px-6 rounded-md mt-4">
            Generuj rejestr dobowy
        </button>
    </div>
</div>

<script>
    // Po kliknięciu na przycisk generujemy rejestr
    document.getElementById('generujRejestr').addEventListener('click', function() {
        // Używamy AJAX do wysłania żądania do kontrolera
        fetch('/rejestr/pdf', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.blob())  // Odbieramy PDF w formie blob
        .then(blob => {
            // Tworzymy link do pobrania PDF
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'rejestr_dobowy.pdf';  // Nazwa pliku do pobrania
            link.click();  // Uruchamiamy pobieranie
        })
        .catch(error => {
            console.error('Błąd przy generowaniu rejestru:', error);
        });
    });
</script>

@endsection
