<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    protected $fillable = [
        'name',
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_fonctions');
    }
    
}
