<?php

namespace App\Modules\Admin\Http\Controllers\Auth;

use App\AppConfig;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Modules\Admin\Requests;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $adminRedirectTo = 'admin-dashboard';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required',
            'password' => 'required',
        ]);
    }



    public function index()
    {

        if(Auth::check())
        {
            Session::flash('message', "You Have Already Logged In.");
            return redirect()->intended('admin-dashboard');

        }else{

            return view('Admin::auth.login');
         
        }


    }

    
    /*
     * Post_login
     */
    public function post_login(Requests\LoginRequest $request)
    {
        $data = $request->all();

        if(!empty($data)){
            if(Auth::check() )
            {
                
                $user_type = Auth::user()->type;

                Session::flash('message', "You Have Already Logged In.");
                return redirect()->intended($this->adminRedirectTo);

            }
            else
            {
                $user_data_exists = DB::table('users')->where('email', $data['email'])->whereIn('type',[AppConfig::USER_ROLE_TYPE_SUPER_ADMIN,AppConfig::USER_ROLE_TYPE_ADMIN])->exists();


                if($user_data_exists)
                {
                    $user_data = DB::table('users')->where('email', $data['email'])->whereIn('type',[AppConfig::USER_ROLE_TYPE_SUPER_ADMIN,AppConfig::USER_ROLE_TYPE_ADMIN])->first();
                    $check_password = Hash::check( $data['password'], $user_data->password);

                    //if password matched
                    if($check_password)
                    {
                        //if user is inactive
                        if($user_data->status=='inactive')
                        {
                            Session::flash('error', "Sorry! Your Account Is Inactive.Please Contact With Administrator To active Account.");
                        }
                        else
                        {
                            if(Auth::check())
                            {
                                Session::flash('message', "You are already Logged-in! ");

                            }else{
                                $attempt = Auth::attempt([
                                    'email' => $request->get('email'),
                                    'password' => $request->get('password'),
                                ]);

                                if($attempt)
                                {
                                    DB::beginTransaction();
                                    try{
                                        
                                        DB::commit();

                                    }catch ( \Exception $e ){
                                        //If there are any exceptions, rollback the transaction
                                        DB::rollback();
                                    }

                                    Session::flash('message', "Successfully  Logged In.");

                                }else{
                                    Session::flash('danger', "Password Incorrect.Please Try Again");
                                }
                            }
                            return redirect()->intended('admin-dashboard');
                        }
                    }else{
                        Session::flash('danger', "Password Incorrect.Please Try Again!!!");
                    }
                }else{
                    Session::flash('danger', "UserName/Email does not exists.Please Try Again");

                }
                return redirect()->back();
            }
        }else{
            Session::flash('danger', "UserName/Email does not exists.Please Try Again");
            return redirect()->back();
        }


    }


     /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/admin-login');
    }

}