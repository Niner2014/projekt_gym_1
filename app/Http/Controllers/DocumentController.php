<?php 

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        // Pobranie wszystkich dokumentów z bazy danych
        $documents = Document::all();

        // Przekazanie dokumentów do widoku
        return view('rejestr', ['documents' => $documents]);
    }
}