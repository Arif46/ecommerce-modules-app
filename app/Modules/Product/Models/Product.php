<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App;

class Product extends Model {

    protected $table = 'product';
    protected $fillable = [
        'type',
        'title',
        'title_bn', 'title_hi', 'title_ch',
        'slug',
        'item_no',
        'brand_id',
        'is_featured',
        'sell_price',
        'old_price',
        'list_price',
        'attribute_set_id',
        'short_description',
        'short_description_bn', 'short_description_hi', 'short_description_ch',
        'description',
        'description_bn', 'description_hi', 'description_ch',
        'specification',
        'specification_bn', 'specification_hi', 'specification_ch',
        'size_guide',
        'batch',
        'status',
        'seller_id'
    ];

    // Relations

    public function relSeller(){
        return $this->hasMany('App\User','seller_id','id');
    }

    public function relSellerProfiles(){
        return $this->hasOne('App\Modules\Seller\Models\Seller','users_id','seller_id');
    }

    public function relProductAttribute(){
        return $this->hasMany('App\Modules\Product\Models\ProductAttribute','product_id','id');
    }

    public function relProductShipping(){
        return $this->hasMany('App\Modules\Product\Models\ProductShipping','product_id','id');
    }

    public function relProductCoupon(){
        return $this->hasMany('App\Modules\Product\Models\ProductCoupon','product_id','id');
    }

    public function relProductAttributeSet(){
        return $this->hasOne('App\Modules\Attribute\Models\AttributeSet','id','attribute_set_id');
    }

    public function relProductImage(){
        return $this->hasMany('App\Modules\Product\Models\ProductImage','product_id','id');
    }

    public function relProductSeo(){
        return $this->hasOne('App\Modules\Product\Models\ProductSeo','product_id','id');
    }

    public function relProductCategory(){
        return $this->hasMany('App\Modules\Product\Models\ProductCategory','product_id','id');
    }

    public function relProductInventory(){
        return $this->hasOne('App\Modules\Product\Models\ProductInventory','product_id','id');
    }

    public function relProductReview(){
        return $this->hasMany('App\Modules\Product\Models\ProductReview','product_id','id');
    }
    public function relColorSizeWiseQuantity(){
        return $this->hasMany('App\Modules\Product\Models\ColorSizeWiseQuantity','product_id','id');
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
