<?php

namespace App\Modules\Common\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Common\Models\Faq;
use App\Modules\Common\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App;


class FaqController extends Controller
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


    protected $faq_image_path;
    protected $faq_image_relative_path;



    /**
     * faq constructor.
     */
    public function __construct()
    {

        $this->faq_image_path = public_path('uploads/faq');
        $this->faq_image_relative_path = '/uploads/faq';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   

        $pageTitle = "List of faq";

        // Get data
        $data = Faq::all();

        // return view
        return view("Common::faq.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add faq";

        // return View
        return view("Common::faq.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\FaqRequest $request)
    {
        // Set mime type 
        $mime_type_data = ['image/jpeg','image/jpg','image/png','image/gif'];

        // Get all input data
        $input = $request->all();
        $input['title'] = str_slug($input['title']);
        // Check already presents or not
        $data = Faq::where('title',$input['title'])->exists();

        if(!$data )
        {
            // Image link 
            $faq_image = $request->file('image_link');

            if(!empty($faq_image))
            {
                $image_info = getimagesize($faq_image);

                // Check image mime type
                if(isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data))
                {
                    Session::flash('error', 'Invalid image type');    
                     return redirect()->back();
                }

                if($faq_image) {
                    $faq_image_title = str_replace(' ', '-', $input['title'] . '.' . $faq_image->getClientOriginalExtension());
                    $faq_image_link = $this->faq_image_relative_path.'/'.$faq_image_title;

                }else{
                    $faq_image_link = '';
                    $faq_image_title = '';
                }

                $input['image_link'] = $faq_image_title;
            }
        
        }

        if( !$data )
        {
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
               
                // Store user data 
                if($faq_data = Faq::create($input))
                {

                    // Store category image
                    if($faq_image != null){

                    $img = Image::make($faq_image->path());
                    $img->resize(900, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($this->faq_image_path.'/'.$faq_image_title);
                    // $faq_image->move($this->faq_image_path, $faq_image_title);
                    }

                }
                
                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-faq-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This Faq already added!');
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
        $pageTitle = 'View faq';

        // Find data
        $data = Faq::where('id', $id)->first();                    

        if(!empty($data))
        {
            // If found category
            return view("Common::faq.show", compact('data','pageTitle'));

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
       $pageTitle = "Update faq";

        // Find data
        $data = Faq::where('faq.id', $id)
                        ->select('faq.*')
                        ->first();

        // If data not found                
        if(empty($data)){
            Session::flash('danger', 'Faq not found.');
            return redirect()->route('admin.faq.index');
        }

        // Return view
        return view("Common::faq.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\FaqRequest  $request, $id)
    {
        // Set mime type 
        $mime_type_data = ['image/jpeg','image/jpg','image/png','image/gif'];
        
        $input = $request->all();
        $input['title'] = str_slug($input['title']);
        // Check already presents or not

        // Find data
        $model = Faq::where('faq.id', $id)
                        ->select('faq.*')
                        ->first();

        // Image file 
        $faq_image = $request->file('image_link');

        if(!empty($faq_image))
        {
            $image_info = getimagesize($faq_image);

                // Check image mime type
            if(isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data))
            {
                Session::flash('error', 'Invalid image type');    
                return redirect()->back();

            }


            if($faq_image) {
                $faq_image_title = str_replace(' ', '-', $input['title'] . '.' . $faq_image->getClientOriginalExtension());
                $faq_image_link = $this->faq_image_relative_path.'/'.$faq_image_title;
            }else{
                $faq_image_link = $model->image_link;
                $faq_image_title = $model->image_link;
            }

        $input['image_link'] = $faq_image_title;

        }    

        

        DB::beginTransaction();
        try {
            // Update data
            $result = $model->update($input);
            // Update user
            $result = $model->update($input);

            if($result){

                if($faq_image != null){
                    File::delete($this->faq_image_path.'/'.$model->image_link);
                    $img = Image::make($faq_image->path());
                    $img->resize(900, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($this->faq_image_path.'/'.$faq_image_title);
                }

                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-faq-index');
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
        $model =  Faq::where('faq.id', $id)
                        ->select('faq.*')
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
                File::delete($this->faq_image_path.'/'.$model->image_link);
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

        
        $pageTitle = 'Faq information';

        // Faq model initialize
        $model = new Faq();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('faq.status', 'LIKE', '%'.$search_keywords.'%');
                    
                });
            $data = $model->select('faq.*')->paginate(30);
        }else{

            // If get data not found
            $data = Faq::paginate(30);
        }

        // Return view
        return view("Common::faq.index", compact('data','pageTitle'));
        

    }
    public function changeFaqOrder(Request $request)
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
                        Faq::where('id','=',$single['id'])
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
