@extends('Seller::webseller.seller_master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Order</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->

<div class="my-account-area ptb-50">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12 mb-0">
               <div class="section-title text-center title-style-2" style="margin-bottom: 0px;">
                   <h2><span>{{ $verifaid_user->shop_name }}</span> </h2>                  
                   <h3>Order Details</h3>
                 </div>
           	</div>

            <div class="col-md-6 col-sm-12 offset-md-3 mb-30 mt-0">
              <span style="float: left; height:30px; padding-top: 10px; width: 60px; border: 0px; margin-right: 20px; display: inline-block; color: #ff6600; font-size: 20px;">Search </span>
                                       <span> {!! Form::open(['method' =>'GET', 'route' => 'seller.order.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Search by last two digits order number']) !!}
                                        <button type="submit" class="admin-search">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                        {!! Form::close() !!}
                                      </span>
            </div>         

            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="cart-main-area">
            <div class="row">
               @if(!empty($orderdata))
                  @foreach($orderdata as $key => $values)
                  
                  <?php
                  
                  $gtotal = (($values->price * $values->quantity) - $values->discount_amount ) + $values->shipping_cost;
                  ?>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="grid-table">
                  <p >                    
                  <h3>
                    <small>Order No - {{$key + 1}} </small><br>
                    <a href="{{ route('seller.order.show', $values->id) }}" style="color:#ff6600; ">{{$values->order_number}}</a>
                  </h3></p>
                  <p class="date">Date - {{ date('M d, Y',strtotime($values->date)) }}
                  	<span style="float: right; margin-right: 30px;">Qty - {{$values->quantity}}</span>
                  </p>
                  <p>Unit Price - ৳  {{number_format($values->price,2)}} <br>
                  Sub Total- ৳  {{number_format($values->price*$values->quantity,2)}} <br>
                  Discount - ৳ {{number_format($values->discount_amount,2)}}</p>
                  <p class="shipping-cost">Shipping - {{$values->shipping_method}} :   
					         ৳  {{number_format($values->shipping_cost,2)}}</p>
                  <p class="price"> Total Pay - <b> ৳ {{number_format($gtotal,2)}} </b> <img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$values->payment_type]}}.png" height="30" style="height:30px !important; margin-left: 20px; " /></p>
                  <p class="shipping-cost">Status - <b> 
    			 @if($values->status =="cancel") 
					Cancel
				@endif
				@if($values->status =="active") 
					Pending 		
				@endif
				@if($values->status =="confirmed") 
				Processing
				@endif
				@if($values->status =="processing") 
				Shipped
				@endif
				@if($values->status =="delivered") 
				Delivered
				@endif
                  </b>
              </p>
                <p class="action">
                  <?php $id = $values->id; ?>

                  <a class="btn btn-primary"  href="{{ route('seller.order.show', $id) }}"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Details</a>
                    <a class="btn btn-info" href="{{ route('seller.order.track', $id) }}"> <i class="fa fa-truck" aria-hidden="true"></i> Track Order</a>
                    <a class="btn btn-warning" href="{{ route('seller.order.show', $id) }}"> <i class="fa fa-print" aria-hidden="true"></i> Print  </a></p>

              </div>
              </div>
              
               @endforeach
              @endif
            </div>

           </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
              {{ $orderdata->links() }}
          </div>
        </div>
    </div>
</div>        
	
@endsection