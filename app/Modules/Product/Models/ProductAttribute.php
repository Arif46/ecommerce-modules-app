<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ProductAttribute extends Model {

    protected $table = 'product_attribute';
    protected $fillable = [
        'product_id',
        'attribute_code',
        'attribute_data',
    ];


    // Relations
    public function relAttribute(){
        return $this->hasOne('App\Modules\Attribute\Models\Attribute', 'code_column', 'attribute_code');
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
