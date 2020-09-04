<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    protected $fillable = [
        'user_id', 'type', 'M', 'D', 'MD', 'created_at', 'updated_at'
    ];
}
