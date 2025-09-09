<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande; 
use App\Models\Projet;

class demandeController extends Controller
{
    public function create()
    {
        $demandes = Demande::orderByDesc('created_at')->get();
        //$projets = Projet::orderBy('name')->get();
        return view('app.demande', compact('demandes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
        ]);

        Demande::create($request->all());

        return redirect()->route('demande.create')->with('success', 'Demande ajoutée avec succès');
    }
}
