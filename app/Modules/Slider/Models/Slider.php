<?php

namespace App\Modules\Slider\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Slider extends Model {

    protected $table='slider';
    
    protected $fillable = [
        'title',
        'title_bn', 'title_hi', 'title_ch',
        'slug',
        'caption',
        'caption_bn', 'caption_hi', 'caption_ch',
        'route',
        'image_link',
        'short_order',
        'type',
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
