<div class="body">
    @csrf
   
    <div class="row clearfix">       
        <div class="col-md-12">
            <div class="form-group">
                <label>Title</label><span class="required"> *</span>
                <div class="form-line">

                    {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=> 'required', 'title'=>'Enter Subject', 'onkeyup'=>"convert_to_slug();"]) !!}
                    <span class="error">{!! $errors->first('title') !!}</span>

                </div>
            </div>
        </div>
    </div>
   
    <div class="row clearfix">       
        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <div class="form-line">

                    {!! Form::text('mail',Request::old('mail'),['id'=>'mail','class' => 'form-control',  'title'=>'Enter Email']) !!}
                    <span class="error">{!! $errors->first('mail') !!}</span>

                </div>
            </div>
        </div> 

           
        <div class="col-md-6">
            <div class="form-group">
                <label>Phone</label><span class="required"> *</span>
                <div class="form-line">
                    {!! Form::text('phone_no',Request::old('phone_no'),['id'=>'phone_no','class' => 'form-control', 'required'=> 'required', 'title'=>'Enter Phone No']) !!}
                    <span class="error">{!! $errors->first('phone_no') !!}</span>

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


<div class="buttons-set">
    <button class="button coupon_btn" style="background-color: #4CAF50;">Submit</button> 
</div>
<!--validate and convet to slug part-->



