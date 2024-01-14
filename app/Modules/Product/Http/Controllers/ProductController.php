<?php

namespace App\Modules\Product\Http\Controllers;

use App\Modules\Brand\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;


use App\Modules\Attribute\Models\AttributeSet;
use App\Modules\Product\Models\ProductImage;
use App\Modules\Product\Models\ProductSeo;
use App\Modules\Product\Models\ProductInventory;

use App\Modules\Category\Models\Category;


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App;
use App\User;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

    protected $general_image_path;
    protected $general_image_relative_path;

    public function __construct()
    {

        $this->general_image_path = public_path('uploads/general_file');
        $this->general_image_relative_path = '/uploads/general_file';

    }
    
    /**
     * @return array
     */
    protected static function array_of_size()
    {
        $array_of_size = array(
            'orginal_image'
        );

        return $array_of_size;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "List of all items";

        // Get Parent category data
        $data = Product::orderBy('id','desc')->paginate(30);

        // return view
       return view("Product::product.index", compact('pageTitle','data'));
    }

    /**
     * Display a listing of pending(inactive) products.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendingProducts()
    {
        $pageTitle = "List of pending items";

        // Get Parent category data
        $data = Product::orderBy('id','desc')->where('status','inactive')->paginate(30);

        // return view
        return view("Product::product.pending-products", compact('pageTitle','data'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Product";        

        // Find Product
        // $product = Product::where('product.id', $id)->first();

        $user_list =  ['' => 'Select Shop'] + User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->pluck('shop_name', 'users_id')->all(); 

        

         $category_lists = Category::getHierarchyCategory('');
              //unset($category_lists['']);
        $brand_lists = Brand::getBrandList();
        // return View
        return view('Product::product.create', [
            'pageTitle' => $pageTitle,            
            'user_list' => $user_list, 
            'category_lists' => $category_lists,
            'brand_lists' => $brand_lists
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get all input data
        $input = $request->all();

        $input['item_no'] = 'AFS-'.date('Ydis');       

        // Set mime type 
        $mime_type_data = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

        $image = $request->file('image');

        if (!empty($image)) {
        $image_info = getimagesize($image);

        // Check image mime type
                        if (isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data)) {
                            Session::flash('error', 'Invalid image type');
                            return redirect()->back();
                        }
       // generate image name
                        $name = $input['slug'] . '-' . time() . '-' . 'afshini' . '.' . $image->getClientOriginalExtension();
                        $path_image_link = '/uploads/product';
            }
              
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
             
            // Save product
            $product_data = Product::create([
                'title' => $input['title'],
                'title_bn' => $input['title_bn'],
                'title_hi' => $input['title_hi'],
                'title_ch' => $input['title_ch'],
                'brand_id' => $input['brand_id'],
                'slug' => $input['slug'],
                'sell_price' => $input['sell_price'],
                'short_description' => $input['short_description'],
                'short_description_bn' => $input['short_description_bn'],
                'short_description_hi' => $input['short_description_hi'],
                'short_description_ch' => $input['short_description_ch'],
                'description' => $input['short_description'],
                'type' => $input['type'],
                'item_no' => $input['item_no'],
                'status' => $input['status'],
                'batch' => $input['batch'],
                'is_featured' =>$input['is_featured'],               
                'seller_id' => $input['users_id']
                ]);

                        
            if(!empty($product_data)){

                $id = $product_data->id;
                 
                if (!empty($image)) {

                // upload image & create directory
                $this->image_upload($name, $image->getRealPath(), $path_image_link, $id);

                // Prepare image_link field value
                $image_link = $path_image_link . '/' . $id;

                // Save images
                DB::table('product_image')
                            ->insert([
                                'product_id' => $id,
                                'image_link' => $image_link,
                                'image' => $name,
                                'created_by' => $input['users_id'],
                                'created_at' => date('Y-m-d h:i:s')
                            ]);
                }

                $category_id = $input['category_id'];
                $category_status = $input['status'];
                $created_by = $input['users_id'];
                
                // Save category
                DB::table('product_category')->insert(
                    ['product_id' => $product_data->id, 'category_id' => $category_id, 'status' => $category_status, 'created_by' => $created_by,'created_at' => date('Y-m-d h:i:s')]
                );

                // Save Inventory

                    $item_number = $input['item_no'];

                if($input['status'] == "active"){
                    DB::table('product_inventory')
                        ->insert([
                            'product_id' => $id,
                            'warehouse' => 'self',
                            'item_number' => $item_number,
                            'quantity' => 0,
                            'status' => 'active',
                            'created_by' => $input['users_id'],
                            'created_at' => date('Y-m-d h:i:s'),
                        ]);
                }


            }

            DB::commit();

            Session::flash('message', 'Product is added! Please Update product for more Information');
            return redirect('admin-product-index');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());            
        }

        // Redirect back to last page if error occurs
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
        $pageTitle = 'View item details';

        // Find Product data
        $data = Product::where('product.id',$id)->first();                    

        if(!empty($data))
        {
            // If found product
            return view("Product::product.show", compact('data','pageTitle'));

        }else{
            // If product not found
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
        $pageTitle = "Update product Information";

        // Find Product
        $product = Product::where('product.id', $id)->first();

        $user_data = Product::join('seller_profiles', 'seller_profiles.users_id', '=', 'product.seller_id')
        ->where('product.id', $id)
        ->select('seller_profiles.users_id', 'seller_profiles.shop_name')->first();

        $imagedata = ProductImage::where('product_image.product_id', $id)->get();

        $seo_data = ProductSeo::where('product_seo.product_id', $id)->first();

        $inventory_data = ProductInventory::where('product_inventory.product_id', $id)->first();

       
    
        // Get Category list
        $category_lists = Category::getHierarchyCategory('');
        //unset($category_lists['']);

        // assigned category ->where('product_id', $id)
        $product_category = DB::table('product_category')->join('category', 'category.id', '=', 'product_category.category_id')->where('product_category.product_id', $id)->pluck('category.title', 'category.id')->all();
        
   

        // Return view
        return view("Product::product.edit", compact('user_data', 'pageTitle', 'product', 'inventory_data', 'seo_data', 'category_lists', 'product_category', 'imagedata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // Get all input data
        $input = $request->all();

        // Set mime type 
        $mime_type_data = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

        $image = $request->file('image');

        if (!empty($image)) {
        $image_info = getimagesize($image);


        // Check image mime type
                        if (isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data)) {
                            Session::flash('error', 'Invalid image type');
                            return redirect()->back();
                        }
       // generate image name
                        $name = $input['slug'] . '-' . time() . '-' . 'afshini' . '.' . $image->getClientOriginalExtension();
                        $path_image_link = '/uploads/product';
        }

        $model = Product::where('product.id', $id)->first();

		//dd($input);

        if (!empty($model)) {
            DB::beginTransaction();
            try {
                    // Update product basic info
               $result = $model->update($input);
               
               if(!empty($result)){

                // upload image & create directory
                if (!empty($image)) {

                $check_image = ProductImage::where('product_image.product_id', $id)->first();                 

                if (!empty($check_image)) {
                      
                $imagePath = $check_image->image_link . '/' . 'orginal_image' . '/' . $check_image->image;
                $thumbPath = $check_image->image_link . '/' . 'thumbnail' . '/' . $check_image->image;

                $realImagePath = public_path($imagePath);
                $thumbimagePath = public_path($thumbPath);
                            
                // remove image from folder
                if (file_exists($realImagePath)) {
                    File::delete($realImagePath);
                    File::delete($thumbimagePath);
                }

                $this->image_upload($name, $image->getRealPath(), $path_image_link, $id);

                // Prepare image_link field value
                $image_link = $path_image_link . '/' . $id;                

                // Save images
                DB::table('product_image')
                            ->where('product_id', $id)
                            ->update([                                
                                'image_link' => $image_link,
                                'image' => $name,
                                'updated_by' => Auth::user()->id,
                                'updated_at' => date('Y-m-d h:i:s')
                            ]); 
                     
                }else {

                $this->image_upload($name, $image->getRealPath(), $path_image_link, $id);

                // Prepare image_link field value
                $image_link = $path_image_link . '/' . $id;

                // Save images
                DB::table('product_image')
                            ->insert([
                                'product_id' => $id,
                                'image_link' => $image_link,
                                'image' => $name,
                                'created_by' => Auth::user()->id,
                                'created_at' => date('Y-m-d h:i:s')
                            ]);
                    }
                                          
                }


				$item_number = $input['item_no'];
                $quantity = $input['quantity'];
                
                //dd($quantity);
                $inventory_data = ProductInventory::where('product_id', $id)->first();
                if (!empty($inventory_data)) {                   

                DB::table('product_inventory')
                        ->where('product_id', $id)
                        ->update([
                                'item_number' => $item_number,
                                'quantity' => $quantity, 
                            	'updated_by' => Auth::user()->id,
                            	'updated_at' => date('Y-m-d h:i:s')
                            ]);
                 }else {
					
					DB::table('product_inventory')
                            ->insert([
                                'product_id' => $id,
                                'warehouse' => 'self',
                                'item_number' => $item_number,
                                'quantity' => '1',
                                'status' => 'active',
                                'created_by' => Auth::user()->id,
                                'created_at' => date('Y-m-d h:i:s')
                            ]);

                 }

                $category_id = $input['category_id'];
                $category_status = $input['status']; 

                //dd($category_id); 

                // Save category
                if (!empty($category_id)) { 
                DB::table('product_category')
                        ->where('product_id', $id)
                        ->update([                            
                            'category_id' => $category_id, 
                            'status' => $category_status, 
                            'updated_by' => Auth::user()->id,
                            'updated_at' => date('Y-m-d h:i:s')
                            ]);
                }
                        
            }

                DB::commit();

                $response['result'] = 'success';
                $response['message'] = 'Successfully updated!';
                return redirect('admin-product-index');

            } catch (\Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                DB::rollback();

                $response['result'] = 'error';
                $response['message'] = $e->getMessage();
            }

        } else {
                 // Product not found
            $response['result'] = 'error';
            $response['message'] = 'This product allready updated.';
        }
        return $response;

    }

    /**
     * @param string $image
     * @param string $destinationPath
     * @return array
     */

    public static function image_upload($image_name, $realpath, $destinationPath, $id)
    {
        // Check image name presents or not
        if ($image_name != '') {   
            // get sizes
            $sizes = self::array_of_size();

            if (!empty($sizes)) {
                $destinationPath = $destinationPath . "/" . $id;
                $uploaddestinationPath = $destinationPath;
                foreach ($sizes as $value) {

                    if ($value == 'orginal_image') {
                        $target_location = $uploaddestinationPath . '/' . 'orginal_image';
                        $thumbnail_location = $uploaddestinationPath . '/' . 'thumbnail';
                        if (!Storage::disk('public')->exists($target_location)) {
                            $target_location = public_path($target_location);
                            $thumbnail_location = public_path($thumbnail_location);

                        File::makeDirectory($target_location, 0777, true, true);
                        File::makeDirectory($thumbnail_location, 0777, true, true);
                        }

                            // upload image
                        $destinationPath = public_path($target_location);                       
                        $img_mask_logo = public_path('uploads/seller/icon_afshini.png');                   

                        $img = Image::make($realpath);
                        $img->insert($img_mask_logo, 'bottom-left', 100, 100);

                        $img->resize(860, 1060, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($target_location . '/' . $image_name);

                        $img->resize(450, 550, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($thumbnail_location . '/' . $image_name);

                    } elseif ($value != 'orginal_image') {
                       // create directory
                        $target_location = $uploaddestinationPath . '/' . $value . 'x' . $value;
                        if (!Storage::disk('public')->exists($target_location)) {
                            $target_location = public_path($target_location);
                            File::makeDirectory($target_location, 0777, true, true);

                            $thumbnail_location = public_path($thumbnail_location);
                        File::makeDirectory($thumbnail_location, 0777, true, true);
                        }

                        // upload image
                        $destinationPath = public_path($target_location);

                        $img = Image::make($realpath);
                        // $img->resize($value, $value, function ($constraint) {
                        //     $constraint->aspectRatio();
                        $img->resize(860, 1060, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($target_location . '/' . $image_name);

                        $img->resize(450, 550, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($thumbnail_location . '/' . $image_name);
                    }

                }
            }

        }

        return true;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Product::where('id', $id)->first();

        DB::beginTransaction();
        try {
            // Product update
            $model->status = 'cancel';            

            $model->save();
          
            DB::commit();
            Session::flash('message', "Successfully activated.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        
        // redirect to current page
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm_product($id)
    {

        // Find category 

        $model = Product::where('id', $id)->first();


        DB::beginTransaction();
        try {
            // Product update
            if($model->status =='active'){
                $model->status = 'inactive';
            }else{
                $model->status = 'active';

                //check for data already exists in ProductInventories Table
                $productInventoriesCheck = App\Modules\Product\Models\ProductInventory::where('product_id',$id)->first();

                //when admin activates any product insert information into ProductInventories
                if($productInventoriesCheck == null){
                    DB::table('product_inventory')
                        ->insert([
                            'product_id' => $id,

                            'warehouse' => 'self',
                            'item_number' => $model->item_no,
                            'quantity' => 0,
                            'status' => 'active',
                            'created_by' => Auth::user()->id,
                            'created_at' => date('Y-m-d h:i:s'),
                            'category_id' => $model->category_id,
                            'brand_id' => $model->brand_id,
                            'seller_id' => $model->seller_id,
                            'product_in_quantity' => 0,
                            'product_out_quantity' => 0,
                        ]);
                }

            }

           $model->save();




            DB::commit();
            Session::flash('message', "Successfully activated.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        
        // redirect to current page
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function featured_product($id)
    {
        // Find category 

        $model = Product::where('id', $id)->first();

        DB::beginTransaction();
        try {
            // Product update
            if($model->is_featured =='yes'){
                $model->is_featured = 'no';
            }else{
                $model->is_featured = 'yes';
            }


           $model->save();
          
            DB::commit();
            Session::flash('message', "Successfully activated.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        
        // redirect to current page
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stockout($id)
    {
        // Find inventory 

        $model = ProductInventory::where('product_id', $id)->first();
        $pmodel = Product::where('product.id', $id)->first();
        //dd($model);
        DB::beginTransaction();
        try {
            // Product update
            if($model->quantity =='0'){
                $model->quantity = '1';
                $pmodel->batch = '';
            }else{
                $model->quantity = '0';
                $pmodel->batch = 'stock-out';
            }

		if (!empty($pmodel)) {
			   $pmodel->save();
	           $model->save();
       		}
          
            DB::commit();
            Session::flash('message', "Successfully activated.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        
        // redirect to current page
        return redirect()->back();
    }

    public function active_index()
    { 
        $pageTitle = "List of active product";

        // Get active product
        $data = Product::where('status','active')->orderBy('id','desc')->paginate(30);

        // return view
       return view("Product::product.index", compact('pageTitle','data'));
    }

    public function inactive_index()
    { 
        $pageTitle = "List of inactive product";

        // Get inactive product
        $data = Product::where('status','inactive')->orderBy('id','desc')->paginate(30);

        // return view
       return view("Product::product.index", compact('pageTitle','data'));
    }

    public function cancel_index()
    { 
        $pageTitle = "List of cancel product";

        // Get cancel product
        $data = Product::where('status','cancel')->orderBy('id','desc')->paginate(30);

        // return view
       return view("Product::product.index", compact('pageTitle','data'));
    }

    public function search(Request $request)
    {

        
        $pageTitle = 'Search Product';

        // Product model initialize
        $model = new Product();

        $requestMethod = $request->method();

        if($this->isGetRequest($requestMethod))
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('title', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('product.type', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('product.item_no', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('product.sell_price', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('product.batch', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('product.is_featured', 'LIKE', '%'.$search_keywords.'%');
                        
                });
            $data = $model->select('product.*')->paginate(50);
        }else{

            // If get data not found
            $data = Product::paginate(50);
        }

        // Return view
        return view("Product::product.index", compact('data','pageTitle'));
        

    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
