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
                    <h2><span>Shop Register</span></h2>
                </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 offset-md-3">

                    {!! Form::open(array('route' => 'seller.do_registration', 'method' => 'post', 'id' => "merchant_reg_id", 'class' => '')) !!}
                        <div class="form-fields">
                            <h2>New Shop Register</h2>
                            <p>
                                {!!Form::label('shop_name', 'Shop Name', array('class' => 'important','id' => '')) !!}

                                {!! Form::text('shop_name',Request::old('shop_name'),['id'=>'', 'class' => 'form-control','placeholder'=>'Shop Name', 'required']) !!}
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

                                {!! Form::text('shop_address',Request::old('shop_address'),['id'=>'','class' => 'form-control', 'placeholder'=>'Enter Address','rows'=>'3', 'cols'=>'50']) !!}

                                <span class="errors">
                                    {!! $errors->first('shop_address') !!}
                                </span>
                            </p>

                            <p>
                                {!!Form::label('mobile_no', 'Mobile Number', array('class' => 'important','id' => '')) !!}
                                
                                {!! Form::number('mobile_no',Request::old('mobile_no'),['id'=>'', 'class' => 'form-control','placeholder'=>'Mobile Number', 'required']) !!}
                                
                                <span class="errors">
                                    {!! $errors->first('mobile_no') !!}
                                </span>
                            </p>
                            <p>
                                {!!Form::label('email', 'Email Address', array('class' => '','id' => '')) !!}

                                {!! Form::email('email',Request::old('email'),['id'=>'', 'class' => 'form-control','placeholder'=>'Email']) !!}
                    
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

                                {{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password', 'id'=>'', 'class'=>'form-control', 'required' ) ) }}

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
