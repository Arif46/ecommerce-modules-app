@extends('Seller::webseller.seller_master')
@section('body')
	
	<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Delivery Option</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <div class="my-account-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-fields">
                            <div class="about-skill-area">                      
                                   @include('Seller::webseller.leftmenu')
                            </div>
                        </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="form-fields">
                        <div class="about-skill-area">

                        	{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['seller.delivery.option.update', $data->id],"class"=>"", 'id' => '']) !!}

								@include('Seller::webseller_delivery._form')

							{!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection