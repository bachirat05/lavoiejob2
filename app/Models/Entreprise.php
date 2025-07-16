<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'ice',
        'rc',
        'patente',
        'industry',
        'activity',
        'language',
        'founded_year',
        'avatar_url',
        'tel',
        'gsm',
        'whatsapp',
        'website',
        'type_local',
        'address',
        'city',
        'country',
        'source',
        'source_complement',
        'representant',
        'representant_phone',
        'representant_email',
    ];
}
