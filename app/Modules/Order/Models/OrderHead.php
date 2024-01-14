<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderHead extends Model {

   protected $table = 'order_head';
    protected $fillable = [
        'user_id',
        'order_number',
        'date',
        'vat_rate',
        'vat_amount ',
        'coupon_code ',
        'coupon_code_rate ',
        'coupon_code_value ',
        'shipping_value ',
        'shipping_method ',
        'sub_total_price ',
        'total_price ',
        'payment_type ',
        'status',
        'discount_amount'
    ];

    // Relations
    public function relOrderShipping(){
        return $this->hasMany('App\Modules\Order\Models\OrderShipping');
    }

    public function relOrderDetail(){
        return $this->hasMany('App\Modules\Order\Models\OrderDetails');
    }

    public function relOrderTransaction(){
        return $this->hasOne('App\Modules\Order\Models\OrderTransaction','order_head_id','id');
    }

     // Relations
    public function relOrderHead(){
        return $this->hasOne('App\Modules\Order\Models\OrderHead','id','order_head_id');
    }

    public function relSeller(){
        return $this->hasOne('App\Modules\Seller\Models\Seller','user_id','seller_id');
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
