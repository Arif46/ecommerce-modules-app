<div class="body">

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Frontend Title</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('frontend_title',Request::old('frontend_title'),['id'=>'frontend_title','class' => 'form-control','required'=> 'required',  'frontend_title'=>'Enter frondend title', 'onkeyup'=>"convert_to_code_column();"]) !!}
                    <span class="error">{!! $errors->first('frontend_title') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Frontend Title(Bangla)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('frontend_title_bn',Request::old('frontend_title_bn'),['id'=>'frontend_title','class' => 'form-control','required'=> 'required',  'frontend_title'=>'Enter frondend title', 'onkeyup'=>"convert_to_code_column();"]) !!}
                    <span class="error">{!! $errors->first('frontend_title_bn') !!}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Frontend Title(Hindi)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('frontend_title_hi',Request::old('frontend_title_hi'),['id'=>'frontend_title','class' => 'form-control','required'=> 'required',  'frontend_title'=>'Enter frondend title', 'onkeyup'=>"convert_to_code_column();"]) !!}
                    <span class="error">{!! $errors->first('frontend_title_hi') !!}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Frontend Title(Chinese)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('frontend_title_ch',Request::old('frontend_title_ch'),['id'=>'frontend_title','class' => 'form-control','required'=> 'required',  'frontend_title'=>'Enter frondend title', 'onkeyup'=>"convert_to_code_column();"]) !!}
                    <span class="error">{!! $errors->first('frontend_title_ch') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Backend Title</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('backend_title',Request::old('backend_title'),['id'=>'','class' => 'form-control','required'=> 'required',  'backend_title'=>'Enter backend title']) !!}
                    <span class="error">{!! $errors->first('backend_title') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Backend Title(Bangla)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('backend_title_bn',Request::old('backend_title_bn'),['id'=>'','class' => 'form-control','required'=> 'required',  'backend_title'=>'Enter backend title']) !!}
                    <span class="error">{!! $errors->first('backend_title_bn') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Backend Title(Hindi)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('backend_title_hi',Request::old('backend_title_hi'),['id'=>'','class' => 'form-control','required'=> 'required',  'backend_title'=>'Enter backend title']) !!}
                    <span class="error">{!! $errors->first('backend_title_hi') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Backend Title(Chinese)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('backend_title_ch',Request::old('backend_title_ch'),['id'=>'','class' => 'form-control','required'=> 'required',  'backend_title'=>'Enter backend title']) !!}
                    <span class="error">{!! $errors->first('backend_title_ch') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Code Column</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('code_column',Request::old('code_column'),['id'=>'code_column','class' => 'form-control','required'=> 'required',  'code_column'=>'Enter code column']) !!}
                    <span class="error">{!! $errors->first('code_column') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Type</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('type',array('text'=>'Text','textarea'=>'Textarea','checkbox' => 'Checkbox'),\Illuminate\Support\Facades\Request::old('type'),['id'=>'', 'class'=>'form-control']) !!}
                    <span class="error">{!! $errors->first('type') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Type Is Required</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('type_is_required',array('no'=>'No','yes'=>'Yes'),Request::old('type_is_required'),['id'=>'', 'class'=>'form-control']) !!}
                    <span class="error">{!! $errors->first('type_is_required') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Order</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::number('order',Request::old('order'),['id'=>'','class' => 'form-control','required'=> 'required',  'order'=>'Enter order']) !!}
                    <span class="error">{!! $errors->first('order') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Default Value</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('default_value',array('no'=>'No','yes'=>'Yes'),Request::old('default_value'),['id'=>'', 'class'=>'form-control']) !!}

                    <span class="error">{!! $errors->first('default_value') !!}</span>
                </div>
            </div>
        </div>
{{--        --}}
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Default Value(Bangla)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('default_value_bn',array('no'=>'না','yes'=>'হ্যা'),Request::old('default_value_bn'),['id'=>'', 'class'=>'form-control']) !!}

                    <span class="error">{!! $errors->first('default_value_bn') !!}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Default Value(Hindi)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('default_value_hi',array('no'=>'नहीं','yes'=>'
हां'),Request::old('default_value_hi'),['id'=>'', 'class'=>'form-control']) !!}

                    <span class="error">{!! $errors->first('default_value_hi') !!}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Default Value(Chinese)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('default_value_ch',array('no'=>'
番号','yes'=>'
はい'),Request::old('default_value_ch'),['id'=>'', 'class'=>'form-control']) !!}

                    <span class="error">{!! $errors->first('default_value_ch') !!}</span>
                </div>
            </div>
        </div>

    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Status</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),\Illuminate\Support\Facades\Request::old('status'),['id'=>'', 'class'=>'form-control']) !!}
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

<script>

    function convert_to_code_column() {
        var str = document.getElementById("frontend_title").value;
        str = str.replace(/[^a-zA-Z0-12\s]/g, "");
        str = str.toLowerCase();
        str = str.replace(/\s/g, '-');
        document.getElementById("code_column").value = str;

    }

</script>