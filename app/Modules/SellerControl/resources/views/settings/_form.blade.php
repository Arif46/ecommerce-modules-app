<div class="body">
    @csrf
    <div class="row clearfix">       
        <div class="col-md-6">
            <div class="form-group">
                <label>Label Name</label><span class="required"> *</span>
                <div class="form-line">

                    {!! Form::text('label',Request::old('label'),['id'=>'label','class' => 'form-control','required'=> 'required',  'title'=>'Enter label name', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('label') !!}</span>

                </div>
            </div>
        </div>

        <div class="col-md-6">            
            <div class="form-group">
                <label>Slug</label>
                <div class="form-line">
                    {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=> 'required', 'title'=>'Enter label slug' , 'readonly' => true  ]) !!}
                    <span class="error">{!! $errors->first('slug') !!}</span>
                </div>
            </div>
        </div> 
    </div>



<div class="row clearfix">   
<label>Document Type:</label>    
        <div style="float:left; width: 100px; margin-left: 20px;">
            <div class="form-group" style="display:inline-block;">                
                PNG<input type="checkbox" name="document_type[]" value="png"> 
            </div>
        </div>

        <div style="float:left; width: 100px;">
            <div class="form-group" style="display:inline-block;">                
                JPG/JPEG<input type="checkbox" name="document_type[]" value="jpg,jpeg">
            </div>
        </div>

        <div style="float:left; width: 100px;">
            <div class="form-group" style="display:inline-block;">                
                PDF<input type="checkbox" name="document_type[]" value="pdf">
            </div>
        </div>
    </div>

 
        
 

    <div class="row clearfix">
        <div class="col-md-4">
            <div class="form-group">
                <label>File Size (kb)</label>
                <div class="form-line">
                    {!! Form::number('size_in_kb',Request::old('size_in_kb'),['id'=>'title_bn','class' => 'form-control','title'=>'Enter size in kb']) !!}
                    <span class="error">{!! $errors->first('size_in_kb') !!}</span>

                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">  
                <div style="float:left; width: 100px; margin-left: 20px;">
                    <div class="form-group" style="display:inline-block;">
                       Required <input type="checkbox" name="required" value="required"> 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">  
                <div style="float:left; width: 100px; margin-left: 20px;">
                    <div class="form-group" style="display:inline-block;">
                       Display <input type="checkbox" name="display" value="display"> 
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
        var str = document.getElementById("label").value;
        str = str.replace(/[^a-zA-Z0-12\s]/g, "");
        str = str.toLowerCase();
        str = str.replace(/\s/g, '-');
        var res = str;
        document.getElementById("slug").value = res;
    }

</script>

