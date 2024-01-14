<?php

namespace App\Modules\Admanager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Admanager extends Model {

    protected $table='admanager';
    
    protected $fillable = [
        'title',
        'slug',
        'caption',
        'route',
        'image_link',
        'short_order',
        'type',
        'position',
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
