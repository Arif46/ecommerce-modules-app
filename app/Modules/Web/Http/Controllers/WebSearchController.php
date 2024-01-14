<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Product\Models\VwProduct;

use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Support\Facades\URL;

class WebSearchController extends Controller
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


    public function index(Request $request)
    {
    	$currentURL = URL::full();

    	$request = $request->all();
        
        $product_data = new VwProduct();

        //dd($request['keywords']);

        $search_keywords = trim($request['keywords']);

        // Page Title
        $pageTitle = $search_keywords;

        $product_data = $product_data->where(function ($query) use($search_keywords){
            $query = $query->orWhere('product_title', 'LIKE', '%'.$search_keywords.'%');
            $query = $query->orWhere('item_no', 'LIKE', '%'.$search_keywords.'%');
            $query = $query->orWhere('short_description', 'LIKE', '%'.$search_keywords.'%');
            $query = $query->orWhere('meta_title', 'LIKE', '%'.$search_keywords.'%');
            $query = $query->orWhere('meta_keywords', 'LIKE', '%'.$search_keywords.'%');
            $query = $query->orWhere('meta_description', 'LIKE', '%'.$search_keywords.'%');
        });

        // Price Filter data
        if(isset($_GET['price']) && !empty($_GET['price'])){
            $price_arrray = explode("-",$_GET['price']);                   

            if(isset($price_arrray['0']) && isset($price_arrray['1'])){
                $min_price = $price_arrray['0'];
                $max_price = $price_arrray['1'];

                $product_data = $product_data->whereBetween('sell_price', [$min_price, $max_price]);
            }
        }

        // Sorting Filter
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
        
        $product_data = $product_data->paginate(100);


        return view("Web::search.index", compact('product_data','pageTitle','currentURL'));

    }


}