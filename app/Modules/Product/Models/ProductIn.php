<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{

    protected $table = 'product_in';
    protected $fillable = [
        'product_id',
        'category_id',
        'brand_id',
        'seller_id',
        'product_in_quantity',
        'product_in_date'
    ];
}
