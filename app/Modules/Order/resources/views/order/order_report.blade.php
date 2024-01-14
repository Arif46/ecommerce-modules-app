@extends('Admin::layouts.master')
@section('body')

  	<section class="content">
        <div class="container-fluid">

        	<div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Order List</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Order</a></li>
                            <!--<li class="active">Data</li>-->
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Widgets -->
        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
        	    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-3 col-sm-12">
                                    <h2>
                                       Order List                        
                                    </h2>
                                </div>
                                    <div class="col-md-7 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.order.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Search by last two digits order number']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                              

                            </div>
                        </div>

	                    <div class="body">
	                     <div class="table-responsive">
			                        <table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th >Shop Name</th>
												<th >Order No</th>
												<th >Date</th>
												<th >Qty</th>
												<th >Unit Price</th>
												<th >Sub Total</th>
												<th >Shipping</th>
												<th >Discount</th>
												<th >Total Price</th>
												<th >Status</th>
												<th >Action</th>
											</tr>
										</thead>
										<tbody>
											@if(!empty($orderdata))
												@foreach($orderdata as $key => $values)
												<?php //dd($data); ?>
													<tr>
														<td scope="row">{{$key+1}}</td>
														<td>
	                                            			{{$values->shop_name}}
	                                            		</td>
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
															 <a href="{{ route('admin.order.show', $values->order_head_id) }}" class="btn btn-primary" title="Order Details" >Details</a>
															
															
														</td>
													</tr>
												@endforeach
											@endif
															
										</tbody>
									</table>

									
					   </div> 
	                   </div>
            	</div>               
	           
			</div>                 
        </div>

                    <div class="row">
                                <div class="col-md-12 col-sm-12">
                                     {{ $orderdata->links() }}
                                </div>                                
                    </div>
              <!-- #END# Widgets -->
        </div>


      
    </section>

	
@endsection