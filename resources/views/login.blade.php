<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Logowanie</title>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center text-laravel">Logowanie</h1>
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-700">Imię:</label>
                <input type="text" name="name" id="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-laravel">
            </div>
            <div>
                <label for="password" class="block text-gray-700">Hasło:</label>
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-laravel">
            </div>
            <button type="submit" style="background-color: #ef3b2d; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Zaloguj się</button>
            
            <p class="text-center text-gray-600 mt-4">
                Nie masz konta? 
                <a href="{{ route('register') }}" class="text-laravel font-semibold hover:underline">Zarejestruj się</a>
            </p>
            
        </form>
    </div>
</body>
</html>
