<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class User extends Model {

    protected $table='users';
    
    protected $fillable = [
        'users_id',
        'type',
        'username',
        'shop_name',
        'email',
        'shop_address',        
        'password',
        'id',
        'mobile_no',
        'shop_logo',
        'status'
    ];

    public function relMerchantProfile(){
        return $this->hasOne('App\Modules\Seller\Models\Seller','id','user_id');
    }

    // public function orderInfo(){
    //     return $this->hasOne('App\Modules\Order\Models\OrderHead','id','users_id');
    // }


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
