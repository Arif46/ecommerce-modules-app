@extends('Seller::webseller.seller_master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Edit</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->

<div class="my-account-area ptb-80">
    <div class="container">
        <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">                     
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>                                               
                        </div>
                    </div>
        	<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-fields">
                    <div class="about-skill-area">                    

                        <div class="cart-main-area">

                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    <span class="close" data-dismiss="alert">×</span>
                                    {{Session::get('message')}} 
                                </div>
                            @endif

                            @if(Session::has('danger'))
                                <div class="alert alert-danger">
                                    <span class="close" data-dismiss="alert">×</span>
                                    {{Session::get('danger')}} 
                                </div>
                            @endif

                            {!! Form::model($order_details, ['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => '']) !!}

	                        <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                    <label>Status</label><span class="required"> *</span> 
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="hidden" name="order_head_id" value="{{$order_details->id}}">
                                            {!! Form::Select('status',array('pending'=>'Pending','confirmed'=>'Confirmed','processing'=>'Processing','delivered' => 'Delivered' , 'cancel' => 'Cancel'),Request::old('status'),['id'=>'', 'class'=>'form-control']) !!}
                                            {!! $errors->first('status') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                            	<div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                <div class="all-cart-buttons">
                                    <button class="button" type="submit">Submit</button>  
                                </div>                                  
                                </div>
                            </div>
                            {!! Form::close() !!}
						</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        
	
@endsection