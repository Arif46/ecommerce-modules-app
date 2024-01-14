<div class="body">
    @csrf
    <div class="row clearfix">       
        <div class="col-md-6">
            <div class="form-group">
                <label>Title</label><span class="required"> *</span>
                <div class="form-line">

                    {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter category Title', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('title') !!}</span>

                </div>
            </div>
        </div>

        <div class="col-md-6">            
            <div class="form-group">
                <label>Slug</label>
                <div class="form-line">
                    {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=> 'required', 'title'=>'Enter category Slug' , 'readonly' => true  ]) !!}
                    <span class="error">{!! $errors->first('slug') !!}</span>
                </div>
            </div>
        </div>         
        
    </div>

 

    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group">
                <label>Title Bn</label>
                <div class="form-line">

                    {!! Form::text('title_bn',Request::old('title_bn'),['id'=>'title_bn','class' => 'form-control','title'=>'Enter Color Title Bn']) !!}
                    <span class="error">{!! $errors->first('title_bn') !!}</span>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Title Hi</label>
                <div class="form-line">

                    {!! Form::text('title_hi',Request::old('title_hi'),['id'=>'title_hi','class' => 'form-control','title'=>'Enter Color Title Hi']) !!}
                    <span class="error">{!! $errors->first('title_hi') !!}</span>

                </div>
            </div>
        </div>        

        
    </div>

    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group">
                <label>Title Ch</label>
                <div class="form-line">

                    {!! Form::text('title_ch',Request::old('title_ch'),['id'=>'title_ch','class' => 'form-control','title'=>'Enter Color Title Ch']) !!}
                    <span class="error">{!! $errors->first('title_ch') !!}</span>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Color Code</label>
                <div class="form-line">

                    {!! Form::text('color_code',Request::old('color_code'),['id'=>'color_code','class' => 'form-control','title'=>'Enter Color Title Ch']) !!}
                    <span class="error">{!! $errors->first('color_code') !!}</span>

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
    function convert_to_slug() {
        var str = document.getElementById("title").value;
        str = str.replace(/[^a-zA-Z0-12\s]/g, "");
        str = str.toLowerCase();
        str = str.replace(/\s/g, '-');
        var res = str;
        document.getElementById("slug").value = res;
    }

</script>

