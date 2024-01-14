@extends('Seller::webseller.seller_master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment Report</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->

<div class="my-account-area ptb-80">
    <div class="container">
        <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">                     
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>                  
                            <h3>Payment Report</h3>                           
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
											<th scope="col">Transaction Number</th>
											<th scope="col">Payment Type</th>
											<th scope="col">Date</th>
											<th scope="col">Amount</th>
											<th scope="col">Status</th>
										</tr>
									</thead>
									<tbody>
										@if(!empty($order_transaction))
											@foreach($order_transaction as $key => $values)
										
												<tr>
													<th scope="row">{{$key+1}}</th>
													<td>
														@if(isset($values->relOrderHead) && !empty($values->relOrderHead))
															{{$values->relOrderHead->order_number}}
														@endif
													</td>
													<td>
														{{$values->transaction_number}}
													</td>
													<td>
														<img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$values->payment_type]}}.png" height="30" style="height:30px !important; " />
														
													</td>
													<td>
														{{$values->date}}
													</td>
													<td>
														৳ {{number_format((($values->amount + $values->relOrderHead->shipping_cost) - $values->relOrderHead->discount_amount),2)}}
													</td>
													<td>
														@if($values->status == 'active')
															Paid
														@elseif($values->status == 'inactive')
															Unpaid
														@else
															{{$values->status}}
														@endif
													</td>
												</tr>
											@endforeach
										@endif
									</tbody>
		                        </table>
		                    </div>
		                    {{ $order_transaction->links() }}
		                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                    

@endsection