<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primaryBg: "#363434", /* Ciemne tło */
                        primaryText: "#f1f1f1", /* Jasny tekst */
                        accentYellow: "#FFD700", /* Żółte akcenty */
                    },
                },
            },
        };
    </script>
    <title>Projekt Baza Danych</title>
</head>
<body class="bg-primaryBg text-primaryText mb-48">
    <nav class="flex justify-between items-center p-6 bg-[#1f1f1f] shadow-lg mb-4">
        <a href="/">
            <img class="w-24 h-24 rounded-full object-cover" src="{{ asset('images/logo.png') }}" alt="Logo" />
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="{{ route('dodajklient') }}" class="text-accentYellow hover:text-white">
                    <i class="fa-solid fa-user-plus"></i> Dodaj Klienta
                </a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="text-accentYellow hover:text-white">
                    Rejestracja
                </a>
            </li>
            @guest
            <li>
                <a href="{{ route('login') }}" class="text-accentYellow hover:text-white">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                </a>
            </li>
            @endguest

            @auth
            <li>
                <span class="font-bold">Witaj, {{ auth()->user()->name }}</span>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-accentYellow hover:text-white">
                        <i class="fa-solid fa-door-open"></i> Wyloguj
                    </button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>
    <main class="p-8">
        @yield('content')
    </main>
</body>
</html>
