<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'l2_bet_limit',
        's3_bet_limit',
        'p3_bet_limit',
        'd',
        'm',
        'md',
        'created_at',
        'updated_at',
    ];
}
