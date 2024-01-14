<?php


namespace App\Modules\Seller\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Modules\Order\Models\OrderTransaction;

use App\User;
use App;
use Illuminate\Support\Facades\Auth;


class WebSellerPaymentController extends Controller{

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

    public function __construct()
    {
        
    }


    public function index()
    {
    	$pageTitle = "Seller Payment list";
        $data = Auth::user();

        $verifaid_user =User::join('seller_profiles','users.id','=','seller_profiles.users_id')->where('users.id',$data->id)->select('users.email', 'users.id','seller_profiles.shop_name')->first();

        $order_transaction = OrderTransaction::where('seller_id',$data->id)
        ->orderBy('id','desc')
        ->paginate(20);
        // ->get();

        return view('Seller::webseller_payment.index', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'order_transaction' => $order_transaction,
            'verifaid_user' => $verifaid_user
        ]);

    }

    public function payment_report($status)
    {
        $pageTitle = "Seller Payment Report";
        $data = Auth::user();

        $verifaid_user =User::join('seller_profiles','users.id','=','seller_profiles.users_id')->where('users.id',$data->id)->select('users.email', 'users.id','seller_profiles.shop_name')->first();

        if($status == 'cancel'){
        $order_transaction = OrderTransaction::where('seller_id',$data->id)
        ->where('status','cancel')
        ->orderBy('id','desc')
        ->paginate(20);
        }

        if($status == 'inactive'){
        $order_transaction = OrderTransaction::where('seller_id',$data->id)
        ->where('status','inactive')
        ->orderBy('id','desc')
        ->paginate(20);
        }

        if($status == 'active'){
        $order_transaction = OrderTransaction::where('seller_id',$data->id)
        ->where('status','active')
        ->orderBy('id','desc')
        ->paginate(20);
        }
        

        return view('Seller::webseller_payment.payment_report', [
            'pageTitle' => $pageTitle,
            'data' => $data,
            'order_transaction' => $order_transaction,
            'verifaid_user' => $verifaid_user
        ]);

    }

}