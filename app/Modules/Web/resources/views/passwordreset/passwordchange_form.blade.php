@extends('Web::layouts.master')
@section('body')

 <div class="container">
 	<div class="breadcumb-area">
 	<!-- Breadcumb -->
 	<nav aria-label="breadcrumb">
 		<ol class="breadcrumb">
 			<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
 			<li class="breadcrumb-item active" aria-current="page">Password change</li>
 		</ol>
 	</nav>
 </div>
 </div>


 <section class="popular-courses-area section-padding-50-10" style="background-image: url({{URL::to('frontend')}}/img/core-img/texture.png);">
 	<div class="container">
 		<div class="clever-description mb-30">

 			<div class="contact-form">
 				<h4 class="text-center">Password Change Form</h4>
 				<div class="row">
 					<div class="col-12 col-lg-6 offset-md-3">

 						<div class="row">
			                <div class="col-md-12">
			                    @if(Session::has('danger'))
			                        <div class="alert alert-danger fade show text-center" role="alert" >
			                            <span class="close" data-dismiss="alert">×</span>
			                            {{Session::get('danger')}}
			                        </div>              
			                    @endif

			                    @if(Session::has('message'))
			                        <div class="alert alert-success fade show text-center" role="alert" >
			                            <span class="close" data-dismiss="alert">×</span>
			                            {{Session::get('message')}}
			                        </div>              
			                    @endif
			                </div>
			            </div>

 						<?php
 						$url = route('customer.pass.change');
 						?>

 						{!! Form::open(array('url' => $url, 'method' => 'post', 'id' => "customerpass")) !!}

 						<div class="row">
 							<div class="col-12">
 								<div class="text-center mb-10">Enter new password and retype this password for confirmation</div>
 							</div>
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
 								<button class="btn clever-btn btn-bg-2 w-100">Submit</button>
 							</div>

 						</div>
 						{!! Form::close() !!}
 					</div>
 				</div>

 			</div>
 		</div>
 	</section>

 	@endsection
