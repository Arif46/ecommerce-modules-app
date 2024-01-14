@extends('Seller::webseller.seller_master')
@section('body')
	
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-dark">
	    <div class="container">
	        <nav aria-label="breadcrumb">
	            <ul class="breadcrumb">
	                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	                <li class="breadcrumb-item active" aria-current="page">Delivery Option</li>
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
                            	{{$verifaid_user->shop_name}}
                            	<!-- Button trigger modal -->
								<a href="{{route('seller.delivery.option.create')}}" class="btn btn-primary mt-15 float-right">
								  Add new
								</a>
                            </h2>

                            <div class="cart-main-area">
	                        	<div class="cart-table table-responsive"> 

	                        		<table class="">
									  <thead>
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">Type</th>
									      <th scope="col">Courier Name</th>
									      <th scope="col">Value</th>
									      <th scope="col">Status</th>
									      <th scope="col"></th>
									    </tr>
									  </thead>
									  <tbody>
									  	@if(!empty($delivery_r))
										  	<?php
										  		$total_rows = 1;
										  	?>
										  	@foreach($delivery_r as $values)
										  		
										    <tr>
										        <th scope="row"> <?=$total_rows?></th>
										        <td>{{$values->shipping_type}}</td>
										        <td>{{$values->courier_service}}</td>        
										        <td>{{$values->shipping_value}}</td>
										        <td>{{$values->status}}</td>
										        <td>
							                        <a class="btn btn-info" href="{{ route('seller.delivery.option.edit', $values->id) }}">Edit</a>  
										      </td>
										    </tr>
										    <?php
										    $total_rows++;
										    ?>
										    @endforeach
									    @endif
									  </tbody>
								</table>

														
								{{ $delivery_r->links() }}


	                        	</div>
	                        </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection