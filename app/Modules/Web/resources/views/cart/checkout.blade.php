@extends('Web::layouts.master')
@section('body')

    <?php
    $total_calculate_amount = 0;
    if (count($cart_items) > 0) {
        foreach ($cart_items as $cart) {
            $total_calculate_amount += $cart['sell_price'] * $cart['product_quantity'];
        }
    }
    ?>

    @if(!empty($shipping_r))
        @foreach($shipping_r as $shipping_a)
                <?php $conditional_amount = $shipping_a->conditional;
                // $conditional_amount = $shipping_a->conditional;
                ?>
        @endforeach
    @endif

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Cart Main Area Start -->
    <div class="cart-main-area ptb-80">
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">

                    @if(!Auth::check() || Auth::user()->type != 'customer')
                        @include('Web::cart._checkout_login')
                    @endif

                    {!! Form::model($billing, ['method' => 'POST', 'route'=> ['web.cart.confirm.checkout'],'id'=>'', 'class' => '']) !!}

                    <div class="billing-address">
                        @if(!Auth::check() || Auth::user()->type != 'customer')
                            <h6 class="text-center">For Guest Customer</h6>
                        @endif
                        <h4>Billing Address</h4>
                        <div class="row">
                            @if(!Auth::check() || Auth::user()->type != 'customer')

                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::text('name',Request::old('name'),['id'=>'name', 'class' => 'form-control','placeholder'=>'First Name', 'required']) !!}
                                        <span class="errors">
                                                {!! $errors->first('name') !!}
                                            </span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">

                                        {!! Form::text('lastname',Request::old('lastname'),['id'=>'lastname', 'class' => 'form-control','placeholder'=>'last name']) !!}

                                        <span class="errors">
                                                {!! $errors->first('lastname') !!}
                                            </span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::email('email',Request::old('email'),['id'=>'email', 'class' => 'form-control','placeholder'=>'Email']) !!}

                                        <span class="errors">
                                                {!! $errors->first('email') !!}
                                            </span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::text('phone',Request::old('phone'),['id'=>'phone', 'class' => 'form-control','placeholder '=>'Phone', 'required']) !!}

                                        <span class="errors">
                                                {!! $errors->first('phone') !!}
                                            </span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">

                                        {!! Form::text('address',Request::old('address'),['id'=>'address','style' => 'resize: none', 'class' => 'form-control','placeholder'=>'Address Line', 'required' ]) !!}
                                        <span class="errors">
                                                {!! $errors->first('address') !!}
                                            </span>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::text('city',Request::old('city'),['id'=>'city', 'class' => 'form-control','placeholder '=>'District', 'required']) !!}

                                        <span class="errors">
                                                {!! $errors->first('city') !!}
                                            </span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <!--  {!! Form::text('area',Request::old('area'),['id'=>'area', 'class' => 'form-control','placeholder '=>'State', 'required']) !!} -->
                                        {!! Form::Select('area',array('Dhaka' =>'Dhaka','Chittagong ' =>'Chittagong ',
'Mymensingh ' =>'Mymensingh ',
'Khulna ' =>'Khulna ',
'Rajshahi ' =>'Rajshahi ',
'Rangpur ' =>'Rangpur ',
'Sylhet ' =>'Sylhet ',
'Barishal' =>'Barishal'
),Request::old('area'),['id'=>'area', 'class'=>'form-control']) !!}
                                        <span class="errors">
                                                {!! $errors->first('area') !!}
                                            </span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::text('zip',Request::old('zip'),['id'=>'zip', 'class' => 'form-control','placeholder '=>'Zip Code', 'required','maxlength'=>'10']) !!}

                                        <span class="errors">
                                                {!! $errors->first('zip') !!}
                                            </span>
                                    </div>
                                </div>

                            @endif


                            @if(Auth::check() && Auth::user()->type == 'customer')

                                <div class="col-12">

                                    @if(!empty($billing))
                                        <span>First Name: {{$billing->name}}</span><br>
                                        <span>Last Name: {{$billing->lastname}}</span><br>
                                        <span>Email: {{$billing->email}}</span><br>
                                        <span>Phone: {{$billing->phone}}</span><br>
                                        <span>Address: {{$billing->address}}</span><br><br>
                                        <span>District: {{$billing->city}}</span> <br/>
                                        <span>State : {{$billing->area}}</span> <br/>
                                        <span>Zip Code : {{$billing->zip}}</span> <br/>

                                        <span>
                                            <a data-href="{{ route('checkout.edit.shipping.billing.address', $billing->id) }}"
                                               class=" pull-right open-customer-edit-modal" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                            </span>
                                        <br/>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input class="form-check-input" name="same_as_avobe"
                                                           value="same_as_avobe" type="checkbox" id="Delivery_address">
                                                    Delivery address same as above
                                                </label>
                                            </div>
                                        </div>
                                    @else
                                        <a href="#" id="biling_address" data-toggle="modal"
                                           data-target="#add_billing_address" class="pull-left"><i
                                                    class="fa fa-plus"></i> Add Billing Address</a>
                                    @endif

                                </div>

                            @endif

                        </div>
                    </div>

                    <div class="billing-address" id="defferentBillingAddress">
                        <h4>Shipping Address</h4>
                        <div class="row">
                            @if(!Auth::check() || Auth::user()->type != 'customer')
                                @include('Web::cart._guest_delivery_address')
                            @else

                                @if(isset($shipping) && count($shipping) > 0 )
                                    @foreach($shipping as $key => $ship)

                                        <div class="col-md-12 col-sm-12 col-xs-12 text-left">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="shipping_{{$key}}">

                                                            <input type="radio" name="shipping_value"
                                                                   id="shipping_{{$key}}" class="shipping_value"
                                                                   value="{{$ship->id}}"
                                                                   onclick="ajax_call_shipping('{{$ship->id}}')"/>

                                                            <span>First Name: {{$ship->name}}</span> <br/>
                                                            <span>Last Name: {{$ship->lastname}}</span> <br/>
                                                            <span>Email: {{$ship->email}}</span> <br/>
                                                            <span>Phone: {{$ship->phone}}</span> <br/>
                                                            <span>Address: {{$ship->address}}</span> <br/>
                                                            <span>District: {{$ship->city}}</span> <br/>
                                                            <span>State : {{$ship->area}}</span> <br/>
                                                            <span>Zip Code : {{$ship->zip}}</span> <br/>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <!--   <a  href="{{ route('checkout.delete.shipping.billing.address', $ship->id) }}" onclick="return confirm('Are you sure to Delete?')" class="pull-right" title="Delete"><i class="fa fa-trash"></i></a> -->
                                                        <a data-href="{{ route('checkout.edit.shipping.billing.address', $ship->id) }}"
                                                           class=" pull-right open-customer-edit-modal" title="Edit"><i
                                                                    class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    @endforeach

                                @endif

                                <div class=" col-md-12">
                                    <a href="#" data-toggle="modal" data-target="#edit_profile" class="pull-left"><i
                                                class="fa fa-plus"></i> Add New Address</a>
                                </div>

                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-6 col-lg-6">

                    <div class="billing-address shipping-address shipping-method">
                        <h4>Select Shipping</h4>
                        <div class="row">
                            @if(!empty($shipping_r))
                                @foreach($shipping_r as $shipping)

                                        <?php
                                        $selected_shipping = 'Free';
                                        // $conditional_amount = $shipping->conditional;
                                        // $basic_shi_cost   =  $shipping->shipping_value;
                                        if ($total_calculate_amount < $conditional_amount) {
                                            $selected_shipping = 'Basic';
                                        }
                                        ?>

                                    @if($total_calculate_amount > $conditional_amount && $shipping->shipping_type == 'Free')
                                        <div class="col-4 col-md-4 col-sm-4 text-center">
                                            <label for="shipping-method-{{$shipping->courier_service}}"
                                                   class="radio shipping_cost_class"
                                                   data="{{$shipping->shipping_value}}">
                                                <input type="radio" required name="shipping_method"
                                                       id="shipping-method-{{$shipping->courier_service}}"
                                                       value="{{$shipping->courier_service}}"
                                                       <?= $shipping->shipping_type == $selected_shipping ? 'checked' : '' ?> class="hidden"/>
                                                <span>
                                                        <h4 class="h4">৳  {{number_format($shipping->shipping_value,2)}}</h4>
                                                        <h5>{{$shipping->courier_service}}</h5>
                                                        <!-- <h6>{{$shipping->shipping_type}}</h6> -->
                                                        <p class="small">{{$shipping->courier_details}}</p>
                                                    </span>
                                            </label>
                                        </div>
                                    @endif
                                    @if($shipping->shipping_type !== 'Free')
                                        <div class="col-4 col-md-4  col-sm-4 text-center">
                                            <label for="shipping-method-{{$shipping->courier_service}}" required
                                                   class="radio shipping_cost_class required"
                                                   data="{{$shipping->shipping_value}}">
                                                <input type="radio" name="shipping_method" required
                                                       id="shipping-method-{{$shipping->courier_service}}"
                                                       value="{{$shipping->courier_service}}"
                                                       <?= $shipping->shipping_type == $selected_shipping ? 'checked' : '' ?> class="hidden"/>
                                                <span>
                                                        <h4 class="h4">৳ {{number_format(($shipping->shipping_value), 2)}}</h4>
                                                        <h5>{{$shipping->courier_service}}</h5>
                                                        <!-- <h6>{{$shipping->shipping_type}}</h6> -->
                                                       <p class="small">{{$shipping->courier_details}}</p>
                                                    </span>
                                            </label>
                                        </div>
                                    @endif

                                @endforeach
                            @endif


                        </div>
                    </div>

                    <div class="billing-address order-summary">
                        <h4>Your Order Summary</h4>
                        <div class="table-responsive ">
                            <table class="table table-bordered table-striped">
                                <?php
                                $total_amount = 0;
                                ?>
                                @if(count($cart_items) > 0)
                                    <tr>
                                        <!--  <td></td> -->
                                        <td align="right"><b>Qty</b></td>
                                        <td align="right"><b>Price</b></td>
                                        <td align="right"><b>Total</b></td>
                                    </tr>
                                    @foreach($cart_items as $cart)
                                        <tr>
                                            <td colspan="4" class="pro-details">
                                                {{$cart['product_title']}}<br/>
                                                @if(isset($cart['product_size']) && !empty($cart['product_size']))
                                                    <b>Size: </b> {{$cart['product_size']}}
                                                @endif <br/>
                                                @if(isset($cart['product_color']) && !empty($cart['product_color']))
                                                    <b>Color: </b> {{$cart['product_color']}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <!-- <td>
                                                 <img width="100" src="{{$cart['product_image']}}" alt="{{$cart['product_title']}}" class="img-responsive img-fluid">
                                                </td> -->

                                            <td>
                                                <span style="float: right;"> {{$cart['product_quantity']}} </span>

                                            </td>
                                            <td class="tdfix">
                                                <span style="float: right;">৳  {{number_format($cart['sell_price'],2)}}</span>
                                            </td>
                                            <td class="tdfix">
                                                <span style="float: right;">৳ {{number_format(($cart['sell_price']*$cart['product_quantity']),2)}}</span>
                                                    <?php
                                                    $total_amount += $cart['sell_price'] * $cart['product_quantity'];
                                                    ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                            @if(isset($cart_total['total']))
                                    <?php
                                    $shipping_cost = 80;
                                    if ($total_calculate_amount > $conditional_amount) {
                                        $shipping_cost = 0;
                                    }

                                    ?>
                                <table class="table table-bordered table-striped final-order-content">
                                    <tr>
                                        <th>Sub Total</th>
                                        <td>
                                            <span id="sub-total-amount"
                                                  style="float: right;">৳  {{number_format(($total_amount),2)}}</span>
                                        </td>
                                    </tr>
                                    <th>Shipping Cost</th>
                                    <td>
                                        <span id="total-shipping"
                                              style="float: right;">৳  {{number_format(($shipping_cost),2)}}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td><span id="discount-amount"
                                                  style="float: right;">৳  {{number_format(($coupon_value),2)}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Grand Total</th>
                                        <td><span id="total-amount"
                                                  style="float: right;">৳  {{number_format((($total_amount + $shipping_cost)-$coupon_value),2)}}</span>
                                        </td>
                                    </tr>
                                </table>
                            @endif
                        </div>
                    </div>

                    <div class="billing-address payment-method">
                        <h4>Select Payment</h4>
                        <div class="row">
                            @if(!empty($payment_r) && count($payment_r) > 0)

                                @foreach($payment_r as $payment)
                                    <div class="col-md-4 col-sm-4 col-4 text-center">
                                        <label for="payment-method-{{$payment->id}}" class="radio" class="hidden"
                                               style="height: 39px important; display: inline-block; ">
                                            <input type="radio" name="payment_method"
                                                   id="payment-method-{{$payment->id}}"
                                                   value="{{$payment->payment_type}}" checked class="hidden"/>
                                            <span style="display:inline-block;">
                                                    <img src="{{URL::to('')}}/frontend/assets/img/payment/{{App\Http\Helpers\CartHelper::payment_option()[$payment->payment_type]}}.png"
                                                         height="50" style="height:50px !important; "/>
                                                   <!--  <h2>{{App\Http\Helpers\CartHelper::payment_option()[$payment->payment_type]}}</h2> -->
                                                </span>
                                        </label>
                                    </div>
                                @endforeach
                            @else

                                <div class="col-md-4 col-sm-4 col-4 text-center">
                                    <label for="payment-method-cod" class="radio">
                                        <input type="radio" name="payment_method" id="payment-method-cod" checked
                                               value="cash-on-delevery" class="hidden"/>
                                        <span style="display: flex;">
                                                 <img src="{{URL::to('')}}/frontend/assets/img/payment/{{App\Http\Helpers\CartHelper::payment_option()['cash-on-delevery']}}.png"
                                                      height="50" style="height:50px !important;"
                                                      class="img-responsive img-fluid"/>
                                                <!-- <h2>{{App\Http\Helpers\CartHelper::payment_option()['cash-on-delevery']}}</h2> -->
                                            </span>
                                    </label>
                                </div>

                            @endif

                        </div>
                    </div>
                    <div class="billing-address final-checkbox">
                        <div class="form-group"
                             style="margin-bottom:10px; clear: both; display: block; text-align: center;">
                            <div class="checkbox">
                                <input class="required" required name="agree" type="checkbox" id="agree_checkout"
                                       style=" height: 20px; width: 20px;">
                                <label class="" for="agree_checkout" style=" font-size: 15px; margin-left: 15px;">I
                                    agree with
                                    <a style=" color: #ff0000;"
                                       href="{{route('web.cmspage')}}?page_tag=terms-conditions&&ALeKk010kpva8r8p8zBWzj2XnBkalQg7mA%3A1607358785320&source=hp&e"
                                       target="_blank">terms & conditions</a>
                                </label>
                            </div>
                        </div>
                        <div class="text-center checkbox-btn buttons-set"
                             style="margin-top:10px; clear: both; display: block;">
                            <button class="button checkout-btn" id="submitCheckout" type="submit">Checkout</button>
                        </div>
                    </div>

                </div>

            </div>

            {!! Form::close() !!}
        </div>
    </div>


    <div class="modal fade" id="add_billing_address" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Billing Address</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form">

                        <?php $url = route('customer.billing.shipping.store'); ?>
                        {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "" , 'id'=>'')) !!}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">

                                    {!! Form::text('name',Request::old('name'),['id'=>'name', 'class' => 'form-control','placeholder'=>'Frist Name', 'required']) !!}
                                    <span class="errors">
                                        {!! $errors->first('name') !!}
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">

                                    {!! Form::text('lastname',Request::old('lastname'),['id'=>'lastname', 'class' => 'form-control','placeholder'=>'last name']) !!}

                                    <span class="errors">
                                        {!! $errors->first('lastname') !!}
                                    </span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">

                                    {!! Form::email('email',Request::old('email'),['id'=>'email', 'class' => 'form-control inputfield','placeholder'=>'Email']) !!}

                                    <span class="errors">
                                        {!! $errors->first('email') !!}
                                    </span>
                                    @if(isset($user_data))
                                        <input type="hidden" name="users_id" value="{{$user_data->id}}">
                                    @endif
                                    <input type="hidden" name="type" value="billing">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">

                                    {!! Form::text('phone',Request::old('phone'),['id'=>'phone', 'class' => 'form-control inputfield','placeholder'=>'Phone', 'required']) !!}

                                    <span class="errors">
                                        {!! $errors->first('phone') !!}
                                    </span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::text('address',Request::old('address'),['id'=>'address', 'class' => 'form-control inputfield','placeholder'=>'Address Line', 'required']) !!}

                                    <span class="errors">
                                        {!! $errors->first('address') !!}
                                    </span>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">

                                    {!! Form::text('city',Request::old('city'),['id'=>'city', 'class' => 'form-control','placeholder'=>'District', 'required']) !!}
                                    <span class="errors">
                                        {!! $errors->first('city') !!}
                                    </span>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">

                                    <!--    {!! Form::text('area',Request::old('area'),['id'=>'area', 'class' => 'form-control','placeholder'=>'State', 'required']) !!} -->
                                    {!! Form::Select('area',array('Dhaka' =>'Dhaka','Chittagong ' =>'Chittagong ',
      'Mymensingh ' =>'Mymensingh ',
      'Khulna ' =>'Khulna ',
      'Rajshahi ' =>'Rajshahi ',
      'Rangpur ' =>'Rangpur ',
      'Sylhet ' =>'Sylhet ',
      'Barishal' =>'Barishal'
   ),Request::old('area'),['id'=>'area', 'class'=>'form-control']) !!}
                                    <span class="errors">
                                        {!! $errors->first('area') !!}
                                    </span>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">

                                    {!! Form::text('zip',Request::old('zip'),['id'=>'zip', 'class' => 'form-control','placeholder'=>'Zip Code', 'required','maxlength'=>'10']) !!}
                                    <span class="errors">
                                        {!! $errors->first('zip') !!}
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 buttons-set">
                                <button class="pull-right button">Update</button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade open_modal_update" tabindex="" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Address</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $url = route('customer.billing.shipping.store'); ?>
                    {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "" , 'id'=>'')) !!}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::text('name',Request::old('name'),['id'=>'name', 'class' => 'form-control','placeholder'=>'First Name', 'required']) !!}
                                <span class="errors">
                                    {!! $errors->first('name') !!}
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">

                                {!! Form::text('lastname',Request::old('lastname'),['id'=>'lastname', 'class' => 'form-control','placeholder'=>'last name']) !!}

                                <span class="errors">
                                    {!! $errors->first('lastname') !!}
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::email('email',Request::old('email'),['id'=>'email', 'class' => 'form-control','placeholder'=>'Email']) !!}

                                <span class="errors">
                                    {!! $errors->first('email') !!}
                                </span>
                                @if(isset($user_data))
                                    <input type="hidden" name="users_id" value="{{$user_data->id}}">
                                @endif
                                <input type="hidden" name="type" value="shipping">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">

                                {!! Form::text('phone',Request::old('phone'),['id'=>'phone', 'class' => 'form-control','placeholder'=>'Phone', 'required']) !!}

                                <span class="errors">
                                    {!! $errors->first('phone') !!}
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group formfixl">

                                {!! Form::text('address',Request::old('address'),['id'=>'address', 'style' => 'resize: none', 'class' => 'form-control','placeholder'=>'Address', 'required']) !!}

                                <span class="errors">
                                {!! $errors->first('address') !!}
                            </span>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">

                                {!! Form::text('city',Request::old('city'),['id'=>'city', 'class' => 'form-control','placeholder'=>'District', 'required']) !!}
                                <span class="errors">
                                        {!! $errors->first('city') !!}
                                    </span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">

                                <!--  {!! Form::text('area',Request::old('area'),['id'=>'area', 'class' => 'form-control','placeholder'=>'State', 'required']) !!} -->
                                {!! Form::Select('area',array('Dhaka' =>'Dhaka','Chittagong ' =>'Chittagong ',
 'Mymensingh ' =>'Mymensingh ',
 'Khulna ' =>'Khulna ',
 'Rajshahi ' =>'Rajshahi ',
 'Rangpur ' =>'Rangpur ',
 'Sylhet ' =>'Sylhet ',
 'Barishal' =>'Barishal'
),Request::old('area'),['id'=>'area', 'class'=>'form-control']) !!}
                                <span class="errors">
                                        {!! $errors->first('area') !!}
                                    </span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">

                                {!! Form::text('zip',Request::old('zip'),['id'=>'zip', 'class' => 'form-control','placeholder'=>'Zip Code', 'required','maxlength'=>'10']) !!}
                                <span class="errors">
                                        {!! $errors->first('zip') !!}
                                    </span>
                            </div>
                        </div>
                        <div class="col-12 buttons-set">

                            <button class="pull-right button">Update</button>

                        </div>

                        {!! Form::close() !!}

                    </div>
                </div> <!-- / .modal-body -->
            </div> <!-- / .modal-content -->
        </div>
    </div>

    <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Add New Address</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $url = route('customer.billing.shipping.store'); ?>
                    {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "" , 'id'=>'')) !!}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::text('name',Request::old('name'),['id'=>'name', 'class' => 'form-control','placeholder'=>'First Name', 'required']) !!}
                                <span class="errors">
                                    {!! $errors->first('name') !!}
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">

                                {!! Form::text('lastname',Request::old('lastname'),['id'=>'lastname', 'class' => 'form-control','placeholder'=>'last name']) !!}

                                <span class="errors">
                                    {!! $errors->first('lastname') !!}
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::email('email',Request::old('email'),['id'=>'email', 'class' => 'form-control','placeholder'=>'Email']) !!}

                                <span class="errors">
                                    {!! $errors->first('email') !!}
                                </span>
                                @if(isset($user_data))
                                    <input type="hidden" name="users_id" value="{{$user_data->id}}">
                                @endif
                                <input type="hidden" name="type" value="shipping">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">

                                {!! Form::text('phone',Request::old('phone'),['id'=>'phone', 'class' => 'form-control','placeholder'=>'Phone', 'required']) !!}

                                <span class="errors">
                                    {!! $errors->first('phone') !!}
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group formfixl">

                                {!! Form::text('address',Request::old('address'),['id'=>'address', 'style' => 'resize: none', 'class' => 'form-control','placeholder'=>'Address Line', 'required']) !!}

                                <span class="errors">
                                {!! $errors->first('address') !!}
                            </span>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">

                                {!! Form::text('city',Request::old('city'),['id'=>'city', 'class' => 'form-control','placeholder'=>'District', 'required']) !!}
                                <span class="errors">
                                        {!! $errors->first('city') !!}
                                    </span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">

                                <!--  {!! Form::text('area',Request::old('area'),['id'=>'area', 'class' => 'form-control','placeholder'=>'State', 'required']) !!} -->
                                {!! Form::Select('area',array('Dhaka' =>'Dhaka','Chittagong ' =>'Chittagong ',
  'Mymensingh ' =>'Mymensingh ',
  'Khulna ' =>'Khulna ',
  'Rajshahi ' =>'Rajshahi ',
  'Rangpur ' =>'Rangpur ',
  'Sylhet ' =>'Sylhet ',
  'Barishal' =>'Barishal'
),Request::old('area'),['id'=>'area', 'class'=>'form-control']) !!}
                                <span class="errors">
                                        {!! $errors->first('area') !!}
                                    </span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">

                                {!! Form::text('zip',Request::old('zip'),['id'=>'zip', 'class' => 'form-control','placeholder'=>'Zip Code', 'required','maxlength'=>'10']) !!}
                                <span class="errors">
                                        {!! $errors->first('zip') !!}
                                    </span>
                            </div>
                        </div>
                        <div class="col-12 buttons-set">

                            <button class="pull-right button">Update</button>

                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('#Delivery_address').change(function () {
            if ($(this).is(':checked')) {
                $('#defferentBillingAddress').hide(200)
            } else {
                $('#defferentBillingAddress').show(200)
            }
        })
        $('#submitCheckout').click(function (e) {
            const same_delivery_address = $('#Delivery_address:checked').val()
            const shipping_value = $('.shipping_value:checked').val()
            if (same_delivery_address === undefined && shipping_value == undefined) {
                alert('You must select a shipping address')
                e.preventDefault()
            }
        })
    </script>
@stop
