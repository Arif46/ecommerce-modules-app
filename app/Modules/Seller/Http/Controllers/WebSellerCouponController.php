<?php
	
namespace App\Modules\Seller\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use App\Modules\Seller\Models\Coupon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App;


class WebSellerCouponController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function isGetRequest()
    {
        return Request::server("REQUEST_METHOD") == "GET";
    }


    /**
     * @return bool
     */
    protected function isPostRequest()
    {
        return Request::server("REQUEST_METHOD") == "POST";
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        $pageTitle = 'Seller coupon';

        $data = Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.id', 'seller_profiles.shop_name')->first();

        $coupon = Coupon::where('seller_id', $data->id)->orderBy('id', 'desc')->paginate(30);

        return view('Seller::webseller_coupon.index', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'verifaid_user' => $verifaid_user,
            'coupon' => $coupon
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add new create";

        // return View
        return view("Seller::webseller_coupon.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get all input data
        $input = $request->all();

        $data = Auth::user();

        $input['seller_id'] = $data->id;

        // Check already presents or not
        $data = Coupon::where('coupon_code',$input['coupon_code'])->where('seller_id',$data->id)->exists();
       
        if( !$data )
        {            
            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                $couponData = Coupon::create($input);

                DB::commit();

                Session::flash('message', 'successfully added!');
                return redirect()->route('seller.coupon');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This coupon already added!');
        }
        return redirect()->back();
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

        // Find Coupon
        $data = Coupon::find($id);

        // If coupon not found                
        if(empty($data)){
            Session::flash('danger', 'Coupon not found.');
            return redirect()->route('seller.coupon');
        }


        // Return view
        return view("Seller::webseller_coupon.edit", compact('data','pageTitle'));
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
        $input = $request->all();

        // Find Coupon
        $model = Coupon::where('id', $id)
            ->first();

        DB::beginTransaction();
        try {
           
            $result = $model->update($input);

            DB::commit();

            Session::flash('message', 'Successfully updated!');
            return redirect()->route('seller.coupon');
        }
        catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();

    }

}