<div class="body">
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Coupon Name *</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('coupon_name',Request::old('coupon_name'),['id'=>'coupon_name','class' => 'form-control input-sm', 'title'=>'Enter coupon name','required']) !!}
                            <span class="error">{!! $errors->first('coupon_name') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Coupon Name(Bangla)</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('coupon_name_bn',Request::old('coupon_name_bn'),['id'=>'coupon_name_bn','class' => 'form-control', 'title'=>'Enter coupon name']) !!}
                            <span class="error">{!! $errors->first('coupon_name_bn') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Coupon Name(Hindi)</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('coupon_name_hi',Request::old('coupon_name_hi'),['id'=>'coupon_name_hi','class' => 'form-control', 'title'=>'Enter coupon name']) !!}
                            <span class="error">{!! $errors->first('coupon_name_hi') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Coupon Name(Chinese)</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('coupon_name_ch',Request::old('coupon_name_ch'),['id'=>'coupon_name_ch','class' => 'form-control', 'title'=>'Enter coupon name']) !!}
                            <span class="error">{!! $errors->first('coupon_name_ch') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Coupon Code *</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('coupon_code',Request::old('coupon_code'),['id'=>'coupon_code','class' => 'form-control', 'title'=>'Enter coupon code','required']) !!}
                            <span class="error">{!! $errors->first('coupon_code') !!}</span>
                        </div>
                    </div>
                </div>


                <!-- coupon_calculation_type  -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Calculation Type *</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <label for="calculation_fixed">
                                <input type="radio" id="calculation_fixed" name="coupon_calculation_type" style="width:20px;"
                                       value="{{\App\AppConfig::COUPON_CALCULATION_TYPE_FIXED}}" required checked>
                                <span style="position: relative;top: -18px">
                               {{\App\AppConfig::COUPON_CALCULATION_TYPE[\App\AppConfig::COUPON_CALCULATION_TYPE_FIXED]}}
                           </span>
                            </label>
                            <label for="calculation_percentage" style="padding-left: 30px">
                                <input type="radio" name="coupon_calculation_type" id="calculation_percentage"
                                       style="width: 20px;position: relative;"
                                       value="{{\App\AppConfig::COUPON_CALCULATION_TYPE_PERCENTAGE}}" required>
                                <span style="position: relative;top: -18px">
                                {{\App\AppConfig::COUPON_CALCULATION_TYPE[\App\AppConfig::COUPON_CALCULATION_TYPE_PERCENTAGE]}}
                                </span>
                            </label>
                            <span class="error">{!! $errors->first('calculation_type') !!}</span>
                        </div>
                    </div>
                </div>
                <!--amount-->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label couponAmount">
                    <label>Coupon Amount *</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 couponAmount">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::number('amount',Request::old('amount'),['id'=>'amount','class' => 'form-control', 'placeholder'=>'Enter coupon amount', 'title'=>'Enter coupon amount', 'required']) !!}
                            <span class="error">{!! $errors->first('amount') !!}</span>
                        </div>
                    </div>
                </div>
                <!--amount percentage-->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label couponPercentage">
                    <label>Coupon Percentage(%) *</label>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 couponPercentage">
                    <div class="input-group input-group-md">
                        <input type="number" name="coupon_percentage" id="calculation_percentage"
                               class="form-control" placeholder="Enter Coupon Percentage">
                        <div class="input-group-append">
                            <span class="input-group-text" id="inputGroup-sizing-sm">%</span>
                        </div>
                    </div>
                    <div class="form-line">
                        <span class="error">{!! $errors->first('calculation_percentage') !!}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Coupon Details *</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('coupon_details',Request::old('coupon_details'),['id'=>'coupon_details','class' => 'form-control', 'title'=>'Enter coupon details','required']) !!}
                            <span class="error">{!! $errors->first('coupon_details') !!}</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-lg-6 col-md-6">

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Valid From (mm/dd/yyyy) *</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('valid_from',Request::old('valid_from'),['id'=>'datepicker1','class' => 'form-control', 'title'=>'Enter valid from', 'placeholder'=>'Enter valid From date','required']) !!}
                            <span class="error">{!! $errors->first('valid_from') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Valid To (mm/dd/yyyy) *</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('valid_to',Request::old('valid_to'),['id'=>'datepicker','class' => 'form-control', 'title'=>'Enter valid to','required', 'placeholder'=>'Enter valid To date','required']) !!}
                            <span class="error">{!! $errors->first('valid_to') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Coupon Type</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::Select('coupon_type',array('single'=>'Single','multiple'=>'Multiple'),Request::old('coupon_type'),['id'=>'coupon_type', 'class'=>'form-control']) !!}
                            <span class="error">{!! $errors->first('coupon_type') !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label></label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <label for="isForTopBuyers">
                                <input type="checkbox" style="width: 20px;" name="isForTopBuyers" id="isForTopBuyers">
                                <span style="position: relative;top: -18px">
                                   Is Top Buyers Only
                                </span>
                            </label>
                            <span class="error">{!! $errors->first('how_many_top_buyers') !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label how_many_top_buyer_area">
                    <label for="how_many_top_buyers">How Many Top Buyers *</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 how_many_top_buyer_area">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="how_many_top_buyers" class="form-control" id="how_many_top_buyers">
                            <span class="error">{!! $errors->first('how_many_top_buyers') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Start Coupon <br> <small>(if select multiple, ex:1)</small> </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::number('start_coupon',Request::old('start_coupon'),['id'=>'start_coupon','class' => 'form-control', 'title'=>'Enter start coupon']) !!}
                            <span class="error">{!! $errors->first('start_coupon') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>End Coupon <br> <small>(if select multiple, ex:100)</small></label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::number('end_coupon',Request::old('end_coupon'),['id'=>'end_coupon','class' => 'form-control', 'title'=>'Enter valid to']) !!}
                            <span class="error">{!! $errors->first('end_coupon') !!}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label>Status</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),Request::old('status'),['id'=>'status', 'class'=>'form-control']) !!}
                            <span class="error">{!! $errors->first('status') !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn bg-blue-grey btngmt waves-effect float-right" type="submit">Submit</button>

</div>
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $("#datepicker,#datepicker1").datepicker();--}}
{{--            $('#calculation_percentage').click(function (){--}}
{{--                alert('ok')--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
