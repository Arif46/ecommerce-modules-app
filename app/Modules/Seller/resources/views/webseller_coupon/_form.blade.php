
@if(Session::has('message'))

	<div class="alert alert-success">
		<span class="close" data-dismiss="alert">×</span>
		{{Session::get('message')}} 
	</div>
@endif


@if(Session::has('error'))

	<div class="alert alert-warning">
		<span class="close" data-dismiss="alert">×</span>
		{{Session::get('error')}} 
	</div>

@endif

@if(Session::has('info'))

	<div class="alert alert-warning">
		<span class="close" data-dismiss="alert">×</span>
		{{Session::get('info')}} 
	</div>
@endif

@if(Session::has('danger'))


	<div class="alert alert-danger">
		<span class="close" data-dismiss="alert">×</span>
		{{Session::get('danger')}} 
	</div>
@endif

<p>
    <label>Coupon Name</label> <span class="required"> *</span> 
    {!! Form::text('coupon_name',Request::old('coupon_name'),['id'=>'', 'class'=>'form-control','required'=>
    'required']) !!}
    <span class="error">{!! $errors->first('coupon_name') !!}</span>
</p>

<p>
    <label>Coupon Code</label> <span class="required"> *</span> 
    {!! Form::text('coupon_code',Request::old('coupon_code'),['id'=>'', 'class'=>'form-control','required'=>
    'required']) !!}
    <span class="error">{!! $errors->first('coupon_code') !!}</span>
</p>

<p>
    <label>Coupon Amount</label> <span class="required"> *</span> 
    {!! Form::number('amount',Request::old('amount'),['id'=>'amount','class' => 'form-control','required'=>
    'required', 'title'=>'Enter amount']) !!}
    <span class="error">{!! $errors->first('amount') !!}</span>
</p>

<p>
    <label>Coupon Details</label> <span class="required"> *</span> 
   {!! Form::text('coupon_details',Request::old('coupon_details'),['id'=>'', 'class'=>'form-control','required'=>
    'required']) !!}
    <span class="error">{!! $errors->first('coupon_details') !!}</span>
</p>

<p>
    <label>Valid From (yyyy-mm-dd)</label> <span class="required"> *</span> 
    {!! Form::text('valid_from',Request::old('valid_from'),['id'=>'', 'class'=>'form-control','required'=>
    'required']) !!}
    <span class="error">{!! $errors->first('valid_from') !!}</span>
</p>

<p>
    <label>Valid To (yyyy-mm-dd)</label> <span class="required"> *</span> 
    {!! Form::text('valid_to',Request::old('valid_to'),['id'=>'', 'class'=>'form-control','required'=>
    'required']) !!}
    <span class="error">{!! $errors->first('valid_to') !!}</span>
</p>

<p>
    <label>Coupon Type</label> <span class="required"> *</span> 
    {!! Form::Select('coupon_type',array('single'=>'Single','multiple'=>'Multiple'),Request::old('coupon_type'),['id'=>'', 'class'=>'form-control']) !!}
    <span class="error">{!! $errors->first('coupon_type') !!}</span>
</p>

<p>
    <label>Start Coupon <span>(if select multiple, ex:1)</span></label> 
    {!! Form::text('start_coupon',Request::old('start_coupon'),['id'=>'', 'class'=>'form-control']) !!}
    <span class="error">{!! $errors->first('start_coupon') !!}</span>
</p>

<p>
    <label>End Coupon <span>(if select multiple, ex:100)</span></label> 
    {!! Form::text('end_coupon',Request::old('end_coupon'),['id'=>'', 'class'=>'form-control']) !!}
    <span class="error">{!! $errors->first('end_coupon') !!}</span>
</p>

<p>
    <label>Status</label> <span class="required"> *</span> 
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),Request::old('status'),['id'=>'', 'class'=>'form-control']) !!}
    <span class="error">{!! $errors->first('status') !!}</span>
</p>

<div class="form-action">
    <button type="submit">Save Changes</button>
</div>