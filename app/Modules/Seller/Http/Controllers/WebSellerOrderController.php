<?php


namespace App\Modules\Seller\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Order\Models\OrderHead;

use App\User;
use App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WebSellerOrderController extends Controller
{
	/**
     * @return bool
     */
    protected function isGetRequest(){
        return Request::server("REQUEST_METHOD") == "GET";
    }


    /**
     * @return bool
     */
    protected function isPostRequest(){
        return Request::server("REQUEST_METHOD") == "POST";
    }

    public function __construct()
    {
        
    }

    public function index()
    {
        $pageTitle = "Seller order list";
        $data = Auth::user();

        $verifaid_user =User::join('seller_profiles','users.id','=','seller_profiles.users_id')->where('users.id',$data->id)->select('users.email', 'users.id','seller_profiles.shop_name')->first();

        $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                        ->where('order_details.product_seller_id',Auth::user()->id)
                        ->orderBy('order_head.id', 'desc')
                        // ->select('order_details.*','order_head.order_number','order_head.date')
                        ->paginate(30);             


        return view('Seller::webseller_order.index', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'orderdata' => $orderdata,
            'verifaid_user' => $verifaid_user
        ]);
    }

    public function order_report($status)
    {
        $pageTitle = "Seller order list";
        $data = Auth::user();

        $verifaid_user =User::join('seller_profiles','users.id','=','seller_profiles.users_id')->where('users.id',$data->id)->select('users.email', 'users.id','seller_profiles.shop_name')->first();


       if($status == 'cancel'){
          // Total order pending
       $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                        ->where('order_details.product_seller_id',Auth::user()->id)
                        ->where('order_details.status','cancel')
                        // ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price')
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30);
                   		}
                   		

 		if($status == 'active'){
          // Total order pending
        $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                        ->where('order_details.product_seller_id',Auth::user()->id)
                        ->where('order_details.status','active')
                        // ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price')
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30);
                   		}

		if($status == 'confirmed'){
        	// Total order approved
        $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                        ->where('order_details.product_seller_id',Auth::user()->id)
                        ->where('order_details.status','confirmed')
                        // ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price')
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30);
                      } 

		if($status == 'processing'){
          // Total order pending
        $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                        ->where('order_details.product_seller_id',Auth::user()->id)
                        ->where('order_details.status','processing')
                        // ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price')
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30);
                   		}

		if($status == 'delivered'){

        // Total order delivered
          $orderdata = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                        ->where('order_details.product_seller_id',Auth::user()->id)
                        ->where('order_details.status','delivered')
                        // ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price')
                        ->orderBy('order_details.id', 'desc')
                        ->paginate(30);
  				}

        return view('Seller::webseller_order.index', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'orderdata' => $orderdata,
            'verifaid_user' => $verifaid_user
        ]);
    }


     public function show($id)
    {

        $pageTitle = 'Order Details';

        if(Session::has('user_email')){
            $user_email = Session::get('user_email');
        }

        $user_data = Auth::user();
        

        if(!empty($user_data) && $user_data->type == 'seller'){

            $order_data = DB::table('order_details')->join('order_head','order_head.id','=','order_details.order_head_id')->where('order_details.id',$id)->where('product_seller_id',$user_data->id)
            // ->select('order_head.*')
            ->first();
// dd($order_data->product_seller_id);
            if(!empty($order_data)){

                $data = OrderHead::with(['relOrderShipping','relOrderDetail.relProduct'=>function($query){

                }])
                
                ->where('order_number',$order_data->order_number)
                // ->where($order_data->product_seller_id,$user_data->id)
                ->first();
                
 //dd($data);
                return view('Seller::webseller_order.show_order', [
                  'pageTitle'=>$pageTitle,
                  'data' => $data,
                  'id' => $id
                ]);

            }

            

        }else{
          Session::flash('error', 'Sorry you are not a seller.');  
        }
              
    }

 public function track($id)
    {

        $pageTitle = 'Order Tracking';

        if(Session::has('user_email')){
            $user_email = Session::get('user_email');
        }

        $user_data = Auth::user();

        if(!empty($user_data) && $user_data->type == 'seller'){

            $order_data = DB::table('order_details')->join('order_head','order_head.id','=','order_details.order_head_id')->where('order_details.id',$id)->where('product_seller_id',$user_data->id)->select('order_head.*')->first();

            if(!empty($order_data)){

                $data = OrderHead::with(['relOrderShipping','relOrderDetail.relProduct'=>function($query){

                }])->where('order_number',$order_data->order_number)->first();

                return view('Seller::webseller_order.track_order', [
                  'pageTitle'=>$pageTitle,
                  'data' => $data,
                  'id' => $id
                ]);

            }

            

        }else{
          Session::flash('error', 'Sorry you are not a seller.');  
        }
              
    }

   
    public function track_update(Request $request, $id){

    		$pageTitle = 'Order Tracking';
			
			$user_data = Auth::user();
			$request = $request['status'];

      $order_details_data = DB::table('order_details')->where('id',$id)->where('product_seller_id',$user_data->id)->first();

        //dd($order_details_data);

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            
            if(!empty($order_details_data)){
                // Order Details Update
                DB::table('order_details')
                ->where('id', $id)
                ->update(['status' => $request]); 

                // Order Head Update
                DB::table('order_head')
                ->where('id', $order_details_data->order_head_id)         
                ->update(['status' => 'confirmed']);    

                // Order Transaction Update
                DB::table('order_transaction')
                ->where('order_head_id', $order_details_data->order_head_id)
                ->update(['status' => 'active']);    

                DB::commit();

                Session::flash('message', "Order status is updated");

                $data = OrderHead::with(['relOrderShipping','relOrderDetail.relProduct'=>function($query){

                }])->where('id',$order_details_data->order_head_id)->first();
            
            if(!empty($data)){
                
                return view('Seller::webseller_order.track_order', [
                  'pageTitle'=>$pageTitle,
                  'data' => $data,
                  'id' => $id
                ]);

              }
               
            }


        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());

            return redirect()->back();
        }  
    }

