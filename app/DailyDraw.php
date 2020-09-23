<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyDraw extends Model
{
    protected $fillable = [
        'l2_d_draw',
        'l2_m_draw',
        'l2_md_draw',
        's3_d_draw',
        's3_m_draw',
        's3_md_draw',
        'p3_d_draw',
        'p3_m_draw',
        'p3_md_draw',
        'created_at',
        'updated_at'
    ];
}
