<?php

namespace App\Modules\Admanager\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Admanager\Models\Admanager;
use App\Modules\Admanager\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App;

class AdmanagerController extends Controller
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

    protected $admanager_image_path;
    protected $admanager_image_relative_path;



    /**
     * admanager constructor.
     */
    public function __construct()
    {

        $this->admanager_image_path = public_path('uploads/admanager');
        $this->admanager_image_relative_path = '/uploads/admanager';

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   


        $pageTitle = "List of admanager";

        // Get data
        $data = Admanager::whereNotIn('status',['cancel'])->get();

        // return view
        return view("Admanager::admanager.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add admanager";

        // return View
        return view("Admanager::admanager.create", compact('pageTitle'));
    }



    public function store(Requests\AdmanagerRequest $request)
    {   

        // Set mime type 
        $mime_type_data = ['image/jpeg','image/jpg','image/png','image/gif'];

        // Get all input data
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not
        $data = Admanager::where('slug',$input['slug'])->exists();

        if(!$data )
        {
            // Image link 
            $admanager_image = $request->file('image_link');

            if(!empty($admanager_image))
            {
                $image_info = getimagesize($admanager_image);

                // check image dimension in width & height
                // if((isset($image_info['0']) && $image_info['0'] == '990') && isset($image_info['1']) && $image_info['1'] == '300'  ){
                //     Session::flash('error', 'Image size must be width 980px & height 280px');    
                //      return redirect()->back();
                // }

                // Check image mime type
                if(isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data))
                {
                    Session::flash('error', 'Invalid image type');    
                     return redirect()->back();
                }

                // Check image size

                // if($admanager_image->getClientSize() > 1024)
                // {
                //     Session::flash('error', 'This Image size bigger than 1024KB');    
                //     return redirect()->back();
                // }

                if($admanager_image) {
                    $admanager_image_title = str_replace(' ', '-', $input['slug'] . '.' . $admanager_image->getClientOriginalExtension());
                    $admanagerr_image_link = $this->admanager_image_relative_path.'/'.$admanager_image_title;

                }else{
                    $admanager_image_link = '';
                    $admanager_image_title = '';
                }

                $input['image_link'] = $admanager_image_title;
            }

            

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                // Store user data 
                if($admanager_data = Admanager::create($input))
                {

                    // Store category image
                    if($admanager_image != null){

                    $img = Image::make($admanager_image->path());
                    $img->resize(900, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($this->admanager_image_path.'/'.$admanager_image_title);
                    // $admanager_image->move($this->admanager_image_path, $admanager_image_title);
                    }

                }

                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-admanager-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This admanager already added!');
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
        $pageTitle = 'View admanager';

        // Find category data
        $data = Admanager::where('admanager.id', $id)
                ->select('admanager.*')
                ->first();                    

        if(!empty($data))
        {
            // If found category
            return view("Admanager::admanager.show", compact('data','pageTitle'));

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
       $pageTitle = "Update admanager";

        // Find user
        $data = Admanager::where('admanager.id', $id)
                        ->select('admanager.*')
                        ->first();

        // If user not found                
        if(empty($data)){
            Session::flash('danger', 'admanager not found.');
            return redirect()->route('admin.admanager.index');
        }


        // Return view
        return view("Admanager::admanager.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\AdmanagerRequest  $request, $id)
    {   
        // Set mime type 
        $mime_type_data = ['image/jpeg','image/jpg','image/png','image/gif'];
        
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not

        // Find admanager
        $model = Admanager::where('admanager.id', $id)
            ->select('admanager.*')
            ->first();

        // Image file 
        $admanager_image = $request->file('image_link');

        if(!empty($admanager_image))
        {
            $image_info = getimagesize($admanager_image);

            // check image dimension in width & height
            // if((isset($image_info['0']) && $image_info['0'] == '990') && isset($image_info['1']) && $image_info['1'] == '300'  ){
            //     Session::flash('error', 'Image size must be width 980px & height 280px');   
            //     return redirect()->back(); 

            // }

                // Check image mime type
            if(isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data))
            {
                Session::flash('error', 'Invalid image type');    
                return redirect()->back();

            }

                // Check image size

            // if($admanager_image->getClientSize() < 1024)
            // {
            //     Session::flash('error', 'Image size bigger than 1024KB'); 
            //     return redirect()->back();   

            // }

            if($admanager_image) {
                $admanager_image_title = str_replace(' ', '-', $input['slug'] . '.' . $admanager_image->getClientOriginalExtension());
                $admanager_image_link = $this->admanager_image_relative_path.'/'.$admanager_image_title;
            }else{
                $admanager_image_link = $model->image_link;
                $admanager_image_title = $model->image_link;
            }

        $input['image_link'] = $admanager_image_title;




        }
        

        DB::beginTransaction();
        try {
            // Update user
            $result = $model->update($input);

            if($result){

                if($admanager_image != null){
                    File::delete($this->admanager_image_path, $admanager_image_title);
                    $img = Image::make($admanager_image->path());
                    $img->resize(900, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($this->admanager_image_path.'/'.$admanager_image_title);
                }

                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-admanager-index');
        }
        catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            echo '<pre>';
            print_r($e->getMessage());
            exit();
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
        $model =   Admanager::where('admanager.id', $id)
            ->select('admanager.*')
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
                File::delete($this->admanager_image_path.'/'.$model->image_link);
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

        
        $pageTitle = 'admanager Information';

        // User model initialize
        $model = new Admanager();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('admanager.status', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('slug', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('short_order', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('type', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('caption', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('route', 'LIKE', '%'.$search_keywords.'%');
                });
            $data = $model->select('admanager.*')->paginate(30);
        }else{

            // If get data not found
            $data = Admanager::paginate(30);
        }

        // Return view
        return view("Admanager::admanager.index", compact('data','pageTitle'));
        

    }

    public function changeAdmanagerOrder(Request $request)
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
                        Admanager::where('id','=',$single['id'])
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
