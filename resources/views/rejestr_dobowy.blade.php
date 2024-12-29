<!DOCTYPE html>
<html>
<head>
    <title>Rejestr Dobowy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Rejestr Dobowy</h1>
    <p>Data: {{ now()->toDateString() }}</p>

    @if ($produkty->isEmpty())
        <p><strong>Brak danych o sprzedazy dla tego dnia.</strong></p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Opis Transakcji</th>
                    <th>Wartosc Transakcji (PLN)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produkty as $produkt)
                    <tr>
                        <td>{{ $produkt['description'] }}</td>
                        <td>{{ number_format($produkt['total_price'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Laczna wartosc transakcji: {{ number_format($sumaZmian, 2) }} PLN</h2>
    @endif
</body>
</html>
