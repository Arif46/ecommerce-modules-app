<?php

namespace App\Modules\Common\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Common\Models\PaymentOptions;
use App\Modules\Common\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PaymentOptionsController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   

        $pageTitle = "List of payment options";

        // Get data
        $data = PaymentOptions::all();

        // return view
        return view("Common::payment_options.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add payment options";

        // return View
        return view("Common::payment_options.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PaymentOptionRequest $request)
    {
        // Get all input data
        $input = $request->all();
        
        $data = PaymentOptions::where('payment_type',$input['payment_type'])->exists();

        if( !$data )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store data 
                $faq_data = PaymentOptions::create($input);
                
                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-payment-options-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This Pyament Options already added!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'View payment options';

        // Find data
        $data = PaymentOptions::where('id', $id)->first();                    

        if(!empty($data))
        {
            // If found payment options
            return view("Common::payment_options.show", compact('data','pageTitle'));

        }else{
            // If data not found
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
       $pageTitle = "Update payment options";

        // Find data
        $data = PaymentOptions::where('id', $id)
                        ->first();

        // If data not found                
        if(empty($data)){
            Session::flash('danger', 'Payment Options not found.');
            return redirect()->route('admin.payment.options.index');
        }

        // Return view
        return view("Common::payment_options.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PaymentOptionRequest  $request, $id)
    {
        $input = $request->all();    

        // Find data
        $model = PaymentOptions::where('id', $id)
                        ->first();

        DB::beginTransaction();
        try {
            // Update data
            $result = $model->update($input);

            DB::commit();
    
            Session::flash('message', 'Successfully updated!');
            return redirect('admin-payment-options-index');
        }
        catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model =  PaymentOptions::where('id', $id)
                        ->first();
        DB::beginTransaction();
        try {
            // Payment options update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }

            if($model->save())
            {

            }

            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        
        // redirect to current page
        return redirect()->back();
    }

    public function search(Request $request)
    {

        
        $pageTitle = 'Payment options information';

        // Payment options model initialize
        $model = new PaymentOptions();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('payment_type', 'LIKE', '%'.$search_keywords.'%');
                    
                });
            $data = $model->paginate(30);
        }else{

            // If get data not found
            $data = PaymentOptions::paginate(30);
        }

        // Return view
        return view("Common::payment_options.index", compact('data','pageTitle'));
        

    }
}
