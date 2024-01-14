 @extends('Web::layouts.master')
 @section('body')

 <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Account</li>
                </ul>
            </nav>
        </div>
    </div>
<!-- Breadcrumb Area End -->


<!-- Account Area Start -->
    <div class="my-account-area ptb-80">
        <div class="container">
            <div class="section-title text-center title-style-2">
                    <span>Customer</span>
                    <h2><span>Sign Up</span></h2>
                </div>
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
            <div class="row">         
                <div class="col-lg-6 col-md-6 col-sm-12 offset-md-3">
                    <?php
                        $url = route('customer.do_register');
                    ?>
                    {!! Form::open(array('url' => $url, 'method' => 'post', 'id' => "registration", 'class' => '')) !!}

                        <div class="form-fields">
                            <h2> Account Information</h2>
                            <p>
                                {!!Form::label('username', 'Name', array('class' => 'important','id' => '')) !!}
                                {!! Form::text('username',Request::old('username'),['id'=>'username', 'class' => '','placeholder'=>'Name', 'required']) !!}
                                <span class="errors">                  
                                    {!! $errors->first('username') !!}
                                </span>
                            </p>                            
                            <p>
                                {!!Form::label('mobile_no', 'Mobile No', array('class' => 'important','id' => '')) !!}
                                {!! Form::number('mobile_no',Request::old('mobile_no'),['id'=>'mobile_no', 'class' => '','placeholder'=>'Mobile no.', 'required']) !!}
                                <span class="errors">
                                    {!! $errors->first('mobile_no') !!}
                                </span>
                            </p>
                            <p>
                                {!!Form::label('email', 'Email Address', array('class' => '','id' => '')) !!}
                                {!! Form::email('email',Request::old('email'),['id'=>'email', 'class' => '','placeholder'=>'Email']) !!}
                                <span class="errors">
                                    {!! $errors->first('email') !!}
                                </span>
                            </p>
                            <p>
                                {!!Form::label('password', 'Password', array('class' => 'important','id' => '')) !!}
                                {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control inputfield', 'placeholder'=>'Password', 'required' ) ) }}
                                <span class="errors">
                                    {!! $errors->first('password') !!}
                                </span>
                            </p>
                            <p>
                                {!!Form::label('password_confirmation', 'Confirm Password', array('class' => 'important','id' => '')) !!}

                                {{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password', 'class'=>'', 'placeholder'=>'Confirm password', 'required' ) ) }}
                                <span class="errors">
                                    {!! $errors->first('password_confirmation') !!}
                                </span>
                            </p>
<!--                             <p>
                                <label class="capcha" for="mathgroup" style="font-size:14px !important; ">Human or Computer?<br> Please Take This Test For Signup : <span> ( {{ app('mathcaptcha')->label() }} ) = </span></label>
                                  <span style="background-color: #d7d7d7; border:1px solid #ff6600; width: 100px; display: inline-block;"> {!! app('mathcaptcha')->input() !!}</span>
                                <span class="errors" style="font-size:15px; ">
                                <span class="errors" >
                                  {!!$errors->first('mathcaptcha') !!} 
                                </span>
                            </p> -->
                        </div>
                        <div class="form-action text-center">
                            <button type="submit" style="width: 100%; float: none;">Sign Up</button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!-- Account Area End -->

                    
        

@endsection
