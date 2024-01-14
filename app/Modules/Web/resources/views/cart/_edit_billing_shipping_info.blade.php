{!! Form::model($billing_shipping_data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['checkout.update.billing.shipping.info', $billing_shipping_data->id], 'id'=>'' ]) !!}

    <div class="row">

        <div class="col-6">
            <div class="form-group">
                {!! Form::text('name',Request::old('name'),['id'=>'name', 'class' => 'form-control','placeholder'=>'Frist Name', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('name') !!}
                </span>
            </div>
            <input type="hidden" name="users_id" value="{{$billing_shipping_data->users_id}}">
            <input type="hidden" name="type" value="{{$billing_shipping_data->type}}">
        </div>
        <div class="col-6">
            <div class="form-group">
                {!! Form::text('lastname',Request::old('lastname'),['id'=>'lastname', 'class' => 'form-control inputfield','placeholder'=>'Last Name', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('lastname') !!}
                </span>
            </div>
        </div>


        <div class="col-6">
            <div class="form-group">
                {!! Form::email('email',Request::old('email'),['id'=>'email', 'class' => 'form-control','placeholder'=>'Email']) !!}

                <span class="errors">
                    {!! $errors->first('email') !!}
                </span>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                {!! Form::text('phone',Request::old('phone'),['id'=>'phone', 'class' => 'form-control inputfield','placeholder'=>'Phone', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('phone') !!}
                </span>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
             {!! Form::text('address',Request::old('address'),['id'=>'address', 'style' => 'resize: none', 'class' => 'form-control','placeholder'=>'Address', 'required']) !!}

             <span class="errors">
                {!! $errors->first('address') !!}
            </span>
        </div>
    </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::text('city',Request::old('city'),['id'=>'city', 'class' => 'form-control inputfield','placeholder'=>'City', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('city') !!}
                </span>
            </div>
        </div>


        <div class="col-4">
            <div class="form-group">
               <!--  {!! Form::text('area',Request::old('area'),['id'=>'area', 'class' => 'form-control inputfield','placeholder'=>'State', 'required']) !!} -->
               {!! Form::Select('area',array('state' =>'Select State','Alabama' =>'Alabama','Alaska' =>'Alaska',
   'Arizona' =>'Arizona',
   'Arkansas' =>'Arkansas',
   'California' =>'California',
   'Colorado' =>'Colorado',
   'Connecticut' =>'Connecticut',
   'Delaware' =>'Delaware',
   'District of Columbia' =>'District of Columbia',
   'Florida' =>'Florida',
   'Georgia' =>'Georgia',
   'Hawaii' =>'Hawaii',
   'Idaho' =>'Idaho',
   'Illinois' =>'Illinois',
   'Indiana' =>'Indiana',
   'Iowa' =>'Iowa',
   'Kansas' =>'Kansas',
   'Kentucky' =>'Kentucky',
   'Louisiana' =>'Louisiana',
   'Maine' =>'Maine',
   'Maryland' =>'Maryland',
   'Massachusetts' =>'Massachusetts',
   'Michigan' =>'Michigan',
   'Minnesota' =>'Minnesota',
   'Mississippi' =>'Mississippi',
   'Missouri' =>'Missouri',
   'Montana' =>'Montana',
   'Nebraska' =>'Nebraska',
   'Nevada' =>'Nevada',
   'New Hampshire' =>'New Hampshire',
   'New Jersey' =>'New Jersey',
   'New Mexico' =>'New Mexico',
   'New York' =>'New York',
   'North Carolina' =>'North Carolina',
   'North Dakota' =>'North Dakota',
   'Ohio' =>'Ohio',
   'Oklahoma' =>'Oklahoma',
   'Oregon' =>'Oregon',
   'Pennsylvania' =>'Pennsylvania',
   'Rhode Island' =>'Rhode Island',
   'South Carolina' =>'South Carolina',
   'South Dakota' =>'South Dakota',
   'Tennessee' =>'Tennessee',
   'Texas' =>'Texas',
   'Utah' =>'Utah',
   'Vermont' =>'Vermont',
   'Virginia' =>'Virginia',
   'Washington' =>'Washington',
   'West Virginia' =>'West Virginia',
   'Wisconsin' =>'Wisconsin',
   'Wyoming' =>'Wyoming'
),Request::old('area'),['id'=>'area', 'class'=>'form-control']) !!}

                <span class="errors">
                    {!! $errors->first('area') !!}
                </span>
            </div>
        </div>


        <div class="col-4">
            <div class="form-group">
                {!! Form::text('zip',Request::old('zip'),['id'=>'zip', 'class' => 'form-control inputfield','placeholder'=>'Zip Code', 'required']) !!}

                <span class="errors">
                    {!! $errors->first('zip') !!}
                </span>
            </div>
        </div>

    <div class="col-12 buttons-set">
        <button  class="button pull-right">Update</button>
    </div>
</div>
{!! Form::close() !!}
