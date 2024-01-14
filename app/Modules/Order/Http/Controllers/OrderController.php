<?php

namespace App\Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Order\Models\OrderHead;
use App\Modules\Order\Models\OrderShipping;
use App\Modules\Order\Models\OrderDetails;

class OrderController extends Controller
{

    /**
     * @return bool
     */
     protected function isGetRequest($requestMethod){
        return $requestMethod == "GET";
    }


    /**
     * @return bool
     */
    protected function isPostRequest($requestMethod){
        return $requestMethod == "POST";
    }

    /**
     * OrderController constructor.
     */
    public function __construct()
    {

    }

    public function order_index()
    {
        $pageTitle = "All Order list";
      
         $verifaid_user = OrderDetails::join('seller_profiles', 'order_details.product_seller_id', '=', 'seller_profiles.users_id')->first();
             
        //dd($verifaid_user);

        $data = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                        ->join('seller_profiles','seller_profiles.users_id','=','order_details.product_seller_id')
                        ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price','seller_profiles.shop_name')     
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30);        


        return view('Order::order.index', [
            'pageTitle' => $pageTitle,
            // 'verifaid_user' => $verifaid_user,            
            'data' => $data
        ]);
    }


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function order_report($status)
    {
        $pageTitle = "Admin Order list";
        // $data =Auth::guard()->user();

       if($status == 'cancel'){
          // Total order pending
       $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
        ->join('seller_profiles','seller_profiles.users_id','=','order_details.product_seller_id')
                        ->where('order_details.status','cancel')
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(20);
                        }

        if($status == 'active'){
          // Total order pending
        $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
        ->join('seller_profiles','seller_profiles.users_id','=','order_details.product_seller_id')
                        ->where('order_details.status','active')                  
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(20);
                        }
   

        if($status == 'confirmed'){
            // Total order approved
        $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
        ->join('seller_profiles','seller_profiles.users_id','=','order_details.product_seller_id')
                        ->where('order_details.status','confirmed')
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(20);
                      } 

        if($status == 'processing'){
          // Total order pending
        $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
        ->join('seller_profiles','seller_profiles.users_id','=','order_details.product_seller_id')
                        ->where('order_details.status','processing')
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(20);
                        }

        if($status == 'delivered'){

        // Total order delivered
          $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
          ->join('seller_profiles','seller_profiles.users_id','=','order_details.product_seller_id')                       
                        ->where('order_details.status','delivered')
                        ->orderBy('order_details.id', 'desc')
                        ->paginate(20);
                }

        return view('Order::order.order_report', [
            'pageTitle' => $pageTitle,
            // 'data' => $data,
            'orderdata' => $orderdata            
        ]);
    }

    
    public function index()
    {
        return view("Order::index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
       
        // $data = OrderHead::with('relOrderDetail', 'relOrderShipping')->where('order_head.id', $id)->first();
        $data = OrderHead::with(['relOrderShipping','relOrderDetail.relProduct'=>function($query){}])->where('order_head.id', $id)->first();

        
        //Print the values
        //dd($data);
       
        $pageTitle = 'Invoice Number :: ' . $data->order_number;

        $billing = OrderShipping::where('order_head_id', $data->id)->where('type', 'billing')->first();
        $shipping = OrderShipping::where('order_head_id', $data->id)->where('type', 'shipping')->first();

        return view('Order::order.show', ['data' => $data,
            'pageTitle' => $pageTitle,
            'billing' => $billing,
            'shipping' => $shipping
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {

        
        $pageTitle = 'Order information';

        // Payment options model initialize
        $model = new OrderHead();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('order_number', 'LIKE', '%'.$search_keywords.'%');
                    
                });
            $data = $model->join('order_details','order_details.order_head_id','=','order_head.id')
                        ->join('seller_profiles','seller_profiles.users_id','=','order_details.product_seller_id')
                        ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price','seller_profiles.shop_name')     
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30); 
        }else{

            // If get data not found
            $data = OrderHead::paginate(30);
        }

        // Return view
        return view("Order::order.index", compact('data','pageTitle'));
        

    }
}
