@extends('Web::layouts.master')
@section('body')
<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Seller Login</li>
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
                    <h2><span>Login</span></h2>
                </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 offset-md-3">

                    <?php $url = route('seller.post.login'); ?>
                    {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "", 'id'=>'')) !!}
                        <div class="form-fields">
                            <h2>Login</h2>

                            <p>
                                {!!Form::label('email', 'Mobile No / E-mail', array('class' => 'important','id' => '')) !!}
                                {!! Form::text('email',Request::old('email'),['id'=>'', 'class' => 'form-control','placeholder'=>'']) !!}
                                <span class="errors">
                                    {!! $errors->first('email') !!}
                                </span>
                            </p>

                            <p>
                                {!!Form::label('password', 'Password', array('class' => 'important','id' => '')) !!}
                                {{ Form::password('password', array('placeholder'=>'Password','id' => 'password', 'class'=>'form-control', 'placeholder'=>'Password', 'required' ) ) }}
                                <span class="errors">

                                    {!! $errors->first('password') !!}
                                </span>
                            </p>
                            <p>
                            <input type="checkbox" style="height: 20px; width: 20px;" onclick="showPassword()"> <span style="margin-left:15px; font-size: 14px;"> Show Password</span> </p>

                             <!-- <p>
                                    <label class="capcha" for="mathgroup" style="font-size:14px !important; ">Human or Computer? <br>Please Take This Test For Login :  <span>( {{ app('mathcaptcha')->label() }} ) = </span></label>
                                    <span style="background-color: #ffffff; border:1px solid #ff6600; width: 100px; display: inline-block;">  {!! app('mathcaptcha')->input() !!} </span>
                                    <span class="errors" style="font-size: 15px; ">
                                      {!!$errors->first('mathcaptcha') !!}
                                    </span>
                                </p> -->
                        </div>

                        <div class="form-action">
                             <p class="lost_password">
                                <a href="{{ route('seller.forgetpassword') }}">
                                    Lost your password?
                                </a>
                            </p>
                            <button type="submit">Login</button>
                            <label><input type="checkbox" name="remember">Remember me</label>
                        </div>


                    {!! Form::close() !!}

                </div>


            </div>
        </div>
    </div>

    <script>
        function showPassword() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>

@endsection
