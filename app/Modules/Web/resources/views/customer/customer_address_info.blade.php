@extends('Web::customer.customer_master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Address</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->


<div class="my-account-area ptb-80">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-title text-center title-style-2">
                    <h2><span>{{Auth::user()->username }} Address </span> </h2>                   
                </div>
                <button style="margin-bottom: 15px;" type="button" class="btn btn-primary mt-15 float-right" data-toggle="modal" data-target="#exampleModal">
                  Add new address
                </button>
            </div>
      
       <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-fields">
                    <h2>Billing Address</h2>
                    @if (!empty($billing_address))
                        <b>First Name</b> :{{$billing_address->name}}
                        <br/>
                        <b>Last Name</b> :{{$billing_address->lastname}}
                        <br/>
                        <b>Email</b> : {{$billing_address->email}}
                        <br/>
                        <b>Phone</b> : {{$billing_address->phone}}
                        <br/>
                        <b>Alternative Phone</b> : {{$billing_address->alternative_phone}}
                        <br/>
                        <b>Address</b> : {{$billing_address->address}}
                        <br/>
                        <b>District</b> : {{$billing_address->city}}
                        <br/>
                        <b>Divisions</b> : {{$billing_address->area}}
                        <br/>
                        <b>Zip Code</b> : {{$billing_address->zip}}
                        <br/>
                       
                        <b>Special instruction </b> : {{$billing_address->special_instruction}}
                        <br/><br/>
                            
                        <a class="btn btn-danger" href="{{ route('customer.delete.shipping.billing.address', $billing_address->id) }}" onclick="return confirm('Are you sure to Delete?')" >Delete</i></a>

                        <a class="btn btn-info open-customer-edit-modal" data-href="{{ route('customer.edit.shipping.billing.address', $billing_address->id) }}" >Edit</a>
                        
                    @endif

                </div>
            </div>   

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-fields">
                    <h2>Delivery Address</h2>
                    @if(isset($shipping_address) && count($shipping_address)>0)
                        <?php $x=0 ?>
                            @foreach ($shipping_address as $sa)
                                <?php $x++ ?>
                            
                                <h4>Address: {{$x}}</h4>

                                   <b>Name</b> : {{$sa->name}} 
                                   <br/>
                                   <b>Last Name</b> :{{$sa->lastname}}
                                   <br/>
                                   <b>Email</b> : {{$sa->email}}
                                   <br/>
                                   <b>Phone</b> : {{$sa->phone}}
                                   <br/>
                                   <b>Alternative Phone</b> : {{$sa->alternative_phone}}
                                   <br/>
                                   <b>Address</b> : {{$sa->address}}
                                   <br/>
                                   <b>District</b> : {{$sa->city}}
                                    <br/>
                                    <b>Divisions</b> : {{$sa->area}}
                                    <br/>
                                    <b>Zip Code</b> : {{$sa->zip}}
                                    <br/>
                                    
                                   <b>Special Instruction</b> : {{$sa->special_instruction}}
                                   <br/><br/>

                                   <a href="{{ route('customer.delete.shipping.billing.address', $sa->id) }}" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</a>
                                   <a data-href="{{ route('customer.edit.shipping.billing.address', $sa->id) }}" class="btn btn-info open-customer-edit-modal">Edit</a>
                                   <br/><br/>
                         @endforeach
                    @endif
                </div>
            </div>
        </div>
        </div>

        </div>
    </div>
</div>

            
  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

            <?php $url = route('customer.billing.shipping.store'); ?>
            {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "edit-formas" , 'id'=>'')) !!}

          <div class="modal-body">
                
            <div class="form-fields">
                <div class="row">
                    <div class="col-12 col-md-6">    
                        <p>
                            {!! Form::label('type', 'Type', array('class' => '')) !!} <span class="required"> *</span>

                            {!! Form::Select('type',array(''=>'Select','billing'=>'Billing','shipping' => 'Shipping'),Request::old('type'),['id'=>'type', 'class'=>'form-control inputfield', 'required']) !!}

                            <span class="errors">
                                {!! $errors->first('type') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6">    
                        <p>
                            {!! Form::label('name', 'First Name', array('class' => '')) !!} <span class="required"> *</span>
                            <input type="hidden" name="users_id" value="{{$user_data->id}}">
                                      
                            {!! Form::text('name',Request::old('name'),['id'=>'name', 'class' => '','placeholder'=>'First Name', 'required']) !!}

                            <span class="errors">
                                {!! $errors->first('name') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6">    
                        <p>
                            {!! Form::label('lastname', 'lastname', array('class' => '')) !!} <span class="required"> *</span>             
                            {!! Form::text('lastname',Request::old('lastname'),['id'=>'lastname', 'class' => '','placeholder'=>'last name']) !!}

                            <span class="errors">
                                {!! $errors->first('lastname') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6">    
                        <p>
                            {!! Form::label('email', 'Email', array('class' => '')) !!} <span class="required"> *</span>

                            {!! Form::email('email',Request::old('email'),['id'=>'email', 'class' => '','placeholder'=>'Email']) !!}

                            <span class="errors">
                                {!! $errors->first('email') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6">    
                        <p>
                            {!! Form::label('phone', 'Phone', array('class' => '')) !!} <span class="required"> *</span>
                            {!! Form::number('phone',Request::old('phone'),['id'=>'phone', 'class' => '','placeholder'=>'Enter your phone no', 'required']) !!}

                            <span class="errors">
                                {!! $errors->first('phone') !!}
                            </span>
                        </p>
                    </div>

                    <div class="col-12 col-md-6">    
                        <p>
                            {!! Form::label('alternative_phone', 'Alternative Phone', array('class' => '')) !!} 
                            {!! Form::number('alternative_phone',Request::old('alternative_phone'),['id'=>'alternative_phone', 'class' => '','placeholder'=>'Enter alternative phone number']) !!}

                            <span class="errors">
                                {!! $errors->first('alternative_phone') !!}
                            </span>
                        </p>
                    </div>

                    <div class="col-12 col-md-12">    
                        <p>
                            {!! Form::label('address', 'Address', array('class' => '')) !!} <span class="required"> *</span>

                            {!! Form::text('address',Request::old('address'),['id'=>'address', 'class' => '','placeholder'=>'Address', 'required']) !!}

                            <span class="errors">
                                {!! $errors->first('address') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-4">    
                        <p>
                            {!! Form::label('city', 'District', array('class' => '')) !!} <span class="required"> *</span>             
                            {!! Form::text('city',Request::old('city'),['id'=>'city', 'class' => '','placeholder'=>'District', 'required']) !!}

                            <span class="errors">
                                {!! $errors->first('city') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-4">    
                        <p>
                            {!! Form::label('area', 'Divisions', array('class' => '')) !!} <span class="required"> *</span>             
                            <!-- !! Form::text('area',Request::old('area'),['id'=>'area', 'class' => '','placeholder'=>'State']) !!} -->
                             {!! Form::Select('area',array('Dhaka' =>'Dhaka','Chittagong ' =>'Chittagong ',
   'Mymensingh ' =>'Mymensingh ',
   'Khulna ' =>'Khulna ',
   'Rajshahi ' =>'Rajshahi ',
   'Rangpur ' =>'Rangpur ',
   'Sylhet ' =>'Sylhet ',
   'Barishal' =>'Barishal'   
),Request::old('area'),['id'=>'area', 'class'=>'form-control']) !!}

                            <span class="errors">
                                {!! $errors->first('area') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-4">    
                        <p>
                            {!! Form::label('zip', 'Zip', array('class' => '')) !!} <span class="required"> *</span>             
                            {!! Form::text('zip',Request::old('zip'),['id'=>'zip', 'class' => '','placeholder'=>'Zip', 'required']) !!}

                            <span class="errors">
                                {!! $errors->first('zip') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-12">    
                        <p>
                            {!! Form::label('special_instruction', 'Special Instruction', array('class' => '')) !!} 

                            {!! Form::textarea('special_instruction',Request::old('special_instruction'),['id'=>'special_instruction', 'class' => '','placeholder'=>'Special instruction for address']) !!}

                            <span class="errors">
                                {!! $errors->first('special_instruction') !!}
                            </span>
                        </p>
                    </div>
                </div>

                
                <p>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </p>

            </div>

          </div>
          
          {!! Form::close() !!}
        </div>
      </div>
    </div>     



    <div class="modal fade open_modal_update" tabindex="" role="dialog">
        <div class="modal-dialog modal-lg">
           
            <div class="modal-content">
                 <div class="modal-header">
                    <h4 class="modal-title">Edit Address</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                    
                    

                </div> <!-- / .modal-body -->
            </div> <!-- / .modal-content -->
        </div> 
    </div>


@endsection