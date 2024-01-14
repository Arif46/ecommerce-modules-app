@extends('Web::layouts.master')
@section('body')

	<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout Success</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Cart Main Area Start -->
    <div class="cart-main-area ptb-80 checkout-success">
        <div class="container">                

            @if(isset($data) && !empty($data))
                <h3>
                    <small> Order number: </small>
                  {{ $data->order_number }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="billing-address">

                        <h5 style="background: #f1f1f1; padding: 15px;">Billing Address</h5>
                        <p style="padding: 15px;">
                            @if(count($data->relOrderShipping) > 0)
                                @foreach($data->relOrderShipping as $shipping)
                                    @if($shipping->type == 'billing')

                                        Name: {{ $shipping->name }} {{ $shipping->lastname }}<br>
                                        
                                        Address: {{ $shipping->address }}<br>
                                        City: {{ $shipping->city }}<br>
                                        State: {{ $shipping->area }}<br/>
                                        Zip:  {{ $shipping->zip }}<br>                
                                        Email: {{ $shipping->email }}<br/>
                                        Phone: {{ $shipping->phone }}<br/>
                                       
                                    @endif
                                @endforeach
                            @endif
                        </p>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="billing-address">
                        <h5 style="background: #f1f1f1; padding: 15px;">Delivery Address</h5>
                        <p style="padding: 15px;">
                            @if(count($data->relOrderShipping) > 0)
                                @foreach($data->relOrderShipping as $shipping)
                                    @if($shipping->type == 'shipping')
                                        Name: {{ $shipping->name }} {{ $shipping->lastname }}<br>
                                        
                                        Address: {{ $shipping->address }}<br>
                                        City: {{ $shipping->city }}<br>
                                        State: {{ $shipping->area }}<br/>
                                        Zip:  {{ $shipping->zip }}<br>                
                                        Email: {{ $shipping->email }}<br/>
                                        Phone: {{ $shipping->phone }}<br/>    
                                    @endif
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="payment-section">
                         
                        <h5>Payment Type</h5>
                        <p>
                              <img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$data->payment_type]}}.png" height="50" style="height:50px !important; " />
                            
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="payment-section">
                         
                        <h5>Payment Status</h5>
                        <p>
                            @if(isset($data->relOrderTransaction) && !empty($data->relOrderTransaction))
                              @if($data->relOrderTransaction->status == 'active')
                                Paid
                              @elseif($data->relOrderTransaction->status == 'inactive')
                                Unpaid <a href="{{route('web.customer.pay.again',['order_number' => $data->order_number])}}" class="btn btn-primary button">Pay Again</a>
                              @else
                                {{$data->relOrderTransaction->status}}
                              @endif
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12"></div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $total_discount = 0;
                                     $total_price = 0;
                                    ?>
                                    @if(count($data->relOrderDetail) > 0)
                                    @foreach($data->relOrderDetail as $item)
                                    <?php 
                                    $item_data = $item->relProduct;
                                    $order_qty = $item->quantity;  
                                                                
                                    $sub_total_price= $item->price*$item->quantity;
                                    $total_price+= $sub_total_price;
                                    // $total_price+= $sub_total_price + $data->shipping_cost ;

                                    $total_discount+= $data->discount_amount;
                                    $total_shipping = $data->shipping_cost;                            
                                     ?>
                                    <tr>
                                        <td>
                                            {{ $item_data->product_title }}
                                            <br />
                                            @if(!empty($item->size))
                                            <b>Size: </b> {{$item->size}}
                                            @endif <br />
                                            @if(!empty($item->color))
                                            <b>Color: </b> {{$item->color}}
                                            @endif
                                            <b>Status: </b> {{ $data->status}}
                                        </td>
                                        <td>
                                           <b> {{ $item->quantity }}</b>
                                        </td>
                                        <td>
                                           <b> ৳ {{ number_format($item->price,2) }}</b>
                                        </td>
                                        <td>
                                           <b> ৳ {{ number_format(($sub_total_price),2) }}</b>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>                               
                            </table>
                        </div>
                </div>
               <div class="col-md-6 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered ">    
                                <tbody>
                                    <tr style="background-color: #f9f9f9;">
                                        <td> <strong> Sub Total </strong></td>
                                        <td>
                                            <strong> ৳ {{ number_format(($total_price),2) }}</strong>
                                        </td>
                                    </tr>
                                    <tr style="background-color: #ebfdf2;">                                       
                                        <td> <strong>Discount</strong>
                                        </td>
                                        <td> <strong>৳ {{ number_format(($total_discount),2) }}</strong>
                                        </td>
                                    </tr>
                                    <tr style="background-color: #f7fdd7;">                                       
                                        <td><strong> Shipping -  {{$data->shipping_method}}</strong>
                                        </td>
                                        <td> <strong> ৳ {{ $data->shipping_cost}}</strong>
                                        </td>
                                    </tr>
                                    <tr style="background-color: #fffcf5;">
                                        <td> <strong>Grand Total</strong>
                                        </td>
                                        <td> <strong>৳ {{ number_format($total_price - $total_discount + $total_shipping,2) }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>           
            </div>           
        </div>
    </div>

@endsection