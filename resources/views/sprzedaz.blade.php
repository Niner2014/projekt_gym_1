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
                    <option value="product1">Białko Whey</option>
                    <option value="product2">Kreatyna Monohydrat</option>
                    <option value="product3">BCAA</option>
                    <option value="product4">Odzież Sportowa</option>
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
            <li>Białko Whey - 199,99 PLN</li>
            <li>Kreatyna Monohydrat - 129,99 PLN</li>
            <li>BCAA - 89,99 PLN</li>
            <li>Odzież Sportowa - 79,99 PLN</li>
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
    // Produkty z cenami na sztywno
    const produkty = {
        product1: { name: "Białko Whey", cena: 199.99 },
        product2: { name: "Kreatyna Monohydrat", cena: 129.99 },
        product3: { name: "BCAA", cena: 89.99 },
        product4: { name: "Odzież Sportowa", cena: 79.99 }
    };

    // Koszyk na produkty
    let koszyk = [];

    // Funkcja dodawania produktów do koszyka
    document.getElementById('dodaj').addEventListener('click', function() {
        const produktId = document.getElementById('produkt').value;
        const ilosc = document.getElementById('ilosc').value;
        const cenaJednostkowa = produkty[produktId].cena;
        const cenaCalosci = cenaJednostkowa * ilosc;

        // Dodanie przedmiotu do koszyka
        koszyk.push({ produktId, ilosc, cenaCalosci });

        // Dodanie przedmiotu do listy na stronie
        const li = document.createElement('li');
        li.textContent = `${produkty[produktId].name} - ${ilosc} szt. - ${cenaCalosci.toFixed(2)} PLN`;
        document.getElementById('koszyk').appendChild(li);

        // Aktualizacja całkowitej ceny koszyka
        const cenaKoszyka = koszyk.reduce((sum, item) => sum + item.cenaCalosci, 0);
        document.getElementById('cena_koszyka').textContent = `${cenaKoszyka.toFixed(2)} PLN`;
    });

    // Funkcja do realizacji sprzedaży (na razie na sztywno)
    document.getElementById('sprzedaz').addEventListener('click', function() {
        if (koszyk.length === 0) {
            alert('Koszyk jest pusty! Dodaj produkty do koszyka.');
            return;
        }

        // Podsumowanie sprzedaży
        let podsumowanie = "Sprzedano:\n";
        koszyk.forEach(item => {
            podsumowanie += `${produkty[item.produktId].name} - ${item.ilosc} szt. - ${item.cenaCalosci.toFixed(2)} PLN\n`;
        });

        const cenaKoszyka = koszyk.reduce((sum, item) => sum + item.cenaCalosci, 0);
        podsumowanie += `\nCałkowita cena: ${cenaKoszyka.toFixed(2)} PLN`;

        alert(podsumowanie);

        // Wyczyszczenie koszyka
        koszyk = [];
        document.getElementById('koszyk').innerHTML = '';
        document.getElementById('cena_koszyka').textContent = '0,00 PLN';
    });
</script>

@endsection
