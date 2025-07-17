<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Status;

class GetstartedController extends Controller
{
    public function create(){
        $projets = Projet::orderByDesc('created_at')->get();
        $statuses = Status::orderBy('label')->get();
        return view ('app.Getstarted', compact('projets', 'statuses'));
    }
   public function store(Request $request)
{
    $validated = $request->validate([
        'tel' => 'nullable|string|max:255',
        'gsm' => 'required|string|max:255',
        'cin' => 'nullable|string|max:255',
        'cin_address' => 'nullable|string|max:255', 
        'cin_validity' => 'nullable|date',          
        'birth_city' => 'nullable|string|max:255',
        'nationality' => 'nullable|string|max:255',
        'birth_date' => 'nullable|date',            
        'logement' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:500',     
    ]);
    


    return response()->json([
                'message' => 'Rôle mis à jour avec succès.',
                "redirect" => route('dashboard')
            ]);

    //return redirect()->route('dashboard')->with('success', 'Votre demande a été enregistrée avec succès.');
}

  
}
