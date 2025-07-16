<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    protected $fillable = [
        'name',
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_modes');
    }
    
}
