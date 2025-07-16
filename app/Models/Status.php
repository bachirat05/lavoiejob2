<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name',
        'label',
        'type',
        'color',
    ];

    public function users()
    {
        return $this->morphedByMany(User::class, 'statusable')
                    ->using(\App\Models\Statusable::class)
                    ->withTimestamps();
    }

}
