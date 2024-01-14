@extends('Seller::webseller.seller_master')
@section('body')

<div class="container">
    
<div class="breadcumb-area">
        <!-- Breadcumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('seller.corner') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Password Change</li>
            </ol>
        </nav>
    </div>
</div>

    <div class="clever-catagory bg-img d-flex align-items-center justify-content-center p-3" style="background-image: url({{ asset('frontend/img/bg-img/bg1.jpg') }});">
        <h3>
           <!--  Welcome to Legitplus
            <br/> -->
            <span>Please filled up all required fields to complete generate a new password</span>
        </h3>       
    </div>

    <section class="contact-area section-padding-50">
        <div class="container">
            <div class="row justify-content-md-center">
                
                <!-- Contact Form -->
                <div class="col col-lg-8">
                    <div class="contact-form">
                        <h4 class="text-center">Password Change Form</h4>
                        

                   			<?php
								$url = route('seller.password.change');
							?>

							{!! Form::open(array('url' => $url, 'method' => 'post', 'id' => "customerpass")) !!}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                    	
                                    	{!! Form::password('password',['id'=>'password', 'class' => 'form-control','placeholder'=>'New password', 'required']) !!}
                                    	<input type="hidden" name="dataemail" id="dataemail" value="{{$data->remember_token}}">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                    	
                                    	{!! Form::password('password_confirmation',['id'=>'password_confirmation', 'class' => 'form-control','placeholder'=>'Confirm new password', 'required']) !!}
                                    </div>
                                </div>

                                
                                
                                <div class="col-12">
                                    <button type="submit" class="btn clever-btn w-100">Change Password</button>
                                </div>
                            </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection