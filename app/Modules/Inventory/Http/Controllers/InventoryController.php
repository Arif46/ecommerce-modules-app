<?php

namespace App\Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Seller\Requests;
use App\User;
use App\Modules\Order\Models\OrderHead;
use App\Modules\Order\Models\OrderTransaction;
use App\Modules\Product\Models\Product;
use Illuminate\Support\Facades\App;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Modules\Brand\Models\Brand;
use App\Modules\Category\Models\Category;


class InventoryController extends Controller
{
    public function __construct()
    {
        // Change language 
        if(isset($_GET['lang']) && !empty($_GET['lang'])){
            App::setLocale($_GET['lang']);    
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function isGetRequest(){

       return $_SERVER['REQUEST_METHOD'] == "GET";
    }

    /**
     * @return bool
     */
    protected function isPostRequest(){
        return $_SERVER['REQUEST_METHOD'] == "POST";
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $pageTitle = 'Show all seller';
       
        $query = DB::table('users')                        
                        ->join('seller_profiles','users.id', '=','seller_profiles.users_id')                        
                        ->select('users.*',
                            'seller_profiles.shop_name',
                            'seller_profiles.shop_address'
                        );

    
        $requestMethod = $request->method();

        if($this->isGetRequest() == $requestMethod)
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));

            $query = $query->where(function ($query) use($search_keywords){
                   
                    $query = $query->orWhere('users.email', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('users.mobile_no', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('users.username', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('seller_profiles.shop_name', 'LIKE', '%'.$search_keywords.'%');
                        
                });
            $data = $query->where('users.type','seller')
                          ->where('users.status','active')
                          ->get();
        }else{

            $data= $query->where('users.type','seller')
                        ->where('users.status','active')
                        ->get();
        }
       

        return view('Inventory::inventory.seller_summary', [
            'pageTitle' => $pageTitle,
            'data' => $data
        ]);

    }



    public function single_product_report(Request $request,$id)
    {
    
    }
    public function height_selling_product(Request $request)
    {   
        $pageTitle  = 'Show all seller';

        $sellerSelect = [''=>'Select Seller'];
        $proSelect = [''=>'Select Produce'];
        $brandSelect = [''=>'Select Brand'];
        $catSelect = [''=>'Select Category'];
        $sellerSelect = [''=>'Select Seller'];

        $proList    = $proSelect + DB::table('product')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray(); 
        $brandList  = $brandSelect + Brand::orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();
        
        $catList    = $catSelect + Category:: orderBy('title','ASC')
                                            ->pluck('title','id')
                                            ->toArray();

        $sellerList    = $sellerSelect + DB::table('seller_profiles')
                                    ->orderBy('shop_name','ASC')
                                    ->pluck('shop_name','users_id')
                                    ->toArray();
                
        $query = DB::table('order_details')
                        ->leftJoin('product','order_details.product_id','product.id')
                        ->select('order_details.product_id',
                            'order_details.category_id',
                            'order_details.brand_id',
                            'order_details.product_seller_id',
                            DB::raw('SUM(order_details.quantity) As pro_quantity'),
                            DB::raw('SUM(order_details.total_price) As pro_price'),
                            'product.title as pro_title'
                        );

        $requestMethod = $request->method();

        if($this->isGetRequest() == $requestMethod)
        {
            // Search data found
            if ($request->product_id) {
                $query->where('order_details.product_id',$request->product_id);
            }

            if ($request->category_id) {
                $query->where('order_details.category_id',$request->category_id);
            }

            if ($request->brand_id) {
                $query->where('order_details.brand_id',$request->brand_id);
            }

            if ($request->user_id) {
                $query->where('order_details.product_seller_id',$request->user_id);
            }

                //$aa = date('Y-m-d H:i:s', strtotime($request->from_date));
                //dd($aa,date_parse($request->from_date), $request->to_date);
            

            if ($request->from_date && $request->to_date){
                $startDate   = date('Y-m-d H:i:s', strtotime($request->from_date));
                $endDate     = date('Y-m-d H:i:s', strtotime($request->to_date));
                $query       = $query->whereBetween('order_details.updated_at', [$startDate, $endDate]);
            }

            if (isset($request->from_date) && !isset($request->to_date)){
                $query = $query->whereDate('order_details.updated_at', '>=', date('Y-m-d H:i:s', strtotime($request->from_date)));
            }

            if (!isset($request->from_date) && isset($request->to_date)){
                $query = $query->whereDate('order_details.updated_at', '<=', date('Y-m-d H:i:s', strtotime($request->to_date)));
            }                       
        }

        $data= $query->where('order_details.status','delivered')
                        ->orderBy('pro_quantity','DESC')
                        ->groupBy('order_details.category_id')
                        ->groupBy('order_details.brand_id')
                        ->groupBy('order_details.product_seller_id')
                        ->groupBy('order_details.product_id')
                        ->get();

        return view('Inventory::inventory.height_selling_product', [
            'pageTitle'     => $pageTitle,
            'proList'       => $proList,
            'brandList'     => $brandList,
            'catList'       => $catList,
            'sellerList'    => $sellerList,
            'data'          => $data,
        ]);

    }

    public function height_selling_product_by_seller($id)
    {   
        $pageTitle  = 'Show all seller';

        $sellerSelect = [''=>'Select Seller'];
        $proSelect = [''=>'Select Produce'];
        $brandSelect = [''=>'Select Brand'];
        $catSelect = [''=>'Select Category'];
        $sellerSelect = [''=>'Select Seller'];

        $proList    = $proSelect + DB::table('product')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray(); 
        $brandList  = $brandSelect + Brand::orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();
        
        $catList    = $catSelect + Category:: orderBy('title','ASC')
                                            ->pluck('title','id')
                                            ->toArray();

        $sellerList    = $sellerSelect + DB::table('seller_profiles')
                                    ->orderBy('shop_name','ASC')
                                    ->pluck('shop_name','users_id')
                                    ->toArray();
                
        $query = DB::table('order_details')
                        ->leftJoin('product','order_details.product_id','product.id')
                        ->select('order_details.product_id',
                            'order_details.category_id',
                            'order_details.brand_id',
                            'order_details.product_seller_id',
                            DB::raw('SUM(order_details.quantity) As pro_quantity'),
                            DB::raw('SUM(order_details.total_price) As pro_price'),
                            'product.title as pro_title'
                        );

        

        $data= $query->where('order_details.status','delivered')
                        ->where('order_details.product_seller_id',$id)
                        ->orderBy('pro_quantity','DESC')
                        ->groupBy('order_details.category_id')
                        ->groupBy('order_details.brand_id')
                        ->groupBy('order_details.product_seller_id')
                        ->groupBy('order_details.product_id')
                        ->get();

        return view('Inventory::inventory.height_selling_product_by_seller', [
            'pageTitle'     => $pageTitle,
            'proList'       => $proList,
            'brandList'     => $brandList,
            'catList'       => $catList,
            'sellerList'    => $sellerList,
            'data'          => $data,
            'id'            => $id,
        ]);

    }

    public function height_selling_product_by_cat($id)
    {   
        $pageTitle = 'Show all seller';

               
        $data = DB::table('order_details')
                        ->leftJoin('product','order_details.product_id','product.id')
                        ->select('order_details.product_id',
                            'order_details.category_id',
                            'order_details.brand_id',
                            'order_details.product_seller_id',
                            DB::raw('SUM(order_details.quantity) As pro_quantity'),
                            DB::raw('SUM(order_details.total_price) As pro_price'),
                            'product.title as pro_title'
                        )
                        ->where('order_details.status','delivered')
                        ->Where('order_details.category_id',$id)
                        ->orderBy('pro_quantity','DESC')
                        ->groupBy('order_details.category_id')
                        ->groupBy('order_details.brand_id')
                        ->groupBy('order_details.product_seller_id')
                        ->groupBy('order_details.product_id')
                        ->get();        

        return view('Inventory::inventory.height_selling_product', [
            'pageTitle' => $pageTitle,
            'data' => $data
        ]);

    }


    public function height_selling_product_by_brand($id)
    {   
        $pageTitle = 'Show all seller';

               
        $data = DB::table('order_details')
                        ->leftJoin('product','order_details.product_id','product.id')
                        ->select('order_details.product_id',
                            'order_details.category_id',
                            'order_details.brand_id',
                            'order_details.product_seller_id',
                            DB::raw('SUM(order_details.quantity) As pro_quantity'),
                            DB::raw('SUM(order_details.total_price) As pro_price'),
                            'product.title as pro_title'
                        )
                        ->where('order_details.status','delivered')
                        ->Where('order_details.brand_id',$id)
                        ->orderBy('pro_quantity','DESC')
                        ->groupBy('order_details.category_id')
                        ->groupBy('order_details.brand_id')
                        ->groupBy('order_details.product_seller_id')
                        ->groupBy('order_details.product_id')
                        ->get();

        return view('Inventory::inventory.height_selling_product', [
            'pageTitle' => $pageTitle,
            'data' => $data
        ]);

    }



    public function product_selles_details(Request $request)
    {   
        $pageTitle = 'Show all seller';

               
        $query = DB::table('order_details')
                        ->leftJoin('product','order_details.product_id','product.id')
                        ->select('order_details.product_id',

                            'order_details.category_id',
                            'order_details.brand_id',
                            'order_details.product_seller_id',
                            'order_details.size',
                            'order_details.color',
                            DB::raw('SUM(order_details.quantity) As pro_quantity'),
                            DB::raw('SUM(order_details.total_price) As pro_price'),
                            'product.title as pro_title'
                        );

        $requestMethod = $request->method();

        if($this->isGetRequest() == $requestMethod)
        {
            // Search data found

            if ($request->category_id) {
                $query->orWhere('category_id','like','%'.$request->category_id.'%');
            }

            if ($request->brand_id) {
                $query->orWhere('brand_id','like','%'.$request->brand_id.'%');
            }

            if ($request->size) {
                $query->orWhere('size','like','%'.$request->size.'%');
            }

            if ($request->color) {
                $query->orWhere('color','like','%'.$request->color.'%');
            }

            if ($request->shipping_service) {
                $query->orWhere('shipping_service','like','%'.$request->shipping_service.'%');
            }


            if ($request->product_seller_id) {
                $query->orWhere('product_seller_id','like','%'.$request->product_seller_id.'%');
            }

            

            if ($request->from_date && $request->to_date){
                $startDate   = date('Y-m-d', strtotime($request->from_date));
                $endDate     = date('Y-m-d', strtotime($request->to_date));
                $query       = $query->whereBetween('order_details.updated_at', [$startDate, $endDate]);
            }

            if (isset($request->from_date) && !isset($request->to_date)){
                $query = $query->whereDate('order_details.updated_at', '>=', date('Y-m-d', strtotime($request->from_date)));
            }

            if (!isset($request->from_date) && isset($request->to_date)){
                $query = $query->whereDate('order_details.updated_at', '<=', date('Y-m-d', strtotime($request->to_date)));
            } 

           

            $search_keywords = trim($request->get('search_keywords'));

            $query = $query->where(function ($query) use($search_keywords){
                   
                    $query = $query->orWhere('order_details.product_seller_id', 'LIKE', '%'.$search_keywords.'%');
                        
                });
            
        }

        $data= $query->where('order_details.status','delivered')
                        ->orderBy('pro_quantity','DESC')
                        ->groupBy('order_details.category_id')
                        ->groupBy('order_details.brand_id')
                        ->groupBy('order_details.product_seller_id')
                        ->groupBy('order_details.product_id')
                        ->groupBy('order_details.color')
                        ->groupBy('order_details.size')
                        ->get();

        return view('Inventory::inventory.height_selling_product', [
            'pageTitle' => $pageTitle,
            'data' => $data
        ]);

    }






   



    public function seller_product_index($id){

        $data = Product::where('seller_id',$id)->paginate(30);                    

        if(!empty($data))
        {
            $user_data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->select('users.email', 'users.id', 'seller_profiles.shop_name')->first();
                $pageTitle = 'Seller Products List' ;
            // If found product
            return view("Seller::adminseller.show_seller_product", compact('data','pageTitle','user_data'));

        }else{
            // If product not found
            return redirect()->back();

        }

    }

    // ---- seller_order_index ---//

        public function seller_order_index($id){

            $data = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                         ->where('order_details.product_seller_id',$id)   
                        // ->whereNotIn('status',['Cancel',''])                                   
                        ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price')                        
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30);        

                        //dd($data);

        if(!empty($data))
        {
            $user_data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->select('users.email', 'users.id', 'seller_profiles.shop_name')->first();
                $pageTitle = 'Seller Order List' ;
            // If order product
            return view("Seller::adminseller.show_seller_order", compact('data','pageTitle','user_data'));

        }else{
            // If product not found
            return redirect()->back();

        }

    }

    // ---- seller_order_index ---//

    // ---- seller_payment_index ---//

    public function seller_payment_index($id){

        $pageTitle = 'Seller Pyment List' ;

        $data = OrderTransaction::orderBy('id', 'desc')
                               ->where('seller_id',$id)   
                               ->paginate(30);  

                        //dd($data);

        if(!empty($data))
        {
            $user_data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->select('users.email', 'users.id', 'seller_profiles.shop_name')->first();

                

            // If order product
            return view("Seller::adminseller.show_seller_payment", compact('data','pageTitle','user_data'));

        }else{
            // If product not found
            return redirect()->back();

        }

    }

    // ---- seller_payment_index ---//

}

