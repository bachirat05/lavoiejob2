<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id',
     	'reference',
     	'avatar_url',
     	'status',

     	'tel',
     	'gsm',
     	'whatsapp',

     	'logement',
     	'address',
     	'city',

     	'cin',
     	'cin_address',
     	'cin_validity',

     	'birth_city',
     	'birth_date',
     	'nationality',

		'marital',
		'kids',
     	'religion',
     	'language',
     	'animal',
     	'emergency_contact',
		
     	'sickness',
		
     	'studies_level',
     	'studies_speciality',
		'mobility',
     	'experience',
     	
		'price_min',
     	'price_max',
     	'echeance',
     	'repos',
		
     	'source',
     	'source_complement',

		'rate',
     	'presentation',
     	'notes',

     	'created_at',
     	'updated_at',
    ];

	protected function casts(): array
    {
        return [
            'kids' => 'array',
            'emergency_contact' => 'array',
        ];
    }
	
}
