@extends('Seller::webseller.seller_master')
@section('body')
	
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-dark">
	    <div class="container">
	        <nav aria-label="breadcrumb">
	            <ul class="breadcrumb">
	                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	                <li class="breadcrumb-item active" aria-current="page">Coupon</li>
	            </ul>
	        </nav>
	    </div>
	</div>
	<!-- Breadcrumb Area End -->


	<div class="my-account-area ptb-80">
        <div class="container-fluid">
            <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">                     
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>                 
                            <h3>Coupon Details</h3>                           
                        </div>
                    </div>
            	<div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-fields">
                        <div class="about-skill-area">

                        	@if(Session::has('message'))

								<div class="alert alert-success">
									<span class="close" data-dismiss="alert">×</span>
									{{Session::get('message')}} 
								</div>
							@endif


							@if(Session::has('error'))

								<div class="alert alert-warning">
									<span class="close" data-dismiss="alert">×</span>
									{{Session::get('error')}} 
								</div>

							@endif

							@if(Session::has('info'))

								<div class="alert alert-warning">
									<span class="close" data-dismiss="alert">×</span>
									{{Session::get('info')}} 
								</div>
							@endif

							@if(Session::has('danger'))


								<div class="alert alert-danger">
									<span class="close" data-dismiss="alert">×</span>
									{{Session::get('danger')}} 
								</div>
							@endif


                        	<h2>
                            	
								<a href="{{route('seller.coupon.create')}}" class="btn btn-primary mt-15 float-right">
								  Add new
								</a>
                            </h2>

                            <div class="cart-main-area">
	                        	<div class="cart-table table-responsive"> 

	                        		<table class="table table-bordered table-striped">
									  <thead>
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">Coupon Name</th>
									      <th scope="col">Coupon Code</th>
									      <th scope="col">Coupon Details</th>
									      <th scope="col">Amount</th>
									      <th scope="col">Validity</th>
									      <th scope="col">Status</th>
									      <th scope="col"></th>
									    </tr>
									  </thead>
									  <tbody>
									  	@if(!empty($coupon))
										  	<?php
										  		$total_rows = 1;
										  	?>
										  	@foreach($coupon as $values)
										  		
										    <tr>
										        <th scope="row"> <?=$total_rows?></th>
										        <td>{{$values->coupon_name}}</td>
										        <td>{{$values->coupon_code}}</td>        
										        <td>
										        	<!-- {{$values->coupon_type}}<br/>
										        	@if($values->coupon_type == 'multiple')
										        		Start Coupon: {{$values->start_coupon}}<br/>
										        		End Coupon: {{$values->end_coupon}}<br/>
										        	@endif -->
										        	{{$values->coupon_details}}
										        </td>        
										        <td>{{number_format($values->amount,2)}}</td>
										        <td>
										        	Valid from: {{$values->valid_from}}<br/>
										        	Valid to: {{$values->valid_to}}
										        </td>        
										        <td>{{$values->status}}</td>
										        <td>
							                        <a class="btn btn-info" href="{{ route('seller.coupon.edit', $values->id) }}">Edit</a>  
										      </td>
										    </tr>
										    <?php
										    $total_rows++;
										    ?>
										    @endforeach
									    @endif
									  </tbody>
								</table>

														
								{{ $coupon->links() }}


	                        	</div>
	                        </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection