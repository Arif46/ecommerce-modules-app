<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="">
<meta name="description" content="Afshini Online Shopping in Bangladesh - afshini.com is Online Shopping at Low price in Dhaka, Chittagong, Khulna, Sylhet , Mymensingh , Rajshahi and Barishal.">
<meta property="og:url" content="https://www.afshini.com/" />
<meta property="og:type" content="website">
<meta property="og:title" content="Online Shopping in Bangladesh at Low price - afshini.com" />
<meta property="og:description" content="Online Shopping in Bangladesh at Low price in ✓ Dhaka, ✓ Chittagong,✓  Khulna, ✓ Sylhet , ✓ Mymensingh , ✓ Rajshahi and ✓ Barishal." />
<meta property='og:site_name' content='Afshini'/>
<meta property="og:image" content="{{ asset('frontend/assets/img/logo/logo.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('frontend/assets/img/favicon.png') }}" type="img/x-icon" rel="shortcut icon">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script type="text/javascript" src="{{ asset('admin/js/jquery-3.2.1.min.js') }}"></script>

  <title>
    @if(isset($pageTitle))
      {{$pageTitle}}
    @endif
  </title>

  @include('Web::layouts.frontend_css')

  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/jquery-confirm.css') }}"/>

</head>
<body>

  <!-- header for desktop  -->
  @include('Seller::webseller.seller_header')

  @if(Session::has('danger'))
  <div class="alert alert-danger fade show" role="alert" >
    <span class="close" data-dismiss="alert">×</span>
    {{Session::get('danger')}}
  </div>
  @endif

  @if(Session::has('message'))
  <div class="alert alert-success fade show" role="alert" >
     <span class="close" data-dismiss="alert">×</span>
    {{Session::get('message')}}
  </div>
  @endif

  @if ($errors->any())
  <div class="alert alert-danger fade show">
     <span class="close" data-dismiss="alert">×</span>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

    @yield('body')

    <!-- Footer part -->
    @include('Web::layouts.footer')

    <!-- script -->
    @include('Web::layouts.frontend_js')

    <script type="text/javascript" src="{{ asset('admin/js/jquery-confirm.js') }}"></script>

  @include('Seller::webseller.frontend_scripts')
  @yield('script')


    <!-- Modal -->
    <div class="modal fade" id="chanePasswordModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
            $url = route('seller.do.change.password');
          ?>
          {!! Form::open(array('url' => $url, 'method' => 'post', 'id' => "")) !!}
          <div class="modal-body">

            <div class="form-fields">

                <p>
                    {!! Form::label('old_password', 'Old Password', array('class' => '')) !!} <span class="required"> *</span>
                    {!! Form::password('old_password',['id'=>'old_password', 'class' => 'form-control','placeholder'=>'Old password', 'required']) !!}

                    <span class="errors">
                        {!! $errors->first('old_password') !!}
                    </span>
                </p>

                <p>
                    {!! Form::label('password', 'Password', array('class' => '')) !!} <span class="required"> *</span>
                    {!! Form::password('password',['id'=>'password', 'class' => 'form-control','placeholder'=>'New password', 'required']) !!}

                    <span class="errors">
                        {!! $errors->first('password') !!}
                    </span>
                </p>

                <p>
                    {!! Form::label('password_confirmation', 'Confirm Password', array('class' => '')) !!} <span class="required"> *</span>
                    {!! Form::password('password_confirmation',['id'=>'password_confirmation', 'class' => 'form-control','placeholder'=>'Confirm new password', 'required']) !!}

                    <span class="errors">
                        {!! $errors->first('password_confirmation') !!}
                    </span>
                </p>

                <button type="submit" class="btn btn-primary pull-right">Change Password</button>

            </div>

          </div>
          {!! Form::close() !!}

        </div>
      </div>
    </div>

</body>
</html>
