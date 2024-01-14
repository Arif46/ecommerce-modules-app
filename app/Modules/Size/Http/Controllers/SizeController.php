<?php

namespace App\Modules\Size\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Size\Requests;
use App\Modules\Size\Models\Size;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SizeController extends Controller
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
        $pageTitle = "List of size";

        // Get brand data
        $data = Size:: select('size.*')
                ->paginate(30);
                
        return view("Size::size.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New size";

        // return View
        return view("Size::size.create")->with('pageTitle',$pageTitle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\SizeRequest $request)
    {

        // Get all input data
        $input = $request->all();

        // Check already presents or not
        $data = Size::where('slug',$input['slug'])->exists();

        if(!$data )
        {
            try {
                // Store cateogory data
                $brand_data = Size::create($input);
                Session::flash('message', 'successfully added');
                return redirect('admin-size-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'size already added!');
        }
        return redirect()->back();



    }

 
    public function show($id)
    {

        $pageTitle = 'View Brand Informations';

        // Find brand data
        $data = Size::where('size.id', $id)
            ->select('size.*')
            ->first();

        if(!empty($data))
        {
            // If found brand
            return view("Size::size.show", compact('data','pageTitle'));

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
        $pageTitle = "Update size";

        // Find brand
        $data = Size::where('size.id', $id)
            ->select('size.*')
            ->first();

        // If brand not found
        if(empty($data)){
            Session::flash('danger', 'size not found.');
            return redirect()->route('admin.size.index');
        }

        return view("Size::size.edit", compact('data','pageTitle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SizeRequest $request, $id)
    {
        $input = $request->all();

        // Find Size
        $model = Size::where('size.id', $id)
            ->select('size.*')
            ->first();
        try {
            // Update brand
            $result = $model->update($input);

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-size-index');
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

        $model = Size::where('size.id', $id)
            ->select('size.*')
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
        $model = new Size();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);
            $model = $model->where(function ($query) use($search_keywords){
                $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('description', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->select('size.*')->paginate(30);
        }else{

            // If get data not found
            $data = Size::select('size.*')
                ->paginate(30);
        }

        // Return view
        return view("Size::size.index", compact('data','pageTitle'));


    }


}



