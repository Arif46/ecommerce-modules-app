<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use App\Modules\User\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
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


        $pageTitle = "List of customer";

        // Get Parent user data
        $data = User::where('type','customer')
        ->orderby('id','DESC')
        ->paginate(20);


        // return view
        return view("User::customer.customer_index", compact('data','pageTitle'));

    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add new Customer";

        // return View
        return view("User::customer.create", compact('pageTitle'));
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
                // Store user data 
                if($user_data = User::create($input))
                {
            
                }

                DB::commit();
                Session::flash('message', 'Successfully added!');
                return redirect('admin-customer-index');

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'View Coustomer';

        // Find user data
        $data = User::where('users.id', $id)
                ->where('type','customer')
                ->select('users.*')
                ->first();                    

        if(!empty($data))
        {
            // If found user
            return view("User::customer.show", compact('data','pageTitle'));

        }else{
            // If user not found
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
        $pageTitle = "Update User";

        // Find user
        $data = User::where('users.id', $id)
                        ->where('type','customer')
                        ->select('users.*')
                        ->first();
  
        // If user not found                
        if(empty($data)){
            Session::flash('danger', 'User not found.');
            return redirect()->route('admin-customer-index');
        }

        // Return view
        return view("User::customer.edit", compact('data','pageTitle'));
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
         $model =  User::where('users.id', $id)
            ->where('type','customer')
            ->select('users.*')
            ->first();
            //dd($model);

        DB::beginTransaction();
        try {
            // Update user
            $result = $model->update($input);

            if($result){

                DB::commit();
            }

            Session::flash('message', 'Successfully updated!');
            return redirect('admin-customer-index');
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
        $model =  User::where('users.id', $id)
            ->where('type','customer')
            ->select('users.*')
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function deletes($id)
    {
        $model =  User::where('users.id', $id)
            ->where('type','customer')
            ->select('users.*')
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

        
        $pageTitle = 'Customer Information';

        // User model initialize
        $model = new User();

        if($this->isGetRequest())
        {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use($search_keywords){
                    $query = $query->orWhere('email', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('users.status', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('username', 'LIKE', '%'.$search_keywords.'%');
                    $query = $query->orWhere('type', 'LIKE', '%'.$search_keywords.'%');
                });
            $data = $model->where('users.type','customer')->select('users.*')->paginate(30);
        }else{

            // If get data not found
            $data = User::where('users.type','customer')->paginate(30);
        }

        // Return view
        return view("User::customer.customer_index", compact('data','pageTitle'));
        

    }


}
