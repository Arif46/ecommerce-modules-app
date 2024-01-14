<?php

namespace App\Modules\Attribute\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Attribute\Models\Attribute;
use App\Modules\Attribute\Models\AttributeOption;
use App\Modules\Attribute\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App;


class AttributeController extends Controller
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
     * AttributeController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "List of Attribute";

        // Get Attribute data
        $data = Attribute::whereNotIn('status',['cancel'])->orderBy('id','desc')->get();

        // return view
        return view("Attribute::attribute.index",compact('pageTitle','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add new attribute";
        // return View
        return view("Attribute::attribute.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AttriubteRequest $request)
    {
        // Get all input data
        $input = $request->all();

        dd($input);

        $input['code_column'] = str_slug($input['code_column']);

        // Check already presents or not
        $data = Attribute::where('code_column',$input['code_column'])->exists();

        if( !$data )
        {            

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                $attributedata = Attribute::create($input);

                DB::commit();

                Session::flash('message', 'successfully added!');
                return redirect('admin-attribute-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This attribute already added!');
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
        $pageTitle = 'View attribute';

        // Find category data
        $data = Attribute::find($id);

        if(!empty($data))
        {
            // If found category
            return view("Attribute::attribute.show", compact('data','pageTitle'));

        }else{
            // If category not found
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
       $pageTitle = "Update attribute";

        // Find Attribute
        $data = Attribute::find($id);

        // If attribute not found                
        if(empty($data)){
            Session::flash('danger', 'Attribute not found.');
            return redirect()->route('admin.attribute.index');
        }


        // Return view
        return view("Attribute::attribute.edit", compact('data','pageTitle'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\AttriubteRequest $request, $id)
    {
        $input = $request->all();

        // Find Attribute 
        $model = Attribute::where('attribute.id', $id)
            ->select('attribute.*')
            ->first();

        DB::beginTransaction();
        try {
            $input['code_column'] = str_slug($input['code_column']);
            // Update attribute
            $result = $model->update($input);

            DB::commit();

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-attribute-index');
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
        $model = Attribute::where('attribute.id', $id)
            ->select('attribute.*')
            ->first();

        DB::beginTransaction();
        try {
            // Attribute update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }

            $model->save();
           
            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        
        // redirect to current page
        return redirect()->back();
    } 

    public function attr_option($id)
    {
       $pageTitle = "Attribute Option";

        // Find Attribute option
        $data = Attribute::find($id);
        $attid=$data->id;

        // If  Attribute option not found                
        if(empty($data)){
            Session::flash('danger', 'Attribute not found.');
            return redirect()->route('admin.attribute.index');
        }

        // Attribute option
        $attr_option = AttributeOption::where('attribute_id',$data->id)->get();

        // Return view
        return view("Attribute::attribute.attr_option", compact('data','pageTitle','attr_option','attid'));
    }

    public function store_option(Requests\AttriubteOptionRequest $request )
    {
        // Get all input data
        $input = $request->all();


        $input['slug'] = str_slug($input['slug']);

        // Check already presents or not
        $data = AttributeOption::where('attribute_id',$input['attribute_id'])->where('slug',$input['slug'])->exists();

        if( !$data )
        {
            

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                $attributeOptionData = AttributeOption::create($input);

                DB::commit();

                Session::flash('message', 'Successfully added!');
                

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This attribute Option already added!');
        }
        return redirect()->back();
    }


    public function destroy_option($id)
    {
        $model = AttributeOption::where('attribute_option.id', $id)
            ->select('attribute_option.*')
            ->first();

        DB::beginTransaction();
        try {
            // Attribute option destroy
            $model->delete();
           
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

        
        $pageTitle = 'Attribute List';

        // Attribute set model initialize
        $model = new Attribute();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim(Input::get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('frontend_title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('attribute.status', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('code_column', 'LIKE', '%'.$search_keywords.'%');
                });
            $data = $model->select('attribute.*')->orderBy('id','desc')->paginate(30);
        }else{

            // If get data not found
            $data = Attribute::orderBy('id','desc')->paginate(30);
        }

        // Return view
        return view("Attribute::attribute.index", compact('data','pageTitle'));
        

    }

    // attribute option edit
   
    public function edit_option($id)
    {
        $pageTitle = "Update attribute option";

        // Find Attribute
         $data_option = AttributeOption::find($id);
         $attid=$data_option->attribute_id;


        // If attribute not found                
        if(empty($data_option)){
            Session::flash('danger', 'Attribute not found.');
            return redirect()->route('admin.attribute.index');
        }


        // Return view
        return view("Attribute::attribute.edit_option", compact('data_option','pageTitle','attid'));
    }


    // attribute option update

    public function update_option(Requests\AttriubteOptionRequest $request, $id)
    {
        $input = $request->all();

        // Find Attribute option
        $model = AttributeOption::where('attribute_option.id', $id)
            ->select('attribute_option.*')
            ->first();

        DB::beginTransaction();
        try {
            $input['slug'] = str_slug($input['slug']);

            // Update attribute option

            $result = $model->update($input);

            DB::commit();

            Session::flash('message', 'Successfully updated!');
            
        }
        catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        // return redirect()->back();
        return redirect()->route('admin.attribute.index');

    }


}
