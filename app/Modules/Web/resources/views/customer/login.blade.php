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
                    <h2><span>Login</span></h2>
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

                    <?php $url = route('customer.post.login'); ?>
                        {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "login-formas" ,'id'=>'loginform')) !!}
                        
                            <div class="form-fields">
                                <h2>Customer Login</h2>
                                <p>
                                    {!!Form::label('email', 'Mobile No / e-mail', array('class' => 'important','id' => '')) !!}
                                    {!! Form::text('email',Request::old('email'),['id'=>'', 'class' => 'form-control','placeholder'=>'xxxx-xxx-xxxx', 'required']) !!}
                                     <span class="errors">
                                        {!! $errors->first('email') !!}
                                    </span> 
                                </p>
                                <p>
                                    {!!Form::label('password_r', 'Password', array('class' => 'important','id' => '')) !!}
                                    {{ Form::password('password_r', array('placeholder'=>'Password', 'class'=>'form-control','id' => 'password', 'placeholder'=>'Password', 'required' ) ) }}                                         
                                    <span class="errors">
                                        {!! $errors->first('password_r') !!}
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
                                    <a href="{{ route('customer.resetpassword') }}">
                                        Lost your password?
                                    </a>
                                </p>
                                <button type="submit">Login</button>
                                <label><input type="checkbox">Remember me</label>
                            </div>
                        
                        {!! Form::close() !!}

                </div>
               
            </div>
        </div>
    </div>
    <!-- Account Area End -->

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
