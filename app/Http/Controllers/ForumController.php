<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    // Wyświetlanie wiadomości
    public function index()
    {
        // Wczytanie wiadomości z pliku
        $messages = $this->getMessagesFromFile();
        
        // Ograniczenie liczby wiadomości do 25 i odwrócenie kolejności
        $messages = array_slice($messages, 0, 25);
        $messages = array_reverse($messages);
    
        return view('forum', compact('messages'));
    }
    

    // Zapisanie nowej wiadomości do pliku
    public function store(Request $request)
    {
        // Walidacja wiadomości
        $request->validate([
            'message' => 'required|string',
        ]);

        // Pobieranie nazwy użytkownika z aktualnie zalogowanego użytkownika
        $userName = Auth::check() ? Auth::user()->name : 'Anonymous'; // Jeżeli użytkownik jest zalogowany, użyj jego nazwy, w przeciwnym razie 'Anonymous'

        // Przygotowanie wiadomości do zapisania
        $messageData = [
            'user_name' => $userName,
            'message' => $request->message,
            'created_at' => now()->format('d.m.Y H:i'),
        ];

        // Zapisanie wiadomości w pliku
        $this->saveMessageToFile($messageData);

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('forum')->with('success', 'Wiadomość została dodana!');
    }

    // Funkcja do pobierania wiadomości z pliku
    private function getMessagesFromFile()
{
    $filePath = storage_path('app/messages.txt');
    $messages = [];

    if (file_exists($filePath)) {
        $fileContents = file_get_contents($filePath);
        $rawMessages = explode("\n\n", $fileContents);

        foreach ($rawMessages as $rawMessage) {
            $messageParts = explode("\n", $rawMessage);
            if (count($messageParts) > 2) {
                $messages[] = [
                    'user_name' => trim(str_replace('Użytkownik:', '', $messageParts[0])),
                    'message' => trim(str_replace('Wiadomość:', '', $messageParts[1])),
                    'created_at' => trim(str_replace('Data:', '', $messageParts[2])),
                ];
            }
        }
    }

    return $messages;
}


    // Funkcja do zapisywania wiadomości w pliku
    private function saveMessageToFile($messageData)
    {
        $filePath = storage_path('app/messages.txt');

        $message = "Użytkownik: {$messageData['user_name']}\nWiadomość: {$messageData['message']}\nData: {$messageData['created_at']}\n\n";

        // Zapisanie wiadomości do pliku
        file_put_contents($filePath, $message, FILE_APPEND);
    }
}
