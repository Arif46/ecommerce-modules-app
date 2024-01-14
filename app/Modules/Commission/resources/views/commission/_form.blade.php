<div class="body">
    @csrf
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter commission Title', 'onkeyup'=>"convert_to_slug();"]) !!}
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
                    {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=> 'required', 'title'=>'Enter commission Slug' , 'readonly' => true  ]) !!}
                    <span class="error">{!! $errors->first('slug') !!}</span>
                </div>
            </div>
        </div>
    </div>

     <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title Bangla </label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('title_bn',Request::old('title_bn'),['id'=>'title_bn','class' => 'form-control', 'title'=>'Enter commission Title']) !!}
                    <span class="error">{!! $errors->first('title_bn') !!}</span>

                </div>
            </div>
        </div>
    </div>


      <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title Hindi </label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('title_hi',Request::old('title_hi'),['id'=>'title_hi','class' => 'form-control', 'title'=>'Enter commission Title']) !!}
                    <span class="error">{!! $errors->first('title_hi') !!}</span>

                </div>
            </div>
        </div>
    </div>

      <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title chinese </label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('title_ch',Request::old('title_ch'),['id'=>'title_ch','class' => 'form-control', 'title'=>'Enter commission Title']) !!}
                    <span class="error">{!! $errors->first('title_ch') !!}</span>

                </div>
            </div>
        </div>
    </div>

      
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Commission in percentage</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::number('percentage',Request::old('percentage'),['id'=>'','class' => 'form-control', 'title'=>'Enter commission percentage on sell' ]) !!}
                    <span class="error">{!! $errors->first('percentage') !!}</span>
                </div>
            </div>
        </div>
    </div>

   

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Note</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('note',Request::old('note'),['id'=>'note','class' => 'form-control','title'=>'Enter commission Note']) !!}
                    <span class="error">{!! $errors->first('note') !!}</span>

                </div>
            </div>
        </div>
    </div>

<div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Note Bangla </label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('note_bn',Request::old('note_bn'),['id'=>'note_bn','class' => 'form-control', 'title'=>'Enter commission Note']) !!}
                    <span class="error">{!! $errors->first('note_bn') !!}</span>

                </div>
            </div>
        </div>
    </div>


      <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Note Hindi </label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('note_hi',Request::old('note_hi'),['id'=>'note_hi','class' => 'form-control', 'title'=>'Enter commission Note']) !!}
                    <span class="error">{!! $errors->first('note_hi') !!}</span>

                </div>
            </div>
        </div>
    </div>

      <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Note Chinese </label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">

                    {!! Form::text('note_ch',Request::old('note_ch'),['id'=>'note_ch','class' => 'form-control', 'title'=>'Enter commission Note']) !!}
                    <span class="error">{!! $errors->first('note_ch') !!}</span>

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