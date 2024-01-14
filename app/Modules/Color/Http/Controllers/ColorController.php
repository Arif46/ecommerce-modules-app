<?php

namespace App\Modules\Color\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Color\Requests;
use App\Modules\Color\Models\Color;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ColorController extends Controller
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
        $pageTitle = "List of Color";

        // Get brand data
        $data = Color:: select('color.*')
                ->paginate(30);
        // return view
        return view("Color::color.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Color";

        // return View
        return view("Color::color.create")->with('pageTitle',$pageTitle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ColorRequest $request)
    {
        // Get all input data
        $input = $request->all();

        // Check already presents or not
        $data = Color::where('slug',$input['slug'])->exists();

        if(!$data )
        {
            try {
                // Store cateogory data
                $brand_data = Color::create($input);
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

        $pageTitle = 'View Brand Informations';

        // Find brand data
        $data = Color::where('color.id', $id)
            ->select('color.*')
            ->first();

        if(!empty($data))
        {
            // If found brand
            return view("Color::color.show", compact('data','pageTitle'));

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
        $data = Color::where('color.id', $id)
            ->select('color.*')
            ->first();

        // If brand not found
        if(empty($data)){
            Session::flash('danger', 'Color not found.');
            return redirect()->route('admin.color.index');
        }

        return view("Color::color.edit", compact('data','pageTitle'));

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
        $model = Color::where('color.id', $id)
            ->select('color.*')
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

        $model = Color::where('color.id', $id)
            ->select('color.*')
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
        $model = new Color();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);
            $model = $model->where(function ($query) use($search_keywords){
                $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('color_code', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->select('color.*')->paginate(30);
        }else{
            // If get data not found
            $data = Color::select('color.*')
                ->paginate(30);
        }
        // Return view
        return view("Color::color.index", compact('data','pageTitle'));


    }


}

