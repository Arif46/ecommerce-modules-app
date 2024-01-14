<?php

namespace App\Modules\Slider\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Slider\Models\Slider;
use App\Modules\Slider\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
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

    protected $slider_image_path;
    protected $slider_image_relative_path;



    /**
     * advertisement constructor.
     */
    public function __construct()
    {

        $this->slider_image_path = public_path('uploads/slider');
        $this->slider_image_relative_path = '/uploads/slider';

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   


        $pageTitle = "List of  slider";

        // Get data
        $data = Slider::whereNotIn('status',['cancel'])->get();

        // return view
        return view("Slider::slider.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add slider";

        // return View
        return view("Slider::slider.create", compact('pageTitle'));
    }



    public function store(Requests\SliderRequest $request)
    {   

        // Set mime type 
        $mime_type_data = ['image/jpeg','image/jpg','image/png','image/gif'];

        // Get all input data
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not
        $data = Slider::where('slug',$input['slug'])->exists();

        if(!$data )
        {
            // Image link 
            $slider_image = $request->file('image_link');

            if(!empty($slider_image))
            {
                $image_info = getimagesize($slider_image);

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

                // if($slider_image->getClientSize() > 1024)
                // {
                //     Session::flash('error', 'This Image size bigger than 1024KB');    
                //     return redirect()->back();
                // }

                if($slider_image) {
                    $slider_image_title = str_replace(' ', '-', $input['slug'] . '.' . $slider_image->getClientOriginalExtension());
                    $slider_image_link = $this->slider_image_relative_path.'/'.$slider_image_title;

                }else{
                    $slider_image_link = '';
                    $slider_image_title = '';
                }

                $input['image_link'] = $slider_image_title;
            }

            

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                // Store user data 
                if($slider_data = Slider::create($input))
                {

                    // Store category image
                    if($slider_image != null){
                    $img = Image::make($slider_image->path());
                    $img->resize(1920, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($this->slider_image_path.'/'.$slider_image_title);
                    }

                }

                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-slider-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This Slider already added!');
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
        $pageTitle = 'View slider';

        // Find category data
        $data = Slider::where('slider.id', $id)
                ->select('slider.*')
                ->first();                    

        if(!empty($data))
        {
            // If found category
            return view("Slider::slider.show", compact('data','pageTitle'));

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
       $pageTitle = "Update slider";

        // Find user
        $data = Slider::where('slider.id', $id)
                        ->select('slider.*')
                        ->first();

        // If user not found                
        if(empty($data)){
            Session::flash('danger', 'Slider not found.');
            return redirect()->route('admin.slider.index');
        }


        // Return view
        return view("Slider::slider.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SliderRequest  $request, $id)
    {   
        // Set mime type 
        $mime_type_data = ['image/jpeg','image/jpg','image/png','image/gif'];
        
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not

        // Find slider
        $model = Slider::where('slider.id', $id)
            ->select('slider.*')
            ->first();

        // Image file 
        $slider_image = $request->file('image_link');

        if(!empty($slider_image))
        {
            $image_info = getimagesize($slider_image);

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

            // if($slider_image->getClientSize() < 1024)
            // {
            //     Session::flash('error', 'Image size bigger than 1024KB'); 
            //     return redirect()->back();   

            // }

            if($slider_image) {
                $slider_image_title = str_replace(' ', '-', $input['slug'] . '.' . $slider_image->getClientOriginalExtension());
                $slider_image_link = $this->slider_image_relative_path.'/'.$slider_image_title;
            }else{
                $slider_image_link = $model->image_link;
                $slider_image_title = $model->image_link;
            }

        $input['image_link'] = $slider_image_title;




        }
        

        DB::beginTransaction();
        try {
            // Update user

            if($slider_image != null){
                $imagePath = 'uploads/slider/'.$model->image_link;
                $realImagePath = public_path($imagePath);
                unlink($realImagePath);
                $img = Image::make($slider_image->path());
                $img->resize(1920, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $img->save($this->slider_image_path.'/'.$slider_image_title);
                // $slider_image->move($this->slider_image_path, $slider_image_title);
            }
            $result = $model->update($input);
            DB::commit();

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-slider-index');
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
        $model =   Slider::where('slider.id', $id)
            ->select('slider.*')
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
                File::delete($this->slider_image_path.'/'.$model->image_link);
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

        
        $pageTitle = 'Slider Information';

        // User model initialize
        $model = new Slider();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('slider.status', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('slug', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('short_order', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('type', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('caption', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('route', 'LIKE', '%'.$search_keywords.'%');
                });
            $data = $model->select('slider.*')->paginate(30);
        }else{

            // If get data not found
            $data = Slider::paginate(30);
        }

        // Return view
        return view("Slider::slider.index", compact('data','pageTitle'));
        

    }
    public function changeSliderOrder(Request $request)
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
                        Slider::where('id','=',$single['id'])
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
