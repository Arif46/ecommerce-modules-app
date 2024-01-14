@extends('Web::layouts.master')
@section('body')
	
	<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Seller Account</li>
                </ul>
            </nav>
        </div>
    </div>
<!-- Breadcrumb Area End -->

	<!-- Account Area Start -->
    <div class="my-account-area ptb-80">
        <div class="container">
            <div class="section-title text-center title-style-2">
                    <span>Seller</span>
                    <h2><span>Shop Login or Register</span></h2>
                </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">

                	<?php $url = route('seller.post.login'); ?>
                    {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "", 'id'=>'')) !!}
                    	<div class="form-fields">
                            <h2>Shop Login</h2>

                            <p>
	                    		{!!Form::label('email', 'Mobile No / e-mail', array('class' => 'important','id' => '')) !!}
	                    		{!! Form::text('email',Request::old('email'),['id'=>'', 'class' => '','placeholder'=>'', 'required']) !!}
	                            <span class="errors">
	                                {!! $errors->first('email') !!}
	                            </span> 
	                    	</p>

	                    	<p>
	                    		{!!Form::label('password', 'Password', array('class' => 'important','id' => '')) !!}
	                    		{{ Form::password('password', array('placeholder'=>'Password', 'class'=>'', 'placeholder'=>'Password', 'required' ) ) }}                                         
	                            <span class="errors">
	                                {!! $errors->first('password') !!}
	                            </span>
	                    	</p>
                        </div>
                    	
                    	<div class="form-action">
                            <p class="lost_password">
                                <a href="{{ route('seller.forgetpassword') }}">
                                    Lost your password?
                                </a>
                            </p>
                            <button type="submit">Login</button>
                            <label><input type="checkbox">Remember me</label>
                        </div>

                    {!! Form::close() !!}

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">

                	<?php
						$url = route('seller.do_registration');
					?>
					{!! Form::open(array('route' => 'seller.do_registration', 'method' => 'post', 'id' => "merchant_reg_id", 'class' => '')) !!}
						<div class="form-fields">
                            <h2>New Shop Register</h2>
                            <p>
                            	{!!Form::label('shop_name', 'Shop Name', array('class' => 'important','id' => '')) !!}

                            	{!! Form::text('shop_name',Request::old('shop_name'),['id'=>'', 'class' => '','placeholder'=>'Shop Name', 'required']) !!}
								<span class="errors">
									{!! $errors->first('shop_name') !!}
								</span>
                            </p>
                            <p>
                                {!!Form::label('username', 'Shop Owner', array('class' => 'important','id' => '')) !!}

                                {!! Form::text('username',Request::old('username'),['id'=>'', 'class' => 'form-control','placeholder'=>'Shop Owner Name', 'required']) !!}
                                <span class="errors">
                                    {!! $errors->first('username') !!}
                                </span>
                            </p>
                            <p>
                            	{!!Form::label('shop_address', 'Shop Address', array('class' => 'important','id' => '')) !!}

                            	{!! Form::text('shop_address',Request::old('shop_address'),['id'=>'','class' => '', 'placeholder'=>'Enter Address','rows'=>'3', 'cols'=>'50']) !!}

				            	<span class="errors">
				            		{!! $errors->first('shop_address') !!}
				            	</span>
                            </p>

                            <p>
                            	{!!Form::label('mobile_no', 'Mobile Number', array('class' => 'important','id' => '')) !!}
                            	
                            	{!! Form::number('mobile_no',Request::old('mobile_no'),['id'=>'', 'class' => '','placeholder'=>'Mobile Number', 'required']) !!}
								
								<span class="errors">
									{!! $errors->first('mobile_no') !!}
								</span>
                            </p>
                            <p>
                                {!!Form::label('email', 'Email Address', array('class' => '','id' => '')) !!}

                                {!! Form::email('email',Request::old('email'),['id'=>'', 'class' => '','placeholder'=>'Email']) !!}
                    
                                <span class="errors">
                                    {!! $errors->first('email') !!}
                                </span>
                            </p>
                            <p>
                            	{!!Form::label('password', 'Password', array('class' => 'important','id' => '')) !!}

                            	{{ Form::password('password', array('placeholder'=>'Password', 'id'=>'password', 'class'=>'form-control inputfield', 'required' ) ) }}
				            	<span class="errors">
				            		{!! $errors->first('password') !!}
				            	</span>
                            </p>
                            <p>
                            	{!!Form::label('password_confirmation', 'Confirm Password', array('class' => 'important','id' => '')) !!}

                            	{{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password', 'id'=>'', 'class'=>'', 'required' ) ) }}

				                <span class="errors">
				                    {!! $errors->first('password_confirmation') !!}
				                </span>
                            </p>
                        </div>

                        <div class="form-action">
                            <button type="submit">Register</button>
                        </div>
                        
					{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>            
	

@endsection