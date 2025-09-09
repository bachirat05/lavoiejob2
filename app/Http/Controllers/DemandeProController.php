<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use App\Models\Status;
use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeProController extends Controller
{
    public function create(){
        $projets = Projet::orderByDesc('created_at')->get();
        $statuses = Status::orderBy('label')->get();
        return view ('app.demande_pro', compact('projets', 'statuses'));
    }
   public function store(Request $request)
{
    $validated = $request->validate([
       
        'nom_demande' => 'nullable|string|max:255',
        'abonnement' => 'required',
        'age_min' => 'nullable|numeric',
        'age_max' => 'nullable|numeric',
        'mode_emploi' => 'required',
        'criteres' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'nationality' => 'nullable|string|max:255',
        'date_debut' => 'nullable|date',            
        'lieu_travail' => 'nullable|string|max:255',
        'sexe_prefere' => 'required',
     	'religion'=> 'required|string|max:255',
     	'language'=> 'required|string|max:255',
     	'studies_level'=> 'nullable|string|max:255',
     	'studies_speciality'=> 'nullable|string|max:255',
        'marital'=> 'nullable|string|max:255',
        'kids'=> 'nullable|string|max:255',
     	'experience_min'=> 'nullable|numeric',
     	'prix_max'=> 'nullable|numeric',
     	'repos'=> 'nullable|string|max:255',


    ]);
    
    Demande::updateOrCreate(
         [
        'projet_id' => $request->projet_id,
        'fonction_id' => $request->fonction_id,
    ],
        $validated
    );  

    return response()->json([
                'message' => 'Demande mise à jour avec succès.',
                "redirect" => route('dashboard')
            ]);
}

}
