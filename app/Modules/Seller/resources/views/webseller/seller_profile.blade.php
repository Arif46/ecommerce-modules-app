@extends('Seller::webseller.seller_master')
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
    <!-- breadcrumb area -->
        <div class="breadcrumb-area bg-img pt-50 pb-50 default-overlay-2" style="background-image: url('{{URL::to('')}}/uploads/seller/{{$verifaid_user->image_link}}');">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2> {{$verifaid_user->shop_name}} </h2>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end-->
    <div class="my-account-area ptb-80">
        <div class="container">
            <div class="row">                
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-fields">
                        <div class="about-skill-area"> 
                            <h2>{{$verifaid_user->shop_name}}</h2>  
                            <br>
                            @if(!empty($verifaid_user->shop_logo))
                            <p class="text-left"> <img width="140"  src="{{URL::to('')}}/uploads/seller/{{$verifaid_user->shop_logo}}">
                            </p>
                            @endif                         
                           <br>
                            <p>{{ $verifaid_user->username }}<br>
                                {{$verifaid_user->mobile_no}}<br>
                            {{ $verifaid_user->shop_address }}<br>
                            {{ $verifaid_user->shop_description }}</p> 
                        </div>
                    </div>
                   
                    <div class="form-fields">
                        <div class="buttons-set">
                            <a data-toggle="modal" data-target="#chanePasswordModal" class="button" style="background-color: #4CAF50;" href="#">Change Password</a>
                        </div>
                    </div>

                    <div class="form-fields">
                         <h2>Upload Shop Logo</h2>
                         <h5>Supported format :: jpg & Maximum Width X Height = 220 Px X 100 px</h5> <br>
                        <div class="buttons-set">
                           {!! Form::open(['route' => 'seller.shop_logo',  'files'=> true, 'id'=>'', 'class' => 'form-horizontal']) !!}
                                           
                          <input type="file" accept="image/*" name="shop_logo" class="form-control"><br>
                          <input type="hidden" name="users_id" value="{{$verifaid_user->users_id}}">
                          <button class="btn btn-success">Import Logo</button>

                                        {!! Form::close() !!}
                        </div>
                    </div>

                        <div class="form-fields">
                        <h2>Upload Cover Photo</h2>
                         <h5>Supported format :: jpeg,png,jpg,gif & Maximum Width X Height = 1920 Px X 220 px</h5> <br>
                        <div class="buttons-set">
                           {!! Form::open(['route' => 'seller.shop_banner',  'files'=> true, 'id'=>'', 'class' => 'form-horizontal']) !!}
                                           
                          <input type="file" accept="image/*" name="image_link" class="form-control"><br>
                          <input type="hidden" name="users_id" value="{{$verifaid_user->users_id}}">
                          <button class="btn btn-success">Cover Photo</button>

                                        {!! Form::close() !!}
                        </div>
                    </div>
                
                </div>



                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-fields">
                        <h2>Update Details</h2>
                        
                        <?php $url = route('seller.post.edit.profile'); ?>
                        

                        {!! Form::model($verifaid_user, ['method' => 'POST', 'files'=> true, 'route'=> ['seller.post.edit.profile'],"class"=>"", 'id' => '']) !!}
                            <p>
                                {!!Form::label('shop_name', 'Shop Name', array('class' => 'important','id' => '')) !!}
                                {!! Form::text('shop_name',Request::old('shop_name'),['id'=>'', 'class' => '','type'=>'']) !!}
                                <span class="errors">
                                    {!! $errors->first('shop_name') !!}
                                </span> 
                            </p>
                            <p>
                                {!!Form::label('username', 'Shop Owner', array('class' => 'important','id' => '')) !!}
                                {!! Form::text('username',Request::old('username'),['id'=>'', 'class' => 'form-control','type'=>'']) !!}
                                <span class="errors">
                                    {!! $errors->first('username') !!}
                                </span> 
                            </p>

                            <p>
                                {!!Form::label('shop_address', 'Shop Address', array('class' => 'important','id' => '')) !!}
                                {!! Form::text('shop_address',Request::old('shop_address'),['id'=>'', 'class' => 'form-control','placeholder'=>'', 'required']) !!}
                                <span class="errors">
                                    {!! $errors->first('shop_address') !!}
                                </span> 
                            </p>

                            <p>
                                {!!Form::label('shop_description', 'Shop Description', array('class' => 'important','id' => '')) !!}
                                {!! Form::text('shop_description',Request::old('shop_description'),['id'=>'', 'class' => 'form-control','placeholder'=>'', 'required']) !!}
                                <span class="errors">
                                    {!! $errors->first('shop_description') !!}
                                </span> 
                            </p>

                            <p>
                                {!!Form::label('first_contact_person_details', 'Contact Person', array('class' => 'important','id' => '')) !!}
                                {!! Form::text('first_contact_person_details',Request::old('first_contact_person_details'),['id'=>'', 'class' => 'form-control','placeholder'=>'']) !!}
                                <span class="errors">
                                    {!! $errors->first('first_contact_person_details') !!}
                                </span> 
                            </p>

                            <p>
                                {!!Form::label('nid', 'NID No', array('class' => 'important','id' => '')) !!}
                                {!! Form::text('nid',Request::old('nid'),['id'=>'', 'class' => 'form-control','placeholder'=>'']) !!}
                                <span class="errors">
                                    {!! $errors->first('nid') !!}
                                </span> 
                            </p>

                            <input type="hidden" name="user_id" value="{{$verifaid_user->users_id}}">
                            
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

