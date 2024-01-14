@extends('Web::customer.customer_master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                    <h2><span>{{Auth::user()->username }} Profile </span> </h2>                   
          </div>
        </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-fields">
                    <div class="about-skill-area">
                        <h2>{{$customer_data->username}}</h2>
                        <p>{{$customer_data->email}}</p>
                        <p>{{$customer_data->mobile_no}}</p>
                    </div>
                </div>
                <div class="buttons-set">
                    <a data-toggle="modal" data-target="#chanePasswordModal" class="button coupon_btn" style="background-color: #4CAF50;" href="#">Change Password</a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-fields">
                    <h2>Update Details</h2>

                    {!! Form::model($customer_data, ['method' => 'POST', 'route'=> ['customer.do_customer_edit_info'],"class"=>"", 'id' => '']) !!}

                        <p>
                            {!!Form::label('username', 'Name', array('class' => '','id' => '')) !!}
                            {!! Form::text('username',Request::old('username'),['id'=>'', 'class' => '','placeholder'=>'']) !!}
                            <span class="errors">
                                {!! $errors->first('username') !!}
                            </span> 
                        </p>

                        <p>
                            {!!Form::label('email', 'Email', array('class' => '','id' => '')) !!}
                            {!! Form::text('email',Request::old('email'),['id'=>'', 'class' => '','placeholder'=>'']) !!}
                            <span class="errors">
                                {!! $errors->first('email') !!}
                            </span> 
                        </p>

                        <p>
                            {!!Form::label('mobile_no', 'Mobile No', array('class' => '','id' => '')) !!}
                            {!! Form::text('mobile_no',Request::old('mobile_no'),['id'=>'', 'class' => '','placeholder'=>'']) !!}
                            <span class="errors">
                                {!! $errors->first('mobile_no') !!}
                            </span> 
                        </p>

                        <div class="form-action">
                            <button type="submit">Update</button>
                        </div>
                            
                {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
</div>        


@endsection