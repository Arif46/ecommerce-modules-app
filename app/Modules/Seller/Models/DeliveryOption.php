<?php

namespace App\Modules\Seller\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryOption extends Model {

    protected $table='shipping_method';
    
    protected $fillable = [
        'shipping_type',
        'shipping_value',
        'courier_service',
        'courier_details',
        'conditional',
        'status'
    ];

}
