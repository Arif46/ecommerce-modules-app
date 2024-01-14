<?php

namespace App\Modules\Web\Http\Controllers;

use App\Mail\CustomerVerification;
use App\Modules\Web\Models\UserVerificationSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Web\Requests;
use App\Modules\User\Models\UserBillingShipping;
use App\Modules\Order\Models\OrderHead;
use App\Modules\Order\Models\OrderDetails;
use App\Modules\Product\Models\ProductReview;
use App\Modules\Web\Models\Wishlist;
use App\Modules\Order\Models\OrderTransaction;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;
use App;

class WebCustomerController extends Controller
{

    /**
     * Show the login form for customer login.
     *
     * @return \Illuminate\Http\Response
     */


    public function login()
    {

        $pageTitle = 'Customer login panel';

        if ($user = Auth::user()) {
            if ($user->type == 'customer') {
                Session::flash('message', "You have already logged in.");
                return redirect()->back();
            }
        }

        $model = new User();
        // app('mathcaptcha')->reset();
        return view('Web::customer.login', [
            'pageTitle' => $pageTitle,
            'model' => $model
        ]);

    }


    /**
     * Show the sign_up form for customer sign_up.
     *
     * @return \Illuminate\Http\Response
     */

    public function sign_up()
    {
        $pageTitle = 'Customer sign up';

        // app('mathcaptcha')->reset();
        return view("Web::customer.sign_up", compact('pageTitle'));
    }


