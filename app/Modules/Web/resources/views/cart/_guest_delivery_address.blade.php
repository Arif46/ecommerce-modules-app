
<div class="container">
<div class="row">
<div class="col-12">
	<div class="form-group">
	    <div class="checkbox" >	    	
	        <label for="shipped_other" data-toggle="collapse" data-target="#collapseforshipping">	   <input class="" name="shipped_different_address" type="checkbox" id="shipped_other">
	           If you want to shipped to another address ?
	        </label>      
	    </div>
	</div>
</div>
</div>

<div id="collapseforshipping" aria-expanded="false" class="collapse" >
<div class="row">
	<div class="col-md-6">
	    <div class="form-group">

	        {!! Form::text('shipping_name',Request::old('shipping_name'),['id'=>'shipping_name', 'class' => 'form-control','placeholder'=>'First Name']) !!}

	        <span class="errors">
	            {!! $errors->first('shipping_name') !!}
	        </span>
	    </div>
	</div>

    <div class="col-md-6">
        <div class="form-group">

            {!! Form::text('shipping_lastname',Request::old('shipping_lastname'),['id'=>'shipping_lastname', 'class' => 'form-control','placeholder'=>'Last Name']) !!}

            <span class="errors">
                {!! $errors->first('shipping_lastname') !!}
            </span>
        </div>
    </div>

	<div class="col-md-6">
        <div class="form-group">

            {!! Form::email('shipping_email',Request::old('shipping_email'),['id'=>'shipping_email', 'class' => 'form-control','placeholder'=>'Email']) !!}

            <span class="errors">
                {!! $errors->first('shipping_email') !!}
            </span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">

            {!! Form::text('shipping_phone',Request::old('shipping_phone'),['id'=>'shipping_phone', 'class' => 'form-control','placeholder'=>'Phone']) !!}

            <span class="errors">
                {!! $errors->first('shipping_phone') !!}
            </span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group formfixl">
            {!! Form::text('delivery_address',Request::old('delivery_address'),['id'=>'address', 'style' => 'resize: none', 'class' => 'form-control','placeholder'=>'Address']) !!}

            <span class="errors">
                {!! $errors->first('address') !!}
            </span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">

            {!! Form::text('shipping_city',Request::old('shipping_city'),['id'=>'shipping_city', 'class' => 'form-control','placeholder'=>'City']) !!}

            <span class="errors">
                {!! $errors->first('shipping_city') !!}
            </span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">

           <!--  {!! Form::text('shipping_area',Request::old('shipping_area'),['id'=>'shipping_area', 'class' => 'form-control','placeholder'=>'State']) !!} -->
           {!! Form::Select('shipping_area',array('state' =>'Select State','Alabama' =>'Alabama','Alaska' =>'Alaska',
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
),Request::old('shipping_area'),['id'=>'shipping_area', 'class'=>'form-control']) !!}

            <span class="errors">
                {!! $errors->first('shipping_area') !!}
            </span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">

            {!! Form::text('shipping_zip',Request::old('shipping_zip'),['id'=>'shipping_zip', 'class' => 'form-control','placeholder'=>'Zip code']) !!}

            <span class="errors">
                {!! $errors->first('shipping_zip') !!}
            </span>
        </div>
    </div>
</div>

</div>
</div>