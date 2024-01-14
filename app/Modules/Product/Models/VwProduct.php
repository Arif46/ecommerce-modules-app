<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class VwProduct extends Model {

   	protected $table = 'vw_product';
    protected $fillable = [
        'product_id',
        'product_title',
        'product_seller_id',
        'product_slug',
        'type',
        'short_description',
        'specification',
        'size_guide',
        'description',
        'category_title',
        'item_no',
        'sell_price',
        'old_price',
        'list_price',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'quantity',
        'total_review',
        'average_review'
    ];


    // Relations

    public function relProductImage(){
        return $this->hasMany('App\Modules\Product\Models\ProductImage','product_id','product_id');
    }

    public function relProductAttribute(){
        return $this->hasMany('App\Modules\Product\Models\ProductAttribute','product_id','product_id');
    }

    public function relProductCoupon(){
        return $this->hasOne('App\Modules\Seller\Models\Coupon','product_id','product_id');
    }

    public function relProductShipping(){
        return $this->hasMany('App\Modules\Product\Models\ProductShipping','product_id','product_id');
    }

}
