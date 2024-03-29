<?php

namespace App\Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model {

    protected $table = 'category';

    protected $fillable = [
        'title',
        'title_bn',
        'title_hi',
        'title_ch',

        'slug',
        'description',
        'description_bn',
        'description_hi',
        'description_ch',

        'image_link',
        'short_order',
        'status',
        'meta_title',
        'meta_title_bn',
        'meta_title_hi',
        'meta_title_ch',

        'meta_description',
        'meta_description_bn',
        'meta_description_hi',
        'meta_description_ch',

        'meta_keywords',
        'meta_keywords_bn',
        'meta_keywords_hi',
        'meta_keywords_ch',

        'meta_image_link'
    ];


    // Relation
    public function relCategorySelfRelation(){
        return $this->belongsTo('App\Modules\Category\Models\CategorySelfRelation', 'id', 'child_category_id');
    }

    public function relCategoryChild(){
                return $this->belongsToMany('App\Modules\Category\Models\Category', 'category_self_relation',  'parent_category_id', 'child_category_id');
    }

    /**
        Parent cateogory data
        Child category data
    **/
    public static function getHierarchyCategory($except=''){

        // Initialize data
        $response = [];
        $response[''] = 'Select parent category';

        // Find parent category
        $data = self::join('category_self_relation', 'category_self_relation.child_category_id', '=', 'category.id');
        $data = $data->where('category_self_relation.parent_category_id',NULL)->whereNotIn('category.status',['cancel'])
            ->where('category.status','active')
            ->select('category.*')
            ->OrderBy('category.short_order')
            ->get();

        if(!empty($data)){
            foreach ($data as $key => $value){
                if($except != $value->id){
                    $response[$value->id] = $value->title;

                    $dot = '   -- ';
                    // Find child category
                    $response = self::get_child_category($value->id, $response, $dot, $except);
                }
            }
        }

        // Return response
        return $response;
    }

    /**
        Get multiple child cateogory
    **/
    public static function get_child_category($parent, $response, $dot, $except){
        
        if($dot==''){
            $dot = '--';
        }

        // Find child category 
        $child_category = self::join('category_self_relation', 'category_self_relation.child_category_id', '=', 'category.id');

        $child_category = $child_category->where('category_self_relation.parent_category_id',$parent)->whereNotIn('category.status',['cancel'])
            ->where('category.status','active')
            ->select('category.*')
            ->OrderBy('category.short_order')
            ->get();

        if(!empty($child_category)){
            foreach ($child_category as $key => $value) {

                if($except != $value->id) {
                    if (isset($response[$value->id])) {
                        $response[$value->id] .= ', ' . $dot . $value->title;
                    } else {
                        $response[$value->id] = $dot . $value->title;
                    }

                    $dot1 = $dot.' -- ';
                    // Find recursive child category
                    $response=self::get_child_category($value->id, $response, $dot1, $except);
                }
            }
        }

        // Return response
        return $response;
    }



    /**
        WebMenu
    **/
    public static function getWebMenu(){

        $response = [];

        $data = self::join('category_self_relation', 'category_self_relation.child_category_id', '=', 'category.id')
            ->where('category_self_relation.parent_category_id',NULL);
        $data = $data->whereNotIn('category.status',['cancel']);
        $data = $data->where('category.status','active');    
        $data = $data->select('category.id','category.title','category.slug','category.image_link')
            ->OrderBy('category.short_order')
            ->limit(8)
            ->get()
            ->toArray();

        
        if(!empty($data)){
            foreach ($data as $key => $value){

                $title = $value['title'];
               
                $response[$key]['id'] = $value['id'];
                $response[$key]['name'] = $title;                
                $response[$key]['slug'] = $value['slug'];
                $response[$key]['image_link'] = $value['image_link'];

                $sub_menu_data = self::get_sub_category($value['id'], $response);

                if(!empty($sub_menu_data))
                {
                    $response[$key]['sub_menu'] = $sub_menu_data;    
                }                

        
            }
        }

        return $response;

    }


    // Web Menu Sub Category

    public static function get_sub_category($parent_id, $response)
    {
        $response = [];

        $sub_category = self::join('category_self_relation', 'category_self_relation.child_category_id', '=', 'category.id')
            ->where('category_self_relation.parent_category_id',$parent_id);
                    
        $sub_category = $sub_category->where('category.status','active');
        
        $sub_category = $sub_category->select('category.id','category.title','category.slug','category.image_link')
            ->orderBy('id','asc')
            ->limit(8)
            ->get()
            ->toArray();

        if(!empty($sub_category)){
            foreach ($sub_category as $key => $value) {

                $title = $value['title'];

                $response[$key]['id'] = $value['id'];
                $response[$key]['name'] = $title;                
                $response[$key]['slug'] = $value['slug'];
                $response[$key]['image_link'] = $value['image_link'];

                $sub_menu_data = self::get_sub_category($value['id'], $response);

                if(!empty($sub_menu_data))
                {
                    $response[$key]['sub_menu'] = $sub_menu_data;    
                }                

            }
        }

        return $response;
    }




    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::check()){
                $query->created_by = @\Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(Auth::check()){
                $query->updated_by = @\Auth::user()->id;
            }
        });
    }

}
