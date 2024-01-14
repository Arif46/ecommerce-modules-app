{!! Form::model($billing_shipping_data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['customer.update.billing.shipping.info', $billing_shipping_data->id], "class"=>"attribute_option_form" ]) !!}
<div class="form-fields">
    <div class="row">
        <div class="col-12 col-md-6">    
            <p>
                {!! Form::label('type', 'Type', array('class' => '')) !!} <span class="required"> *</span>

                {!! Form::Select('type',array(''=>'Select Type','billing'=>'Billing','shipping' => 'Shipping'),Request::old('type'),['id'=>'type', 'class'=>'form-control inputfield', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('type') !!}
                </span>

                <input type="hidden" name="users_id" value="{{$billing_shipping_data->users_id}}">
            </p>
        </div>
        <div class="col-12 col-md-6">    
            <p>
                {!! Form::label('name', 'name', array('class' => '')) !!} <span class="required"> *</span>

                {!! Form::text('name',Request::old('name'),['id'=>'name', 'class' => 'form-control inputfield','placeholder'=>'First Name', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('name') !!}
                </span>
            </p>
        </div>
        <div class="col-12 col-md-6">    
                        <p>
                            {!! Form::label('lastname', 'lastname', array('class' => '')) !!} <span class="required"> *</span>             
                            {!! Form::text('lastname',Request::old('lastname'),['id'=>'lastname', 'class' => 'form-control','placeholder'=>'Last Name']) !!}

                            <span class="errors">
                                {!! $errors->first('lastname') !!}
                            </span>
                        </p>
        </div>
        <div class="col-12 col-md-6">    
            <p>
                {!! Form::label('email', 'Email', array('class' => '')) !!} <span class="required"> *</span>

                {!! Form::email('email',Request::old('email'),['id'=>'email', 'class' => 'form-control inputfield','placeholder'=>'Email']) !!}

                <span class="errors">
                    {!! $errors->first('email') !!}
                </span>
            </p>
        </div>
        <div class="col-12 col-md-6">    
            <p>
                {!! Form::label('phone', 'Phone', array('class' => '')) !!} <span class="required"> *</span>

                {!! Form::number('phone',Request::old('phone'),['id'=>'phone', 'class' => 'form-control inputfield','placeholder'=>'Phone No', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('phone') !!}
                </span>
            </p>
        </div>
        <div class="col-12 col-md-6">    
            <p>
                {!! Form::label('alternative_phone', 'Alternative Phone', array('class' => '')) !!} 
                {!! Form::number('alternative_phone',Request::old('alternative_phone'),['id'=>'alternative_phone', 'class' => 'form-control inputfield','placeholder'=>'Enter alternative phone number', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('alternative_phone') !!}
                </span>
            </p>
        </div>
        <div class="col-12 col-md-12">    
            <p>
                {!! Form::label('address', 'Address', array('class' => '')) !!} <span class="required"> *</span>

                {!! Form::text('address',Request::old('address'),['id'=>'address', 'class' => 'form-control inputfield','placeholder'=>'Address', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('address') !!}
                </span>
            </p>
        </div>
                    <div class="col-12 col-md-4">    
                        <p>
                            {!! Form::label('city', 'District', array('class' => '')) !!} <span class="required"> *</span>             
                            {!! Form::text('city',Request::old('city'),['id'=>'city', 'class' => 'form-control','placeholder'=>'District', 'required']) !!}

                            <span class="errors">
                                {!! $errors->first('city') !!}
                            </span>
                        </p>
                    </div>
                    <div class="col-12 col-md-4">    
                        <p>
                            {!! Form::label('area', 'Divisions', array('class' => '')) !!} <span class="required"> *</span>             
                           <!--  {!! Form::text('area',Request::old('area'),['id'=>'area', 'class' => 'form-control','placeholder'=>'State', 'required']) !!} -->
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
                            {!! Form::text('zip',Request::old('zip'),['id'=>'zip', 'class' => 'form-control','placeholder'=>'Zip', 'required']) !!}

                            <span class="errors">
                                {!! $errors->first('zip') !!}
                            </span>
                        </p>
                    </div>
        <div class="col-12 col-md-12">    
            <p>
                {!! Form::label('special_instruction', 'Special Instruction', array('class' => '')) !!} 

                {!! Form::text('special_instruction',Request::old('special_instruction'),['id'=>'special_instruction', 'class' => 'form-control inputfield','placeholder'=>'Special instruction for address', 'required']) !!}

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
    
{!! Form::close() !!}
