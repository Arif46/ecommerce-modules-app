<div class="body">
    @csrf
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter category Title', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('title') !!}</span>

                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Link</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=> 'required', 'title'=>'Enter category Slug' , 'readonly' => true  ]) !!}
                    <span class="error">{!! $errors->first('slug') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Short Order</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::number('short_order',Request::old('short_order'),['id'=>'','class' => 'form-control', 'title'=>'Enter Sort order' ]) !!}
                    <span class="error">{!! $errors->first('short_order') !!}</span>
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
                    {!! Form::textarea('description',Request::old('description'),['id'=>'description','class' => 'form-control','title'=>'Enter Description', 'rows'=>'5', 'cols'=>'50']) !!}

                    <span class="error">{!! $errors->first('description') !!}</span>
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

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Image (Supported format :: jpeg,png,jpg,gif & file size max :: 1MB)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    <div style="position:relative;">
                        <a class='btn btn-primary btn-sm font-10' href='javascript:;'>
                            Choose File...
                            <input name="image_link" type="file"
                                   style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                                   name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>


                    </div>

                    @if(isset($data['image_link'] ) && !empty($data['image_link']) )
                        <a target="_blank" href="{{ url('uploads/brand/' . $data->image_link) }}"
                           style="margin-top: 25px;" class="btn btn-primary btn-sm font-10"><img
                                    src="{{ url('uploads/brand/800x800/' . $data->image_link) }}" width="300"
                                    alt="{{$data['image_link']}}"/>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Title</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('meta_title',Request::old('meta_title'),['id'=>'','class' => 'form-control','title'=>'Enter brand Meta Title']) !!}

                    <span class="error">{!! $errors->first('meta_title') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Keywords</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('meta_keywords',Request::old('meta_keywords'),['id'=>'','class' => 'form-control','title'=>'Enter brand Meta Key']) !!}

                    <span class="error">{!! $errors->first('meta_keywords') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Description</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::textarea('meta_description',Request::old('meta_description'),['id'=>'','class' => 'form-control', 'title'=>'Enter Meta Description','rows'=>'5', 'cols'=>'50']) !!}

                    <span class="error">{!! $errors->first('meta_description') !!}</span>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="footer">
    <div class="row clearfix align-right">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
            <button class="btn bg-blue-grey btngmt waves-effect" type="submit">Save</button>
        </div>
    </div>
</div>
<!--validate and convet to slug part-->

<script>
    var today = new Date();
    var date = '-' + today.getFullYear() + (today.getMonth() + 1) + today.getDate() + today.getHours() + today.getMinutes() + today.getSeconds();

    function convert_to_slug() {
        var str = document.getElementById("title").value;
        var str1 = date;
        str = str.replace(/[^a-zA-Z0-12\s]/g, "");
        str = str.toLowerCase();
        str = str.replace(/\s/g, '-');
        // var str1 = "afshini-";
        var res = str.concat(str1);
        document.getElementById("slug").value = res;
    }

</script>

</script>