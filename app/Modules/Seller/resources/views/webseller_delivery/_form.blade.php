
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
    <label>Shipping Type</label> <span class="required"> *</span> 
    {!! Form::Select('shipping_type',array('flat-rate'=>'Flat Rate','courier-service'=>'Courier Service'),Request::old('shipping_type'),['id'=>'', 'class'=>'form-control']) !!}
    <span class="error">{!! $errors->first('shipping_type') !!}</span>
</p>

<p>
    <label>Courier Name</label> <span class="required"> *</span> 
    {!! Form::text('courier_service',Request::old('courier_service'),['id'=>'', 'class'=>'form-control']) !!}
    <span class="error">{!! $errors->first('courier_service') !!}</span>
</p>

<p>
    <label>Shipping Value</label> <span class="required"> *</span> 
    {!! Form::number('shipping_value',Request::old('shipping_value'),['id'=>'shipping_value','class' => 'form-control','required'=>
    'required', 'title'=>'Enter shipping_value']) !!}
    <span class="error">{!! $errors->first('shipping_value') !!}</span>
</p>

<p>
    <label>Status</label> <span class="required"> *</span> 
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),Request::old('status'),['id'=>'', 'class'=>'form-control']) !!}
    <span class="error">{!! $errors->first('status') !!}</span>
</p>

<div class="form-action">
    <button type="submit">Save Changes</button>
</div>