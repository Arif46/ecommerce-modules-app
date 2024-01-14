<?php

namespace App\Modules\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Order\Models\OrderHead;
use App\Modules\Order\Models\OrderShipping;
use App\Modules\Order\Models\OrderDetails;


class AccountController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Account::welcome");
    }

    public function index()
      {
        $pageTitle = 'Account Details';
      
         $verifaid_user = OrderDetails::join('seller_profiles', 'order_details.product_seller_id', '=', 'seller_profiles.users_id')->first();
             
        //dd($verifaid_user);

        $data = OrderHead::join('order_details','order_details.order_head_id','=','order_head.id')
                        ->join('seller_profiles','seller_profiles.users_id','=','order_details.product_seller_id')
                        ->select('order_head.*','order_head.order_number','order_head.date','order_details.quantity','order_details.status','order_details.price','seller_profiles.shop_name')     
                        ->orderBy('order_head.id', 'desc')
                        ->paginate(30);        


       return view('Account::account.index', [
            'pageTitle' => $pageTitle,
            // 'verifaid_user' => $verifaid_user,            
            'data' => $data
        ]);
    }


   
}
