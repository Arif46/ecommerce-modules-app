<?php

namespace App\Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class AttributeOption extends Model {

    protected $table = 'attribute_option';
    
    protected $fillable = [
        'attribute_id',
        'frontend_title',
        'frontend_title_bn', 'frontend_title_hi', 'frontend_title_ch',
        
        'backend_title',
        'backend_title_bn', 'backend_title_hi', 'backend_title_ch',
        
        'slug',
        'status'
    ];

    // Relations
    public function relAttribute(){
        return $this->hasOne('App\Modules\Attribute\Models\Attribute', 'id', 'attribute_id');
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
