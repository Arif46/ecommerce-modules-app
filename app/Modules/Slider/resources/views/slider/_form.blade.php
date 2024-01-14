<?php
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Input;
?>
    <div class="body"> 

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Title</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter slider title', 'onkeyup'=>"convert_to_slug();"]) !!}
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
                        {!! Form::text('title_bn',Request::old('title_bn'),['id'=>'title_bn','class' => 'form-control','required'=> 'required',  'title'=>'Enter slider title', 'onkeyup'=>"convert_to_slug();"]) !!}
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
                        {!! Form::text('title_hi',Request::old('title_hi'),['id'=>'title_hi','class' => 'form-control','required'=> 'required',  'title'=>'Enter slider title', 'onkeyup'=>"convert_to_slug();"]) !!}
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
                        {!! Form::text('title_ch',Request::old('title_ch'),['id'=>'title_ch','class' => 'form-control','required'=> 'required',  'title'=>'Enter slider title', 'onkeyup'=>"convert_to_slug();"]) !!}
                        <span class="error">{!! $errors->first('title_ch') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Slug</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=> 'required', 'title'=>'Enter slider slug', 'readonly' => true ]) !!}
                        <span class="error">{!! $errors->first('slug') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Caption</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('caption',Request::old('caption'),['id'=>'','class' => 'form-control','required'=> 'required',  'caption'=>'Enter slider caption']) !!}
                        <span class="error">{!! $errors->first('caption') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Caption(Bangla)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('caption_bn',Request::old('caption_bn'),['id'=>'','class' => 'form-control','required'=> 'required',  'caption'=>'Enter slider caption']) !!}
                        <span class="error">{!! $errors->first('caption_bn') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Caption(Hindi)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('caption_hi',Request::old('caption_hi'),['id'=>'','class' => 'form-control','required'=> 'required',  'caption'=>'Enter slider caption']) !!}
                        <span class="error">{!! $errors->first('caption_hi') !!}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Caption(Chinese)</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('caption_ch',Request::old('caption_ch'),['id'=>'','class' => 'form-control','required'=> 'required',  'caption'=>'Enter slider caption']) !!}
                        <span class="error">{!! $errors->first('caption_ch') !!}</span>
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

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>URL</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('route',Request::old('route'),['id'=>'','class' => 'form-control','title'=>'Enter route route' ]) !!}
                        <span class="error">{!! $errors->first('route') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Order</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::number('short_order',Request::old('short_order'),['id'=>'','class' => 'form-control','title'=>'Enter order']) !!}
                        <span class="error">{!! $errors->first('short_order') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Type</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::Select('type',array('home'=>'Home'),Request::old('type'),['id'=>'', 'class'=>'form-control']) !!}
                        <span class="error">{!! $errors->first('type') !!}</span>
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
                        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),Request::old('status'),['id'=>'', 'class'=>'form-control']) !!}
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
        var today = new Date();
        var date = '-'+today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+"-" +today.getHours() + "-" + today.getMinutes() + "-" + today.getSeconds();

        function convert_to_slug(){
            var str = document.getElementById("title").value;           
            var str1 = date;
            str = str.replace(/[^a-zA-Z0-12\s]/g,"");
            str = str.toLowerCase();
            str = str.replace(/\s/g,'-');           
            // var str1 = "afshini-";
            var res = str.concat(str1);          
            document.getElementById("slug").value = res;
        }

    </script>