<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>AskmeBD || {{isset($pageTitle)?$pageTitle:''}}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="{{ url('logo/favicon.ico' ) }}" />
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('admin/css/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" />
    
    <!-- Jquery Core Js -->
    <script src="{{ asset('admin/js/vendor/modernizr-3.6.0.min.js') }}"></script>
</head>

<body class="wrapper">
    <div class="pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <!-- Main Content -->
                    <section class="content">
                        <div class="container">
                            <div class="card">
                                <div class="block-header">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <h2>Login</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <!-- Basic Examples -->
                                    <div class="col-md-12 ">
                                        <div class="card">
                                            @if(Session::has('error'))
                                            <div class="alert alert-danger">
                                                {{Session::get('error')}}
                                            </div>
                                            @endif
                                            @if(Session::has('danger'))
                                            <div class="alert alert-danger">
                                                {{Session::get('danger')}}
                                            </div>
                                            @endif
                                            @if(Session::has('message'))
                                            <div class="alert alert-info">
                                                {{Session::get('message')}}
                                            </div>
                                            @endif
                                            <?php $url = url('do-login'); ?>
                                            {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "form-horizontal" ,'id'=>'loginform')) !!}
                                            <div class="header1">
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                {!! Form::email('email',Request::old('email'),['id'=>'', 'class' => 'form-control','placeholder'=>'admin@gmail.com', 'required']) !!}
                                                                <span class="errors">
                                                                    {!! $errors->first('email') !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                {{ Form::password('password', array('id' => 'password', 'class' => 'form-control','required')) }}
                                                                <span class="errors">
                                                                    {!! $errors->first('password') !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                    <input type="checkbox" style="height: 20px; width: 20px;" onclick="showPassword()"> <span style="margin-left:15px; font-size: 14px;"> Show Password</span> </div>
                                            </div>
                                            <div class="footer">
                                                <div class="row clearfix">
                                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                        <button class="btn bg-blue-grey btngmt waves-effect" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer-area theme-bg pt-10 pb-10">
        <div class="container">
            <div class="footer-bottom pt-25">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright text-center">
                            <p>
                                Copyright ©
                                <a href="#">afshini.com</a>
                                . All Right Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('admin/js/vendor/jquery-v3.5.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/vendor/jquery-migrate-v3.3.0.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.js') }}"></script>
    <!-- Select Plugin Js -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('admin/js/plugins.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
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
</body>

</html>