<?php

namespace App\Modules\Seller\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Seller\Requests;

use App\User;
use App\Modules\Order\Models\OrderHead;
use App\Modules\Order\Models\OrderTransaction;
use App\Modules\Product\Models\Product;
use Illuminate\Support\Facades\App;


class AdminSellerController extends Controller
{
    public function __construct()
    {
        // Change language 
        if(isset($_GET['lang']) && !empty($_GET['lang'])){
            App::setLocale($_GET['lang']);    
        }

        $this->user_image_path = public_path('uploads/user');
        $this->user_image_relative_path = '/uploads/user';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return array
     */
    
    protected $user_image_path;
    protected $user_image_relative_path;



    /**
     * CategoryController constructor.
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pageTitle = 'Show all seller';

        $data=User::where('users.type','seller')->get();

        return view('Seller::adminseller.show_all_seller', [
            'pageTitle' => $pageTitle,
            'data' => $data
        ]);

    }

    public function seller_product_index($id){

        $data = Product::where('seller_id',$id)->paginate(30);                    

        if(!empty($data))
        {
            $user_data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->select('users.email', 'users.id', 'seller_profiles.shop_name')->first();
                $pageTitle = 'Seller Products List' ;
            // If found product
            return view("Seller::adminseller.show_seller_product", compact('data','pageTitle','user_data'));

        }else{
            // If product not found
            return redirect()->back();

        }

    }

    // ---- seller_order_index ---//

        public function seller_order_index($id){

            $data = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                         ->where('order_details.product_seller_id',$id)   
                        // ->whereNotIn('status',['Cancel',''])                                   
                        ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price')                        
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30);        

                        //dd($data);

        if(!empty($data))
        {
            $user_data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->select('users.email', 'users.id', 'seller_profiles.shop_name')->first();
                $pageTitle = 'Seller Order List' ;
            // If order product
            return view("Seller::adminseller.show_seller_order", compact('data','pageTitle','user_data'));

        }else{
            // If product not found
            return redirect()->back();

        }

    }

    // ---- seller_order_index ---//

    // ---- seller_payment_index ---//

    public function seller_payment_index($id){

        $pageTitle = 'Seller Pyment List' ;

        $data = OrderTransaction::orderBy('id', 'desc')
                               ->where('seller_id',$id)   
                               ->paginate(30);  

                        //dd($data);

        if(!empty($data))
        {
            $user_data = User::join('seller_profiles', 'users.id', '=', 'seller_profiles.users_id')->where('users.id', $id)->select('users.email', 'users.id', 'seller_profiles.shop_name')->first();

                

            // If order product
            return view("Seller::adminseller.show_seller_payment", compact('data','pageTitle','user_data'));

        }else{
            // If product not found
            return redirect()->back();

        }

    }

    // ---- seller_payment_index ---//

}

