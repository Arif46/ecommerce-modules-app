<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderTransaction extends Model {

    protected $table = 'order_transaction';
    protected $fillable = [
        'order_head_id',
        'transaction_number',
        'payment_type',
        'date',
        'amount',
        'status',
        'seller_id'
    ];

    // Relations
    public function relOrderHead(){
        return $this->hasOne('App\Modules\Order\Models\OrderHead','id','order_head_id');
    }

    public function relSeller(){
        return $this->hasOne('App\Modules\Seller\Models\Seller','users_id','seller_id');
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
