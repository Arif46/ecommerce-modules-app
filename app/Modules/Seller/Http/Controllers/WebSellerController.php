<?php

namespace App\Modules\Seller\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Seller\Requests;
use App\User;

use App\Modules\Seller\Models\Seller;
use App\Modules\Seller\Models\DeliveryOption;
use App\Modules\Seller\Models\Coupon;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\ProductImage;
use App\Modules\Product\Models\ProductSeo;
use App\Modules\Product\Models\ProductInventory;
use App\Modules\Product\Models\ProductReview;
use App\Modules\Product\Models\ProductCategory;
use App\Modules\Product\Models\ProductAttribute;
use App\Modules\Product\Models\ProductShipping;
use App\Modules\Product\Models\ProductCoupon;
use App\Modules\Category\Models\Category;
use App\Modules\Brand\Models\Brand;
use App\Modules\Order\Models\OrderHead;
use App\Modules\Order\Models\OrderTransaction;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Promise\all;


class WebSellerController extends Controller
{

    protected $seller_image_path;
    protected $image_relative_path;
    protected $deleteable_color_size_quantity_ids = [];
    protected $insertableRecords = [];
    protected $updatableRecords = [];
    protected $productId = null;

    public function __construct()
    {
        $this->seller_image_path = public_path('uploads/seller');
        $this->image_relative_path = '/uploads/seller';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function isGetRequest()
    {
        return Request::server("REQUEST_METHOD") == "GET";
    }


    /**
     * @return bool
     */
    protected function isPostRequest()
    {
        return Request::server("REQUEST_METHOD") == "POST";
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
        $pageTitle = 'Seller area';

        if ($user = Auth::user()) {
            if ($user->type == 'seller') {
                Session::flash('message', "You Have Already Logged In.");
                return redirect()->back();
            }
        }

        $model = new User();

        return view('Seller::webseller.index', [
            'pageTitle' => $pageTitle,
            'model' => $model,
        ]);

    }

    /**
     * Show the form for register a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        $pageTitle = 'Seller registration';


        return view('Seller::webseller.registration', [
            'pageTitle' => $pageTitle,

        ]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function do_registration(Requests\SellerRegisterRequest $request)
    {

        $input = $request->all();
        //dd('ok');
//dd($input);
        // Check already presents or not
        $data = User::where('email', $input['email'])->exists();

        if (!$data) {

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                $model = new User();
                $model->email = $input['email'];
                $model->password = $input['password'];
                $model->mobile_no = $input['mobile_no'];
                $model->username = $input['username'];
                $model->type = 'seller';
                $model->status = 'pending';
                $model->remember_token = md5(str_random(10));

                if ($model->save()) {
                    $user = DB::table('users')
                        ->where('email', $input['email'])
                        ->where('type', 'seller')
                        ->first();

                    if (!empty($user)) {
                        $merchant_model = new Seller();
                        $merchant_model->user_id = $user->id;
                        $merchant_model->shop_name = $input['shop_name'];
                        $merchant_model->shop_address = $input['shop_address'];
                        $merchant_model->save();

                        DB::commit();
                        Session::flash('message', 'Successfully registration');
                        return redirect()->route('login.seller.area');
                    }
                }

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());

            }
        } else {
            Session::flash('info', 'This seller already added!');
            return redirect()->route('login.seller.area');
            // return redirect()->route('seller.do_registration');
        }


    }


    /**
     * Show the form for login a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $pageTitle = 'Seller login';

        return view('Seller::webseller.login', [
            'pageTitle' => $pageTitle,

        ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editOtherProfileInfo()
    {
        dd('ok');
        $pageTitle = 'Seller Profile Information';

        $user_data = \Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('seller/login');
        }

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.user_id')->where('users.id', $user_data->id)->select('users.email', 'users.seller_agreement', 'users.username', 'users.mobile_no', 'users.id', 'seller_profiles.*')->first();

        // Total order placed
        $total_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)->count();

        // Total order cancel
        $total_order_cancel = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'cancel')->count();

        // Total order pending
        $total_pending_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'active')->count();

        // Total order confirmed
        $total_confirmed_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'confirmed')->count();

        // Total order shipped
        $total_shipped_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'processing')->count();

        // Total order delivered
        $total_delivered_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'delivered')->count();

        // Latest order list
        $order_data = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->orderBy('order_head.id', 'desc')->paginate(30);

        $total_product_sold = Product::join('order_details', 'order_details.product_id', '=', 'product.id')->where('order_details.status', 'delivered')->where('order_details.product_seller_id', \Auth::user()->id)->count();

        $total_product_active = Product::whereNotIn('status', ['cancel', ''])->where('seller_id', \Auth::user()->id)->where('status', 'active')->count();
        $total_product_inactive = Product::whereNotIn('status', ['cancel', ''])->where('seller_id', \Auth::user()->id)->where('status', 'inactive')->count();

        $total_payment_cancel = OrderTransaction::where('status', 'cancel')->where('seller_id', \Auth::user()->id)->count();
        $total_payment_pending = OrderTransaction::where('status', 'inactive')->where('seller_id', \Auth::user()->id)->count();
        $total_payment_receive = OrderTransaction::where('status', 'active')->where('seller_id', \Auth::user()->id)->count();


        return view('Seller::webseller.edit_profile_info', [
            'pageTitle' => $pageTitle,
            'user_data' => $user_data,
            'verifaid_user' => $verifaid_user,
            'total_order' => $total_order,
            'total_order_cancel' => $total_order_cancel,
            'total_shipped_order' => $total_shipped_order,
            'total_pending_order' => $total_pending_order,
            'total_confirmed_order' => $total_confirmed_order,
            'total_delivered_order' => $total_delivered_order,

            'total_product_sold' => $total_product_sold,
            'total_product_active' => $total_product_active,
            'total_product_inactive' => $total_product_inactive,
            'total_payment_cancel' => $total_payment_cancel,
            'total_payment_pending' => $total_payment_pending,
            'total_payment_receive' => $total_payment_receive,
            'order_data' => $order_data
        ]);
    }


    public function post_login(Request $request)
    {
        $input = $request->all();
        $user_data = DB::table('users')->where('email', $input['email'])->where('status', 'active')->where('type', 'seller')->first();


        if (Auth::check() && $user_data->type != 'customer') {
            Auth::logout();
        }

        if (!empty($input)) {

            if (Auth::check() && $user_data->type == 'seller') {
                Session::flash('message', "You Have Already Logged In.");

                if ($user_data->type == 'seller') {
                    return redirect()->route('seller.dashboard');
                }
            } else {
                //Check email is exists into this system
                $user_data = DB::table('users')
                    ->where('email', $input['email'])
                    ->where('type', 'seller')
                    ->first();

                $logged_data = 'no';

                if (!empty($user_data)) {
                    $logged_data = 'yes';
                } else {
                    //Check mobile is exists into this system
                    $user_data = DB::table('users')
                        ->where('mobile_no', $input['email'])
                        ->where('type', 'seller')
                        ->first();

                    if (!empty($user_data)) {
                        $logged_data = 'yes';
                        $phone_loging = 'yes';
                    }

                }

                if ($logged_data == 'yes') {
                    $check_password = Hash::check($input['password'], $user_data->password);

                    //if password matched
                    if ($check_password) {
                        //if user is inactive
                        if ($user_data->status === 'inactive') {
                            Session::flash('danger', "Sorry! Your Account Is Inactive. Please verify your email or Contact With Administrator To active Account.");
                        } else if ($user_data->status === 'pending') {
                            return redirect()->route('seller.editOtherProfileInfo');
                        } else {
                            if (Auth::check() && $user_data->type === 'seller') {
                                Session::flash('message', "You are already Logged-in! ");
                                return redirect()->route('merchant.dashboard');
                            } else {

                                if (isset($phone_loging) && $phone_loging === 'yes') {

                                    $attempt = Auth::attempt([
                                        'mobile_no' => $input['email'],
                                        'password' => $input['password'],
                                        'type' => 'seller'
                                    ]);

                                } else {

                                    $attempt = Auth::attempt([
                                        'email' => $input['email'],
                                        'password' => $input['password'],
                                        'type' => 'seller'
                                    ]);

                                }

                                if ($attempt) {
                                    Session::flash('message', "Successfully  Logged In.");
                                    return redirect()->route('seller.dashboard');
                                }
                            }
                        }
                    } else {
                        Session::flash('danger', "Password Incorrect. Please Try Again!!!");
                    }
                } else {
                    Session::flash('danger', "Email or Mobile no does not exists. Please Try Again");

                }
            }
        } else {
            Session::flash('danger', "Please provide valid Email or Mobile No");
        }
        return redirect()->back();

    }

    public function post_login_seller(Request $request)
    {
        dd($request->all());
        if (Auth::user() !== null) {
            Auth::logout();
        }
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
//        $input=$request->all();
//        $validator = Validator::make($input, $rules);
//        dd($validator);
//        if (!$validator->passes()) {
//            $errors = $validator->messages();
//            Session::flash('message', 'Invalid Email or Password');
//            return redirect()->back()->withErrors($errors)->withInput();
//        }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials['type'] = 'seller';
        dd($credentials);
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('merchant.dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $pageTitle = 'Dashboard';

        $user_data = \Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('seller/login');
        }

        if ($user_data->type != 'seller' && $user_data->status != 'active') {
            return redirect()->intended('seller/login');
        }

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.user_id')->where('users.id', $user_data->id)->select('users.email', 'users.seller_agreement', 'users.username', 'users.mobile_no', 'users.id', 'seller_profiles.*')->first();

        // Total order placed
        $total_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)->count();

        // Total order cancel
        $total_order_cancel = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'cancel')->count();

        // Total order pending
        $total_pending_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'active')->count();

        // Total order confirmed
        $total_confirmed_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'confirmed')->count();

        // Total order shipped
        $total_shipped_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'processing')->count();

        // Total order delivered
        $total_delivered_order = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->where('order_details.status', 'delivered')->count();

        // Latest order list
        $order_data = OrderHead::join('order_details', 'order_details.order_head_id', '=', 'order_head.id')
            ->where('order_details.product_seller_id', \Auth::user()->id)
            ->orderBy('order_head.id', 'desc')->paginate(30);

        $total_product_sold = Product::join('order_details', 'order_details.product_id', '=', 'product.id')->where('order_details.status', 'delivered')->where('order_details.product_seller_id', \Auth::user()->id)->count();

        $total_product_active = Product::whereNotIn('status', ['cancel', ''])->where('seller_id', \Auth::user()->id)->where('status', 'active')->count();
        $total_product_inactive = Product::whereNotIn('status', ['cancel', ''])->where('seller_id', \Auth::user()->id)->where('status', 'inactive')->count();

        $total_payment_cancel = OrderTransaction::where('status', 'cancel')->where('seller_id', \Auth::user()->id)->count();
        $total_payment_pending = OrderTransaction::where('status', 'inactive')->where('seller_id', \Auth::user()->id)->count();
        $total_payment_receive = OrderTransaction::where('status', 'active')->where('seller_id', \Auth::user()->id)->count();


        return view('Seller::webseller.dashboard', [
            'pageTitle' => $pageTitle,
            'user_data' => $user_data,
            'verifaid_user' => $verifaid_user,
            'total_order' => $total_order,
            'total_order_cancel' => $total_order_cancel,
            'total_shipped_order' => $total_shipped_order,
            'total_pending_order' => $total_pending_order,
            'total_confirmed_order' => $total_confirmed_order,
            'total_delivered_order' => $total_delivered_order,

            'total_product_sold' => $total_product_sold,
            'total_product_active' => $total_product_active,
            'total_product_inactive' => $total_product_inactive,
            'total_payment_cancel' => $total_payment_cancel,
            'total_payment_pending' => $total_payment_pending,
            'total_payment_receive' => $total_payment_receive,
            'order_data' => $order_data
        ]);
    }


    /**
     * Show the form for merchant profile a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller_profile()
    {
        $pageTitle = 'Seller profile';

        $data = \Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.user_id')->where('users.id', $data->id)->select('users.email', 'users.seller_agreement', 'users.username', 'users.mobile_no', 'users.id', 'seller_profiles.*')->first();


        return view('Seller::webseller.seller_profile', [
            'pageTitle' => $pageTitle,
            'verifaid_user' => $verifaid_user
        ]);

    }


    /**
     * Show the form for save change
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_seller_profile(Requests\SellerProfileRequest $request)
    {

        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            $model = DB::table('seller_profiles')
                ->where('seller_profiles.user_id', $input['user_id'])
                ->update([
                    'shop_name' => $input['shop_name'],
                    'shop_address' => $input['shop_address'],
                    'shop_description' => $input['shop_description'],
                    'first_contact_person_details' => $input['first_contact_person_details'],
                    'nid' => $input['nid']
                ]);

            if (!empty($input)) {
                $users = DB::table('users')
                    ->where('users.id', $input['user_id'])
                    ->where('type', 'seller')
                    ->update([
                        'username' => $input['username']
                    ]);
            }


            DB::commit();

            Session::flash('message', 'Seller Profile Successfully Updated');
            return redirect()->route('seller.profile');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());

        }

        return redirect()->back();

    }


    /**
     * Show the form for logout from zinismart merchant.
     *
     * @return \Illuminate\Http\Response
     */

    public function seller_logout()
    {
        Auth::logout();
        return redirect()->route('login.seller.area');
    }


    /**
     * Show the form for change merchant product form.
     *
     * @return \Illuminate\Http\Response
     */

    public function my_product()
    {

        $pageTitle = 'Seller product';

        $data = \Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.id', 'users.username', 'seller_profiles.shop_name')->first();

        $product = Product::where('status', '!=', 'cancel')->where('seller_id', $data->id)->orderBy('id', 'desc')->paginate(20);

        $category_lists = ['' => 'Select category'] + Category::join('category_self_relation', 'category.id', '=', 'category_self_relation.child_category_id')->where('parent_category_id', NULL)->where('status', 'active')->pluck('category.title', 'category.id')->all();


        return view('Seller::webseller_product.seller_product', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'verifaid_user' => $verifaid_user,
            'product' => $product,
            'category_lists' => $category_lists
        ]);


    }

