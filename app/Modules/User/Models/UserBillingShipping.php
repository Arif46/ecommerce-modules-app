<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserBillingShipping extends Model {

    protected $table='users_billing_shipping';
    
    protected $fillable = [
        'users_id',
        'type',
        'name',
        'lastname',
        'email',
        'address',
        'address_line',
        'special_instruction',
        'city',
        'area',
        'zip',
        'phone',
        'alternative_phone',
        'fax',
        'status'
    ];





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
