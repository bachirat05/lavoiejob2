<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;use App\Models\Projet;
use App\Models\Status;
use App\Models\UserInfo;


class GetstartedcandidatController extends Controller
{
    public function create(){
        $projets = Projet::orderByDesc('created_at')->get();
        $statuses = Status::orderBy('label')->get();
        return view ('app.Getstartedcandidat', compact('projets', 'statuses'));
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
        'city' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:500', 
     	'reference'=> 'nullable|string|max:255',
     	'avatar_url'=> 'nullable|string|max:255',
        
     	'status'=> 'nullable|string|max:255',

     	'whatsapp'=> 'nullable|string|max:255',
		'marital'=> 'required|string|max:255',
     	'religion'=> 'required|string|max:255',
     	'language'=> 'required|string|max:255',
     	'emergency_contact'=> 'nullable|string|max:255',
     	'sickness'=> 'nullable|string|max:255',
     	'studies_level'=> 'nullable|string|max:255',
     	'studies_speciality'=> 'nullable|string|max:255',
		'mobility'=> 'nullable|string|max:255',
     	'experience'=> 'nullable|numeric',
		'price_min'=> 'nullable|numeric',
     	'price_max'=> 'nullable|numeric',
     	'echeance'=> 'nullable|string|max:255',
     	'repos'=> 'nullable|string|max:255',
     	'source'=> 'nullable|string|max:255',
     	'source_complement'=> 'nullable|string|max:255',

    ]);
    
     UserInfo::updateOrCreate(
        ['user_id' => $request->user()->id],
        $validated
    );

    return response()->json([
                'message' => 'Rôle mis à jour avec succès.',
                "redirect" => route('dashboard')
            ]);

   
}

  
}

