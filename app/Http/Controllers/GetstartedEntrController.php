<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Status;
use App\Models\Entreprise;

class GetstartedEntrController extends Controller
{
    public function create(){
        $projets = Projet::orderByDesc('created_at')->get();
        $statuses = Status::orderBy('label')->get();
        return view ('app.GetstartedEntr', compact('projets', 'statuses'));
    }
   public function store(Request $request){
    $validated = $request->validate([
        'tel' => 'nullable|string|max:255',
        'gsm' => 'required|string|max:255',
        'website' => 'nullable|string|max:255',
        'ice' => 'nullable|string|max:255', 
        'rc' => 'nullable|string|max:255',          
        'patente' => 'nullable|string|max:255',
        'type_local' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',            
        'city' => 'nullable|string|max:255',
        'address' => 'required|string|max:500',     
        'description' => 'nullable|string|max:255',
        'industry'=> 'nullable|string|max:255',
        'activity'=> 'nullable|string|max:255',
        'language'=> 'nullable|string|max:255',
        'founded_year'=> 'nullable|date',
        'avatar_url'=> 'nullable|string|max:255',
        'whatsapp'=> 'nullable|string|max:255',
        'source'=> 'nullable|string|max:255',
        'source_complement'=> 'nullable|string|max:255',
        'representant'=> 'nullable|string|max:255',
        'representant_phone'=> 'nullable|string|max:255',
        'representant_email'=> 'nullable|string|max:255',
    ]);
    
     Entreprise::updateOrCreate(
        ['user_id' => $request->user()->id],
        $validated
    );

    return response()->json([
                'message' => 'Rôle mis à jour avec succès.',
                "redirect" => route('dashboard')
            ]);
    }
}