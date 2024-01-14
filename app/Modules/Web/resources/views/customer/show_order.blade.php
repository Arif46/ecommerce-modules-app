@extends('Web::customer.customer_master')
@section('body')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Cart Main Area Start -->
    <div class="cart-main-area ptb-50 checkout-success">
        <div class="container">

            @if(isset($data) && !empty($data))
                <h3>
                    <small> Order: </small>
                    {{ $data->order_number }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="cart-order">
                        <?php
                        $total_discount = 0;
                        $total_price = 0;
                        ?>
                        @if(count($data->relOrderDetail) > 0)
                            @foreach($data->relOrderDetail as $item)
                                <div class="row mb-10">
                                    <div class="col-md-2 col-sm-3 col-2">
                                        <?php //dd($order_shop);?>
                                        @if(!empty($item_data->image))
                                            <img src="{{URL::to('uploads/product/'.$item_data->product_id.'/thumbnail/'.$item_data->image)}}"
                                                 alt="" width="80" class="img-fluid img-responsive">
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-9 col-10">

                                        {{ @$item_data->product_title }}
                                        <br/>
                                        @if(!empty($item->size))
                                            <b>Size: </b> {{$item->size}}
                                        @endif <br/>
                                        <b>Color: </b> {{$item->color}}
                                        @endif
                                    <!--  @foreach($order_shop as $shopitem)
                                        Brand - {{$shopitem->shop_name}}
                                        @endforeach -->
                                        Shipping - {{$data->shipping_method}}
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        QTY - {{ $item->quantity }}
                                        <br>
                                        Price - ৳ {{ number_format($item->price,2) }}<br>
                                        Shipping - ৳ {{ number_format($data->shipping_cost,2)}} <br>
                                        Sub Total - ৳ {{ number_format(($sub_total_price),2) }}
                                    </div>

                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered ">
                            <tbody>
                            <tr style="background-color: #f9f9f9;">
                                <td><strong> Sub Total </strong></td>
                                <td>
                                    <strong> ৳ {{ number_format(($total_price),2) }}</strong>
                                </td>
                            </tr>
                            <tr style="background-color: #ebfdf2;">
                                <td><strong>Discount</strong>
                                </td>
                                <td><strong>৳ {{ number_format(($total_discount),2) }}</strong>
                                </td>
                            </tr>

                            <tr style="background-color: #fffcf5;">
                                <td><strong>Grand Total</strong>
                                </td>
                                <td>
                                    <strong>৳ {{ number_format($total_price - $total_discount + $total_shipping,2) }}</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12"></div>
                <div class="col-md-2 col-sm-6 col-6">
                    <div class="payment-section text-center">

                        <!-- <h5>Payment Type</h5> -->
                        <p>
                            <img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$data->payment_type]}}.png"
                                 height="50" style="height:50px !important; "/>

                        </p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                    <div class="payment-section text-center">

                        <!-- <h5>Payment Status</h5> -->
                        <p>
                        @if(isset($data->relOrderTransaction) && !empty($data->relOrderTransaction))
                            @if($data->relOrderTransaction->status == 'active')
                                <h3>Paid</h3>
                            @elseif($data->relOrderTransaction->status == 'inactive')
                                Unpaid <a
                                        href="{{route('web.customer.pay.again',['order_number' => $data->order_number])}}"
                                        class="btn btn-primary button">Pay Again</a>
                                @else
                                {{$data->relOrderTransaction->status}}
                                @endif
                                @endif
                                </p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="billing-address">

                        <h5 style="background: #f1f1f1; padding: 15px;">Billing Address</h5>
                        <p style="padding: 15px;">
                            @if(count($data->relOrderShipping) > 0)
                                @foreach($data->relOrderShipping as $shipping)
                                    @if($shipping->type == 'billing')

                                        Name: {{ $shipping->name }} {{ $shipping->lastname }}<br>
                                        Address: {{ $shipping->address }} <br>
                                        {{ $shipping->city }} ,{{ $shipping->area }}<br>
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
                                        Address: {{ $shipping->address }} <br>
                                        {{ $shipping->city }} ,{{ $shipping->area }}<br>
                                        Email: {{ $shipping->email }}<br/>
                                        Phone: {{ $shipping->phone }}<br/>
                                    @endif
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>

            </div>


            <div class="all-cart-buttons text-left">
                <a href="{{ route('customer.order', $status ='all') }}" class="button">Order List</a>
            </div>
        </div>
    </div>

@endsection