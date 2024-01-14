@extends('Admin::layouts.master')
@section('body')

    <section class = "content" >
    <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Brand</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="{{route('admin.seller.payment.index')}}">Payment List</a></li>
                        </ol>
                    </div>
                </div>
            </div>                          
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <h2>
                                       Received Details                          
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="body received-body" id="print-area">
                            <div class="row clearfix">
                                <div class="col-md-10" style="border: 2px solid #ff6600; padding:10px; border-radius: 5px; height:300px;">

                                        <div class="col-md-6" style="float:left;" >
                                            
                                           <b>Date: </b> {{ isset($data->payment_date)?ucfirst($data->payment_date):''}} <b>Received No:</b> {{ isset($data->received_no)?ucfirst($data->received_no):''}}<br>

                                           <b>From :</b>Admin
                                        @if(isset($data->seller_id))
                                           <b>To:</b>
                                           {{InventoryHelper::shopName($data->seller_id)}}
                                           <br>
                                        @endif

                                           <b>Amount:</b> {!! $data->amount !!} BDT
                                           <b>Pay By:</b> {{ isset($data->pay_by)?ucfirst($data->pay_by):'' }}<br>
                                           <b>Admin Special Instruction:</b> <br>

                                           <b>Receiver Comment:</b><br>
                                           <b>Approval:</b>
                                           
                                        </div>

                                        <div class="received col-md-6" style="float:left">
                                           @if(isset($data->received_copy))
                                           <b>Bank Slip:</b> <img src="{{ url('uploads/admin-seller-payment/received-copy/' . $data->received_copy) }}" style="max-height: 200px;" class="img-responsive"> <br>
                                           @endif

                                           <b>Sign:</b>---------------<br>
                                           <b>Date:</b>
                                           <a class="print-window" href="#" onclick="printDiv()">Print</a>
                                        </div>                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>    
@endsection