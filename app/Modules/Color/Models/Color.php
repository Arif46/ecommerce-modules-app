<?php

namespace App\Modules\Color\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'color';

    protected $fillable = [
        'title',
        'slug',
        'title_bn',
        'title_hi',
        'title_ch',
        'color_code',
        'color_img',
    ];
}


