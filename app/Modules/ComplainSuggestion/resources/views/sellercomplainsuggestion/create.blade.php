@extends('Seller::webseller.seller_master')
@section('body')

    <!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->

<div class="my-account-area ptb-80">
    <div class="container">
        <div class="row">                      
            <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>{{$pageTitle}}</h3>
                <div class="form-fields">
                    <div class="about-skill-area">                      

                        <div class="cart-main-area">
                        <div class="body">                         
                            <div class="row clearfix">
                                <div class="col-md-12">  
                                        {!! Form::open(['route' => 'seller.complain.suggestion.store',  'files'=> true, 'id'=>'colorform', 'class' => '']) !!}

                                            @include('ComplainSuggestion::sellercomplainsuggestion._form')

                                        {!! Form::close() !!}

                                </div>
                            </div>
                        </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

@endsection
