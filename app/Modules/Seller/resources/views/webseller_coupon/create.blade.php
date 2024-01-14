@extends('Seller::webseller.seller_master')
@section('body')
	
	<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Coupon</a></li>
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
                            <h2><span>Add New Coupon</span></h2>                
                                                   
                        </div>
                    </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-fields">
                        <div class="about-skill-area">

                        	{!! Form::open(['route' => 'seller.coupon.store',  'files'=> true, 'id'=>'', 'class' => '']) !!}

								@include('Seller::webseller_coupon._form')

							{!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection