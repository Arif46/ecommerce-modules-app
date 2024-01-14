<?php
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Input;
?>
    <div class="body"> 

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Payment Type</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::Select('payment_type',array('cash-on-delevery'=>'COD','paypal'=>'Paypal','card-payment' => 'Card Payment','bank-transfer' => 'Bank Transfer','bkash' => 'bkash','nagad' => 'Nagad','rocket' => 'Rocket'),Request::old('payment_type'),['id'=>'payment_type', 'class'=>'form-control']) !!}
                        <span class="error">{!! $errors->first('payment_type') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Account Number</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('account_number',Request::old('account_number'),['id'=>'account_number','class' => 'form-control', 'title'=>'Enter account number']) !!}
                        <span class="error">{!! $errors->first('account_number') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Account Details</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('account_details',Request::old('account_details'),['id'=>'account_details','class' => 'form-control', 'title'=>'Enter account Details']) !!}
                        <span class="error">{!! $errors->first('account_details') !!}</span>
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