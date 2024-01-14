<div class="body">

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Parent Category</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('parent_category', $parent_category_options ,Request::old('parent_category'),['id'=>'', 'class'=>'form-control']) !!}

                    <span class="error">{!! $errors->first('parent_category') !!}</span>

                </div>
            </div>
        </div>
    </div>

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

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title(Bangla)</label><span class="required"> </span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('title_bn',Request::old('title_bn'),['id'=>'title_bn','class' => 'form-control','required'=> 'required',  'title'=>'Enter category Title in Bangla', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('title_bn') !!}</span>
                </div>
            </div>

        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title(Hindi)</label><span class="required"> </span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('title_hi',Request::old('title_hi'),['id'=>'title_hi','class' => 'form-control','required'=> 'required',  'title'=>'Enter category Title in Hindi', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('title_hi') !!}</span>
                </div>
            </div>

        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title(Chinese)</label><span class="required"></span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('title_ch',Request::old('title_ch'),['id'=>'title_ch','class' => 'form-control','required'=> 'required',  'title'=>'Enter category Title in Chinese ', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('title_ch') !!}</span>
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
                    {!! Form::textarea('description',Request::old('description'),['id'=>'description','class' => 'form-control', 'title'=>'Enter Description', 'rows'=>'5', 'cols'=>'50']) !!}

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
                    {!! Form::textarea('description_bn',Request::old('description_bn'),['id'=>'description_bn','class' => 'form-control', 'title'=>'Enter Description in Bangla', 'rows'=>'5', 'cols'=>'50']) !!}

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
                    {!! Form::textarea('description_hi',Request::old('description_hi'),['id'=>'description_hi','class' => 'form-control', 'title'=>'Enter Description in Hindi', 'rows'=>'5', 'cols'=>'50']) !!}

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
                    {!! Form::textarea('description_ch',Request::old('description_ch'),['id'=>'description_ch','class' => 'form-control', 'title'=>'Enter Description in Chinese', 'rows'=>'5', 'cols'=>'50']) !!}

                    <span class="error">{!! $errors->first('description_ch') !!}</span>
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
                        <a target="_blank" href="{{ url('uploads/category/' . $data->image_link) }}"
                           style="margin-top: 25px;" class="btn btn-primary btn-sm font-10"><img
                                    src="{{ url('uploads/category/800x800/' . $data->image_link) }}" width="300"
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

                    {!! Form::text('meta_title',Request::old('meta_title'),['id'=>'','class' => 'form-control','title'=>'Enter category Meta Title']) !!}

                    <span class="error">{!! $errors->first('meta_title') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Title(Bangla)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('meta_title_bn',Request::old('meta_title_bn'),['id'=>'','class' => 'form-control','title'=>'Enter category Meta Title in Bangla']) !!}

                    <span class="error">{!! $errors->first('meta_title_bn') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Title(Hindi)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('meta_title_hi',Request::old('meta_title_hi'),['id'=>'','class' => 'form-control','title'=>'Enter category Meta Title in Hindi']) !!}

                    <span class="error">{!! $errors->first('meta_title_hi') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Title(Chinese)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('meta_title_ch',Request::old('meta_title_ch'),['id'=>'','class' => 'form-control','title'=>'Enter category Meta Title in Chinese']) !!}

                    <span class="error">{!! $errors->first('meta_title_ch') !!}</span>
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

                    {!! Form::text('meta_keywords',Request::old('meta_keywords'),['id'=>'','class' => 'form-control','title'=>'Enter category Meta Key']) !!}

                    <span class="error">{!! $errors->first('meta_keywords') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Keywords(Bangla)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('meta_keywords_bn',Request::old('meta_keywords_bn'),['id'=>'','class' => 'form-control','title'=>'Enter category Meta Key in Bangla']) !!}

                    <span class="error">{!! $errors->first('meta_keywords_bn') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Keywords(Hindi)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('meta_keywords_hi',Request::old('meta_keywords_hi'),['id'=>'','class' => 'form-control','title'=>'Enter category Meta Key in Hindi']) !!}

                    <span class="error">{!! $errors->first('meta_keywords_hi') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Keywords(Chinese)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('meta_keywords_ch',Request::old('meta_keywords_ch'),['id'=>'','class' => 'form-control','title'=>'Enter category Meta Key in Chinese']) !!}

                    <span class="error">{!! $errors->first('meta_keywords_ch') !!}</span>
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

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Description(Bangla)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::textarea('meta_description_bn',Request::old('meta_description_bn'),['id'=>'','class' => 'form-control', 'title'=>'Enter Meta Description in Bangla','rows'=>'5', 'cols'=>'50']) !!}

                    <span class="error">{!! $errors->first('meta_description_bn') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Description(Hindi)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::textarea('meta_description_hi',Request::old('meta_description_hi'),['id'=>'','class' => 'form-control', 'title'=>'Enter Meta Description in Hindi','rows'=>'5', 'cols'=>'50']) !!}

                    <span class="error">{!! $errors->first('meta_description_hi') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Meta Description(Chinese)</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::textarea('meta_description_ch',Request::old('meta_description_ch'),['id'=>'','class' => 'form-control', 'title'=>'Enter Meta Description in Chinese','rows'=>'5', 'cols'=>'50']) !!}

                    <span class="error">{!! $errors->first('meta_description_ch') !!}</span>
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

