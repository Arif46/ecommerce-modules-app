<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderDetails extends Model {

   protected $table = 'order_details';
    protected $fillable = [
        'order_head_id',
        'product_id',
        'product_seller_id',
        'quantity',
        'price',
        'total_price',
        'status'
    ];

    // Relations
    public function relProduct(){
        return $this->belongsTo('App\Modules\Product\Models\VwProduct', 'product_id', 'product_id');
    }

    public function relSeller(){
        return $this->belongsTo('App\Modules\Seller\Models\Seller', 'product_seller_id', 'users_id');
    }

    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::check()){
                $query->created_by = Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(Auth::check()){
                $query->updated_by = Auth::user()->id;
            }
        });
    }
    

}
