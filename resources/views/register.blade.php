<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        customGray: "#141414", // Ciemny szary
                        customDarkGray: "#2D2D2D", // Ciemniejszy szary
                        customYellow: "#FFD700", // Żółty
                    },
                },
            },
        };
    </script>
    <title>Rejestracja</title>
</head>
<body class="bg-customGray flex items-center justify-center h-screen">
    <div class="container bg-customDarkGray text-gray-300 p-6 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center text-customYellow">Rejestracja</h1>

        @if (session('success'))
            <p class="text-green-500 text-center mb-4">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <ul class="text-red-500 mb-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name" class="block mb-2">Imię:</label>
            <input type="text" name="name" id="name" required class="border border-gray-600 rounded-lg p-2 mb-4 w-full bg-customGray text-gray-300 focus:outline-none focus:ring focus:ring-laravel">

            <label for="password" class="block mb-2">Hasło:</label>
            <input type="password" name="password" id="password" required class="border border-gray-600 rounded-lg p-2 mb-4 w-full bg-customGray text-gray-300 focus:outline-none focus:ring focus:ring-laravel">

            <label for="password_confirmation" class="block mb-2">Potwierdź hasło:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="border border-gray-600 rounded-lg p-2 mb-4 w-full bg-customGray text-gray-300 focus:outline-none focus:ring focus:ring-laravel">
            
            <label for="admin_code" class="block mb-2">Kod dostępu admina:</label>
            <input type="password" name="admin_code" id="admin_code" required class="border border-gray-600 rounded-lg p-2 mb-4 w-full bg-customGray text-gray-300 focus:outline-none focus:ring focus:ring-laravel">
            
            <button type="submit" class="w-full bg-customYellow text-black rounded-lg p-2 hover:bg-yellow-400 transition duration-200">Zarejestruj się</button>
        </form>
    </div>
</body>
</html>
