<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProjet extends Model
{
    protected $fillable = [
        'user_id',
        'projet_id',
    ];
}