    public function search(Request $request)
    {

        $pageTitle = 'Search Product';

        $data = \Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.id', 'users.username', 'seller_profiles.shop_name')->first();

        $category_lists = ['' => 'Select category'] + Category::join('category_self_relation', 'category.id', '=', 'category_self_relation.child_category_id')->where('parent_category_id', NULL)->where('status', 'active')->pluck('category.title', 'category.id')->all();

        // Product model initialize
        $model = new Product();

        if ($this->isGetRequest()) {
            // Search data found
            $search_keywords = trim($request->get('search_keywords'));
            $model = $model->where(function ($query) use ($search_keywords) {
                $query = $query->orWhere('title', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('product.type', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('product.item_no', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('product.sell_price', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('product.batch', 'LIKE', '%' . $search_keywords . '%');
                $query = $query->orWhere('product.is_featured', 'LIKE', '%' . $search_keywords . '%');

            });

            $product = $model->where('status', '!=', 'cancel')->where('seller_id', $data->id)->select('product.*')->orderBy('id', 'desc')->paginate(50);
        } else {

            // If get data not found
            $product = Product::paginate(50);
        }

        // Return view
        return view('Seller::webseller_product.seller_product', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'verifaid_user' => $verifaid_user,
            'product' => $product,
            //'attribute_set_lists' => $attribute_set_lists,
            'category_lists' => $category_lists
        ]);

    }

    /**
     * Show the form for change merchant product form.
     *
     * @return \Illuminate\Http\Response
     */

    public function product_report($status)
    {

        $pageTitle = 'Product Report';

        $data = \Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.username', 'users.id', 'seller_profiles.shop_name')->first();

        // if($status == 'sold'){
        //         $product = Product::join('order_details','order_details.product_id','=','product.id')
        //         ->select('product_id', DB::raw('count(*) as total'))
        //         ->where('order_details.product_seller_id',\Auth::user()->id)
        //         ->groupBy('product_id')
        //         ->paginate(20);
        //         }

        if ($status == 'inactive') {
            $product = Product::where('seller_id', $data->id)
                ->where('status', 'inactive')
                ->orderBy('id', 'desc')
                ->paginate(20);
        }

        if ($status == 'active') {
            $product = Product::where('seller_id', $data->id)
                ->where('status', 'active')
                ->orderBy('id', 'desc')
                ->paginate(20);
        }

        // $product = Product::where('status', '!=' , 'cancel')->where('seller_id', $data->id)->orderBy('id', 'desc')->paginate(30);

        $category_lists = ['' => 'Select category'] + Category::join('category_self_relation', 'category.id', '=', 'category_self_relation.child_category_id')->where('parent_category_id', NULL)->where('status', 'active')->pluck('category.title', 'category.id')->all();


        return view('Seller::webseller_product.product_report', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'verifaid_user' => $verifaid_user,
            'product' => $product,
            'category_lists' => $category_lists


        ]);


    }

    public function product_report_sold($status)
    {

        $pageTitle = 'Sold Product Report';

        $data = \Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.username', 'users.id', 'seller_profiles.shop_name')->first();

        if ($status == 'sold') {

            $sold_product = Product::join('order_details', 'order_details.product_id', '=', 'product.id')->where('order_details.status', 'delivered')->where('order_details.product_seller_id', \Auth::user()->id)->paginate(20);


            // $sold_product = Product::leftJoin('order_details','order_details.product_id','=','product.id')
            // ->where('order_details.product_seller_id',\Auth::user()->id)
            // ->select('product.id', DB::raw('count(order_details.product_id) as count'))
            // ->groupBy('product.id')
            // ->having('product.id', '>', 10)
            // ->paginate(20);
            //dd($sold_product);

            // $sold_product = Product::join('order_details','order_details.product_id','=','product.id')
            // ->select('product.id as id', DB::raw("count(order_details.product_id) as count"))
            // ->select('order_details.product_id', DB::raw('count(*) as total'))

            // ->groupBy('product_id')
            // ->where('order_details.product_seller_id',\Auth::user()->id)
            // ->paginate(20);

            // $product = Product::join('order_details','order_details.product_id','=','product.id')
            //         ->where('order_details.product_seller_id',\Auth::user()->id)
            //         ->first();

            $product = Product::where('product.seller_id', \Auth::user()->id)
                ->get();
        }

        $category_lists = ['' => 'Select category'] + Category::join('category_self_relation', 'category.id', '=', 'category_self_relation.child_category_id')->where('parent_category_id', NULL)->where('status', 'active')->pluck('category.title', 'category.id')->all();


        return view('Seller::webseller_product.sold_product_report', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'verifaid_user' => $verifaid_user,
            'product' => $product,
            'sold_product' => $sold_product,
            //'attribute_set_lists' => $attribute_set_lists,
            'category_lists' => $category_lists


        ]);


    }

    public function add_product()
    {

        $pageTitle = 'Add Seller product';

        $data = \Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.username', 'users.id', 'seller_profiles.shop_name')->first();

        // $product = Product::where('status', '!=' , 'cancel')->where('seller_id', $data->id)->orderBy('id', 'desc')->paginate(30);
        $category_lists = Category::getHierarchyCategory('');
        unset($category_lists['']);

        $brand_lists = Brand::getBrandList();


        return view('Seller::webseller_product.seller_product_list', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'verifaid_user' => $verifaid_user,
            // 'product' => $product,
            'category_lists' => $category_lists,
            'brand_lists' => $brand_lists

        ]);


    }


