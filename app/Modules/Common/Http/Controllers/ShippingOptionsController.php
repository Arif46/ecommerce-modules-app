<?php

namespace App\Modules\Common\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Seller\Models\DeliveryOption;
use App\Modules\Common\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ShippingOptionsController extends Controller
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

        $pageTitle = "List of shipping options";

        // Get data
        $data = DeliveryOption::all();

        // return view
        return view("Common::shipping_options.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add shipping options";

        // return View
        return view("Common::shipping_options.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ShippingOptionRequest $request)
    {
        // Get all input data
        $input = $request->all();
        
        $data = DeliveryOption::where('shipping_type',$input['shipping_type'])->exists();

        if( !$data )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store data 
                $faq_data = DeliveryOption::create($input);
                
                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-shipping-options-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This Shipping Options already added!');
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
        $pageTitle = 'View shipping options';

        // Find data
        $data = DeliveryOption::where('id', $id)->first();                    

        if(!empty($data))
        {
            // If found shipping options
            return view("Common::shipping_options.show", compact('data','pageTitle'));

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
       $pageTitle = "Update shipping options";

        // Find data
        $data = DeliveryOption::where('id', $id)->first();

        // If data not found                
        if(empty($data)){
            Session::flash('danger', 'Shipping Options not found.');
            return redirect()->route('admin.shipping.options.index');
        }

        // Return view
        return view("Common::shipping_options.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ShippingOptionRequest  $request, $id)
    {
        $input = $request->all();    

        // Find data
        $model = DeliveryOption::where('id', $id)
                        ->first();

        DB::beginTransaction();
        try {
            // Update data
            $result = $model->update($input);

            DB::commit();
    
            Session::flash('message', 'Successfully updated!');
            return redirect('admin-shipping-options-index');
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
        
        DB::beginTransaction();
        try {
            // Shipping options delete
            $model =  DeliveryOption::where('id', $id)->delete();

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

        
        $pageTitle = 'Shipping options information';

        // Shipping options model initialize
        $model = new DeliveryOption();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('shipping_type', 'LIKE', '%'.$search_keywords.'%');
                    
                });
            $data = $model->paginate(30);
        }else{

            // If get data not found
            $data = DeliveryOption::paginate(30);
        }

        // Return view
        return view("Common::shipping_options.index", compact('data','pageTitle'));
        

    }
}
