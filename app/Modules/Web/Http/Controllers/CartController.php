<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Product\Models\VwProduct;
use App\Modules\User\Models\UserBillingShipping;
use App\Modules\Order\Models\OrderShipping;
use App\Modules\Order\Models\OrderDetails;
use App\Modules\Order\Models\OrderHead;
use App\Modules\Order\Models\OrderTransaction;
use App\Modules\Seller\Models\Coupon;

use App\Http\Helpers\CartHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Modules\Web\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

// use PayPal\Api\Amount;
// use PayPal\Api\Details;
// use PayPal\Api\Item;

/** All Paypal Details class **/
// use PayPal\Api\ItemList;
// use PayPal\Api\Payer;
// use PayPal\Api\Payment;
// use PayPal\Api\PaymentExecution;
// use PayPal\Api\RedirectUrls;
// use PayPal\Api\Transaction;
// use PayPal\Auth\OAuthTokenCredential;
// use PayPal\Rest\ApiContext;

class CartController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        // $paypal_conf = \Config::get('paypal');
        // $this->_api_context = new ApiContext(new OAuthTokenCredential(
        //     $paypal_conf['client_id'],
        //     $paypal_conf['secret'])
        // );
        // $this->_api_context->setConfig($paypal_conf['settings']);
    }


    public function payWithpaypal(Request $request)
    {
        return view("Web::cart.paypaltest");


    }


    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Request::get('PayerID')) || empty(Request::get('token'))) {

            Session::put('error', 'Payment failed');
            return Redirect::route('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Request::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            Session::put('success', 'Payment success');
            return Redirect::route('/');

        }

        Session::put('error', 'Payment failed');
        return Redirect::route('/');

    }


    public function add_items(Request $request)
    {
        $input = $request->all();

        $added_items = [];

        $cart = [];

        $product_size = '';
        $product_color = '';

        if (isset($input['product_color_size']) && !empty($input['product_color_size'])) {

            $explode_color_size = explode("==", $input['product_color_size']);
            if (count($explode_color_size) > 0) {
                $product_size = isset($explode_color_size[0]) ? $explode_color_size[0] : '';
                $product_color = isset($explode_color_size[1]) ? $explode_color_size[1] : '';
            }
        }

        if (isset($input['product_quantity'])) {

            $product_quantity = $input['product_quantity'];
            $product_id = $input['product_id'];

            $product = VwProduct::where('product_id', $product_id)->first();

            if (!empty($product)) {

                // Shipping value
                $shipping_value = DB::table('shipping_method')->join('product_shipping', 'product_shipping.shipping_method_id', '=', 'shipping_method.id')->where('product_shipping.product_id', $product_id)->select('shipping_method.shipping_type', 'shipping_method.courier_service', 'shipping_method.shipping_value')->get()->toArray();

                // Coupon value
                $coupon_code = DB::table('coupon')->join('product_coupon', 'product_coupon.coupon_id', '=', 'coupon.id')->where('product_coupon.product_id', $product_id)->select('coupon.coupon_code', 'coupon.amount')->get()->toArray();

                // Seller
                $seller = DB::table('seller_profiles')->where('users_id', $product->product_seller_id)->select('shop_name')->first();

                $item['shop_name'] = $seller->shop_name;
                $item['product_id'] = $product_id;
                $item['product_title'] = $product->product_title;
                $item['product_seller_id'] = $product->product_seller_id;
                $item['sell_price'] = $product->sell_price;
                $item['product_item_no'] = $product->item_no;
                $item['product_image'] = URL::to('uploads/product/' . $product->product_id . '/thumbnail/' . $product->image);
                $item['product_quantity'] = $product_quantity;
                $item['product_size'] = $product_size;
                $item['product_color'] = $product_color;

                // Set Product shipping
                $item['available_shipping'] = $shipping_value;
                if (!empty($shipping_value)) {
                    $item['shipping'] = $shipping_value[0]->shipping_value;
                    // $item['shipping_service'] =  $shipping_value[0]->shipping_type;
                    $item['shipping_service'] = $shipping_value[0]->courier_service;
                } else {
                    $item['shipping'] = 0;
                    $item['shipping_service'] = '';
                }

                // Set Product coupon
                $item['available_coupon'] = $coupon_code;
                $item['coupon_code'] = '';
                $item['coupon_value'] = 0;


                $cart = CartHelper::add_item($item);
            }

            $response = [];

            if (count($cart) > 0) {

                $cart_body = View::make('Web::cart._cart', ['cart_items' => '']);
                $contents = $cart_body->render();

                $response['result'] = 'success';
                $response['message'] = 'Product added to cart.';
                $response['total_item'] = count($cart);
                $response['cart_body'] = $contents;

            } else {
                $response['result'] = 'error';
                $response['message'] = 'Product not added to cart.';
            }

            return $response;

        }
    }


    public function cart()
    {

        $pageTitle = 'My shopping cart';

        $cart_items = [];
        $coupon_value = 0;

        if (Session::has('cart')) {
            $cart_items = Session::get('cart');
        }
        // echo '<pre>';
        // print_r($cart_items);
        // exit();
        $cart_total = [];
        if (Session::has('cart_total')) {
            $cart_total = Session::get('cart_total');
        }

        if (Session::has('coupon_value')) {
            $coupon_value = Session::get('coupon_value');
            // $coupon_code = Session::get('coupon_code');
        }

        return view("Web::cart.my_cart", compact('pageTitle', 'cart_items', 'cart_total', 'coupon_value'));
    }

    public function cart_update()
    {
        $items = $_POST['data'];

        $cart = CartHelper::update($items);

        $response = [];
        $response['result'] = 'success';
        $response['message'] = 'Product successfully updated.';

        return $response;

    }

    public function cart_shipping_update()
    {
        $items = $_POST['data'];

        $cart = CartHelper::shipping_update($items);

        $response = [];
        $response['result'] = 'success';
        $response['message'] = 'Product successfully updated.';

        return $response;

    }

    public function checkout_paypal_success($order_number)
    {

        return redirect()->route('web.cart.checkout.success', ['order_number' => $order_number]);
    }

    public function payment_transaction()
    {

        $response = [];
        $response['result'] = 'error';
        $response['message'] = 'Transaction number is not valid';

        if ((isset($_POST['data']['0']['transaction_number']) && !empty($_POST['data']['0']['transaction_number'])) && isset($_POST['data']['0']['order_id']) && !empty($_POST['data']['0']['order_id'])) {

            $transaction_number = $_POST['data']['0']['transaction_number'];
            $order_id = $_POST['data']['0']['order_id'];

            $transaction_exists = OrderTransaction::where('order_head_id', $order_id)->exists();

            if ($transaction_exists) {

                $order_head = OrderHead::where('id', $order_id)->first();


                // Update Transaction
                DB::table('order_transaction')
                    ->where('order_head_id', $order_id)
                    ->update([
                        'transaction_number' => $transaction_number,
                        'status' => 'active'
                    ]);

                // Update Order Details
                DB::table('order_details')
                    ->where('order_head_id', $order_id)
                    ->update([
                        'status' => 'confirmed'
                    ]);

                $response['result'] = 'success';

                // Check Logged user
                $user_data = Auth::user();
                if (!empty($user_data) && $user_data->type == 'customer') {
                    $response['message'] = route('web.cart.customer.checkout.success', ['order_number' => $order_head->order_number]);
                } else {
                    $response['message'] = route('web.cart.checkout.success', ['order_number' => $order_head->order_number]);
                }


                // Session Remove
                // Session::forget('cart');
                // Session::forget('user_email');
                // Session::forget('cart_total');
                // Session::forget('coupon_amount');
                // Session::forget('coupon_code');


            }

        }

        return $response;
    }

    public function cart_coupon()
    {

        $response = [];
        $response['result'] = 'error';
        $response['message'] = 'Coupon code is not valid';

        $cart_items = [];
        $valid_coupon = 'no';
        $coupon_code = $_POST['coupon_code'];
        $current_date = date('Y-m-d');

        if (Auth::check() && Auth::user()->type == 'customer') {

            $valid_coupon = Coupon::where('coupon_code', $coupon_code)->where('status', 'active')->first();

            if (!empty($valid_coupon) && $current_date >= $valid_coupon->valid_from && $current_date <= $valid_coupon->valid_to) {

                Session::put('coupon_value', $valid_coupon->amount);
                Session::put('coupon_code', $valid_coupon->coupon_code);

                $response['result'] = 'success';
                $response['message'] = 'Coupon code is valid';
            }

        } else {
            $response['message'] = 'Only register customers will get the coupon.';
        }

        return $response;

    }


    public function remove_item()
    {
        $product_id = $_POST['product_id'];

        $cart = CartHelper::remove_item($product_id);

        $response = [];
        $response['result'] = 'success';
        $response['message'] = 'Product successfully removed from cart.';
        return $response;
    }


    public function checkout()
    {
        // Find customer type user or not
        $user_data = Auth::user();

        $pageTitle = 'Checkout';

        $cart_items = [];

        if (Session::has('cart')) {
            $cart_items = Session::get('cart');
        }

        // Check cart empty or not
        if (empty($cart_items)) {
            return redirect()->route('web.my.cart');
        }

        // Get total cart price from session
        $cart_total = 0;
        if (Session::has('cart_total')) {
            $cart_total = Session::get('cart_total');
        }

        $billing = new UserBillingShipping();
        $shipping = new UserBillingShipping();

        // UserBillingShipping object creation
        if (!empty($user_data)) {
            $billing = UserBillingShipping::where('users_id', $user_data->id)->where('type', 'billing')->first();
            $shipping = UserBillingShipping::where('users_id', $user_data->id)->where('type', 'shipping')->orderBy('id', 'asc')->get();
        }

        // Payment Options
        $payment_r = DB::table('payment_options')->where('status', 'active')->orderBy('id', 'asc')->get();

        // Shipping Options
        $shipping_r = DB::table('shipping_method')->where('status', 'active')->orderBy('id', 'asc')->get();

        $coupon_value = 0;
        $coupon_code = '';

        if (Session::has('coupon_value')) {
            $coupon_value = Session::get('coupon_value');
        }

        if (Session::has('coupon_code')) {
            $coupon_code = Session::get('coupon_code');
        }


        // echo '<pre>';
        // print_r($coupon_code);
        // exit();

        return view("Web::cart.checkout", compact('pageTitle', 'cart_items', 'cart_total', 'billing', 'shipping', 'user_data', 'payment_r', 'shipping_r', 'coupon_value', 'coupon_code'));

    }

    public function pay_again($order_number)
    {
        $user_data = Auth::user();

        $order_head = OrderHead::where('order_number', $order_number)->where('users_id', $user_data->id)->first();

        $pageTitle = 'Customer Pay Again';

        if (!empty($order_head)) {

            // Payment Options
            $payment_r = DB::table('payment_options')->where('status', 'active')->get();

            return view("Web::customer.customer_pay_again", compact('pageTitle', 'user_data', 'payment_r', 'order_head'));

        } else {
            // redirect to current page
            return redirect()->back();
        }
    }

    public function confirm_customer_checkout(Request $request)
    {

        $input = $request->all();

        $user_data = Auth::user();

        if (isset($input['order_id']) && $input['payment_method']) {

            $order_id = $input['order_id'];
            $payment_method = $input['payment_method'];

            $order_head = OrderHead::where('id', $order_id)->where('users_id', $user_data->id)->first();

            if (!empty($order_head)) {

                // Update order head
                DB::table('order_head')
                    ->where('id', $order_id)
                    ->update([
                        'payment_type' => $payment_method,
                        'date' => date('Y-m-d')
                    ]);

                if ($payment_method == 'cash-on-delevery') {
                    // Update Payment Transaction
                    DB::table('order_transaction')
                        ->where('order_head_id', $order_id)
                        ->update([
                            'payment_type' => $payment_method,
                            'status' => 'active',
                            'date' => date('Y-m-d')
                        ]);

                    // Sucess
                    return Redirect::route('web.cart.customer.checkout.success', ['order_number' => $order_head->order_number]);
                } else {
                    // Update Payment Transaction
                    DB::table('order_transaction')
                        ->where('order_head_id', $order_id)
                        ->update([
                            'payment_type' => $payment_method,
                            'date' => date('Y-m-d')
                        ]);
                    return Redirect::route('web.cart.checkout.payment', ['order_number' => $order_head->order_number]);
                }

            } else {
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }


    }

    public function confirm_checkout(Requests\CheckoutRequest $request)
    {
        $input = $request->all();
        //dd($input);
        $user_data = Auth::user();

        if (!empty($user_data) && $user_data->type == 'customer') {
            $same_as_avobe = isset($input['same_as_avobe']) ? $input['same_as_avobe'] : '';

            $checkcustomer = UserBillingShipping::where('users_id', $user_data->id)
                ->where('type', 'billing')
                ->first();
//            dd($checkcustomer);
            if (!empty($same_as_avobe)) {
                // Delivery address not available

                $billing_model = new OrderShipping();
                $billing_model->type = 'billing';
                $billing_model->name = $checkcustomer->name;
                $billing_model->lastname = $checkcustomer->lastname;
                $billing_model->email = $checkcustomer->email;
                $billing_model->address = $checkcustomer->address;
                $billing_model->phone = $checkcustomer->phone;
                $billing_model->city = $checkcustomer->city;
                $billing_model->area = $checkcustomer->area;
                $billing_model->zip = $checkcustomer->zip;

                $shipping_model = new OrderShipping();
                $shipping_model->type = 'shipping';
                $shipping_model->name = $checkcustomer->name;
                $shipping_model->lastname = $checkcustomer->lastname;
                $shipping_model->email = $checkcustomer->email;
                $shipping_model->address = $checkcustomer->address;
                $shipping_model->phone = $checkcustomer->phone;
                $shipping_model->city = $checkcustomer->city;
                $shipping_model->area = $checkcustomer->area;
                $shipping_model->zip = $checkcustomer->zip;

            } else {

                $billing_model = new OrderShipping();
                $billing_model->type = 'billing';
                $billing_model->name = $checkcustomer->name;
                $billing_model->lastname = $checkcustomer->lastname;
                $billing_model->email = $checkcustomer->email;
                $billing_model->address = $checkcustomer->address;
                $billing_model->phone = $checkcustomer->phone;
                $billing_model->city = $checkcustomer->city;
                $billing_model->area = $checkcustomer->area;
                $billing_model->zip = $checkcustomer->zip;

                $shipping_model = new OrderShipping();
                $shipping_model->type = 'shipping';
                $shipping_model->name = $checkcustomer->name;
                $shipping_model->lastname = $checkcustomer->lastname;
                $shipping_model->email = $checkcustomer->email;
                $shipping_model->address = $checkcustomer->address;
                $shipping_model->phone = $checkcustomer->phone;
                $shipping_model->city = $checkcustomer->city;
                $shipping_model->area = $checkcustomer->area;
                $shipping_model->zip = $checkcustomer->zip;

                //login user er delivery address available
                if (isset($input['shipping_value']) && !empty($input['shipping_value'])) {

                    $shipping_id = $input['shipping_value'];

                    $shipping_data = DB::table('users_billing_shipping')->where('id', $shipping_id)->first();

                    if (!empty($shipping_data)) {

                        $shipping_model = new OrderShipping();
                        $shipping_model->type = 'shipping';
                        $shipping_model->name = $shipping_data->name;
                        $shipping_model->lastname = $shipping_data->lastname;
                        $shipping_model->email = $shipping_data->email;
                        $shipping_model->address = $shipping_data->address;
                        $shipping_model->phone = $shipping_data->phone;
                        $shipping_model->city = $shipping_data->city;
                        $shipping_model->area = $shipping_data->area;
                        $shipping_model->zip = $shipping_data->zip;

                    }

                }
            }

        } else {

            // Guest user billing address
            $billing_model = new OrderShipping();
            $billing_model->type = 'billing';
            $billing_model->name = $input['name'];
            $billing_model->lastname = $input['lastname'];
            $billing_model->email = $input['email'];
            $billing_model->address = $input['address'];
            $billing_model->phone = $input['phone'];
            $billing_model->city = $input['city'];
            $billing_model->area = $input['area'];
            $billing_model->zip = $input['zip'];

            if (isset($input['shipped_different_address']) && isset($input['shipping_area']) && isset($input['shipping_lastname']) && isset($input['shipping_city']) && (!empty($input['shipping_phone']) && !empty($input['delivery_address']) && !empty($input['shipping_zip']) && !empty($input['shipping_name']))) {
                //guest user er delivery address thakle customerv address k delivaey address kore nibe
                $shipping_model = new OrderShipping();
                $shipping_model->type = 'shipping';
                $shipping_model->name = $input['shipping_name'];
                $shipping_model->lastname = $input['shipping_lastname'];
                $shipping_model->email = $input['shipping_email'];
                $shipping_model->address = $input['delivery_address'];
                $shipping_model->phone = $input['shipping_phone'];
                $shipping_model->city = $input['shipping_city'];
                $shipping_model->area = $input['shipping_area'];
                $shipping_model->zip = $input['shipping_zip'];


            } else {
                // guest user er delivery address na thakle customer address k delivary address kore nibe
                $shipping_model = new OrderShipping();
                $shipping_model->type = 'shipping';
                $shipping_model->name = $input['name'];
                $shipping_model->lastname = $input['lastname'];
                $shipping_model->email = $input['email'];
                $shipping_model->phone = $input['phone'];
                $shipping_model->address = $input['address'];
                $shipping_model->city = $input['city'];
                $shipping_model->area = $input['area'];
                $shipping_model->zip = $input['zip'];

            }
        }

        $cart_total_price = 0;

        $users_id = null;

        if (isset($user_data) && $user_data->type == 'customer') {
            $users_id = $user_data->id;
        }


        $items = [];

        $cart_items = [];
        // Cart total product item
        if (Session::has('cart')) {
            $cart_items = Session::get('cart');
        }

        if (count($cart_items) > 0) {
            foreach ($cart_items as $item) {
                $product_item = new OrderDetails();

                $product_item->order_head_id = 0;
                $product_item->price = $item['sell_price'];
                $product_item->product_id = $item['product_id'];
                $product_item->product_seller_id = $item['product_seller_id'];
                $product_item->status = 'active';
                $product_item->quantity = $item['product_quantity'];

                $product_item->size = $item['product_size'];
                $product_item->color = $item['product_color'];

                $product_item->shipping_cost = $item['shipping'];
                $product_item->shipping_service = $item['shipping_service'];

                $product_item->coupon_value = $item['coupon_value'];
                $product_item->coupon_code = $item['coupon_code'];

                $product_item->total_price = $item['sell_price'] * $item['product_quantity'];

                $c_total_price = $item['sell_price'] * $item['product_quantity'];
                $cart_total_price += $c_total_price - $item['coupon_value'];
                array_push($items, $product_item);

            }
        }


        $order_head = new OrderHead();
        $order_head->users_id = $users_id;
        $order_head->order_number = time();
        $order_head->date = date('Y-m-d');

        // calculate shipping
        $shipping_data = DB::table('shipping_method')->where('courier_service', $input['shipping_method'])->first(['shipping_value']);

        if (!empty($shipping_data)) {
            $shipping_cost = $shipping_data->shipping_value;
        } else {
            $shipping_cost = 0;
        }

        $coupon_value = 0;
        if (Session::has('coupon_value')) {
            $coupon_value = Session::get('coupon_value');
        }


        $order_head->total_price = $cart_total_price + $shipping_cost;

        $order_head->shipping_method = $input['shipping_method'];
        $order_head->shipping_cost = $shipping_cost;

        $order_head->discount_amount = $coupon_value;

        $order_head->payment_type = $_POST['payment_method'];
        $order_head->status = 'pending';

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            echo "<pre>";
            //print_r($order_head);
            if ($order_data = $order_head->save()) {
                $order_head->order_number = 'AFS-' . str_replace('-', '', date('Y-m-d')) . '-' . str_pad($order_head->id, 6, "0", STR_PAD_LEFT);
                //$order_head->save();

                $billing_model->order_head_id = $order_head->id;
               // $billing_model->save();

                $shipping_model->order_head_id = $order_head->id;
               // $shipping_model->save();

                if (!empty($items)) {
                    foreach ($items as $item) {
                        $item->order_head_id = $order_head->id;
                        $item->save();

                        // Save transaction data
                        $trans_data = new OrderTransaction();
                        $trans_data->order_head_id = $order_head->id;
                        $trans_data->seller_id = $item->product_seller_id;
                        $trans_data->payment_type = $order_head->payment_type;
                        $trans_data->date = date('Y-m-d');
                        // $trans_data->amount = ($item->total_price +  $item->shipping_cost);
                        $trans_data->amount = ($item->total_price + $item->shipping_cost) - $item->coupon_value;
                        $trans_data->status = 'inactive';
                       // $trans_data->save();
                    }
                }

//                print_r($order_head);
//                print_r($order_head);
//                print_r($order_head);
//                print_r($billing_model);
//                print_r($shipping_model);
//                print_r($item);
//                print_r($trans_data);
//                echo "</pre>";
                // Subject
                $subject = "Order Confirmation Mail";

                // Content
                $data = OrderHead::with(['relOrderShipping', 'relOrderDetail.relProduct' => function ($query) {

                }])->where('order_number', $order_head->order_number)->first();

                $mail_body = \Illuminate\Support\Facades\View::make('Web::cart._cartmail', ['data' => $data]);
                $contents = $mail_body->render();

                // Mail Sending
                //$subject = "Order:: ".$order_head->order_number;
                //$send_mail = \App\Http\Helpers\MailHelper::sendMail($billing_model->email, $subject, $contents, 'afshinishop@gmail.com');

                DB::commit();

                Session::forget('coupon_value');

                // payment redirect
                if ($order_head->payment_type == 'cash-on-delevery') {
                    return Redirect::route('web.cart.checkout.success', ['order_number' => $order_head->order_number]);
                } else {
                    return Redirect::route('web.cart.checkout.payment', ['order_number' => $order_head->order_number]);
                }

            }


        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            $error_info = $e->getMessage();

            echo '<pre>';
            print_r($error_info);
            exit();

            return redirect()->route('web.cart.checkout.fail')->with('additional_data', $error_info);

        }


    }

    /*
     * @table Order Detail
     * @description: seller commission for order detail table
     *
     * */
    protected function calculateSellerCommission()
    {

    }

    protected function reduceProductFromProductOutTbl($product_id, $color_id, $size_id)
    {

    }

    protected function updateSellerAccountSummary($seller_id, $sellAmount, $commission)
    {

    }

    public function checkout_customer_success($order_number)
    {

        $pageTitle = 'Checkout Success';

        $user_data = Auth::user();
        $users_id = $user_data->id;

        if (!empty($order_number)) {

            $data = OrderHead::with(['relOrderShipping', 'relOrderDetail.relProduct' => function ($query) {

            }])->where('order_number', $order_number)->first();

            Session::flash('message', 'Your order is successfully placed.');

            // Session Remove
            Session::forget('cart');
            Session::forget('user_email');
            Session::forget('cart_total');
            Session::forget('coupon_amount');
            Session::forget('coupon_code');
            Session::forget('coupon_value');

            return view('Web::cart.checkout_success', [
                'pageTitle' => $pageTitle,
                'data' => $data
            ]);


        } else {
            Session::flash('error', 'Sorry your cart is empty.');
            return back();
        }
    }

    public function checkout_success($order_number)
    {

        $pageTitle = 'Checkout Success';

        if (Session::has('user_email')) {
            $user_email = Session::get('user_email');
        }

        if (Session('cart') !== null) {


            $data = OrderHead::with(['relOrderShipping' => function ($query) {

            }])->where('order_number', $order_number)->first();

            $mail_body = \Illuminate\Support\Facades\View::make('Web::cart._paypalSuccessMail', ['data' => $data]);
            $contents = $mail_body->render();

            // get user mail
            if (count($data->relOrderShipping) > 0) {
                foreach ($data->relOrderShipping as $shipping) {
                    if ($shipping->type == 'billing') {
                        $user_email = $shipping->email;
                    }
                }
            }

            // Mail Sending
            $subject = "Order:: " . $order_number;
            $send_mail = \App\Http\Helpers\MailHelper::sendMail($user_email, $subject, $contents, 'afshinishop@gmail.com');


            Session::flash('message', 'Your order is successfully placed.');

            // Session Remove
            Session::forget('cart');
            Session::forget('user_email');
            Session::forget('cart_total');
            Session::forget('coupon_amount');
            Session::forget('coupon_code');

            return view('Web::cart.checkout_success', [
                'pageTitle' => $pageTitle,
                'data' => $data
            ]);


        } else {
            Session::flash('error', 'Sorry your cart is empty.');
            return back();
        }
    }

    public function checkout_payment($order_number)
    {

        $pageTitle = 'Payment';

        if (Session::has('user_email')) {
            $user_email = Session::get('user_email');
        }

        $order_head = OrderHead::with(['relOrderDetail' => function ($query) {

        }])->where('order_number', $order_number)->first();

        $user_data = Auth::user();
        if (isset($user_data) && $user_data->type == 'customer') {
            $users_id = $user_data->id;
        } else {
            $users_id = $order_head->users_id;
        }

        if (!empty($order_head)) {

            // All transaction data
            $data = OrderTransaction::where('order_head_id', $order_head->id)->get();

            // Payment Option
            $payment_option = DB::table('payment_options')->where('payment_type', $order_head->payment_type)->where('status', 'active')->first();

            // Coupon value
            $coupon_value = $order_head->discount_amount;

            return view('Web::cart.checkout_payment', [
                'pageTitle' => $pageTitle,
                'data' => $data,
                'order_head' => $order_head,
                'payment_option' => $payment_option,
                'coupon_value' => $coupon_value
            ]);
        } else {
            Session::flash('error', 'Sorry your order is not valid.');
            return back();
        }
    }

    public function edit_billing_address($id)
    {
        $response = [];

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('checkout');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('checkout');
        }

        $billing_shipping_data = DB::table('users_billing_shipping')->where('users_id', $user_data->id)->where('id', $id)->first();

        if (!isset($billing_shipping_data)) {
            return redirect()->intended('checkout');
        }

        if (!empty($billing_shipping_data)) {
            $pageTitle = "Shipping Address";
            $view = \Illuminate\Support\Facades\View::make('Web::cart._edit_billing_shipping_info', compact('billing_shipping_data', 'pageTitle', 'user_data'));

            $contents = $view->render();

            $response['result'] = 'success';
            $response['content'] = $contents;

        } else {

            $response['result'] = 'error';

        }

        return $response;

    }


    public function update_billing_shipping_address(Requests\UsersBillingShippingRequest $request, $id)
    {

        $input = $request->all();

        $pageTitle = "Update Billing OR Shipping Address";

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('checkout');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('checkout');
        }

        $billing_shipping_data = UserBillingShipping::where('users_id', $user_data->id)->where('id', $id)->first();

        if (!isset($billing_shipping_data)) {
            return redirect('checkout');
        }

        DB::beginTransaction();
        try {
            // Update
            $result = $billing_shipping_data->update($input);
            DB::commit();

            Session::flash('message', 'Successfully updated!');
            return redirect('checkout');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect('checkout');
    }


    public function destroy_billing_shipping($id)
    {

        $user_data = Auth::user();

        if (empty($user_data)) {
            return redirect()->intended('checkout');
        }

        if ($user_data->type != 'customer') {
            return redirect()->intended('checkout');
        }

        $billing_shipping_data = UserBillingShipping::where('users_id', $user_data->id)->where('id', $id)->first();

        if (!isset($billing_shipping_data)) {
            return redirect('checkout');
        }

        DB::beginTransaction();
        try {
            // Destroy
            $billing_shipping_data->delete();

            DB::commit();
            Session::flash('message', "Successfully Deleted.");

            return redirect('checkout');

        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        // redirect to current page
        return redirect()->back();
    }


    public function remove_item_mc()
    {

        $product_id = $_POST['product_id'];

        $cart = CartHelper::remove_item($product_id);

        if (count($cart) > 0) {

            $cart_body = \Illuminate\Support\Facades\View::make('Web::cart._cart', ['cart_items' => '']);
            $contents = $cart_body->render();

            $response['result'] = 'success';
            $response['message'] = 'Product added to cart.';
            $response['total_item'] = count($cart);
            $response['cart_body'] = $contents;

        } else {
            $response['result'] = 'error';
            $response['message'] = 'Product not added to cart.';
        }


        return $response;
    }


    public function cart_update_mc()
    {
        $items = $_POST['data'];

        $cart = CartHelper::update($items);

        if (count($cart) > 0) {

            $cart_body = \Illuminate\Support\Facades\View::make('Web::cart._cart', ['cart_items' => '']);
            $contents = $cart_body->render();

            $response['result'] = 'success';
            $response['message'] = 'Product successfully added to cart.';
            $response['total_item'] = count($cart);
            $response['cart_body'] = $contents;
        } else {
            $response['result'] = 'error';
            $response['message'] = 'Product not added to cart.';
        }

        return $response;

    }


}
