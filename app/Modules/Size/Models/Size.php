<?php

namespace App\Modules\Size\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'size';

    protected $fillable = [
        'title',
        'slug',
        'title_bn',
        'title_hi',
        'title_ch',
        'description',
        'description_bn',
        'description_hi',
        'description_ch',
        'size_img',
        'created_at',
        'updated_at',
    ];
}
