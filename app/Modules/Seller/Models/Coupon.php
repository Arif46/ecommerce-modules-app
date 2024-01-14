<?php

namespace App\Modules\Seller\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {

    protected $table='coupon';
    
    protected $fillable = [
        'seller_id',
        'coupon_name', 'coupon_name_bn', 'coupon_name_hi', 'coupon_name_ch',
        'coupon_details',
        'coupon_code',
        'coupon_type', 'coupon_type_bn', 'coupon_type_hi', 'coupon_type_ch',
        'used_coupon',
        'start_coupon',
        'end_coupon',
        'valid_from',
        'valid_to',
        'amount',
        'status'
    ];

}
