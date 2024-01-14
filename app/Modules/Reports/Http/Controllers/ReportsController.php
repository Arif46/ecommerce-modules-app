<?php

namespace App\Modules\Reports\Http\Controllers;

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


class ReportsController extends Controller
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
    public function indexIn(Request $request)
    {   
        $pageTitle = 'Product In Report';

        $sellerSelect = [''=>'Select Seller'];
        $proSelect = [''=>'Select Produce'];
        $brandSelect = [''=>'Select Brand'];
        $catSelect = [''=>'Select Category'];
        $sellerSelect = [''=>'Select Seller'];
        $colorSelect = [''=>'Select Color'];
        $sizeSelect = [''=>'Select Size'];

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

        $colorList    = $colorSelect + DB::table('color')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();

        $sizeList    = $sizeSelect + DB::table('size')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();


                                    

       
        $query = DB::table('product_in')                        
                        ->join('product','product_in.product_id', '=','product.id')                        
                        ->join('seller_profiles','product_in.seller_id', '=','seller_profiles.users_id')                        
                        ->leftJoin('category','product_in.category_id', '=','category.id')                        
                        ->leftJoin('brands','product_in.brand_id', '=','brands.id')                        
                        ->leftJoin('color','product_in.color_id', '=','color.id')                        
                        ->leftJoin('size','product_in.size_id', '=','size.id')                        
                        ->select('product_in.product_id',
                            'product_in.product_quantity',
                            'product_in.product_in_date',
                            'product.title as pro_name',
                            'seller_profiles.shop_name as shop_name',
                            'category.title as cat_name',
                            'brands.title as brand_name',
                            'color.title as color_title',
                            'size.title as size_title',
                        );

        
    
        $reProId = '';
        $requestMethod = $request->method();


        if($this->isGetRequest() == $requestMethod)
        {
            // Search data found
            if ($request->product_id) {
                $reProId = $request->product_id;
                $query->where('product_in.product_id',$request->product_id);
            }

            if ($request->category_id) {
                $query->where('product_in.category_id',$request->category_id);
            }

            if ($request->brand_id) {
                $query->where('product_in.brand_id',$request->brand_id);
            }

            if ($request->seller_id) {
                $query->where('product_in.seller_id',$request->seller_id);
            }

            if ($request->size_id) {
                $query->where('product_in.size_id',$request->size_id);
            }

            if ($request->color_id) {
                $query->where('product_in.color_id',$request->color_id);
            }           
            

            if ($request->from_date && $request->to_date){
                $startDate   = date('Y-m-d H:i:s', strtotime($request->from_date));
                $endDate     = date('Y-m-d H:i:s', strtotime($request->to_date));
                $query       = $query->whereBetween('product_in.product_in_date', [$startDate, $endDate]);
            }

            if (isset($request->from_date) && !isset($request->to_date)){
                $query = $query->whereDate('product_in.product_in_date', '>=', date('Y-m-d H:i:s', strtotime($request->from_date)));
            }

            if (!isset($request->from_date) && isset($request->to_date)){
                $query = $query->whereDate('product_in.product_in_date', '<=', date('Y-m-d H:i:s', strtotime($request->to_date)));
            }                       
        }

        $data= $query->orderBy('product_in.product_in_date','DESC')
                        ->get();

        return view('Reports::reports.report_product_in', [
            'pageTitle'     => $pageTitle,
            'reProId'       => $reProId??'',
            'proList'       => $proList,
            'brandList'     => $brandList,
            'catList'       => $catList,
            'sellerList'    => $sellerList,
            'sizeList'      => $sizeList,
            'colorList'     => $colorList,
            'data'          => $data,
        ]);

    }

    public function indexOut(Request $request)
    {   
        $pageTitle = 'Product Out Report';

        $sellerSelect = [''=>'Select Seller'];
        $proSelect = [''=>'Select Produce'];
        $brandSelect = [''=>'Select Brand'];
        $catSelect = [''=>'Select Category'];
        $sellerSelect = [''=>'Select Seller'];
        $colorSelect = [''=>'Select Color'];
        $sizeSelect = [''=>'Select Size'];

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

        $colorList    = $colorSelect + DB::table('color')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();

        $sizeList    = $sizeSelect + DB::table('size')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();


       
        $query = DB::table('product_out')                        
                        ->join('product','product_out.product_id', '=','product.id')                        
                        ->join('seller_profiles','product_out.seller_id', '=','seller_profiles.users_id')                        
                        ->leftJoin('category','product_out.category_id', '=','category.id')                        
                        ->leftJoin('brands','product_out.brand_id', '=','brands.id')                        
                        ->leftJoin('color','product_out.color_id', '=','color.id')                        
                        ->leftJoin('size','product_out.size_id', '=','size.id')                        
                        ->select('product_out.product_quantity',
                            'product_out.product_out_date',
                            'product.title as pro_name',
                            'seller_profiles.shop_name as shop_name',
                            'category.title as cat_name',
                            'brands.title as brand_name',
                            'color.title as color_title',
                            'size.title as size_title',
                        );

        
    
        $requestMethod = $request->method();

        if($this->isGetRequest() == $requestMethod)
        {
            // Search data found
            if ($request->product_id) {
                $query->where('product_out.product_id',$request->product_id);
            }

            if ($request->category_id) {
                $query->where('product_out.category_id',$request->category_id);
            }

            if ($request->brand_id) {
                $query->where('product_out.brand_id',$request->brand_id);
            }

            if ($request->seller_id) {
                $query->where('product_out.seller_id',$request->seller_id);
            }

            if ($request->size_id) {
                $query->where('product_out.size_id',$request->size_id);
            }

            if ($request->color_id) {
                $query->where('product_out.color_id',$request->color_id);
            }           
            

            if ($request->from_date && $request->to_date){
                $startDate   = date('Y-m-d H:i:s', strtotime($request->from_date));
                $endDate     = date('Y-m-d H:i:s', strtotime($request->to_date));
                $query       = $query->whereBetween('product_out.product_out_date', [$startDate, $endDate]);
            }

            if (isset($request->from_date) && !isset($request->to_date)){
                $query = $query->whereDate('product_out.product_out_date', '>=', date('Y-m-d H:i:s', strtotime($request->from_date)));
            }

            if (!isset($request->from_date) && isset($request->to_date)){
                $query = $query->whereDate('product_out.product_out_date', '<=', date('Y-m-d H:i:s', strtotime($request->to_date)));
            }                       
        }

        $data= $query->orderBy('product_out.product_out_date','DESC')
                        ->get();

        //dd($data);

        return view('Reports::reports.report_product_out', [
            'pageTitle'     => $pageTitle,
            'proList'       => $proList,
            'brandList'     => $brandList,
            'catList'       => $catList,
            'sellerList'    => $sellerList,
            'sizeList'      => $sizeList,
            'colorList'     => $colorList,
            'data'          => $data,
        ]);

    }

    public function indexStockSummary(Request $request)
    {   
        

        $pageTitle = 'Product Out Report';

        $sellerSelect = [''=>'Select Seller'];
        $proSelect = [''=>'Select Produce'];
        $brandSelect = [''=>'Select Brand'];
        $catSelect = [''=>'Select Category'];
        $sellerSelect = [''=>'Select Seller'];
        $colorSelect = [''=>'Select Color'];
        $sizeSelect = [''=>'Select Size'];

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

        $colorList    = $colorSelect + DB::table('color')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();

        $sizeList    = $sizeSelect + DB::table('size')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();


        $query = DB::table('color_size_wise_quantity')
                    ->join('product','color_size_wise_quantity.product_id', 'product.id')
                    ->join('seller_profiles','product.seller_id', '=','seller_profiles.users_id') 
                    ->join('color','color_size_wise_quantity.color_id', 'color.id')
                    ->join('size','color_size_wise_quantity.size_id', 'size.id')
                    ->select(
                            'color_size_wise_quantity.quantity',
                            'product.title',
                            'product.sell_price',
                            'product.old_price',
                            'product.list_price',
                            'product.seller_id',
                            'color.title as color_title',
                            'size.title as size_title',
                            'seller_profiles.shop_name as shop_name'
                        );


        
    
        $requestMethod = $request->method();

        if($this->isGetRequest() == $requestMethod)
        {
            // Search data found
            if ($request->product_id) {
                $query->where('color_size_wise_quantity.product_id',$request->product_id);
            }

            if ($request->color_id) {
                $query->where('color_size_wise_quantity.color_id',$request->color_id);
            }

            if ($request->size_id) {
                $query->where('color_size_wise_quantity.size_id',$request->size_id);
            }

            if ($request->brand_id) {
                $query->where('product.brand_id',$request->brand_id);
            }

            if ($request->seller_id) {
                $query->where('product.seller_id',$request->seller_id);
            }

        }

        $data= $query->orderBy('color_size_wise_quantity.id','DESC')
                        ->get();

        dd($data);

        return view('Reports::reports.report_product_out', [
            'pageTitle'     => $pageTitle,
            'proList'       => $proList,
            'brandList'     => $brandList,
            'catList'       => $catList,
            'sellerList'    => $sellerList,
            'sizeList'      => $sizeList,
            'colorList'     => $colorList,
            'data'          => $data,
        ]);

    }
    
    public function indexStockDetails(Request $request)
    {   
        $pageTitle = 'Product Out Report';


        $sellerSelect = [''=>'Select Seller'];
        $proSelect = [''=>'Select Produce'];
        $brandSelect = [''=>'Select Brand'];
        $catSelect = [''=>'Select Category'];
        $sellerSelect = [''=>'Select Seller'];
        $colorSelect = [''=>'Select Color'];
        $sizeSelect = [''=>'Select Size'];

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

        $colorList    = $colorSelect + DB::table('color')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();

        $sizeList    = $sizeSelect + DB::table('size')
                                    ->orderBy('title','ASC')
                                    ->pluck('title','id')
                                    ->toArray();


       
        $query = DB::table('product_out')                        
                        ->join('product','product_out.product_id', '=','product.id')                        
                        ->join('seller_profiles','product_out.seller_id', '=','seller_profiles.users_id')                        
                        ->leftJoin('category','product_out.category_id', '=','category.id')                        
                        ->leftJoin('brands','product_out.brand_id', '=','brands.id')                        
                        ->leftJoin('color','product_out.color_id', '=','color.id')                        
                        ->leftJoin('size','product_out.size_id', '=','size.id')                        
                        ->select('product_out.product_quantity',
                            'product_out.product_out_date',
                            'product.title as pro_name',
                            'seller_profiles.shop_name as shop_name',
                            'category.title as cat_name',
                            'brands.title as brand_name',
                            'color.title as color_title',
                            'size.title as size_title',
                        );

        
    
        $requestMethod = $request->method();

        if($this->isGetRequest() == $requestMethod)
        {
            // Search data found
            if ($request->product_id) {
                $query->where('product_out.product_id',$request->product_id);
            }

            if ($request->category_id) {
                $query->where('product_out.category_id',$request->category_id);
            }

            if ($request->brand_id) {
                $query->where('product_out.brand_id',$request->brand_id);
            }

            if ($request->seller_id) {
                $query->where('product_out.seller_id',$request->seller_id);
            }

            if ($request->size_id) {
                $query->where('product_out.size_id',$request->size_id);
            }

            if ($request->color_id) {
                $query->where('product_out.color_id',$request->color_id);
            }           
            

            if ($request->from_date && $request->to_date){
                $startDate   = date('Y-m-d H:i:s', strtotime($request->from_date));
                $endDate     = date('Y-m-d H:i:s', strtotime($request->to_date));
                $query       = $query->whereBetween('product_out.product_out_date', [$startDate, $endDate]);
            }

            if (isset($request->from_date) && !isset($request->to_date)){
                $query = $query->whereDate('product_out.product_out_date', '>=', date('Y-m-d H:i:s', strtotime($request->from_date)));
            }

            if (!isset($request->from_date) && isset($request->to_date)){
                $query = $query->whereDate('product_out.product_out_date', '<=', date('Y-m-d H:i:s', strtotime($request->to_date)));
            }                       
        }

        $data= $query->orderBy('product_out.product_out_date','DESC')
                        ->get();

        return view('Reports::reports.report_product_out', [
            'pageTitle'     => $pageTitle,
            'proList'       => $proList,
            'brandList'     => $brandList,
            'catList'       => $catList,
            'sellerList'    => $sellerList,
            'sizeList'      => $sizeList,
            'colorList'     => $colorList,
            'data'          => $data,
        ]);

    }







   

}





