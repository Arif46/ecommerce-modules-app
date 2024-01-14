@extends('Seller::webseller.seller_master')
@section('body')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

<!--     <div class="dash-menu">         
            <div class="dashboard-menu">                
                <nav>
                    <ul>
                        <li><a href="{{ route('seller.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('seller.add.product') }}">Add Product</a></li>
                        <li><a href="{{ route('seller.my.product') }}">Product List</a></li>
                        <li><a href="{{ route('seller.profile') }}">Profile </a></li> 
                    </ul>
                </nav>
            </div>      
    </div> -->

        <!-- Team Area Start -->
        <div class="seller-area pb-80 pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">
                            <span>Welcome To Dashboard</span>                                              
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>
                            <p>{{ $verifaid_user->username }}<br>
                            {{ $verifaid_user->shop_address }}<br>
                            {{ $verifaid_user->shop_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-3  col-xs-12 col-sm-6 mt-30">
                <a href="{{ route('seller.order.index') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Placed
                                <p>{{$total_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6 mt-30">
                <a href="{{ route('seller.order.report', $status ='cancel')}}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Cancel
                                <p>{{$total_order_cancel}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('seller.order.report', $status ='active')}}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Pending
                                <p>{{$total_pending_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('seller.order.report', $status ='confirmed') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Approved
                                <p>{{$total_confirmed_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('seller.order.report', $status ='processing') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Shipped
                                <p>{{$total_shipped_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('seller.order.report', $status ='delivered') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Completed
                                <p>{{$total_delivered_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('seller.payment.report', $status ='cancel') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Cancel Payment
                                <p>{{$total_payment_cancel}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                 <a href="{{ route('seller.payment.report', $status ='inactive') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Unpaid Payment 
                                <p>{{$total_payment_pending}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                 <a href="{{ route('seller.payment.report', $status ='active') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Payment Received
                                <p>{{$total_payment_receive}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('seller.product.report.sold', $status ='sold') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Sold Product
                                <p>{{$total_product_sold}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('seller.product.report', $status ='active') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Active Product
                                <p>{{$total_product_active}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('seller.product.report', $status ='inactive') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Inactive Product
                                <p>{{$total_product_inactive}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>

                </div>                 
            </div>
        </div>
        <!-- Team Area End -->

@endsection

