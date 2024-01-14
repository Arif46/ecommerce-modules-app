<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Support\Facades\URL;

class WebCategoryController extends Controller
{

	 /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    { 
    	
        $currentURL = URL::full();

        $categoryOrBrandData = DB::table('category')->where('slug',$slug)->where('status','active')->first();

        if(!empty($categoryOrBrandData)){

            $pageTitle = $categoryOrBrandData->title;

            $product_data = DB::table('vw_product');
            $product_data = $product_data->join('product_category', 'vw_product.product_id', '=', 'product_category.product_id');
            $product_data = $product_data->where('product_category.category_id',$categoryOrBrandData->id);
            $product_data = $product_data->select('vw_product.*');
            
            // Price Filter data
            if(isset($_GET['price']) && !empty($_GET['price'])){
                $price_arrray = explode("-",$_GET['price']);                   

                if(isset($price_arrray['0']) && isset($price_arrray['1'])){
                    $min_price = $price_arrray['0'];
                    $max_price = $price_arrray['1'];

                    $product_data = $product_data->whereBetween('sell_price', [$min_price, $max_price]);
                }
            }

            //Sorting Filter
            if(isset($_GET['sort_by']) && !empty($_GET['sort_by'])){
                $sort_by = $_GET['sort_by'];

                // Name filter
                if($sort_by == 'name'){
                    $product_data = $product_data->orderBy('vw_product.product_title','asc');    
                }

                // Price filter
                if($sort_by == 'price'){
                    $product_data = $product_data->orderBy('vw_product.sell_price','asc');    
                }
                
            }else{
                $product_data = $product_data->orderBy('vw_product.product_id','desc');    
            }
            
            $product_data = $product_data->paginate(32);

            $brand_data= App\Modules\Brand\Models\Brand::getBrandList();

            $dataOf = "category";

            return view("Web::shop.index", compact('pageTitle','product_data','categoryOrBrandData','currentURL','brand_data','dataOf'));

        }else{
            return redirect('/');
        }
    }

}