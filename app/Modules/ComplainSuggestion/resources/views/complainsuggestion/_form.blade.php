<div class="body">
    @csrf
    <div class="row clearfix">       
        <div class="col-md-6">
            <div class="form-group">
                <label>Title</label><span class="required"> *</span>
                <div class="form-line">

                    {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required',  'title'=>'Enter Subject', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('title') !!}</span>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Seller</label><span class="required"> *</span>
                <div class="form-line">
                    {!! Form::Select('created_for',$sellerList,Request::old('created_for'),['id'=>'created_for','required'=> 'required', 'class'=>'form-control']) !!}
                    {!! $errors->first('created_for') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="form-group">
                <label>Description</label><span class="required"> *</span>
                <div class="form-line">                   
                      {!! Form::textarea('com_sugg_desc',Request::old('com_sugg_desc'),['id'=>'com_sugg_desc','required'=> 'required','class' => ' form-control', 'title'=>'Enter Description', 'rows'=>'5', 'cols'=>'50']) !!}
                    <span class="error">{!! $errors->first('com_sugg_desc') !!}</span>

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



