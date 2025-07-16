<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'name',
        'description',
        'avatar_url',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_projets');
    }

}
