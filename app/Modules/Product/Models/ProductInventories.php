<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventories extends Model
{
    use HasFactory;
    protected $table = 'product_inventories';
    protected $fillable = [
        'product_id',
        'category_id',
        'brand_id',
        'seller_id',
        'product_in_quantity',
        'product_out_quantity'
    ];
}
