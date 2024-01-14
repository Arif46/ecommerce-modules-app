<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Web\Requests;
use App\Modules\Order\Models\OrderHead;
use App\Modules\Order\Models\OrderTransaction;
use App\Modules\Order\Models\OrderShipping;
use App\Modules\Product\Models\VwProduct;
use App\Modules\Product\Models\Product;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class WebShopController extends Controller
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

    public function shoplist()
    {
       
       $shoplist = User::where('users.type','seller')
                    ->where('status','active') 
                    // ->orderBy('id','desc')
                    ->paginate(20);
                   
            
         if(!empty($shoplist)){            
        // Page Title
        $pageTitle = "All Brand";         

        return view('Web::shop.shoplist',[
            'pageTitle'=>$pageTitle,
            'shopData' => $shoplist            
        ]);
       
        } else {
            return redirect()->route('/');;
        }
             
    }

    public function shoppro($id)
    {
        $currentURL = URL::full();
        $product_data = DB::table('vw_product')
        ->where('product_seller_id',$id)
        ->select('vw_product.*')
        ->orderBy('vw_product.product_id','desc');

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
        // ->paginate(30)
            $product_data = $product_data->paginate(100); 
                           

        if(!empty($product_data))
        {

            
        $user_data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->select('users.email', 'users.id', 'seller_profiles.shop_name')->first();

            //dd($user_data); 
                $pageTitle = 'Seller Products List' ;
            // If found product
        return view("Web::shop.shoppro", compact('product_data','pageTitle','user_data','currentURL'));

        }else{
            // If product not found
            return redirect()->back();

        }
            
            
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
}