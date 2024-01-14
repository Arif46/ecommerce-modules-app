<?php
	namespace App\Modules\Attribute\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;

	use App\Modules\Attribute\Models\AttributeSet;
    use App\Modules\Attribute\Models\AttributeSetItems;
	use App\Modules\Attribute\Requests;

	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Session;

	use App;

	class AttributesetController extends Controller
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
	     * AttributesetController constructor.
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

	        $pageTitle = "List of Attribute Set";

	        // Get Attribute data
	        $data = AttributeSet::whereNotIn('status',['cancel'])->orderBy('id','desc')->get();

	        // return view
	        return view("Attribute::attribute_set.index",compact('pageTitle','data'));
	    }


	    /**
	     * Show the form for creating a new resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function create()
	    {
	         $pageTitle = "Add attribute set";

	        // return View
	        return view("Attribute::attribute_set.create", compact('pageTitle'));
	    }


	    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AttriubteSetRequest $request)
    {
        // Get all input data
        $input = $request->all();

        // Check already presents or not
        $data = AttributeSet::where('slug',$input['slug'])->exists();

        if( !$data )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                $attributesetdata = AttributeSet::create($input);

                DB::commit();

                Session::flash('message', 'Successfully added!');
                return redirect('admin-attribute-set-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This attribute set already added!');
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
        $pageTitle = 'View attribute set';

        // Find attronite set data
        $data = AttributeSet::find($id);

        if(!empty($data))
        {
            // If found attronite set
            return view("Attribute::attribute_set.show", compact('data','pageTitle'));

        }else{
            // If attronite set not found
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
       $pageTitle = "Update attribute set";

        // Find Attribute set
        $data = AttributeSet::find($id);

        // If manufacture not found                
        if(empty($data)){
            Session::flash('danger', 'Attribute Set not found.');
            return redirect()->route('admin.attribute.set.index');
        }


        // Return view
        return view("Attribute::attribute_set.edit", compact('data','pageTitle'));
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\AttriubteSetRequest $request, $id)
    {
        $input = $request->all();

        // Find Attributset
        $model = AttributeSet::where('attribute_set.id', $id)
            ->select('attribute_set.*')
            ->first();

        DB::beginTransaction();
        try {
            // Update attribute_set
            $result = $model->update($input);

            DB::commit();

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-attribute-set-index');
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
        $model = AttributeSet::where('attribute_set.id', $id)
            ->select('attribute_set.*')
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

    public function search(Request $request)
    {

        
        $pageTitle = 'Attribute set';

        // Attribute set model initialize
        $model = new AttributeSet();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('attribute_set.status', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('slug', 'LIKE', '%'.$search_keywords.'%');
                });
            $data = $model->select('attribute_set.*')->orderBy('id','desc')->paginate(30);
        }else{

            // If get data not found
            $data = AttributeSet::orderBy('id','desc')->paginate(30);
        }

        // Return view
        return view("Attribute::attribute_set.index", compact('data','pageTitle'));
        

    }


    public function set_items($id)
    {

       $pageTitle = "Assign attribute set items";

        // Find Attribute set
        $data = AttributeSet::find($id);
        
        // Get attribute data        
        $attribute_list = DB::table("attribute")
                        ->select('attribute.*')
                        ->whereNOTIn('id',function($query) use ($data){
                                       $query->select('attribute_id')
                                       ->from('attribute_set_items')
                                       ->where('attribute_set_id',$data->id);
                         })
                        ->where('attribute.status','active')
                        ->orderBy('frontend_title','asc')
                        ->get();


        $asssigned_attribute = AttributeSetItems::where('attribute_set_id',$data->id)->get();

       
        // If manufacture not found                
        if(empty($data)){
            Session::flash('danger', 'Attribute Set not found.');
            return redirect()->route('admin.attribute.set.index');
        }

        // Return view
        return view("Attribute::attribute_set.set_items", compact('data','pageTitle','attribute_list','asssigned_attribute'));

    }

    public function assigned_store(Request $request)
    {
       
       $attribute_set_id = $request->attribute_set_id;

       $data = AttributeSet::where('id',$attribute_set_id)->first();

       if($data)
       {

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                if(!empty($request->unassigned_attr)){

                    for($i=0; $i<count($request->unassigned_attr); $i++){

                        $model = new AttributeSetItems();
                        $model->attribute_id = $request->unassigned_attr[$i];
                        $model->attribute_set_id = $request->attribute_set_id;

                        $model->save();

                        DB::commit();

                        

                    }

                     
                }else{
                    Session::flash('message', 'Please select attribute');
                }

                
                //return redirect('admin-attribute-set-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
       }else{

            Session::flash('message', 'Attribute Set not found!');

       }

        

        return redirect()->back();
    }



    public function unassigned_store(Request $request)
    {

        $attribute_set_id = $request->attribute_set_id;

        $data = AttributeSet::where('id',$attribute_set_id)->first();

        if($data)
        {

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                if(!empty($request->assigned_attr)){

                    for($i=0; $i<count($request->assigned_attr); $i++){

                        $model =AttributeSetItems::where('id',$request->assigned_attr[$i])
                                                ->where('attribute_set_id',$attribute_set_id)
                                                ->delete();

                        DB::commit();

                        Session::flash('message', 'Attribute Set items is Unassigned!');

                    }

                     
                }else{
                    Session::flash('message', 'Please select attribute');
                }

                
                //return redirect('admin-attribute-set-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('message', 'Attribute Set not found!');
        }
       
        

        return redirect()->back();
    }


}