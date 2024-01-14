<?php

namespace App\Modules\Common\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Seller\Models\Coupon;
use App\Modules\Common\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CouponController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $pageTitle = "List of coupon";

        // Get data
        $data = Coupon::all();

        // return view
        return view("Common::coupon.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add coupon";

        // return View
        return view("Common::Coupon.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CouponRequest $request)
    {
        // Get all input data
        dd($request->all());
        $input = $request->only('coupon_name', 'coupon_name_bn', 'coupon_name_ch', 'coupon_code', 'calculation_type', 'amount',
            'coupon_percentage', 'coupon_details','valid_from','valid_to','coupon_type','isForTopBuyers','how_many_top_buyers','start_coupon','end_coupon','status');
        $input = $request->all();
        $rules = array(
            'name' => 'required|max:255',
            'employee_code' => 'nullable|max:255|unique:users',
            'email' => 'email|max:255|unique:users',
            'gender' => 'required',
            'picture' => 'unique:users|mimes:jpeg,JPEG,JPG,jpg,png,PNG|max:1000',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        );
        $validator = \Validator::make($input, $rules);

        if ($validator->passes()) {

        }
        $data = Coupon::where('coupon_code',$input['coupon_code'])->exists();

        if( !$data )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store data
                $coupon_data = Coupon::create($input);
//                dd($coupon_data);
                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-coupon-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This Coupon code already added!');
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
        $pageTitle = 'View coupon';

        // Find data
        $data = Coupon::where('id', $id)->first();

        if(!empty($data))
        {
            // If found coupon
            return view("Common::coupon.show", compact('data','pageTitle'));

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
       $pageTitle = "Update coupon";

        // Find data
        $data = Coupon::where('id', $id)->first();

        // If data not found
        if(empty($data)){
            Session::flash('danger', 'Shipping Options not found.');
            return redirect()->route('admin.coupon.index');
        }

        // Return view
        return view("Common::coupon.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CouponRequest  $request, $id)
    {
        $input = $request->all();

        // Find data
        $model = Coupon::where('id', $id)->first();

        DB::beginTransaction();
        try {
            // Update data
            $result = $model->update($input);

            DB::commit();

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-coupon-index');
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
            // Coupon delete
            $model =  Coupon::where('id', $id)->delete();

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


        $pageTitle = 'Coupon information';

        // Coupon model initialize
        $model = new Coupon();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('coupon_code', 'LIKE', '%'.$search_keywords.'%');

                });
            $data = $model->paginate(30);
        }else{

            // If get data not found
            $data = Coupon::paginate(30);
        }

        // Return view
        return view("Common::coupon.index", compact('data','pageTitle'));


    }
}
