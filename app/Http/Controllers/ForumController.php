<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    
    public function index()
    {
        
        $messages = $this->getMessagesFromFile();
        
        
        $messages = array_slice($messages, 0, 25);
        $messages = array_reverse($messages);
    
        return view('forum', compact('messages'));
    }
    

    
    public function store(Request $request)
    {
        
        $request->validate([
            'message' => 'required|string',
        ]);

        
        $userName = Auth::check() ? Auth::user()->name : 'Anonymous'; 

        
        $messageData = [
            'user_name' => $userName,
            'message' => $request->message,
            'created_at' => now()->format('d.m.Y H:i'),
        ];

        
        $this->saveMessageToFile($messageData);

        
        return redirect()->route('forum')->with('success', 'Wiadomość została dodana!');
    }

    
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


    
    private function saveMessageToFile($messageData)
    {
        $filePath = storage_path('app/messages.txt');

        $message = "Użytkownik: {$messageData['user_name']}\nWiadomość: {$messageData['message']}\nData: {$messageData['created_at']}\n\n";

        
        file_put_contents($filePath, $message, FILE_APPEND);
    }
}