/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        // Find user
        $pageTitle = "Seller order Edit";
        $user_data = Auth::user();

        $verifaid_user =User::join('seller_profiles','users.id','=','seller_profiles.users_id')->where('users.id',$user_data->id)->select('users.email', 'users.id','seller_profiles.shop_name')->first();

        // If user not found    
        $order_details_data = DB::table('order_details')->where('order_head_id',$id)
                              ->where('order_details.product_seller_id',$user_data->id)->first();                  


        if(!empty($order_details_data)){

            // Return view
            return view('Seller::webseller_order.edit', [
              'pageTitle'=>$pageTitle,
              'verifaid_user' => $verifaid_user,
              'order_details' => $order_details_data
            ]);

        }
        
    }


    public function order_update(){

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            $user_data = Auth::user();

            $order_id = $_POST['order_head_id'];
            $status = $_POST['status'];

            $order_details_data = DB::table('order_details')->where('id',$order_id)->where('product_seller_id',$user_data->id)->first();

                       //dd($order_details_data);

            if(!empty($order_details_data)){
                // Order Details Update
                DB::table('order_details')
                ->where('id', $order_id)
                ->update(['status' => $status]); 

                // Order Head Update
                DB::table('order_head')
                ->where('id', $order_details_data->order_head_id)         
                ->update(['status' => 'confirmed']);    

                // Order Transaction Update
                DB::table('order_transaction')
                ->where('order_head_id', $order_details_data->order_head_id)
                ->update(['status' => 'active']);    

                DB::commit();

                Session::flash('message', "Order status is updated");

                return redirect()->back();
            }


        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
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
        // $model =   Slider::where('slider.id', $id)
        //     ->select('slider.*')
        //     ->first();

        DB::beginTransaction();
        try {
            // Category update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }

            if($model->save())
            {
               
                // $model->delete();
            }

            DB::commit();
            Session::flash('message', "Successfully Cancel.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        
        // redirect to current page
        return redirect()->back();
    }
/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {        
       
        $pageTitle = "Seller order list";
        $data = Auth::user();

        $verifaid_user =User::join('seller_profiles','users.id','=','seller_profiles.users_id')->where('users.id',$data->id)->select('users.email', 'users.id','seller_profiles.shop_name')->first();

        // Payment options model initialize
        $model = new OrderHead();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('order_number', 'LIKE', '%'.$search_keywords.'%');
                    
                });

            $orderdata = $model->join('order_details','order_details.order_head_id','=','order_head.id')
                        ->where('order_details.product_seller_id',Auth::user()->id)
                        ->orderBy('order_head.id', 'desc')                            
                        ->paginate(30);

                        //dd($orderdata); 
        }else{

            // If get data not found
            $orderdata = OrderHead::paginate(30);
        }

        // Return view
        return view("Seller::webseller_order.index", compact('data','pageTitle','orderdata','verifaid_user'));
        

    }


}