@extends('Admin::layouts.master')
  @section('body')

  	<section class="content">
        <div class="container-fluid">

        	<div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8"><h2>Dashboard</h2></div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Dashboard </a></li>
                            <li><a href="{{ route('admin.seller.pending') }}">
                                    Pending Seller: <span class="badge badge-light">{{$total_pending_seller}}</span> </a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Widgets -->


            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box  hover-expand-effect text-center">
                        <a href="{{ route('admin.order.index') }}">
                        <div class="content">
                            <div class="text">Total Orders Placed
                                <p>{{$total_order}}</p>
                            </div>
                        </div>
                         </a>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <div class="info-box hover-expand-effect text-center">
                         <a href="{{ route('admin.order.report', $status ='cancel')}}">
                        <div class="content">
                            <div class="text">Total Orders cancel
                                <p>{{$total_order_cancel}}</p>
                            </div>
                        </div>
                         </a>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <div class="info-box  hover-expand-effect text-center">
                         <a href="{{ route('admin.order.report', $status ='active')}}">
                        <div class="content">
                            <div class="text">Total Orders Pending
                                <p>{{$total_pending_order}}</p>
                            </div>
                        </div>
                         </a>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box hover-expand-effect text-center">
                         <a href="{{ route('admin.order.report', $status ='confirmed') }}">
                        <div class="content">
                            <div class="text">Total Orders Approved
                                <p>{{$total_confirmed_order}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box  hover-expand-effect text-center">
                         <a href="{{ route('admin.order.report', $status ='processing') }}">
                        <div class="content">
                            <div class="text">Total Orders Shipped
                                <p>{{$total_shipped_order}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box hover-expand-effect text-center">
                         <a href="{{ route('admin.order.report', $status ='delivered') }}">
                        <div class="content">
                            <div class="text">Total Orders Completed
                                <p>{{$total_delivered_order}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box  hover-expand-effect text-center">
                         <a href="{{route('admin.pending.product.index')}}">
                        <div class="content">
                            <div class="text">Total Pending Product
                                <p>{{$total_pending_product}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box  hover-expand-effect text-center">
                         <a href="{{route('admin.product.index')}}">
                        <div class="content">
                            <div class="text">Total Product
                                <p>{{$total_product}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box  hover-expand-effect text-center">
                         <a href="{{route('admin.customer.index')}}">
                        <div class="content">
                            <div class="text">Total Customer
                                <p>{{$total_customer}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box  hover-expand-effect text-center">
                         <a href="{{route('admin.seller.index')}}">
                        <div class="content">
                            <div class="text">Total Shop
                                <p>{{$total_shop}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box hover-expand-effect text-center">
                         <a href="{{ route('admin.payment.report', $status ='cancel') }}">
                        <div class="content">
                            <div class="text">Cancel Payment
                                <p>{{$total_payment_cancel}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box  hover-expand-effect text-center">
                         <a href="{{ route('admin.payment.report', $status ='inactive') }}">
                        <div class="content">
                            <div class="text">Payment Unpaid
                                <p>{{$total_payment_pending}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-30">
                    <div class="info-box hover-expand-effect text-center">
                         <a href="{{ route('admin.payment.report', $status ='active') }}">
                        <div class="content">
                            <div class="text">Payment Received
                                <p>{{$total_payment_receive}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
              <!-- #END# Widgets -->
        </div>

    </section>

@endsection
