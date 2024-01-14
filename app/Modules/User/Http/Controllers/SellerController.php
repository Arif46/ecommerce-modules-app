<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use App\Modules\User\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
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
        
        $pageTitle = "List of seller";      

        // Get Parent user data
        // $user_data = User::where('type','seller')->orderby('id','DESC')->get();
             
        $data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')
        ->where('type','seller')
        ->orderby('users.id','DESC')
        ->paginate(20);


        // return view
        return view("User::seller.index", compact('data','pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add new Seller";

        // return View
        return view("User::seller.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserRequest $request)
    {
        // Get all input data
        $input = $request->all();

        // Check already presents or not
        $data = User::where('mobile_no',$input['mobile_no'])->exists();

        if( !$data )
        {
            
            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                $input['password']=bcrypt($input['password']);
                $shop_name = $input['shop_name'];
                $shop_address = $input['shop_address'];

                // Store user data
                
                // Store user data 
                if(!empty($input))
                {
                   $user_data = User::create($input);
                    
                   if(!empty($user_data)){

                   // Save profile
                    DB::table('seller_profiles')                            
                        ->insert([
                        'users_id' => $user_data->id,                           
                        'shop_name' => $shop_name,
                        'shop_address' => $shop_address,
                        'created_at' => date('Y-m-d h:i:s'),
                        ]);
                    }
                }

                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-seller-index');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        }else{
            Session::flash('info', 'This user already added!');
        }
        return redirect()->back();
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = "Update Seller";

        // Find user
        $data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->where('type','seller')->select('seller_profiles.shop_name','seller_profiles.shop_address','users.*') ->first(); 
  
        // If user not found                
        if(empty($data)){
            Session::flash('danger', 'User not found.');
            return redirect()->route('admin-seller-index');
        }

        // Return view
        return view("User::seller.edit", compact('data','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request  $request, $id)
    {
        $input = $request->all();

        // Find user
        // $model = User::where('users.id', $id)
        //     ->select('users.*')
        //     ->first();

        $model = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->where('type','seller')->select('seller_profiles.shop_name','seller_profiles.shop_address','users.*') ->first();
       
        $shop_name = $input['shop_name'];
        $shop_address = $input['shop_address'];

    
        DB::beginTransaction();
        try {
            
            if(!empty($model)){

            // Update user
            $result = $model->update($input);

             //dd($model);
            // Save images
            DB::table('seller_profiles')
                            ->where('users_id', $id)
                            ->update([                                
                                'shop_name' => $shop_name,
                                'shop_address' => $shop_address,
                                'created_at' => date('Y-m-d h:i:s'),
                            ]); 
            }  

            if($result){

                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-seller-index');
        }
        catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
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
        $pageTitle = 'View Seller';

        // Find user data
        $data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->where('type','seller')->select('seller_profiles.shop_name','seller_profiles.shop_address','users.*') ->first();                   

        if(!empty($data))
        {
            // If found user
            return view("User::seller.show", compact('data','pageTitle'));

        }else{
            // If user not found
            return redirect()->back();

        }
    }


   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model =  User::where('users.id', $id)
            ->where('type','seller')
            ->select('users.*')
            ->first();

        DB::beginTransaction();
        try {
            // Seller update
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }

            if($model->save())
            {

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

    public function deletes($id)
    {       
        // $model =  User::where('users.id', $id)
        //     ->where('type','seller')
        //     ->select('users.*')
        //     ->first();

        $model = User::findOrFail($id); 
        $shop = DB::table('seller_profiles')->where('seller_profiles.users_id', $id);

        DB::beginTransaction();
        try {
            // Seller update           

            if(!empty($model))
            {
                $shop->delete();
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

        
        $pageTitle = 'Seller Information ';

        // User model initialize
        $model = new User();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('email', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('mobile_no', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('shop_name', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('username', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('type', 'LIKE', '%'.$search_keywords.'%');
                });

        $data = $model->join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')
                    ->where('type','seller')
                    ->orderby('users.id','DESC')->paginate(30);
        }else{

            // If get data not found
            $data = User::paginate(30);
        }


        // Return view
        return view("User::seller.index", compact('data','pageTitle'));
        

    }


}
