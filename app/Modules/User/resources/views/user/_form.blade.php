<?php
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Input;
?>

    <div class="body"> 

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Email</label><span class="required"> *</span> 
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">                        
                        {!! Form::email('email',Request::old('email'),['id'=>'','class' => 'form-control','required'=> 'required', 'title'=>'Enter email' ]) !!}
                        {!! $errors->first('email') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>User Name</label><span class="required"> *</span> 
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line"> 
                        {!! Form::text('username',Request::old('username'),['id'=>'','class' => 'form-control','required'=> 'required', 'title'=>'Enter user name']) !!}
                        {!! $errors->first('username') !!}
                    </div>
                </div>
            </div>
        </div>

        @if (!isset ($data) && empty($data->id))

        <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                    <label>Password</label><span class="required"> *</span> 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line"> 
                            {{ Form::password('password', array('id'=>'', 'class'=>'form-control', 'required'=> 'required', 'title'=>'Enter password' ) ) }}
                            {!! $errors->first('password') !!}
                        </div>
                    </div>
                </div>
        </div>
        @else
                <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                            <label>Password</label><span class="required"> *</span> 
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                     <?php 
                                         // $password1 =  bcrypt($data->password);
                                           ?>              
                                     {!! Form::text('password',Request::old('password'),['id'=>'password','class' => 'form-control','required'=> 'required','type'=> 'password', 'title'=>'Enter Password name' ]) !!}
                                    {!! $errors->first('password') !!}
                                </div>
                            </div>
                        </div>
                </div>

        @endif   

         <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Mobile No</label><span class="required"> *</span> 
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line"> 
                        {!! Form::text('mobile_no',Request::old('mobile_no'),['id'=>'','class' => 'form-control','required'=> 'required', 'title'=>'Mobile No' ]) !!}
                        {!! $errors->first('mobile_no') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>User Type</label><span class="required"> *</span> 
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line"> 
                         {!! Form::text('type',Request::old('type'),['id'=>'','class' => 'form-control','title'=>'User Type','readonly']) !!}
                       <!--  {!! Form::Select('type',array('admin'=>'Admin','customer'=>'Customer','seller' => 'Seller'),Request::old('type'),['id'=>'', 'class'=>'form-control']) !!} -->
                        {!! $errors->first('type') !!}
                    </div>
                </div>
            </div>
        </div>

<!--         <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>User Roll</label><span class="required"> *</span> 
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line"> 
                        {!! Form::Select('roles_id',array('1'=>'1','3'=>'3','2' => '2'),Request::old('roles_id'),['id'=>'roles_id', 'class'=>'form-control']) !!}
                        {!! $errors->first('roles_id') !!}
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                <label>Status</label><span class="required"> *</span> 
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),Request::old('status'),['id'=>'', 'class'=>'form-control']) !!}
                        {!! $errors->first('status') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="footer">
        <div class="row clearfix">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                <button class="btn bg-blue-grey btngmt waves-effect" type="submit">Submit</button>                                    
            </div>
        </div>
    </div>