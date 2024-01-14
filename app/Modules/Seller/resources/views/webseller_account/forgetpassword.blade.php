@extends('Web::layouts.master')
@section('body')
	<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Forgot password</li>
                </ul>
            </nav>
        </div>
    </div>
<!-- Breadcrumb Area End -->

	<div class="my-account-area ptb-80">
        <div class="container">
            <div class="section-title text-center title-style-2">
                <span>Seller</span>
                <h2><span>Forgot Password</span></h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

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

                	<?php $url = route('seller.forgetpassword.sendmail'); ?>
					{!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "login-formas" ,'id'=>'forgetpass')) !!}

					<div class="form-fields">
						<p>
                            {!!Form::label('email', 'E-Mail Address', array('class' => 'important','id' => '')) !!}
                            {!! Form::text('email',Request::old('email'),['id'=>'email', 'class' => '','placeholder'=>'', 'required']) !!}
                            <span class="errors">
                                {!! $errors->first('email') !!}
                            </span> 
                        </p>

                        <div class="form-action">
                            <button type="submit">Submit</button>                            
                        </div>
					</div>
                 	

                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection