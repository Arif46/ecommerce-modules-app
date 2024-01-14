@extends('Web::customer.customer_master')
@section('body')

	<!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area bg-dark">
      <div class="container">
          <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Pay Again</li>
              </ul>
          </nav>
      </div>
  </div>
  <!-- Breadcrumb Area End -->

  <div class="my-account-area ptb-80 pbb-100" style="margin-bottom: 100px; display: block;">
    <div class="container">
        <div class="row">

        	<div class="col-lg-3 col-md-3 col-sm-12">

              <div class="form-fields">
                  <div class="about-skill-area">
                      <h2>{{Auth::user()->username }}</h2>
                      <p>{{Auth::user()->email }}</p>
                      <p>{{Auth::user()->mobile_no }}</p>
                  </div>
              </div>

          </div>

          <div class="col-lg-9 col-md-9 col-sm-12">
          	 <div class="billing-address">
                <h4 class="text-center">Payment Method</h4>
                
                	{!! Form::model($order_head, ['method' => 'POST', 'route'=> ['web.cart.confirm.customer.checkout'],'id'=>'', 'class' => '']) !!}
                	<div class="row">
	                    @if(!empty($payment_r))
	                        @foreach($payment_r as $payment)
	                            <div class="col-md-6 text-center">                            
	                                <label for="payment-method-{{$payment->id}}" class="radio">
	                                    <input  type="radio" name="payment_method" id="payment-method-{{$payment->id}}" value="{{$payment->payment_type}}" class="hidden" <?=$payment->payment_type=='cash-on-delevery'?'checked':''?> />
	                                    <span style="display: flex;">
                                        <img src="{{URL::to('')}}/frontend/assets/img/payment/{{App\Http\Helpers\CartHelper::payment_option()[$payment->payment_type]}}.png" height="30" style="height:30px !important; " />
	                                        
	                                    </span>
	                                </label>
	                            </div>
	                        @endforeach
	                    @endif

	                    <input type="hidden" name="order_id" value="{{$order_head->id}}">
	                    <div class="col-12">                        
	                       <div class="text-center checkbox-btn buttons-set">
	                           <button class="button" id="" type="submit">Pay Now</button>
	                        </div>
	                    </div>
 					</div>
                    {!! Form::close() !!}    
                   
               
          </div>

        </div>
    </div>
</div>
</div>

@endsection