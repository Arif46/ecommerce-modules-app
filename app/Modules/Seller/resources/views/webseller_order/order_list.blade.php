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
        	        <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">                     
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>
                            <p>{{ $verifaid_user->shop_address }}</p>
                            <h3>Order Details</h3>                           
                        </div>
                    </div>

        	<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-fields">
                    <div class="about-skill-area">                        
                        <div class="cart-main-area">
	                        <div class="cart-table table-responsive">
		                        <table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Order No</th>
											<th scope="col">Date</th>
											<th scope="col">Qty</th>
											<th scope="col">Unit Price</th>
											<th scope="col">Sub Total</th>
											<th scope="col">Shipping</th>
											<th scope="col">Discount</th>
											<th scope="col">Total Price</th>
											<th scope="col">Status</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(!empty($orderdata))
											@foreach($orderdata as $key => $values)
											<?php //dd($data); ?>
												<tr>
													<th scope="row">{{$key+1}}</th>
													<td>
														<a href="{{ route('seller.order.show', $values->id) }}">{{$values->order_number}}
														</a>
													</td>
													<td>{{ date('M d, Y',strtotime($values->date)) }}</td>
													<td>
														{{$values->quantity}}
													</td>
													<td>
														৳  {{number_format($values->price,2)}}
													</td>
													<td>
														৳  {{number_format(($values->total_price - $values->shipping_cost),2)}}
													</td>
													<td>
														{{$values->shipping_method}}<br/>
														৳  {{number_format($values->shipping_cost,2)}}
													</td>
													<td>
														৳  {{number_format($values->discount_amount,2)}}
													</td>
													<td>
														৳  {{number_format($values->total_price - $values->discount_amount,2)}}
													</td>
													<td>
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
													</td>
													<td>
														
														<a class="btn btn-primary" href="{{ route('seller.order.show', $values->order_head_id) }}">Details</a>
														<a class="btn btn-primary" href="{{ route('seller.order.track', $values->order_head_id) }}">Track</a>
														<!-- <a class="btn btn-primary" href="{{ route('seller.order.edit', $values->id) }}">Edit</a> -->
													<!-- 	<a href="{{route('seller.order.destroy', $values->id) }}" class="btn btn-danger"  onclick="return confirm('Are you sure to Cancel?')" >
															Cancel
														</a> -->
														
													</td>
												</tr>
											@endforeach
										@endif
														
									</tbody>
								</table>

								{{ $orderdata->links() }}

							</div>
						</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        
	
@endsection