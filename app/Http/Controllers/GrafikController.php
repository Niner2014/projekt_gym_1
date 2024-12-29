<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class GrafikController extends Controller
{
    // Wyświetlenie strony z grafikem
    public function index()
    {
        // Pobranie grafików z bazy, posortowanych po dniu
        $grafiki = Schedule::orderBy('day', 'asc')->get(); // Pobieramy wszystkie rekordy posortowane rosnąco po dniu

        return view('grafik', compact('grafiki')); // Widok grafik.blade.php
    }

    // Zapisanie danych
    public function zapisz(Request $request)
    {
        // Walidacja kodu admina
        $request->validate([
            'admin_code' => 'required|string',
        ]);

        // Sprawdzenie poprawności kodu admina
        if ($request->admin_code !== 'Admin218') {
            return redirect()->back()->withErrors(['admin_code' => 'Niepoprawny kod admina.']);
        }

        // Walidacja danych przed zapisem (ogólne dla wszystkich dni)
        for ($i = 1; $i <= 31; $i++) {
            $request->validate([
                "day_{$i}_desc1" => 'nullable|string|max:255',
                "day_{$i}_desc2" => 'nullable|string|max:255',
                "day_{$i}_desc3" => 'nullable|string|max:255',
            ]);
        }

        // Iteracja po dniach i zapis do bazy
        for ($i = 1; $i <= 31; $i++) {
            // Sprawdzamy, czy rekord o danym dniu już istnieje
            $grafik = Schedule::where('day', $i)->first();

            if ($grafik) {
                // Jeśli rekord istnieje, zaktualizuj dane
                $grafik->update([
                    'desc1' => $request->input("day_{$i}_desc1")?: null,
                    'desc2' => $request->input("day_{$i}_desc2")?: null,
                    'desc3' => $request->input("day_{$i}_desc3")?: null,
                ]);
            }
        }

        return redirect()->route('grafik')->with('status', 'Zmiany zostały zapisane!');
    }
}
