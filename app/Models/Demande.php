<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'projet_id',
        'fonction_id',
        'nom_demande',
        'abonnement',
        'age_min',
        'age_max',
        'mode_emploi',
        'criteres',
        'prix_max',
        'description',
        'sexe_prefere',
        'experience_min',
        'date_debut',
        'lieu_travail',
        'nationality',
        'religion',
        'repos',
        'marital',
        'kids',
        'language',
        'studies_level',
     	'studies_speciality',

    ];

    public function projet() {
        return $this->belongsTo(Projet::class);
    }

    public function fonction() {
        return $this->belongsTo(Fonction::class);
    }

    protected function casts(): array {
        return [
            'criteres' => 'array',
            'kids' => 'array',
            'lieu_travail' => 'array',
            'language' => 'array',
        ];
    }
}