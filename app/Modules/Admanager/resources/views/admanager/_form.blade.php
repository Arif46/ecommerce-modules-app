    <div class="body">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Title</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter Admanager title', 'onkeyup'=>"convert_to_slug();"]) !!}
                        <span class="error">{!! $errors->first('title') !!}</span>                        
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
                        {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=> 'required', 'title'=>'Enter  slug' , 'readonly' => true  ]) !!}
                        <span class="error">{!! $errors->first('slug') !!}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Content</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::textarea('caption',Request::old('caption'),['id'=>'add_caption','class' => 'form-control',  'title'=>'Enter Admanager Details','rows'=>'10', 'cols'=>'50']) !!}
                        <span class="error">{!! $errors->first('caption') !!}</span>
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
                <label>Position</label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                         {!! Form::Select('position',array('top'=>'Top','popup'=>'popup','footer'=>'footer','bottom'=>'Bottom','slider'=>'Slider'),Input::old('position'),['id'=>'', 'class'=>'form-control']) !!}
                        <span class="error">{!! $errors->first('position') !!}</span>
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
                        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),Input::old('status'),['id'=>'', 'class'=>'form-control']) !!}
                        <span class="error">{!! $errors->first('status') !!}</span>
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

    <script>
        var today = new Date();
        var date ='-'+today.getFullYear()+(today.getMonth()+1)+today.getDate()+"-"+today.getHours()+today.getMinutes()+today.getSeconds();

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
    <script>
    CKEDITOR.replace( 'add_caption' );
    </script>

