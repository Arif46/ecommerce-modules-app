<?php

namespace App\Modules\Brand\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_link',
        'short_order',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image_link'
    ];

    public static function getBrandList(){
        $data = Brand::all()->where('status','active')
            ->pluck('title','id');
        return $data;
    }

}
