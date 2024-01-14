<?php

namespace App\Modules\Commission\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Commission\Requests;
use App\Modules\Commission\Models\Commission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class CommissionController extends Controller
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
        $pageTitle = "List of Commission";

        // Get brand data
        $data = Commission:: select('commissions.*')
            //->orderby('Brand.short_order','asc')
            ->paginate(30);

           //dd($data);
            //dd(Commission::getCommissionListBn());

        // return view
        return view("Commission::commission.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Commission ";

        // return View
        return view("Commission::commission.create")->with('pageTitle',$pageTitle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CommissionRequests $request)
    {

        // Get all input data
        $input = $request->all();

       //dd($input);

        // Check already presents or not
        $data = Commission::where('slug',$input['slug'])->exists();

        if(!$data )
        {
            try {
                // Store cateogory data
                $brand_data = Commission::create($input);
                Session::flash('message', 'successfully added');
                return redirect('admin-commission-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                Session::flash('danger', $e->getMessage());

                dd($e->getMessage());
            }

        }else{
            Session::flash('info', 'Commission type already added!');
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

        $pageTitle = 'View Brand Informations';

        // Find brand data
        $data = Commission::where('commissions.id', $id)
            ->select('commissions.*')
            ->first();

        if(!empty($data))
        {
            // If found brand
            return view("Commission::commission.show", compact('data','pageTitle'));

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
        $pageTitle = "Update commission";

        // Find brand
        $data = Commission::where('commissions.id', $id)
            ->select('commissions.*')
            ->first();

        // If brand not found
        if(empty($data)){
            Session::flash('danger', 'Commission not found.');
            return redirect()->route('admin.commission.index');
        }

        return view("Commission::commission.edit", compact('data','pageTitle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CommissionRequests $request, $id)
    {


        $input = $request->all();


        // Find catgory
        $model = Commission::where('commissions.id', $id)
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
        $model = new Commission();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);

            $model = $model->where(function ($query) use($search_keywords){
                $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('title_bn', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('title_hi', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('title_ch', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->select('commissions.*')->paginate(30);
        }else{

            // If get data not found
            $data = Commission::select('commissions.*')
                ->paginate(30);
        }

        // Return view
        return view("Commission::commission.index", compact('data','pageTitle'));


    }


}

