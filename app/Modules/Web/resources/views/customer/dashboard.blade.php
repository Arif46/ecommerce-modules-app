@extends('Web::customer.customer_master')
@section('body')

	     <!-- Team Area Start -->
        <div class="customer-area pb-80 pt-100">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="section-title text-center title-style-2">
                      <span>Welcome To Dashboard</span>              
                      <h2><span>{{ $user_data->username }}</span></h2>
                      <p>{{ $user_data->mobile_no }}</p>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-4 col-md-4  col-xs-12 col-sm-6 mt-30">
                <a href="{{ route('customer.order', $status ='all') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Placed
                                <p>{{$total_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6 mt-30">
                <a href="{{ route('customer.order', $status ='cancel')}}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Cancel
                                <p>{{$total_order_cancel}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('customer.order', $status ='active')}}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Pending
                                <p>{{$total_pending_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('customer.order', $status ='confirmed') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Processing 
                                <p>{{$total_confirmed_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('customer.order', $status ='processing') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Shipped
                                <p>{{$total_shipped_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                <a href="{{ route('customer.order', $status ='delivered') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Orders Completed
                                <p>{{$total_delivered_order}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                 <a href="{{ route('customer.order', $status ='inactive') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Payment  Due
                                <p>{{$total_payment_pending}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                 <a href="{{ route('customer.order', $status ='pactive') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Payment Paid
                                <p>{{$total_payment_receive}}</p>
                            </div>                           
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                 <a href="{{ route('customer.order', $status ='pcancel') }}">
                    <div class="info-box">
                        <div class="content">
                            <div class="text">Payment Cancel
                                <p>{{$total_payment_cancel}}</p>
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

