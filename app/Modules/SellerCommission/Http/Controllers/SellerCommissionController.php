<?php

namespace App\Modules\SellerCommission\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\SellerCommission\Requests;
use App\Modules\SellerCommission\Models\SellerCommission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Modules\Seller\Models\Seller;
use App\Modules\Commission\Models\Commission;
use App\Modules\SellerCommission\Validations\SellerCommissionValidations;



class SellerCommissionController extends Controller

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
     * BrandController constructor.
     */
    public function __construct()
    {
        //
    }

   
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "List of Seller Commission";


        // Get Seller Commission
        $data = SellerCommission::select('seller_commissions.*','seller_profiles.shop_name')
                ->join('seller_profiles','seller_commissions.seller_id','seller_profiles.users_id')  
                ->where('seller_commissions.status',1)          
            ->paginate(30);
            
        // return view
        return view("SellerCommission::seller-commission.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Commission ";

        $sellerList = Seller::sellerList(); 
        $commissionList = Commission::getCommissionList();

        // return View
        return view("SellerCommission::seller-commission.create", compact('sellerList','commissionList','pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\SellerCommissionRequests $request)
    {

        // Get all input data
        $input = $request->all();

        //Active date
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d-m-y H:i:s');        
        $input['from_date'] = $date;  

        $previoueCommission =SellerCommission::where('seller_id',$input['seller_id'])
                                                ->latest()
                                                ->first();
       // dd($previoueCommission);
        if($previoueCommission =!null){
            $previoueCommission->status = 2;
            $previoueCommission->to_date = $date;
            $previoueCommission->update();

        }


      
        if($input['commission_id'] !="" && $input['commission_id'] !=null){
            $commission = Commission::find($input['commission_id']);
            $input['percentage'] = $commission->percentage;
            
        }
        $input['status'] = 1;

          
            
        $data = SellerCommission::where('slug',$input['slug'])->exists();

        if(!$data )
        {
            try {
                // Store cateogory data
                $brand_data = SellerCommission::create($input);
                Session::flash('message', 'successfully added');
                return redirect('admin-seller-commission-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                Session::flash('danger', $e->getMessage());

                dd($e->getMessage());
            }

        }else{
            Session::flash('info', 'Commission type already added!');
        }
        return redirect()->route('admin.seller.commission.index');

    }

 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pageTitle = 'View Brand Informations';

        $data = SellerCommission::select('seller_commissions.*','seller_profiles.shop_name')
                ->join('seller_profiles','seller_commissions.seller_id','seller_profiles.users_id')
                ->where('seller_commissions.id', $id)
                ->first();

        if(!empty($data))
        {
            // If found brand
            return view("SellerCommission::seller-commission.show", compact('data','pageTitle'));

        }else{
            // If brand not found
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
        $pageTitle = "Update Seller commission";

        $sellerList = Seller::sellerList(); 
        $commissionList = Commission::getCommissionList();

        // Find brand
        $data = SellerCommission::where('seller_commissions.id', $id)
            ->select('seller_commissions.*')
            ->first();

        // If brand not found
        if(empty($data)){
            Session::flash('danger', 'Commission not found.');
            return redirect()->route('admin.seller.commission.index');
        }

        return view("SellerCommission::seller-commission.edit", compact('pageTitle','data','sellerList','commissionList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SellerCommissionRequests $request, $id)
    {


        $input = $request->all();


        // Find catgory
        $model = SellerCommission::where('commissions.id', $id)
            ->select('commissions.*')
            ->first();

        try {
            // Update brand
            $result = $model->update($input);

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-commission-index');
        }
        catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $pageTitle = 'Category Information';

        // Category model initialize
        $model = new Brand();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);
            $model = $model->where(function ($query) use($search_keywords){
                $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('commission.status', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('description', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->select('commission.*')->paginate(30);
        }else{

            // If get data not found
            $data = SellerCommission::select('commission.*')
                ->paginate(30);
        }

        // Return view
        return view("SellerCommission::seller-commission.index", compact('data','pageTitle'));


    }


}