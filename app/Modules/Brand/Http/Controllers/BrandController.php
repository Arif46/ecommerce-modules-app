<?php

namespace App\Modules\Brand\Http\Controllers;

use App\Modules\Brand\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use Illuminate\Http\Request;
use App\Modules\Brand\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
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

    protected $brand_image_path;
    protected $brand_image_relative_path;

    /**
     * BrandController constructor.
     */
    public function __construct()
    {
        $this->brand_image_path = public_path('uploads/brand');
        $this->brand_image_relative_path = '/uploads/brand';
    }

    protected static function array_of_size()
    {
        $array_of_size = array(
            'orginal_image',
            '800'
        );

        return $array_of_size;
    }



    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Brand::welcome");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "List of Brands";

        // Get brand data
        $data = Brand:: select('brands.*')
            //->orderby('Brand.short_order','asc')
            ->paginate(30);

        // return view
        return view("Brand::brands.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Brand";

        // return View
        return view("Brand::brands.create")->with('pageTitle',$pageTitle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\BrandRequest $request)
    {

        // Get all input data
        $input = $request->all();

        // Check already presents or not
        $data = Brand::where('slug',$input['slug'])->exists();

        if(!$data )
        {

            // Check image file exists or not
            if($request->hasfile('image_link')){

                // Image link
                $brand_image = $request->file('image_link');

                if(!empty($brand_image)) {

                    $image_info = getimagesize($brand_image);

                    // check image dimension in width & height
                    // if((isset($image_info['0']) && $image_info['0'] == '1920') && isset($image_info['1']) && $image_info['1'] == '300'  ){
                    //     Session::flash('error', 'Image size must be width 1920px & height 300px');
                    //     return redirect()->back();
                    // }

                    // Check image size

                    // if($brand_image->getClientSize() > 512)
                    // {
                    //     Session::flash('error', 'This Image size bigger than 1024KB');
                    //     return redirect()->back();
                    // }



                    if($brand_image) {
                        $brand_image_title = str_replace(' ', '-', $input['slug'] . '.' . $brand_image->getClientOriginalExtension());
                        $brand_image_link = $this->brand_image_relative_path;
                        $this->image_upload($brand_image_title,$brand_image->getRealPath(),$brand_image_link);

                    }else{
                        $brand_image_link = '';
                        $brand_image_title = '';
                    }

                    $input['image_link'] = $brand_image_title;
                }
            }

            try {
                // Store cateogory data
                $brand_data = Brand::create($input);
                Session::flash('message', 'successfully added');
                return redirect('admin-brand-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'brand already added!');
        }
        return redirect()->back();



    }

    public static function image_upload($image_name, $realpath, $destinationPath)
    {
        // Check image name presents or not
        if ($image_name != '')
        {
            // get sizes
            $sizes = self::array_of_size();

            if(!empty($sizes))
            {

                $uploaddestinationPath = $destinationPath;

                foreach ($sizes as $value)
                {

                    if ($value=='orginal_image') {
                        $target_location = $uploaddestinationPath.'/'.'orginal_image';
                        if (!Storage::disk('public')->exists($target_location))
                        {
                            $target_location = public_path($target_location);

                            File::makeDirectory($target_location, 0777, true, true);
                        }

                        // upload image
                        $destinationPath =  public_path($target_location);

                        $img = Image::make($realpath);
                        $img->resize(1920, 1280, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($target_location.'/'.$image_name);
                        // $img->save($target_location.'/'.$image_name);
                    }elseif ($value!='orginal_image') {
                        // create directory
                        $target_location = $uploaddestinationPath.'/'.$value.'x'.$value;
                        if (!Storage::disk('public')->exists($target_location))
                        {
                            $target_location = public_path($target_location);

                            File::makeDirectory($target_location, 0777, true, true);
                        }

                        // upload image
                        $destinationPath =  public_path($target_location);

                        $img = Image::make($realpath);
                        $img->resize($value, $value, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($target_location.'/'.$image_name);
                    }
                }

            }

        }

        return true;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pageTitle = 'View Brand Informations';

        // Find brand data
        $data = Brand::where('brands.id', $id)
            ->select('brands.*')
            ->first();

        if(!empty($data))
        {
            // If found brand
            return view("Brand::brands.show", compact('data','pageTitle'));

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
        $pageTitle = "Update Brand";

        // Find brand
        $data = Brand::where('brands.id', $id)
            ->select('brands.*')
            ->first();

        // If brand not found
        if(empty($data)){
            Session::flash('danger', 'Brand not found.');
            return redirect()->route('admin.brand.index');
        }

        return view("Brand::brands.edit", compact('data','pageTitle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\BrandRequest $request, $id)
    {


        $input = $request->all();


        // Find catgory
        $model = Brand::where('brands.id', $id)
            ->select('brands.*')
            ->first();


        // Check image file exists or not
        if($request->hasfile('image_link')){

            // Image link
            $brand_image = $request->file('image_link');

            if(!empty($brand_image)) {

                $image_info = getimagesize($brand_image);

                // check image dimension in width & height
                // if((isset($image_info['0']) && $image_info['0'] == '1920') && isset($image_info['1']) && $image_info['1'] == '300'  ){
                //     Session::flash('error', 'Image size must be width 1900px & height 269px');
                //     return redirect()->back();
                // }

                // Check image size

                // if($brand_image->getClientSize() < 512)
                // {
                //     Session::flash('error', 'This Image size bigger than 512KB');
                //     return redirect()->back();
                // }



                if($brand_image) {

                    if($request->file('image_link') != null){
                        // File::Delete($model->image_link);
                        File::delete($this->brand_image_path.'/orginal_image/'.$model->image_link);
                        File::delete($this->brand_image_path.'/800x800/'.$model->image_link);
                    }

                    $brand_image_title = str_replace(' ', '-', $input['slug'] . '.' . $request->file('image_link')->getClientOriginalExtension());
                    $brand_image_link = $this->brand_image_relative_path;

                    $this->image_upload($brand_image_title,$request->file('image_link')->getRealPath(),$brand_image_link);

                }else{
                    $brand_image_link = $model->image_link;
                    $brand_image_title = $model->image_link;
                }

                $input['image_link'] = $brand_image_title;
            }


        }


        try {
            // Update brand
            $result = $model->update($input);

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-brand-index');
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

        $model = Brand::where('brands.id', $id)
            ->select('brands.*')
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
        $model = new Brand();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->search_keywords);
            $model = $model->where(function ($query) use($search_keywords){
                $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('brands.status', 'LIKE', '%'.$search_keywords.'%');
                $query = $query->orWhere('description', 'LIKE', '%'.$search_keywords.'%');
            });
            $data = $model->select('brands.*')->paginate(30);
        }else{

            // If get data not found
            $data = Brand::select('brands.*')
                ->paginate(30);
        }

        // Return view
        return view("Brand::brands.index", compact('data','pageTitle'));


    }


}
