<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class GrafikController extends Controller
{
    
    public function index()
    {
        
        $grafiki = Schedule::orderBy('day', 'asc')->get(); 

        return view('grafik', compact('grafiki')); 
    }

    
    public function zapisz(Request $request)
    {
        
        $request->validate([
            'admin_code' => 'required|string',
        ]);

        
        if ($request->admin_code !== 'Admin218') {
            return redirect()->back()->withErrors(['admin_code' => 'Niepoprawny kod admina.']);
        }

        
        for ($i = 1; $i <= 31; $i++) {
            $request->validate([
                "day_{$i}_desc1" => 'nullable|string|max:255',
                "day_{$i}_desc2" => 'nullable|string|max:255',
                "day_{$i}_desc3" => 'nullable|string|max:255',
            ]);
        }

        
        for ($i = 1; $i <= 31; $i++) {
            
            $grafik = Schedule::where('day', $i)->first();

            if ($grafik) {
                
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