    /**
     * Show the form for seller delivery option.
     *
     * @return \Illuminate\Http\Response
     */

    public function delivery_option()
    {

        $pageTitle = 'Seller delivery Option';

        $data = \Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.username', 'users.id', 'seller_profiles.shop_name')->first();

        $delivery_r = DeliveryOption::where('seller_id', $data->id)->orderBy('id', 'desc')->paginate(30);

        return view('Seller::webseller_delivery.index', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'verifaid_user' => $verifaid_user,
            'delivery_r' => $delivery_r
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delivery_option_create()
    {
        $pageTitle = "Add new delivery option";

        // return View
        return view("Seller::webseller_delivery.create", compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function delivery_option_store(Request $request)
    {
        // Get all input data
        $input = $request->all();


        $data = \Auth::user();

        $input['seller_id'] = $data->id;

        // Check already presents or not
        $data = DeliveryOption::where('courier_service', $input['courier_service'])->where('seller_id', $data->id)->exists();

        if (!$data) {

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                $attributedata = DeliveryOption::create($input);

                DB::commit();

                Session::flash('message', 'successfully added!');
                return redirect()->route('seller.delivery.option');

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

        } else {
            Session::flash('info', 'This courier service already added!');
        }
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delivery_option_edit($id)
    {
        $pageTitle = "Update delivery option";

        // Find Delivery Option
        $data = DeliveryOption::find($id);

        // If attribute not found
        if (empty($data)) {
            Session::flash('danger', 'Delivery Option not found.');
            return redirect()->route('seller.delivery.option');
        }


        // Return view
        return view("Seller::webseller_delivery.edit", compact('data', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delivery_option_update(Request $request, $id)
    {
        $input = $request->all();

        // Find Delivery Option
        $model = DeliveryOption::where('id', $id)
            ->first();

        DB::beginTransaction();
        try {

            $result = $model->update($input);

            DB::commit();

            Session::flash('message', 'Successfully updated!');
            return redirect()->route('seller.delivery.option');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function product_details($id)
    {
        $pageTitle = 'View Item Details';
        $data = \Auth::user();

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.username', 'users.id', 'seller_profiles.shop_name')->first();
        // Find Product data
        $product = Product::where('product.id', $id)->first();


        if (!empty($data)) {
            // If found product
            // return view("Product::product.show", compact('data','pageTitle'));
            return view('Seller::webseller_product.seller_product_details', [
                'pageTitle' => $pageTitle,
                // 'data' => $data,
                'verifaid_user' => $verifaid_user,
                'product' => $product
            ]);


        } else {
            // If product not found
            return redirect()->back();

        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\SellerProductRequest $request)
    {
        // Get all input data
        $input = $request->all();
//        dd($input);
        $input['item_no'] = 'AFS-' . date('Ydis');


        // Set mime type
        $mime_type_data = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

        $image = $request->file('image');
        $image_info = getimagesize($image);


        // Check image mime type
        if (isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data)) {
            Session::flash('error', 'Invalid image type');
            return redirect()->back();
        }
        // generate image name
        $name = $input['slug'] . '-' . time() . '-' . 'afshini' . '.' . $image->getClientOriginalExtension();
        $path_image_link = '/uploads/product';

        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            // Save product
            $input['status'] = 'inactive';

            $product_data = Product::create($input);

            if (!empty($product_data)) {

                $id = $product_data->id;
                //dd($id);
                // upload image & create directory
                $this->image_upload($name, $image->getRealPath(), $path_image_link, $id);

                // Prepare image_link field value
                $image_link = $path_image_link . '/' . $id;


                $category_id = $input['category_id'];
                $category_status = 'active';
                $created_by = $input['created_by'];

                // Save images
                DB::table('product_image')
                    ->insert([
                        'product_id' => $id,
                        'image_link' => $image_link,
                        'image' => $name,
                        'created_by' => Auth::user()->id,
                        'created_at' => date('Y-m-d h:i:s'),
                    ]);
                // Save Inventory

                $item_number = $input['item_no'];
                $quantity = $input['quantity'];

//                DB::table('product_inventory')
//                            ->insert([
//                                'product_id' => $id,
//                                'warehouse' => 'self',
//                                'item_number' => $item_number,
//                                'quantity' => $quantity,
//                                'status' => 'active',
//                                'created_by' => Auth::user()->id,
//                                'created_at' => date('Y-m-d h:i:s'),
//                            ]);


                // Save category
                DB::table('product_category')->insert(
                    ['product_id' => $product_data->id, 'category_id' => $category_id, 'status' => $category_status, 'created_by' => $created_by]
                );
            }

            DB::commit();
            Session::flash('message', 'Product is added! Please Update product for more Information');
            return redirect('seller/my-product');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        // Redirect back to last page if error occurs
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getSizeList()
    {
        return DB::table('size')->select('id', 'title')->get()->pluck('title', 'id')->toArray();
    }

    public function getColorList()
    {
        return DB::table('color')->select('id', 'title')->get()->pluck('title', 'id')->toArray();
    }

    public function edit($id)
    {
        $pageTitle = "Update product Information";

        $sizes = $this->getSizeList();
        $colors = $this->getColorList();
        //dd($colors);
        $data = \Auth::user();
        // Find Product
        $product = Product::with('relProductAttribute', 'relColorSizeWiseQuantity')
            ->where('product.id', $id)
            ->where('product.seller_id', $data->id)->first();
        //dd($product->relColorSizeWiseQuantity->pluck('')->toArray());
        // If Product not found
        if (empty($product)) {
            Session::flash('danger', 'Product not found.');
            return redirect()->route('seller.my.product');
        }

        $verifaid_user = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $data->id)->select('users.email', 'users.username', 'users.id', 'seller_profiles.shop_name')->first();

        $imagedata = ProductImage::where('product_image.product_id', $id)->get();

        $seo_data = ProductSeo::where('product_seo.product_id', $id)->first();

        $inventory_data = ProductInventory::where('product_inventory.product_id', $id)->first();

        $review_data = ProductReview::where('product_review.product_id', $id)->get();

        // Get Category list
        $category_lists = Category::getHierarchyCategory('');
        unset($category_lists['']);

        // assigned category
        $product_category = DB::table('product_category')->where('product_id', $id)->pluck('category_id')->all();

        // Coupon list
        $coupon_lists = Coupon::where('seller_id', $data->id)->get();

        // Delivery Option
        $shipping_method_lists = DeliveryOption::where('seller_id', $data->id)->get();

        // Return view
        return view("Seller::webseller_product.seller_product_add", compact('data', 'pageTitle', 'sizes', 'colors', 'product', 'verifaid_user', 'inventory_data', 'seo_data', 'review_data', 'category_lists', 'product_category', 'imagedata', 'shipping_method_lists', 'coupon_lists', 'id'));
    }

    public function getPreviousProductSizeColorQuantityList(): array
    {
        // need to resolve
        return DB::table('color_size_wise_quantity')
            ->select('id', 'quantity')->where('product_id', '=', $this->productId)
            ->whereNull('deleted_at')->get()->pluck('quantity', 'id')->toArray();
    }

    public function processRecordsForInsertUpdateDelete($frmData): void
    {
        $existingRecords = $this->getPreviousProductSizeColorQuantityList();
        foreach ($frmData as $key => $record) {
            if ($record['existing'] != null) {
//                echo "<pre>";
//                print_r($existingRecords);
//                print_r($record);
//                dd($existingRecords[$record['existing']]);
                if (isset($existingRecords[$record['existing']])) {
                    $this->updatableRecords[$record['existing']] = $record['quantity'];
                    unset($existingRecords[$record['existing']]);
                } else {
                    unset($frmData[$key]);
                }
            } else {
                array_push($this->insertableRecords, [
                    'size_id' => $record['size'],
                    'color_id' => $record['color'],
                    'quantity' => $record['quantity'],
                    'product_id' => $this->productId,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
            }
            if (count($existingRecords)) {
                $this->deleteable_color_size_quantity_ids = array_flip($existingRecords);
            }
        }
    }

    // softdeletes
    public function deleteRecordsFromProductSizeColorQuantities(): bool
    {
        return DB::table('color_size_wise_quantity')->whereIn('id', $this->deleteable_color_size_quantity_ids)->update(
            ['deleted_at' => Carbon::now()->toDateTimeString()]
        );
    }

    public function updateProductSizeColorQuantities(): bool
    {
        try {
            //dd($this->updatableRecords);
            foreach ($this->updatableRecords as $id => $quantity) {
                DB::table('color_size_wise_quantity')->where('id', '=', $id)->update(
                    [
                        'quantity' => $quantity,
                        'updated_at' => Carbon::now()->toDateTimeString()
                    ]
                );
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function insertNewProductSizeColorQuantities(): bool
    {
        return DB::table('color_size_wise_quantity')->insert($this->insertableRecords);
    }

    public function productAttributeUpdate(Request $request)
    {
        $return['status'] = 403;
        $return['message'] = '';
        $return['error'] = 'Invalid Data';
        if (!empty($request->productId) && !empty($request->productAttributes)) {
            $this->productId = $request->productId;
            $this->processRecordsForInsertUpdateDelete($request->productAttributes);
            DB::transaction(function (): void {
                if (count($this->deleteable_color_size_quantity_ids)) {
                    $this->deleteRecordsFromProductSizeColorQuantities();
                }
                if (count($this->updatableRecords)) {
                    $this->updateProductSizeColorQuantities();
                }
                if (count($this->insertableRecords)) {
                    $this->insertNewProductSizeColorQuantities();
                }
            });
            $return['status'] = 200;
            $return['message'] = 'Successfully updated';
            $return['error'] = '';
        }

        return $return;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update_basic(Request $request, $id)
    {
        $response = [];

        $input = $request->all();

        $input['slug'] = str_slug($input['slug']);
        $item = $request->item_no;
        $seller = $request->seller_id;

        // Find Product
        $model = Product::where('product.id', $id)->first();

        if ($model) {
            // Check Slug
            $check_slug = Product::where('slug', $input['slug'])->where('item_no', $input['item_no'])->first();

            // Find unique product
            if (!empty($check_slug) && $check_slug->id == $id) {
                // Slug presents in current id
                $product_update_required = 'yes';
            } elseif (!empty($check_slug) && $check_slug->id != $id) {
                // Slug present, but not in current id
                $product_update_required = 'no';
            } else {
                // Slug not present
                $product_update_required = 'yes';
            }


            if ($product_update_required == 'yes') {
                DB::beginTransaction();
                try {
                    // Update product basic info
                    $result = $model->update($input);

                    if ($result) {

                        DB::commit();

                        $response['result'] = 'success';
                        $response['message'] = 'Successfully updated!';

                    }


                } catch (\Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();

                    $response['result'] = 'error';
                    $response['message'] = $e->getMessage();
                }

            } else {

                // Product not found
                $response['result'] = 'error';
                $response['message'] = 'This slug already presents in another product, Please another one.';
            }


        }

        return $response;

    }


    /**
     * @param $id
     * @return Update
     */
    public function description_update(Request $request, $id)
    {
        $response = [];

        $input = $request->all();
        $model = Product::where('product.id', $id)->first();

        if (!empty($model)) {
            DB::beginTransaction();
            try {
                // Update product basic info
                $result = $model->update($input);
                DB::commit();

                $response['result'] = 'success';
                $response['message'] = 'Successfully updated!';

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


    public function seo_update(Request $request, $id)
    {
        $response = [];
        // Find product data
        $data = Product::where('id', $id)->first();

        // If data is found
        if (!empty($data)) {
            // Get all request
            $input = $request->all();

            // Transaction start
            DB::beginTransaction();
            try {

                // Get Seo data
                $seo_data = ProductSeo::where('product_id', $id)->first();

                if (!empty($seo_data)) {   // For update
                    $seo_modal = $seo_data->update($input);
                } else {
                    // For Insert
                    $seo_data = new ProductSeo();

                    $seo_data->product_id = $id;
                    $seo_data->meta_title = $input['meta_title'];
                    $seo_data->meta_keywords = $input['meta_keywords'];
                    $seo_data->meta_description = $input['meta_description'];
                    $seo_data->meta_image_link = $input['meta_image_link'];

                    $seo_data->save();

                }


                DB::commit();
                $response['result'] = 'success';
                $response['message'] = 'Successfully updated!';


            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();

                $response['result'] = 'error';
                $response['message'] = $e->getMessage();
            }


        } else {
            $response['result'] = 'error';
            $response['message'] = 'Product Not Found.';
        }
        return $response;


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function category_update(Request $request, $id)
    {

        $response = [];

        $input = $request->all();

        // Find Product
        $data = Product::where('product.id', $id)->first();

        // If Product not found
        if (empty($data)) {
            Session::flash('danger', 'Product not found.');
            return redirect()->route('merchant.my.product');
        }

        // Transaction start
        DB::beginTransaction();
        try {

            if (isset($input['category']) && !empty($input['category'])) {

                $old_category_array = [];
                $new_category_array = [];

                $old_category = DB::table('product_category')->where('product_id', $id)->get();
                if (!empty($old_category)) {
                    foreach ($old_category as $item) {
                        array_push($old_category_array, $item->category_id);
                    }
                }


                $category_data = $input['category'];

                foreach ($input['category'] as $key => $value) {

                    $category_exits = DB::table('category')->where('status', 'active')->where('id', $value)->first();


                    if (!empty($category_exits)) {

                        array_push($new_category_array, $category_exits->id);

                        $already_presents_category_rel = DB::table('product_category')->where('product_id', $id)->where('category_id', $value)->first();


                        if (empty($already_presents_category_rel)) {

                            $category_model = new ProductCategory();

                            $category_model->product_id = $id;
                            $category_model->category_id = $value;
                            $category_model->status = "active";
                            $category_model->save();

                        }

                    }
                }


                $deleted_category = array_diff($old_category_array, $new_category_array);
                if (!empty($deleted_category)) {
                    DB::table('product_category')->whereIn('category_id', $deleted_category)->where('product_id', $id)->delete();
                }

            }

            DB::commit();

            $response['result'] = 'success';
            $response['message'] = 'Successfully updated Category!';

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());

            $response['result'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return $response;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function product_shipping_update(Request $request, $id)
    {
        $response = [];
        // Get all request

        // Get all request
        $input = $request->all();

        // Initalize blank array
        $shipping_model_list = [];
        $new_shipping_list = [];

        // find current inseted shipping
        $old_shipping_list = ProductShipping::where('product_id', $id)->pluck('shipping_method_id')->all();
        if (isset($input['Shipping'])) {
            foreach ($input['Shipping'] as $shipping_key => $shipping_value) {

                // Find ProductShipping
                $shipping_model = ProductShipping::where('product_id', $id)->where('shipping_method_id', $shipping_value)->first();
                if (!$shipping_model) {
                    $shipping_model = new ProductShipping();
                }

                $shipping_model->shipping_method_id = $shipping_value;
                $shipping_model->product_id = $id;

                array_push($shipping_model_list, $shipping_model);
                array_push($new_shipping_list, $shipping_model->shipping_method_id);
            }
        }

        // Find difference shipping
        $removed_shipping_list = array_diff($old_shipping_list, $new_shipping_list);

        // Transaction start
        DB::beginTransaction();
        try {

            // Save shipping
            if (!empty($shipping_model_list)) {
                foreach ($shipping_model_list as $shipping) {
                    $shipping->save();
                }
            }

            // Delete shipping
            if (!empty($removed_shipping_list)) {

                $del = DB::table('product_shipping')
                    ->where('product_id', $id)
                    ->whereIn('shipping_method_id', $removed_shipping_list)
                    ->delete();

            }

            DB::commit();
            // Press Save & Continue
            $response['result'] = 'success';
            $response['message'] = 'Successfully updateded!';


        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();

            $response['result'] = 'error';
            $response['message'] = $e->getMessage();
        }


        return $response;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function product_coupon_update(Request $request, $id)
    {
        $response = [];
        // Get all request
        $input = $request->all();

        // Initalize blank array
        $coupon_model_list = [];
        $new_coupon_list = [];

        // find current inseted coupon
        $old_coupon_list = ProductCoupon::where('product_id', $id)->pluck('coupon_id')->all();
        if (isset($input['Coupon'])) {
            foreach ($input['Coupon'] as $coupon_key => $coupon_value) {

                // Find ProductCoupon
                $coupon_model = ProductCoupon::where('product_id', $id)->where('coupon_id', $coupon_value)->first();
                if (!$coupon_model) {
                    $coupon_model = new ProductCoupon();
                }

                $coupon_model->coupon_id = $coupon_value;
                $coupon_model->product_id = $id;

                array_push($coupon_model_list, $coupon_model);
                array_push($new_coupon_list, $coupon_model->coupon_id);
            }
        }

        // Find difference coupon
        $removed_coupon_list = array_diff($old_coupon_list, $new_coupon_list);

        // Transaction start
        DB::beginTransaction();
        try {

            // Save coupon
            if (!empty($coupon_model_list)) {
                foreach ($coupon_model_list as $coupon) {
                    $coupon->save();
                }
            }

            // Delete coupon
            if (!empty($removed_coupon_list)) {

                $del = DB::table('product_coupon')
                    ->where('product_id', $id)
                    ->whereIn('coupon_id', $removed_coupon_list)
                    ->delete();

            }

            DB::commit();
            // Press Save & Continue
            $response['result'] = 'success';
            $response['message'] = 'Successfully updateded!';


        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();

            $response['result'] = 'error';
            $response['message'] = $e->getMessage();
        }


        return $response;
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function DeleteImage($id)
    {

        $check_image = ProductImage::where('product_image.id', $id)->first();

        if (!empty($check_image)) {
            DB::beginTransaction();
            try {

                // Check sizes
                $sizes = self::array_of_size();

                if (count($sizes) > 0) {
                    foreach ($sizes as $value) {

                        if ($value == 'orginal_image') {
                            $imagePath = $check_image->image_link . '/' . 'orginal_image' . '/' . $check_image->image;
                            $thumbPath = $check_image->image_link . '/' . 'thumbnail' . '/' . $check_image->image;

                            $realImagePath = public_path($imagePath);
                            $thumbimagePath = public_path($thumbPath);

                            // remove image from folder
                            if (file_exists($realImagePath)) {
                                File::delete($realImagePath);
                                File::delete($thumbimagePath);
                                // unlink($realImagePath);
                                // unlink($thumbimagePath);
                            }
                        } elseif ($value != 'orginal_image') {

                            $imagePath = $check_image->image_link . '/' . $value . 'x' . $value . '/' . $check_image->image;
                            $thumbPath = $check_image->image_link . '/' . 'thumbnail' . '/' . $check_image->image;

                            $realImagePath = public_path($imagePath);
                            $thumbimagePath = public_path($thumbPath);
                            // remove image from folder
                            if (file_exists($realImagePath)) {
                                File::delete($realImagePath);
                                File::delete($thumbimagePath);
                            }
                        }


                    }
                }

                // delete image
                $deleteimage = DB::table('product_image')->where('product_image.id', $id)->delete();

                if ($deleteimage) {
                    DB::commit();
                    return 'true';
                } else {
                    return 'false';
                }

            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
        }


    }


    public function inventory_update(Request $request, $id)
    {
        $response = [];
        // Find product data
        $data = Product::where('id', $id)->first();

        // If data is found
        if (!empty($data)) {
            // Get all request
            $input = $request->all();

            // Transaction start
            DB::beginTransaction();
            try {

                // Get product inventory data
                $inventory_data = ProductInventory::where('product_id', $id)->first();

                if (!empty($inventory_data)) {   // For update
                    $seo_modal = $inventory_data->update($input);

                } else {
                    // For Insert
                    $inventory_data = new ProductInventory();

                    $inventory_data->product_id = $id;
                    $inventory_data->warehouse = $input['warehouse'];
                    $inventory_data->item_number = $input['item_number'];
                    $inventory_data->quantity = $input['quantity'];
                    $inventory_data->note = $input['note'];
                    $inventory_data->save();

                }


                DB::commit();
                // Press Save & Continue
                $response['result'] = 'success';
                $response['message'] = 'Successfully updated!';


            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();

                $response['result'] = 'error';
                $response['message'] = $e->getMessage();
            }


        } else {
            $response['result'] = 'error';
            $response['message'] = 'Product Not Found!';
        }
        return $response;

    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update_image(Requests\SellerProductImageRequest $request, $id)
    {
        // Set mime type
        $mime_type_data = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        // Check product data
        $productdata = Product::where('product.id', $id)->first();

        if (!empty($productdata)) {
            $slug = $productdata->slug;

            DB::beginTransaction();
            try {

                // Check image file exists or not
                if ($request->hasfile('file')) {

                    $count = 1;
                    foreach ($request->file('file') as $image) {

                        $image_info = getimagesize($image);

                        // check image dimension in width & height
                        // if ((isset($image_info['0']) && $image_info['0'] != '1024') && isset($image_info['1']) && $image_info['1'] != '1024') {
                        //     Session::flash('error', 'Image size must be width 1024px & height 1024px');

                        //     break;
                        // }

                        // Check image mime type
                        if (isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data)) {
                            Session::flash('error', 'Invalid image type');
                            break;
                        }

                        // Check image size

                        if ($image->getClientSize() > 2e+6) {
                            Session::flash('error', 'Image size much bigget than 2M');
                            break;
                        }

                        // generate image name
                        $name = $slug . '-' . time() . '-' . $count . '.' . $image->getClientOriginalExtension();
                        $path_image_link = '/uploads/product';

                        // upload image & create directory
                        $this->image_upload($name, $image->getRealPath(), $path_image_link, $id);

                        // Prepare image_link field value

                        $image_link = $path_image_link . '/' . $id;

                        $model = DB::table('product_image')
                            ->insert([
                                'product_id' => $id,
                                'image_link' => $image_link,
                                'image' => $name,
                                'created_by' => Auth::user()->id,
                                'created_at' => date('Y-m-d h:i:s'),
                            ]);

                        // Check product image is uplode or not
                        if ($model) {
                            DB::commit();
                            Session::flash('message', 'Successfully updated!');
                        } else {
                            Session::flash('error', 'Image not inserted');
                        }

                        $count++;

                    } // end foreach


                } // end if


                // Press Save & Continue
                if (isset($input['save_continue']) && $input['save_continue'] == 'Save & Continue') {
                    return redirect()->back();
                }


            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }

            // redirect to current page
        }

        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function shop_logo(Requests\ShoplogoRequest $request)
    {
        // Set mime type
        $mime_type_data = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

        $input = $request->all();
        $shop_image = $request->file('shop_logo');

        $model = DB::table('seller_profiles')
            ->where('seller_profiles.users_id', $input['users_id'])->first();

        $shop_id = $model->users_id;
        $filepath = public_path($this->image_relative_path . "/" . $model->shop_logo);

        if ($shop_image != '') {
            $filename = $shop_image->getClientOriginalName();
        }

        if (!empty($shop_image)) {

            $image_info = getimagesize($shop_image);

            // Check image mime type
            if (isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data)) {
                Session::flash('error', 'Invalid image type');
                return redirect()->back();

            }

            if ($shop_image) {
                $shop_image_title = str_replace(' ', '-', 'afshini_shop_logo_' . time() . '_' . $shop_id . '.' . $shop_image->getClientOriginalExtension());
                $shop_image_link = $this->image_relative_path . '/' . $shop_image_title;

            } else {
                $shop_image_link = '';
                $shop_image_title = '';
            }

            $input['shop_logo'] = $shop_image_title;
        }


        DB::beginTransaction();
        try {
            // Update user
            if ($shop_image != null) {

                // dd($shop_image_title);

                if (!empty($filepath)) {
                    File::delete($this->seller_image_path . '/' . $model->shop_logo);
                }

                $img = Image::make($shop_image->path());
                $img->resize(220, 100, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($this->seller_image_path . '/' . $shop_image_title);

                $result = DB::table('seller_profiles')
                    ->where('seller_profiles.users_id', $input['users_id'])
                    ->update([
                        'shop_logo' => $shop_image_title,
                        'updated_at' => date('Y-m-d h:i:s'),
                    ]);


                DB::commit();

                Session::flash('message', 'Successfully updated!');
                // return redirect('Seller::webseller.profile');
                return redirect()->back();
            } else {
                Session::flash('message', 'Select logo!');
            }
        } catch (\Exception $e) {
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function shop_banner(Requests\ShopbannerRequest $request)
    {
        // Set mime type
        $mime_type_data = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

        $input = $request->all();
        $shop_image = $request->file('image_link');

        $model = DB::table('seller_profiles')
            ->where('seller_profiles.users_id', $input['users_id'])->first();

        $shop_id = $model->users_id;
        $filepath = public_path($this->image_relative_path . "/" . $model->image_link);

        if ($shop_image != '') {
            $filename = $shop_image->getClientOriginalName();
        }

        if (!empty($shop_image)) {

            $image_info = getimagesize($shop_image);

            // Check image mime type
            if (isset($image_info['mime']) && !in_array($image_info['mime'], $mime_type_data)) {
                Session::flash('error', 'Invalid image type');
                return redirect()->back();

            }

            if ($shop_image) {
                $shop_image_title = str_replace(' ', '-', 'afshini_shop_banner_' . time() . '_' . $shop_id . '.' . $shop_image->getClientOriginalExtension());
                $shop_image_link = $this->image_relative_path . '/' . $shop_image_title;

            } else {
                $shop_image_link = '';
                $shop_image_title = '';
            }

            $input['image_link'] = $shop_image_title;
        }


        DB::beginTransaction();
        try {
            // Update user
            if ($shop_image != null) {

                // dd($shop_image_title);

                if (!empty($filepath)) {
                    File::delete($this->seller_image_path . '/' . $model->image_link);
                }

                $img = Image::make($shop_image->path());
                $img->resize(1920, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($this->seller_image_path . '/' . $shop_image_title);

                $result = DB::table('seller_profiles')
                    ->where('seller_profiles.users_id', $input['users_id'])
                    ->update([
                        'image_link' => $shop_image_title,
                        'updated_at' => date('Y-m-d h:i:s'),
                    ]);


                DB::commit();

                Session::flash('message', 'Successfully updated!');
                // return redirect('Seller::webseller.profile');
                return redirect()->back();
            } else {
                Session::flash('message', 'Select logo!');
            }
        } catch (\Exception $e) {
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
                        // $img->save($target_location . '/' . $image_name);
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Product
        $data = \Auth::user();
        $model = Product::where('product.id', $id)->where('product.seller_id', $data->id)
            ->select('product.*')
            ->first();

        DB::beginTransaction();
        try {
            // Product status update
            $model->status = 'cancel';

            $model->save();


            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        // redirect to current page
        return redirect()->back();
    }

    /**
     * Show the form for forget passord from zinismart merchant.
     *
     * @return \Illuminate\Http\Response
     */

    public function forget_password()
    {
        $pageTitle = 'Forget Password';

        return view('Seller::webseller_account.forgetpassword', [
            'pageTitle' => $pageTitle
        ]);

    }

    /**
     * Show the form for mail send for password change.
     *
     * @return \Illuminate\Http\Response
     */
    public function send_mail_to_seller(Request $request)
    {
        $user_data = \Auth::user();
        $input = $request->all();
        //Check email is exists into this system

        $token = md5(time());
        $model = DB::table('users')
            ->where('users.email', $request->email)
            ->update(['remember_token' => $token]);

        $user = DB::table('users')
            ->where('email', $input['email'])
            ->where('type', 'seller')
            ->first();


        if (!empty($user)) {

            // $mail_body = \Illuminate\Support\Facades\View::make('Seller::webseller_account._password_email_template', ['user_data' => $user]);
            // $contents = $mail_body->render();

            // $send_mail = \App\Http\Helpers\SendMail::fire($user->email, 'Reset Password', $contents, '');

            Session::flash('message', 'Please check your email, and follow those instruction.');
            return redirect()->back();


            return redirect()->back();
        } else {

            Session::flash('danger', "Your email address is incorrect.");
        }

        return redirect()->back();
    }


    /**
     * Show the form for change password form a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function change_password_form($slug)
    {

        $pageTitle = 'Forget Password';


        $data = User::where('users.remember_token', $slug)
            ->select('users.*')
            ->first();

        if (!isset($data->remember_token)) {

            Session::flash('danger', "Token not found.");
            return redirect('seller/login');
        } else {

            return view('Seller::webseller_account.passwordchange_form', [
                'pageTitle' => $pageTitle,
                'data' => $data,

            ]);
        }

    }


    /**
     * Show the form for save change
     *
     * @return \Illuminate\Http\Response
     */
    public function save_chage_password(Request $request)
    {

        $user_data = \Auth::user();


        $input = $request->all();

        $this->validate($request, [
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $check_password = $input['password'] === $input['password_confirmation'];
        if ($check_password) {

            $model = DB::table('users')
                ->where('users.remember_token', $input['dataemail'])
                ->update([
                    'password' => Hash::make($input['password']),
                    'remember_token' => '',
                ]);

            if ($model) {
                Session::flash('message', "Password changed successfully.");
                return redirect('seller/login');
            } else {
                Session::flash('danger', "Unable to change password.");
            }
        } else {
            Session::flash('danger', "Do not match confirm password");
        }

        return redirect()->back();

    }


    /**
     * Show the form for save change
     *
     * @return \Illuminate\Http\Response
     */
    public function do_change_password(Requests\ChangePasswordRequest $request)
    {

        $user_data = \Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('seller/login');
        }

        if ($user_data->type != 'seller') {
            return redirect()->intended('seller/login');
        }

        $input = $request->all();

        $check_password = Hash::check($input['old_password'], $user_data->password);
        if ($check_password) {
            $user_data->password = $input['password'];

            if ($user_data->save()) {
                Session::flash('message', "Password changed successfully.");
                return redirect('seller/dashboard');
            } else {
                Session::flash('danger', "Unable to change password.");
            }
        } else {
            Session::flash('danger', "Old password incorrect.");
        }

        return redirect()->back();


    }

}
