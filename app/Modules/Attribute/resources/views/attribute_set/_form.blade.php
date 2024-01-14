<div class="body">

	<div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title</label><span class="required"> *</span> 
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">                        
                    {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter attribute set title', 'onkeyup'=>"convert_to_slug();"]) !!}
					<span class="error">{!! $errors->first('title') !!}</span>   
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title(Bangla)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('title_bn',Request::old('title_bn'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter attribute set title', 'onkeyup'=>"convert_to_slug();"]) !!}
					<span class="error">{!! $errors->first('title_bn') !!}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title(Hindi)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('title_hi',Request::old('title_hi'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter attribute set title', 'onkeyup'=>"convert_to_slug();"]) !!}
					<span class="error">{!! $errors->first('title_hi') !!}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title(Chinese)</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('title_ch',Request::old('title_ch'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter attribute set title', 'onkeyup'=>"convert_to_slug();"]) !!}
					<span class="error">{!! $errors->first('title_ch') !!}</span>
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
                    {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=> 'required', 'title'=>'Enter attribute set slug' ]) !!}
 					<span class="error">{!! $errors->first('slug') !!}</span>
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

    function convert_to_slug(){
        var str = document.getElementById("title").value;
        str = str.replace(/[^a-zA-Z0-12\s]/g,"");
        str = str.toLowerCase();
        str = str.replace(/\s/g,'-');
        document.getElementById("slug").value = str;
    }

</script>