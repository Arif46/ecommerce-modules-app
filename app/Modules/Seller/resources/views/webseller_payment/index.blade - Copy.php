@extends('Seller::webseller.seller_master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Payment</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->

<div class="my-account-area ptb-80">
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-fields">
                            <div class="about-skill-area">                      
                                   @include('Seller::webseller.leftmenu')
                            </div>
                        </div>
                </div>
        	<div class="col-lg-9 col-md-9 col-sm-12">
                <div class="form-fields">
                    <div class="about-skill-area">
                    	<h2>{{$verifaid_user->shop_name}}</h2> 

                    	<div class="cart-main-area">
	                        <div class="cart-table table-responsive">
		                        <table class="">
		                        	<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Order No</th>
											<th scope="col">Transaction Number</th>
											<th scope="col">Payment Type</th>
											<th scope="col">Date</th>
											<th scope="col">Amount</th>
											<th scope="col">Status</th>
											<th scope="col">Action</th>
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
														{{@App\Http\Helpers\CartHelper::payment_option()[$values->payment_type]}}
													</td>
													<td>
														{{$values->date}}
													</td>
													<td>
														৳ {{number_format($values->amount,2)}}
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

													<td>
							                          <a class="btn btn-primary" target="_blank" href="{{ route('seller.product.details', $values->id) }}">View</a>
							                          <a class="btn btn-info" href="{{ route('seller.product.edit',$values->id) }}">Add/edit</a>
							                          <a class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" href="{{ route('seller.product.delete',$values->id) }}">Delete</a>
							                          <!-- <a class="btn btn-secondary" href="#{{ route('seller.product.clone', $values->id) }}#">Duplicate</a> -->
										      </td>
												</tr>
											@endforeach
										@endif
									</tbody>
		                        </table>

		                        <div class="pagination-wrapper">
								{{ $order_transaction->links() }}
							</div>

		                    </div>
		                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                    

@endsection