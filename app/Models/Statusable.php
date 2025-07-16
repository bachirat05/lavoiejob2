<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Statusable extends MorphPivot
{
    protected $table = 'statusables';

    protected $fillable = [
        'status_id',
        'statusable_id',
        'statusable_type',
    ];

    public $timestamps = true;
}
