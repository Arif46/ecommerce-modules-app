<div class="body">

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Title</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter faq Title']) !!}
                        <span class="error">{!! $errors->first('title') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Title(Bangla)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('title_bn',Request::old('title_bn'),['id'=>'title_bn','class' => 'form-control',  'title'=>'Enter faq Title']) !!}
                        <span class="error">{!! $errors->first('title_bn') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Title(Hindi)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('title_hi',Request::old('title_hi'),['id'=>'title_hi','class' => 'form-control',  'title'=>'Enter faq Title']) !!}
                        <span class="error">{!! $errors->first('title_hi') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Title(Chinese)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('title_ch',Request::old('title_ch'),['id'=>'title_ch','class' => 'form-control',  'title'=>'Enter faq Title']) !!}
                        <span class="error">{!! $errors->first('title_ch') !!}</span>
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

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Description</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::textarea('description',Request::old('description'),['id'=>'description','class' => ' form-control', 'title'=>'Enter Description', 'rows'=>'5', 'cols'=>'50']) !!}
                        <span class="error">{!! $errors->first('description') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Description(Bangla)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::textarea('description_bn',Request::old('description_bn'),['id'=>'description_bn','class' => ' form-control', 'title'=>'Enter Description', 'rows'=>'5', 'cols'=>'50']) !!}
                        <span class="error">{!! $errors->first('description_bn') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Description(Hindi)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::textarea('description_hi',Request::old('description_hi'),['id'=>'description_hi','class' => ' form-control', 'title'=>'Enter Description', 'rows'=>'5', 'cols'=>'50']) !!}
                        <span class="error">{!! $errors->first('description_hi') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Description(Chinese)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::textarea('description_ch',Request::old('description_ch'),['id'=>'description_ch','class' => ' form-control', 'title'=>'Enter Description', 'rows'=>'5', 'cols'=>'50']) !!}
                        <span class="error">{!! $errors->first('description_ch') !!}</span>
                    </div>
                </div>
            </div>
        </div>

                <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Image</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                            
                        {!! Form::label('image_link', 'Image', array('class' => 'col-form-label')) !!}
                        <span class="error">Supported format :: jpeg,png,jpg,gif & file size max :: 1MB</span>

                        <div style="position:relative;">
                            <a class='btn btn-primary btn-sm font-10' href='javascript:;'>
                                Choose File...
                                <input name="image_link" type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                            </a>
                            &nbsp;
                            <span class='label label-info' id="upload-file-info"></span>

                           

                        </div>

                        @if(isset($data['image_link'] ) && !empty($data['image_link']) )
                        <a target="_blank" href="{{URL::to('')}}/uploads/slider/{{$data->image_link}}" style="margin-top: 5px;" class="btn btn-primary btn-sm font-10"><img src="{{URL::to('')}}/uploads/slider/{{$data->image_link}}" height="50px" alt="{{$data['image_link']}}" ></img>
                        </a>
                        @endif

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