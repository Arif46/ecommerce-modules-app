<div class="body">

	<div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Frontend Title</label><span class="required"> *</span> 
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">                        
                    {!! Form::text('frontend_title',Request::old('frontend_title'),['id'=>'frontend_title','class' => 'form-control','required'=> 'required', 'frontend_title'=>'Enter attribute frondend title', 'onkeyup'=>"convert_to_slug();"]) !!}
					<span class="error">{!! $errors->first('frontend_title') !!}</span>
					<input type="hidden" name="attribute_id" id="attribute_id" value="{{$attid}}">
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Frontend Title(Bangla)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('frontend_title_bn',Request::old('frontend_title_bn'),['id'=>'frontend_title_bn','class' => 'form-control', 'frontend_title'=>'Enter attribute frondend title', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('frontend_title_bn') !!}</span>
                    <input type="hidden" name="attribute_id" id="attribute_id" value="{{$attid}}">
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Frontend Title(Hindi)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('frontend_title_hi',Request::old('frontend_title_hi'),['id'=>'frontend_title_hi','class' => 'form-control', 'frontend_title'=>'Enter attribute frondend title', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('frontend_title_hi') !!}</span>
                    <input type="hidden" name="attribute_id" id="attribute_id" value="{{$attid}}">
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Frontend Title(Chinese)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('frontend_title_ch',Request::old('frontend_title_ch'),['id'=>'frontend_title_ch','class' => 'form-control', 'frontend_title'=>'Enter attribute frondend title', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('frontend_title_ch') !!}</span>
                    <input type="hidden" name="attribute_id" id="attribute_id" value="{{$attid}}">
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Slug</label><span class="required"> *</span> 
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">                        
                    {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=> 'required',  'slug'=>'Enter slug']) !!}
                    <span class="error">{!! $errors->first('slug') !!}</span>
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
                    {!! Form::text('backend_title_bn',Request::old('backend_title_bn'),['id'=>'','class' => 'form-control',  'backend_title'=>'Enter backend title']) !!}
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
                    {!! Form::text('backend_title_hi',Request::old('backend_title_hi'),['id'=>'','class' => 'form-control',  'backend_title'=>'Enter backend title']) !!}
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
                    {!! Form::text('backend_title_ch',Request::old('backend_title_ch'),['id'=>'','class' => 'form-control',  'backend_title'=>'Enter backend title']) !!}
                    <span class="error">{!! $errors->first('backend_title_ch') !!}</span>
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
        
<br/><br/>
<div class="footer">
    <div class="row clearfix align-right">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
            <button class="btn bg-blue-grey btngmt waves-effect" type="submit">Submit</button>                                    
        </div>
    </div>
</div>
