<?php

namespace App\Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Attribute extends Model {

    protected $table = 'attribute';
    
    protected $fillable = [
        'code_column',
        'type',
        'type_is_required',
        'order',

        'backend_title',
        'backend_title_bn', 'backend_title_hi', 'backend_title_ch',
        'frontend_title',
        'frontend_title_bn', 'frontend_title_hi', 'frontend_title_ch',
        'default_value',
        'default_value_bn', 'default_value_hi', 'default_value_ch',

        'status'
    ];

    // Relations

    public function relAttributeOption()
    {
        return $this->hasMany('App\Modules\Attribute\Models\AttributeOption', 'attribute_id',  'id')->orderBy('backend_title','asc');
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
