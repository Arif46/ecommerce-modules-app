<?php

namespace App\Modules\SellerControl\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\SellerControl\Requests;
use App\Modules\SellerControl\Models\SellerVerificationDocumentSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SellerVerificationDocumentSettingsController extends Controller
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

   
    public function __construct()
    {
        //
    }


 
    public function index()
    {
        $pageTitle = "List of seller control settings";

        // Get brand data
        $data = SellerVerificationDocumentSettings:: select('seller_verification_document_settings.*')
                ->paginate(30);
        // return view
        return view("SellerControl::settings.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add new settings";

        // return View
        return view("SellerControl::settings.create")->with('pageTitle',$pageTitle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\SettingsRequest $request)
    {
        // Get all input data
        $input = $request->all();


        dd($input['document_type'][0]);

        // Check already presents or not
        $data = SellerVerificationDocumentSettings::where('slug',$input['slug'])->exists();

        if(!$data )
        {
            try {
                // Store cateogory data
                $brand_data = SellerVerificationDocumentSettings::create($input);
                Session::flash('message', 'successfully added');
                return redirect('admin-color-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'color already added!');
        }
        return redirect()->back();

    }

 
    public function show($id)
    {

        $pageTitle = 'View settings informations';

        // Find brand data
        $data = SellerVerificationDocumentSettings::where('color.id', $id)
            ->select('color.*')
            ->first();

        if(!empty($data))
        {
            // If found brand
            return view("SellerControl::settings.show", compact('data','pageTitle'));

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
        $pageTitle = "Update Color";

        // Find brand
        $data = SellerVerificationDocumentSettings::where('seller_verification_document_settings.id', $id)
            ->select('seller_verification_document_settings.*')
            ->first();

        // If brand not found
        if(empty($data)){
            Session::flash('danger', 'Color not found.');
            return redirect()->route('admin.color.index');
        }

        return view("SellerControl::settings.edit", compact('data','pageTitle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ColorRequest $request, $id)
    {

        $input = $request->all();

        // Find catgory
        $model = SellerVerificationDocumentSettings::where('seller_verification_document_settings.id', $id)
            ->select('seller_verification_document_settings.*')
            ->first();
        try {
            // Update brand
            $result = $model->update($input);

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-color-index');
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
        // Find brand

        $model = SellerVerificationDocumentSettings::where('seller_verification_document_settings.id', $id)
            ->select('seller_verification_document_settings.*')
            ->first();

        DB::beginTransaction();
        try {
            // brand update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }

            $model->save();

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $pageTitle = 'Category Information';

        // Category model initialize
        $model = new SellerVerificationDocumentSettings();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);
            $model = $model->where(function ($query) use($search_keywords){
                $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('color_code', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->select('seller_verification_document_settings.*')->paginate(30);
        }else{
            // If get data not found
            $data = SellerVerificationDocumentSettings::select('seller_verification_document_settings.*')
                ->paginate(30);
        }
        // Return view
        return view("SellerControl::settings.index", compact('data','pageTitle'));


    }


}
