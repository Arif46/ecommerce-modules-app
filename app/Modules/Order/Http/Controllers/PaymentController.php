<?php
namespace App\Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Order\Models\OrderTransaction;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller{
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

    public function index(){

    	$pageTitle = "Payment list";
        $data = OrderTransaction::orderBy('id', 'desc')->paginate(30);      

        return view('Order::payment.index', [
            'pageTitle' => $pageTitle,
            'data' => $data
        ]);

    }

    public function payment_report($status)
    {
       $pageTitle = "Payment list";
        // $data = OrderTransaction::orderBy('id', 'desc')->paginate(30); 
     

       if($status == 'cancel'){
          // Total Payment cancel
       $data = OrderTransaction::where('status','cancel')->orderBy('id', 'desc')->paginate(30);
        }
                        

        if($status == 'active'){
        // Total Payment active
       $data = OrderTransaction::where('status','active')->orderBy('id', 'desc')->paginate(30);
                        }
        if($status == 'inactive'){
        // Total Payment active
       $data = OrderTransaction::where('status','inactive')->orderBy('id', 'desc')->paginate(30);
                        }


        return view('Order::payment.payment_report', [
            'pageTitle' => $pageTitle,
            'data' => $data          
        ]);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        // Find category 

        $model = OrderTransaction::where('id', $id)->first();

        DB::beginTransaction();
        try {
            $model->status = 'active';

           $model->save();
          
            DB::commit();
            Session::flash('message', "Successfully activated.");

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
    public function inactive($id)
    {
        // Find category 

        $model = OrderTransaction::where('id', $id)->first();

        DB::beginTransaction();
        try {
            $model->status = 'inactive';

           $model->save();
          
            DB::commit();
            Session::flash('message', "Successfully inactivated.");

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
    public function cancel($id)
    {
        // Find category 

        $model = OrderTransaction::where('id', $id)->first();

        DB::beginTransaction();
        try {
            $model->status = 'cancel';

           $model->save();
          
            DB::commit();
            Session::flash('message', "Successfully canceled.");

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

        
        $pageTitle = 'Payment information';

        // Payment options model initialize
        $model = new OrderTransaction();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('order_head_id', 'LIKE', '%'.$search_keywords.'%');
                    
                });
            $data = $model->orderBy('order_head_id','DESC')->paginate(30);
        }else{

            // If get data not found
            $data = OrderTransaction::paginate(30);
        }

        // Return view
        return view("Order::payment.index", compact('data','pageTitle'));       

    }

}