<?php

namespace App\Modules\Cms\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Cms\Models\Cms;
use App\Modules\Cms\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CmsController extends Controller
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

        $pageTitle = "List of cms";

        // Get data
        $data = Cms::all()->sortBy('ordering');

        // return view
        return view("Cms::cms.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add cms";

        // return View
        return view("Cms::cms.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CmsRequest $request)
    {
        // Get all input data
        $input = $request->all();
        
        $data = Cms::where('title',$input['title'])->exists();

        if( !$data )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                // Store data 
                $cms_data = Cms::create($input);
                
                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-cms-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This Cms already added!');
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
        $pageTitle = 'View cms';

        // Find data
        $data = Cms::where('id', $id)->first();                    

        if(!empty($data))
        {
            // If found category
            return view("Cms::cms.show", compact('data','pageTitle'));

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
       $pageTitle = "Update cms";

        // Find data
        $data = Cms::where('cms.id', $id)
                        ->select('cms.*')
                        ->first();

        // If data not found                
        if(empty($data)){
            Session::flash('danger', 'Cms not found.');
            return redirect()->route('admin.cms.index');
        }

        // Return view
        return view("Cms::cms.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CmsRequest  $request, $id)
    {
        $input = $request->all();    

        // Find data
        $model = Cms::where('cms.id', $id)
                        ->select('cms.*')
                        ->first();

        DB::beginTransaction();
        try {
            // Update data
            $result = $model->update($input);

            DB::commit();
    
            Session::flash('message', 'Successfully updated!');
            return redirect('admin-cms-index');
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
        $model =  Cms::where('cms.id', $id)
                        ->select('cms.*')
                        ->first();
        DB::beginTransaction();
        try {
            // Category update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }

            if($model->save())
            {
                $model->delete();
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

        
        $pageTitle = 'Cms information';

        // Cms model initialize
        $model = new Cms();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('cms.status', 'LIKE', '%'.$search_keywords.'%');
                    
                });
            $data = $model->select('cms.*')->paginate(30);
        }else{

            // If get data not found
            $data = Cms::paginate(30);
        }

        // Return view
        return view("Cms::cms.index", compact('data','pageTitle'));
        

    }

    public function changeCmsOrder(Request $request)
    {
        //dd($request->all());
        if (count($request->ordering)){
            $status = DB::transaction(function () use ($request) {
                $status['status'] = 0;
                $status['message'] = 'Invalid Request';
                try {
                    foreach ($request->ordering as $single){
                        $data['ordering'] =$single['ordering'];
                        $data['updated_by'] = Auth::id();
                        Cms::where('id','=',$single['id'])
                            ->update($data);
                    }
                    $status['status'] = 1;
                    $status['message'] = 'Ordering Done';
                }catch (\Exception $e){
                    //dd($e->getMessage());
                    $status['status'] = 0;
                    $status['message'] = 'Something wrong';
                }
                return $status;
            });
            return $status;
        }
    }
}
