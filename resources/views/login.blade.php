<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Logowanie</title>
</head>
<body class="bg-[#141414] flex justify-center items-center h-screen">
    <div class="bg-[#2D2D2D] p-8 rounded-lg shadow-md w-96"> 
        <h1 class="text-2xl font-bold mb-6 text-center text-yellow-500">Logowanie</h1> 
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-yellow-500">Imię:</label> 
                <input type="text" name="name" id="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-laravel">
            </div>
            <div>
                <label for="password" class="block text-yellow-500">Hasło:</label> 
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-laravel">
            </div>
            <button type="submit" class="w-full bg-yellow-500 text-white rounded-lg p-2 hover:bg-yellow-600 transition duration-200">Zaloguj się</button> 
            
            <p class="text-center text-white mt-4">
                Nie masz konta? 
                <a href="{{ route('register') }}" class="text-yellow-500 font-semibold hover:underline">Zarejestruj się</a> 
            </p>
        </form>
    </div>
</body>
</html>
