    <div class="body">

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Shipping Type</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                          {!! Form::Select('shipping_type',array('Free'=>'Free','Basic'=>'Basic','Courier' => 'Courier','Overnight'=>'Overnight'),Request::old('shipping_type'),['id'=>'shipping_type', 'class'=>'form-control']) !!}

                        <!-- {!! Form::text('shipping_type',Request::old('shipping_type'),['id'=>'shipping_type','class' => 'form-control', 'title'=>'Enter shipping type']) !!} -->
                        <span class="error">{!! $errors->first('shipping_type') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Shipping Value</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('shipping_value',Request::old('shipping_value'),['id'=>'shipping_value','class' => 'form-control', 'title'=>'Enter shipping value']) !!}
                        <span class="error">{!! $errors->first('shipping_value') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Courier Service</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('courier_service',Request::old('courier_service'),['id'=>'courier_service','class' => 'form-control', 'title'=>'Enter short text']) !!}
                        <span class="error">{!! $errors->first('courier_service') !!}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Courier Details</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('courier_details',Request::old('courier_details'),['id'=>'courier_details','class' => 'form-control', 'title'=>'Enter short text']) !!}
                        <span class="error">{!! $errors->first('courier_details') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Conditional Value</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('conditional',Request::old('conditional'),['id'=>'conditional','class' => 'form-control', 'title'=>'Enter Conditional value']) !!}
                        <span class="error">{!! $errors->first('conditional') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Status</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),Request::old('status'),['id'=>'status', 'class'=>'form-control']) !!}
                        <span class="error">{!! $errors->first('status') !!}</span>
                    </div>
                </div>
            </div>
        </div>
                   
    </div>

    <div class="footer">
        <div class="row clearfix align-right">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                <button class="btn bg-blue-grey btngmt waves-effect" type="submit">Submit</button>                                    
            </div>
        </div>
    </div>