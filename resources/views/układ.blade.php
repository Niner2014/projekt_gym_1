<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href="{{ route('sprzedaz') }}" class="text-accentYellow hover:text-white">
                    Sprzedaż
                </a>
            </li>
            <li>
                <a href="{{ route('magazyn') }}" class="text-accentYellow hover:text-white">
                    Magazyn
                </a>
            </li>
            <li>
                <div class="relative">
                    <a href="#" class="text-accentYellow hover:text-white" id="menu-toggle">Linki Wspomagające</a>
                    <!-- Rozwijane menu -->
                    <div class="absolute left-0 hidden bg-gray-700 text-white p-0 rounded shadow-lg mt-2 w-48"
                        id="dropdown-menu">
                        <a href="https://www.google.com" class="block py-1 hover:bg-gray-600 px-2" target="_blank"
                            rel="noopener noreferrer">Google</a>
                        <a href="https://www.youtube.com" class="block py-1 hover:bg-gray-600 px-2" target="_blank"
                            rel="noopener noreferrer">YouTube</a>
                        <a href="https://www.example.com" class="block py-1 hover:bg-gray-600 px-2" target="_blank"
                            rel="noopener noreferrer">Example</a>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('forum') }}" class="text-accentYellow hover:text-white">
                    Forum
                </a>
            </li>
            <li>
                <a href="{{ route('regulamin') }}" class="text-accentYellow hover:text-white">
                    Regulamin
                </a>
            </li>
        </li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
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

    <script>
        // Zmienna do przechowywania referencji do menu
        const menu = document.getElementById('dropdown-menu');
        const menuToggle = document.getElementById('menu-toggle');

        // Funkcja do wyświetlania menu
        function toggleMenu() {
            menu.classList.toggle('hidden');
        }

        // Funkcja do ukrywania menu, jeśli klikniemy poza nie
        function closeMenuIfClickedOutside(event) {
            if (!menu.contains(event.target) && !menuToggle.contains(event.target)) {
                menu.classList.add('hidden');
            }
        }

        // Dodajemy nasłuchiwanie na kliknięcie
        menuToggle.addEventListener('click', function(event) {
            event.stopPropagation(); // Zapobiegamy propagacji kliknięcia, aby nie zamknęło menu od razu
            toggleMenu(); // Zmień stan widoczności menu
        });

        // Nasłuchiwanie kliknięć w innych częściach strony, aby zamknąć menu, jeśli klikniemy poza nim
        document.addEventListener('click', closeMenuIfClickedOutside);
    </script>
</body>

</html>
