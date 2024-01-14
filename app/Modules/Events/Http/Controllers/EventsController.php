<?php

namespace App\Modules\Events\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Events\Models\Events;
use App\Modules\Events\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\File;
use App;

class EventsController extends Controller
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

    protected $events_image_path;
    protected $events_image_relative_path;



    /**
     * Events constructor.
     */
    public function __construct()
    {

        $this->events_image_path = public_path('uploads/events');
        $this->events_image_relative_path = '/uploads/events';

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   


        $pageTitle = "List of  Events";

        // Get data
        $data = Events::whereNotIn('status',['cancel'])->get();

        // return view
        return view("Events::events.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pageTitle = "Add Events";

        // return View
        return view("Events::events.create", compact('pageTitle'));
    }



    public function store(Requests\EventsRequest $request)
    {   

        // Set mime type 
        $mime_type_data = ['pdf'];

        // Get all input data
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not
        $data = Events::where('slug',$input['slug'])->exists();

        if(!$data )
        {
            // Image link 
            $events_image = $request->file('image_link');

            if(!empty($events_image))
            {
                $image_info = getimagesize($events_image);

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

                // if($events_image->getClientSize() > 1024)
                // {
                //     Session::flash('error', 'This Image size bigger than 1024KB');    
                //     return redirect()->back();
                // }

                if($events_image) {
                    $events_image_title = str_replace(' ', '-', $input['slug'] . '.' . $events_image->getClientOriginalExtension());
                    $eventsr_image_link = $this->events_image_relative_path.'/'.$events_image_title;

                }else{
                    $events_image_link = '';
                    $events_image_title = '';
                }

                $input['image_link'] = $events_image_title;
            }

            

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                // Store user data 
                if($events_data = Events::create($input))
                {

                    // Store category image
                    if($events_image != null){

                    $events_image->move($this->events_image_path, $events_image_title);

                    }

                }

                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-events-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This events already added!');
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
        $pageTitle = 'View Events';

        // Find category data
        $data = Events::where('events.id', $id)
                ->select('events.*')
                ->first();                    

        if(!empty($data))
        {
            // If found category
            return view("Events::events.show", compact('data','pageTitle'));

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
       $pageTitle = "Update Events";

        // Find user
        $data = Events::where('events.id', $id)
                        ->select('events.*')
                        ->first();

        // If user not found                
        if(empty($data)){
            Session::flash('danger', 'Events not found.');
            return redirect()->route('admin.events.index');
        }


        // Return view
        return view("Events::events.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\EventsRequest  $request, $id)
    {   
        // Set mime type 
        $mime_type_data = ['pdf'];
        
        $input = $request->all();
        $input['slug'] = str_slug($input['slug']);
        // Check already presents or not

        // Find events
        $model = Events::where('events.id', $id)
            ->select('events.*')
            ->first();

        // Image file 
        $events_image = $request->file('image_link');

        if(!empty($events_image))
        {
              // File Details 
              $filename = $events_image->getClientOriginalName();
              $extension = $events_image->getClientOriginalExtension();
              $tempPath = $events_image->getRealPath();
              $fileSize = $events_image->getSize();
              $mimeType = $events_image->getMimeType();

              // Valid File Extensions
              $valid_extension = array("pdf");

              // 2MB in Bytes
              $maxFileSize = 2097152;  

                // Check image mime type
            if(!in_array(strtolower($extension),$valid_extension))
            {
                Session::flash('error', 'Invalid File type');    
                return redirect()->back();

            }else
                {
                 
                    if($events_image) {
                        $events_image_title = str_replace(' ', '-', $input['slug'] . '.' . $events_image->getClientOriginalExtension());
                        $events_image_link = $this->events_image_relative_path.'/'.$events_image_title;
                    }else{
                        $events_image_link = $model->image_link;
                        $events_image_title = $model->image_link;
                    }

                    $input['image_link'] = $events_image_title;

                    }
                }
        

        DB::beginTransaction();
        try {
            // Update user
            $result = $model->update($input);

            if($result){

                if($events_image != null){
                    File::delete($this->events_image_path.'/'.$model->image_link);
                    $events_image->move($this->events_image_path,$events_image_title);                   
                }

                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-events-index');
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
        $model =   Events::where('events.id', $id)
            ->select('events.*')
            ->first();

        DB::beginTransaction();
        try {
            // Events update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }

            if($model->save())
            {
             // $model = Events::findOrFail($id);
                File::delete($this->events_image_path.'/'.$model->image_link);
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

        
        $pageTitle = 'Events Information';

        // User model initialize
        $model = new Events();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');               
                    $query = $query->orWhere('created_at', 'LIKE', '%'.$search_keywords.'%');                   
                });
            $data = $model->select('events.*')->paginate(30);
        }else{

            // If get data not found
            $data = Events::paginate(30);
        }

        // Return view
        return view("Events::events.index", compact('data','pageTitle'));
        

    }
}
