<div class="billing-address">
	<h4>For Registered User</h4>
	<?php $url = route('checkout.post.login'); ?>
        {!! Form::open(array('url' => $url, 'method' => 'post', 'class' => "login-formas" ,'id'=>'loginform')) !!}

		<div class="row">		

			<div class="col-12">
		        <div class="form-group">
		           {!! Form::text('email',Request::old('email'),['id'=>'email', 'class' => 'form-control inputfield required email','placeholder'=>'Enter Email or phone', 'required']) !!}
		            <span class="errors">
		            	{!! $errors->first('email') !!}
		        	</span> 
		    	</div>
			</div>

			<div class="col-12">
                <div class="form-group">
                    {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control inputfield', 'placeholder'=>'Password', 'required' ) ) }}                                         
                    <span class="errors">
                        {!! $errors->first('password') !!}
                    </span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <a class="" href="{{ route('customer.resetpassword') }}">Forgot password ?</a>
                </div>
            </div>

            <div class="col-6 buttons-set">
                <button class="button pull-right">Sign In</button>
            </div>
		</div>
	{!! Form::close() !!}	
</div>