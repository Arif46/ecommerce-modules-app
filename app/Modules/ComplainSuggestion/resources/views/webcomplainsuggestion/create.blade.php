@extends('Web::customer.customer_master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Complain Or Suggestion</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->

<div class="my-account-area ptb-80">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
          <div class="section-title text-center title-style-2">
                    <h2><span>Create complain or suggestion</span> </h2>                   
          </div>
        </div>

            

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-fields">
                    {!! Form::open(['route' => 'customer.complain.suggestion.store',  'files'=> true, 'id'=>'colorform', 'class' => '']) !!}

                        @include('ComplainSuggestion::webcomplainsuggestion._form')

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
</div>        


@endsection
