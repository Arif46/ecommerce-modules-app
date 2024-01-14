<?php

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderShipping extends Model {

   protected $table = 'order_shipping';
    protected $fillable = [
        'order_head_id',
        'type',
        'name',
        'email',
        'address',
        'country',
        'city',
        'area',
        'zip ',
        'phone ',
        'fax ',
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