    public function do_register(Requests\RegisterRequest $request)
    {
//        dd($request->all());

        $input = $request->all();

        UserVerificationSession::where('email', '=', $input['email'])
            ->orWhere('mobile_no', '=', $input['mobile_no'])->delete();

        $arrData = [
            'name' => $input['username'],
            'email' => $input['email'],
            'mobile_no' => $input['mobile_no'],
            'verification_key' => UserVerificationSession::generateUniqueKey(),
            'verification_type' => 'URL',
            'user_type' => 'CUSTOMER',
            'verification_purpose' => 'REGISTRATION',
            'password' => $input['password'],
            'verification_mode' => 'EMAIL',
        ];

//        $modelSession = new UserVerificationSession();
//        $modelSession->uuid = Uuid::uuid1();
//        $modelSession->name = $input['username'];
//        $modelSession->email = $input['email'];
//        $modelSession->mobile_no = $input['mobile_no'];
//        $verification_key = UserVerificationSession::generateUniqueKey();
//        $modelSession->verification_key = $verification_key;
////        $modelSession->otp = UserVerificationSession::generateUniqueOTP();
//        $modelSession->verification_type = 'URL';
//        $modelSession->user_type = 'CUSTOMER';
//        $modelSession->verification_purpose = 'REGISTRATION';
//        $modelSession->password = $input['password'];
//        $modelSession->verification_mode = 'EMAIL';

//        $model = new User();
//        $model->username = $input['username'];
//        $model->email = $input['email'];
//        $model->password = $input['password'];
//        $model->mobile_no = $input['mobile_no'];
//        $model->type = 'customer';
//        $model->status = 'active';
//        $model->remember_token = md5(str_random(10));

//        if (!empty($input['email'])) {
//            $check_email_exists = DB::table('users')->where('email', $input['email'])->first();
//            if (!empty($check_email_exists)) {
//                Session::flash('danger', "Dear customer, your email address already present");
//                return back();
//            }
//        }

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            UserVerificationSession::create($arrData);
            // $modelSession->save();
//            $model->save();


            $singleEmail['email_subject'] = 'Registration confirmation';
            $singleEmail['email_body'] = [
                'name' => $arrData['name'],
                'email' => $arrData['email'],
                'key' => $arrData['verification_key'],
            ];
            Mail::to($input['email'])->send(new CustomerVerification($singleEmail));

//            Session::flash('message', 'Thank you for registration, please stay with us');
            Session::flash('message', 'Verification link has been sent to your email. Please verify');

            DB::commit();

            return redirect()->route('customer.login');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());

        }
        return back();

    }

    //confirm mail
    public function confirm_email($slug)
    {
//        $pageTitle = 'Confirm registration';
//
//        $user_data = User::where('users.remember_token', $slug)
//            ->select('users.*')
//            ->first();
        $verification_data = (new UserVerificationSession)->checkSessionByKey($slug);
        //dd($verification_data);
        if ($verification_data) {
            User::create([
                'username' => $verification_data->name,
                'email' => $verification_data->email,
                'mobile_no' => $verification_data->mobile_no,
                'password' => $verification_data->password,
                'roles_id' => 3,
                'type' => 'customer',
                'status' => 'active'
            ]);
            (new UserVerificationSession())->deleteSession($verification_data->uuid);
            $attempt = Auth::attempt([
                'email' => $verification_data->email,
                'password' => $verification_data->password,
                'type' => 'customer'
            ]);
//            dd($attempt);
            if ($attempt) {
                Session::flash('message', "Successfully  Logged In.");
                return redirect()->route('customer.dashboard');
            }
        }

        Session::flash('danger', "No record found/session expired.");
        echo "No record found/session expired.";
        die;
        //return redirect()->route('customer.dashboard');
//
//        if (!isset($user_data->remember_token)) {
//
//            Session::flash('danger', "Token not found.");
//            return redirect('customer/login');
//        } else {
//
//            $model = DB::table('users')
//                ->where('users.remember_token', $slug)
//                ->update([
//                    'status' => 'active',
//                    'remember_token' => '',
//                ]);
//
//            Session::flash('message', "Thank you so much for your registration.");
//            return redirect('customer/login');
//        }
    }

    public function post_login(Requests\LoginRequest $request)
    {
        $input = $request->all();
        $user_data = Auth::user();

        if (Auth::check() && $user_data->type != 'customer') {
            Auth::logout();
        }

        if (count($input) > 0) {

            if (Auth::check() && $user_data->type == 'customer') {
                Session::flash('message', "You Have Already Logged In.");

                if ($user_data->type == 'customer') {
                    return redirect()->route('customer.dashboard');
                }
            } else {
                //Check email is exists into this system
                $user_data = DB::table('users')
                    ->where('email', $input['email'])
                    ->where('type', 'customer')
                    ->first();

                $logged_data = 'no';

                if (!empty($user_data)) {
                    $logged_data = 'yes';
                } else {
                    //Check mobile is exists into this system
                    $user_data = DB::table('users')
                        ->where('mobile_no', $input['email'])
                        ->where('type', 'customer')
                        ->first();
                    if (!empty($user_data)) {
                        $logged_data = 'yes';
                        $phone_loging = 'yes';
                    }

                }

                if ($logged_data == 'yes') {

                    $check_password = Hash::check($input['password_r'], $user_data->password);

                    //if password matched
                    if ($check_password) {
                        //if user is inactive
                        if ($user_data->status == 'inactive') {
                            Session::flash('danger', "Sorry! Your Account Is Inactive. Please verify your email or Contact With Administrator To active Account.");
                        } else {
                            if (Auth::check() && $user_data->type == 'customer') {
                                Session::flash('message', "You are already Logged-in! ");
                                return redirect()->route('customer.dashboard');
                            } else {

                                if (isset($phone_loging) && $phone_loging == 'yes') {

                                    $attempt = Auth::attempt([
                                        'mobile_no' => $input['email'],
                                        'password' => $input['password_r'],
                                        'type' => 'customer'
                                    ]);

                                } else {

                                    $attempt = Auth::attempt([
                                        'email' => $input['email'],
                                        'password' => $input['password_r'],
                                        'type' => 'customer'
                                    ]);

                                }


                                if ($attempt) {
                                    Session::flash('message', "Successfully  Logged In.");
                                    return redirect()->route('customer.dashboard');
                                }
                            }
                        }
                    } else {
                        Session::flash('danger', "Password Incorrect. Please Try Again!!!");
                    }
                } else {
                    Session::flash('danger', "Email or Phone does not exists. Please Try Again");

                }
            }
        } else {
            Session::flash('danger', "Please provide valid email or phone");
        }
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $pageTitle = 'Customer dashboard';

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        // Total order placed
        // $total_order=OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')->where('users_id',$user_data->id)->count();
        $total_order = OrderHead::where('users_id', $user_data->id)->orderby('id', 'desc')->count();

        // Total order cancel
        $total_order_cancel = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('users_id', $user_data->id)->where('order_details.status', 'cancel')->count();

        // Total order pending
        $total_pending_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('users_id', $user_data->id)->where('order_details.status', 'active')->count();

        // Total order confirmed
        $total_confirmed_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('users_id', $user_data->id)->where('order_details.status', 'confirmed')->count();

        // Total order shipped
        $total_shipped_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('users_id', $user_data->id)->where('order_details.status', 'processing')->count();

        // Total order delivered
        $total_delivered_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')->where('users_id', $user_data->id)->where('order_details.status', 'delivered')->count();

        $total_payment_pending = OrderHead::join('order_transaction', 'order_transaction.order_head_id', '=', 'order_head.id')->where('users_id', $user_data->id)->where('order_transaction.status', 'inactive')->count();

        $total_payment_receive = OrderHead::join('order_transaction', 'order_transaction.order_head_id', '=', 'order_head.id')->where('users_id', $user_data->id)->where('order_transaction.status', 'active')->count();

        $total_payment_cancel = OrderHead::join('order_transaction', 'order_transaction.order_head_id', '=', 'order_head.id')->where('users_id', $user_data->id)->where('order_transaction.status', 'cancel')->count();

        // Latest order list order_transaction
        $order_data = OrderHead::where('users_id', $user_data->id)->orderBy('id', 'desc')->paginate(30);


        return view('Web::customer.dashboard', [
            'pageTitle' => $pageTitle,
            'user_data' => $user_data,
            'total_order' => $total_order,
            'total_pending_order' => $total_pending_order,
            'total_confirmed_order' => $total_confirmed_order,
            'total_delivered_order' => $total_delivered_order,
            'total_shipped_order' => $total_shipped_order,
            'total_order_cancel' => $total_order_cancel,
            'total_payment_cancel' => $total_payment_cancel,
            'total_payment_pending' => $total_payment_pending,
            'total_payment_receive' => $total_payment_receive,
            'order_data' => $order_data
        ]);
    }


    public function address()
    {

        $pageTitle = "My address ";

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        $billing_address = DB::table('users_billing_shipping')->where('type', 'billing')->where('users_id', $user_data->id)->first();

        $shipping_address = DB::table('users_billing_shipping')->where('type', 'shipping')->where('users_id', $user_data->id)->get();


        return view('Web::customer.customer_address_info', [
            'pageTitle' => $pageTitle,
            'user_data' => $user_data,
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address
        ]);
    }


    public function store_billing_shipping(Requests\UsersBillingShippingRequest $request)
    {
        $input = $request->all();

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        $type = $input['type'];

        if ($type == 'billing') {
            $exists_billing_shipping_data = DB::table('users_billing_shipping')->where('users_id', $input['users_id'])->where('type', 'billing')->exists();

            if ($exists_billing_shipping_data) {
                Session::flash('danger', 'Already added billing address, please select shipping');

                return redirect()->back();
            }
        }

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            $users_billing_shipping_model = new UserBillingShipping();
            if ($users_billing_shipping_model->create($input)) {

            }

            DB::commit();

            Session::flash('message', 'The billing/shipping information added.');
            return back();

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            exit($e->getMessage());
        }

        //return redirect()->back();

    }


    public function destroy_billing_shipping($id)
    {

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        $billing_shipping_data = UserBillingShipping::where('users_id', $user_data->id)->where('id', $id)->first();

        if (!isset($billing_shipping_data)) {
            return redirect('customer/address');
        }

        DB::beginTransaction();
        try {
            // Destroy
            $billing_shipping_data->delete();

            DB::commit();
            Session::flash('message', "Successfully Deleted.");

            return redirect('customer/address');

        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        // redirect to current page
        return redirect()->back();
    }


    public function customer_order($status)
    {

        $pageTitle = 'Customer Order';

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }


        if ($status == 'cancel') {
            // Total order pending
            $order_data = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
                ->where('order_head.users_id', Auth::user()->id)
                ->where('order_details.status', 'cancel')
                ->orderBy('order_head.id', 'desc')
                ->paginate(30);
        }


        if ($status == 'active') {
            // Total order pending
            $order_data = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
                ->where('order_head.users_id', Auth::user()->id)
                ->where('order_details.status', 'active')
                ->orderBy('order_head.id', 'desc')
                ->paginate(30);
        }

        if ($status == 'confirmed') {

            // Total order approved

            // $order_data = OrderHead::with(['relOrderDetail.relProduct'=>function($query){

            //   }])
            // ->where('status','confirmed')
            // ->where('users_id',$user_data->id)
            // ->orderby('order_head.id','desc')
            // ->paginate(30);


            $order_data = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
                ->where('users_id', $user_data->id)
                ->where('order_details.status', 'confirmed')
                ->orderby('order_head.id', 'desc')
                // ->groupBy('order_details.product_seller_id ')
                ->paginate(30);


            //dd($order_data);
        }

        if ($status == 'processing') {
            // Total order pending
            $order_data = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
                ->where('order_head.users_id', Auth::user()->id)
                ->where('order_details.status', 'processing')
                ->orderBy('order_head.id', 'desc')
                ->paginate(30);
        }

        if ($status == 'delivered') {

            // Total order delivered
            $order_data = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
                ->where('order_head.users_id', Auth::user()->id)
                ->where('order_details.status', 'delivered')
                ->orderBy('order_details.id', 'desc')
                ->paginate(30);
        }

        if ($status == 'inactive') {
            // Total order Unpaid
            $order_data = OrderHead::join('order_transaction', 'order_transaction.order_head_id', '=', 'order_head.id')
                ->where('order_head.users_id', Auth::user()->id)
                ->where('order_transaction.status', 'inactive')
                ->orderBy('order_head.id', 'desc')
                ->paginate(30);
        }

        if ($status == 'pactive') {
            // Total order Paid
            $order_data = OrderHead::join('order_transaction', 'order_transaction.order_head_id', '=', 'order_head.id')
                ->where('order_head.users_id', Auth::user()->id)
                ->where('order_transaction.status', 'active')
                ->orderBy('order_head.id', 'desc')
                ->paginate(30);
        }

        if ($status == 'pcancel') {
            // Payment cancel
            $order_data = OrderHead::join('order_transaction', 'order_transaction.order_head_id', '=', 'order_head.id')
                ->where('order_head.users_id', Auth::user()->id)
                ->where('order_transaction.status', 'cancel')
                ->orderBy('order_head.id', 'desc')
                ->paginate(30);
        }

        if ($status == 'all') {
            // All order
            // $order_data = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')->where('users_id',$user_data->id)
            // ->orderBy('order_head.id', 'desc')
            // ->paginate(30);

            $order_data = OrderHead::where('users_id', $user_data->id)->orderby('id', 'desc')->paginate(30);
        }

        return view('Web::customer.customer_order', [
            'pageTitle' => $pageTitle,
            'user_data' => $user_data,
            'order_data' => $order_data
        ]);
    }


    public function show_order($order_number)
    {

        $pageTitle = 'Order Details';

        if (Session::has('user_email')) {
            $user_email = Session::get('user_email');
        }

        $user_data = Auth::user();

        if (isset($user_data) && $user_data->type == 'customer') {

            $users_id = $user_data->id;

        } else {

            $order_head_data = OrderHead::where('order_number', $order_number)->first();
            $users_id = $order_head_data->users_id;

        }

        if (!empty($user_data)) {

            $checkemail = DB::table('users')
                ->where('users.id', $users_id)
                ->first();


            $data = OrderHead::with(['relOrderShipping', 'relOrderDetail.relProduct' => function ($query) {

            }])->where('order_number', $order_number)->first();

            $order_shop = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
                ->join('seller_profiles', 'seller_profiles.users_id', '=', 'order_details.product_seller_id')
                ->where('order_number', $order_number)
                ->get();

            //dd($order_shop );

            //   $mail_body = \Illuminate\Support\Facades\View::make('Web::cart.cartmail', ['data'=> $data]);
            //   $contents = $mail_body->render();

            //   $send_mail = \App\Http\Helpers\SendMail::fire($user_email, 'Order confirmation email ', $contents, '');

            // Session::flash('message', 'Your order is successfully placed.');

            // Session Remove
            Session::forget('cart');
            Session::forget('user_email');
            Session::forget('cart_total');
            Session::forget('coupon_amount');
            Session::forget('coupon_code');

            return view('Web::customer.show_order', [
                'pageTitle' => $pageTitle,
                'data' => $data,
                'order_shop' => $order_shop

            ]);


        } else {
            Session::flash('error', 'Sorry your cart is empty.');
            //return back();
        }
    }

    public function track($id)
    {

        $pageTitle = 'Order Details';

        if (Session::has('user_email')) {
            $user_email = Session::get('user_email');
        }

        $user_data = Auth::user();

        if (isset($user_data) && $user_data->type == 'customer') {

            $users_id = $user_data->id;

        } else {

            $order_head_data = OrderHead::where('order_number', $id)->first();

            $users_id = $order_head_data->users_id;

        }

        if (!empty($user_data)) {

            $checkemail = DB::table('users')
                ->where('users.id', $users_id)
                ->first();


            $data = OrderHead::with(['relOrderShipping', 'relOrderDetail.relProduct' => function ($query) {

            }])->where('order_number', $id)->first();


            // Session Remove
            // Session::forget('cart');
            // Session::forget('user_email');
            // Session::forget('cart_total');
            // Session::forget('coupon_amount');
            // Session::forget('coupon_code');

            return view('Web::customer.track_order', [
                'pageTitle' => $pageTitle,
                'data' => $data
            ]);


        } else {
            Session::flash('error', 'Sorry your cart is empty.');
            //return back();
        }
    }


    public function customer_logout()
    {
        Auth::logout();
        return redirect('customer/login');
    }


    public function profile()
    {
        $pageTitle = 'Profile';

        $customer_data = Auth::user();

        if (empty($customer_data)) {
            return redirect()->intended('customer/login');
        }

        if ($customer_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        return view('Web::customer.customer_profile', [
            'pageTitle' => $pageTitle,
            'customer_data' => $customer_data

        ]);
    }


    public function do_customer_edit_information(Requests\EditInformationRequest $request)
    {

        $input = $request->all();

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        $user_model = $user_data;

        $user_model->username = $input['username'];
        $user_model->email = $input['email'];
        $user_model->mobile_no = $input['mobile_no'];

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            if ($user_model->save()) {

            }

            DB::commit();

            Session::flash('message', 'The basic information has been saved.');
            return redirect('customer/profile');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());

        }

        return redirect()->back();
    }


    public function edit_billing_address($id)
    {
        $response = [];

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        $billing_shipping_data = DB::table('users_billing_shipping')->where('users_id', $user_data->id)->where('id', $id)->first();

        if (!isset($billing_shipping_data)) {
            return redirect()->intended('customer/login');
        }

        if (!empty($billing_shipping_data)) {

            $pageTitle = "Customer Address";

            $view = \Illuminate\Support\Facades\View::make('Web::customer.edit_billing_shipping_info', compact('billing_shipping_data', 'pageTitle', 'user_data'));

            $contents = $view->render();

            $response['result'] = 'success';
            $response['content'] = $contents;

        } else {

            $response['result'] = 'error';

        }

        return $response;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function review()
    {
        $pageTitle = 'Customer review';

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        $review_data = ProductReview::where('customer_id', $user_data->id)->orderBy('id', 'desc')->get();

        return view('Web::customer.customer_review', [
            'pageTitle' => $pageTitle,
            'user_data' => $user_data,
            'review_data' => $review_data,

        ]);
    }


    public function wishlist()
    {

        $pageTitle = "Customer wishlist";

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        // WishList
        $wishlist_data = Wishlist::where('users_id', $user_data->id)->orderby('id', 'desc')->get();

        return view('Web::customer.customer_wishlist', [
            'pageTitle' => $pageTitle,
            'user_data' => $user_data,
            'wishlist_data' => $wishlist_data,

        ]);

    }


    public function customer_post_login(Request $request)
    {
        $input = $request->all();
        $user_data = Auth::user();

        if (Auth::check() && $user_data->type != 'customer') {
            Auth::logout();
        }

        if (count($input) > 0) {
            // Already LogIn

            if (Auth::check() && $user_data->type == 'customer') {
                Session::flash('message', "You Have Already Logged In.");

                if ($user_data->type == 'customer') {
                    return redirect()->route('web.cart.checkout');
                }
            } else {
                //Check email is exists into this system
                $user_data = DB::table('users')
                    ->where('email', $input['email'])
                    ->where('type', 'customer')
                    ->first();

                $logged_data = 'no';

                if (!empty($user_data)) {
                    $logged_data = 'yes';
                } else {
                    //Check mobile is exists into this system
                    $user_data = DB::table('users')
                        ->where('mobile_no', $input['email'])
                        ->where('type', 'customer')
                        ->first();
                    if (!empty($user_data)) {
                        $logged_data = 'yes';
                        $phone_loging = 'yes';
                    }

                }


                if ($logged_data == 'yes') {
                    $user_id = $user_data->id;

                    $check_password = Hash::check($input['password'], $user_data->password);

                    //if password matched
                    if ($check_password) {
                        //if user is inactive
                        if ($user_data->status == 'inactive') {
                            Session::flash('danger', "Sorry! Your Account Is Inactive. Please verify your email or Contact With Administrator To active Account.");
                        } else {
                            if (Auth::check() && $user_data->type == 'customer') {
                                Session::flash('message', "You are already Logged-in! ");
                                return redirect()->route('customer.dashboard');
                            } else {

                                if (isset($phone_loging) && $phone_loging == 'yes') {

                                    $attempt = Auth::attempt([
                                        'mobile_no' => $input['email'],
                                        'password' => $input['password'],
                                        'type' => 'customer'
                                    ]);

                                } else {

                                    $attempt = Auth::attempt([
                                        'email' => $input['email'],
                                        'password' => $input['password'],
                                        'type' => 'customer'
                                    ]);

                                }


                                if ($attempt) {
                                    $customer_info = DB::table('users_billing_shipping')
                                        ->where('users_id', $user_id)
                                        ->where('type', 'billing')
                                        ->get();
                                    Session::flash('message', "Successfully  Logged In.");
                                    return redirect()->route('web.cart.checkout');
                                }
                            }
                        }
                    } else {
                        Session::flash('danger', "Password Incorrect. Please Try Again!!!");
                    }
                } else {
                    Session::flash('danger', "Email or phone no does not exists. Please Try Again");

                }


            }
        } else {
            Session::flash('danger', "Please provide your required information");
        }
        return redirect()->back();
    }


    public function reset_password()
    {
        $pageTitle = 'Forget Password';

        return view('Web::passwordreset.forgetpassword', [
            'pageTitle' => $pageTitle,

        ]);
    }

    public function sendmailtouser(Request $request)
    {

        $user_data = Auth::user();
        $input = $request->all();

        //Check email is exists into this system
        $token = md5(time());
        $model = DB::table('users')
            ->where('users.email', $request->email)
            ->update(['remember_token' => $token]);

        $user = DB::table('users')
            ->where('email', $input['email'])
            ->where('type', 'customer')
            ->first();


        if (!empty($user)) {

            $mail_body = View::make('Web::passwordreset._password_email_template', ['user_data' => $user]);
            $contents = $mail_body->render();

            $send_mail = \App\Http\Helpers\MailHelper::sendMail($user->email, 'Reset Password', $contents, '');

            Session::flash('message', 'Please Check Your Email, and follow those instruction.');
            return redirect()->back();

        } else {

            Session::flash('danger', "Your email address is incorrect.");
        }

        return redirect()->back();


    }


    public function change_form($slug)
    {
        $pageTitle = 'Forget Password';

        $data = User::where('users.remember_token', $slug)
            ->select('users.*')
            ->first();

        if (empty($data->remember_token)) {

            Session::flash('danger', "Token not found.");
            return redirect('customer/login');
        } else {

            return view('Web::passwordreset.passwordchange_form', [
                'pageTitle' => $pageTitle,
                'data' => $data,

            ]);
        }

    }

    public function save_chage_password(Request $request)
    {

        $user_data = Auth::user();

        $input = $request->all();

        // $this->validate($request, [
        //     'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        //     'password_confirmation' => 'min:6'
        // ]);

        if ($input['password'] === $input['password_confirmation']) {

            $model = DB::table('users')
                ->where('users.remember_token', $input['dataemail'])
                ->update([
                    'password' => Hash::make($input['password']),
                    'remember_token' => '',
                ]);

            if ($model) {
                Session::flash('message', "Password changed successfully.");
                return redirect('customer/login');
            } else {
                Session::flash('danger', "Unable to change password.");
            }
        } else {
            Session::flash('danger', "Do not match confirm password");
        }

        return redirect()->back();


    }


    public function add_to_wishlist(Request $request)
    {

        $response = [];

        $input = $request->all();

        if (!Auth::user()) {
            $response['result'] = 'error';
            $response['message'] = 'Please login your account to wishlist this item.';
            return $response;
        }

        $user_data = Auth::user();

        $product_id = $input['product_id'];
        if (!empty($product_id)) {

            $check_exist = Wishlist::where('users_id', $user_data->id)->where('product_id', $product_id)->exists();

            if (!$check_exist) {
                $model = new Wishlist();
                $model->users_id = $user_data->id;
                $model->product_id = $product_id;
                $model->save();

                $response['result'] = 'success';
                $response['message'] = 'Product successfully added to wishlist.';


            } else {
                $response['result'] = 'already_added';
                $response['message'] = 'Product already added to your wishlist.';
            }
        } else {

            $response['result'] = 'already_added';
            $response['message'] = 'Product already added to your wishlist.';

        }


        //$total_items = Wishlist::where('users_id',$user_data->id)->count();
        //$response['total_item'] = $total_items;

        return $response;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_wishlist($id)
    {

        // Find Wishlist
        $user_data = Auth::user();

        $model = Wishlist::where('product_id', $id)
            ->where('users_id', $user_data->id)
            ->first();

        DB::beginTransaction();
        try {

            if ($model->delete()) {

            }

            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        // redirect to current page
        return redirect()->back();

    }


    public function update_billing_shipping_address(Requests\UsersBillingShippingRequest $request, $id)
    {

        $input = $request->all();

        $pageTitle = "Update Billing OR Shipping Address";

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        $billing_shipping_data = UserBillingShipping::where('users_id', $user_data->id)->where('id', $id)->first();

        if (!isset($billing_shipping_data)) {
            return redirect('customer/address');
        }

        DB::beginTransaction();
        try {
            // Update
            $result = $billing_shipping_data->update($input);
            DB::commit();

            Session::flash('message', 'Successfully updated!');
            return redirect('customer/address');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    public function do_change_password(Requests\ChangePasswordRequest $request)
    {

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('customer/login');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('customer/login');
        }

        $input = $request->all();

        $check_password = Hash::check($input['old_password'], $user_data->password);
        if ($check_password) {
            $user_data->password = $input['password'];

            if ($user_data->save()) {
                Session::flash('message', "Password changed successfully.");
                return redirect('customer/dashboard');
            } else {
                Session::flash('danger', "Unable to change password.");
            }
        } else {
            Session::flash('danger', "Old password incorrect.");
        }

        return redirect()->back();


    }


}
