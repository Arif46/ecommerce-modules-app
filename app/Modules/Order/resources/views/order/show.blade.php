@extends('Admin::layouts.master')
@section('body')
	
	<section class="content">
        <div class="container-fluid">

        	<div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Order details</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Order details</a></li>
                            <!--<li class="active">Data</li>-->
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Filter for data -->

            <!-- Table list for data -->
		    <div class="row clearfix">
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            <div class="card">

		            	<div class="header">
		                    <div class="row clearfix">
		                        <div class="col-sm-12">
		                            <h2>
		                                Order number: {{ $data->order_number }}                        
		                            </h2>
		                        </div>
		                    </div>
		                </div>

		                <div class="body">
		                    <div class="row clearfix">
		                        <div class="col-md-12 table-responsive">
		                            <div class="admin-dashboard-table">

		                            	<div class="row">
							            	<div class="col-md-6">
							            		<div class="billing-address">

							            			<h5>Billing Address</h5>
							                        <p>
							                            @if(count($data->relOrderShipping) > 0)
							                                @foreach($data->relOrderShipping as $shipping)
							                                    @if($shipping->type == 'billing')

							                                       Name: {{ $shipping->name }} {{ $shipping->lastname }}<br>
                                        
							                                        Address: {{ $shipping->address }}<br>
							                                        City: {{ $shipping->city }}<br>
							                                        State: {{ $shipping->area }}<br/>
							                                        Zip:  {{ $shipping->zip }}<br>                
							                                        Email: {{ $shipping->email }}<br/>
							                                        Phone: {{ $shipping->phone }}<br/>
							                                       
							                                    @endif
							                                @endforeach
							                            @endif
							                        </p>

							            		</div>
							            	</div>

							            	<div class="col-md-6">
							                    <div class="billing-address">
							                        <h5>Shipping Address</h5>
							                        <p>
							                            @if(count($data->relOrderShipping) > 0)
							                                @foreach($data->relOrderShipping as $shipping)
							                                    @if($shipping->type == 'shipping')
							                                        Name: {{ $shipping->name }} {{ $shipping->lastname }}<br>
                                        
							                                        Address: {{ $shipping->address }}<br>
							                                        City: {{ $shipping->city }}<br>
							                                        State: {{ $shipping->area }}<br/>
							                                        Zip:  {{ $shipping->zip }}<br>                
							                                        Email: {{ $shipping->email }}<br/>
							                                        Phone: {{ $shipping->phone }}<br/>  
							                                    @endif
							                                @endforeach
							                            @endif
							                        </p>
							                    </div>
							                </div>

							            </div>

							            <div class="row">
							                <div class="col-md-12">
							                    <div class="payment-section">
							                         
							                        <h5>Payment Method</h5>
							                        <p>  <img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$data->payment_type]}}.png" height="30" style="height:30px !important; " />
							                            
							                        </p>
							                    </div>
							                </div>
							            </div>
		                            	
		                            	<br/>
		                            	<!-- <h4 class="order-details">Order Details</h4> -->

		                            	<table class="table">
							                <thead>
							                    <tr>
							                    	<th>Seller</th>
							                        <th>Product Name</th>
							                        <th>Quantity</th>                        
							                        <th>Price</th>
							                        <th>Sub Price</th>							                       
							                        <th>Total Price</th>
							                    </tr>
							                </thead>

							                <tbody>
							                    <?php
							                        $total_discount = 0;
							                        $total_price = 0;
							                    ?>
							                    @if(count($data->relOrderDetail) > 0)

							                        @foreach($data->relOrderDetail as $item)

							                            <?php 
							                                $item_data = $item->relProduct;
							                                $order_qty = $item->quantity;  
							                                
							                                $sub_total_price= $item->price*$item->quantity;
							                                $total_price+= $sub_total_price;
							                               //dd($data);

							                                $total_discount+= $data->discount_amount;    
							                            ?>

							                            <tr>
							                            	<td>
							                            		@if(isset($item->relSeller) && !empty($item->relSeller))
							                            			{{$item->relSeller->shop_name}}
							                            		@endif
							                            	</td>
							                                <td>
							                                    {{ $item_data->product_title }}
							                                    <br/>
							                                    @if(!empty($item->size))
							                                        <b>Size: </b> {{$item->size}}
							                                    @endif <br/>
							                                    @if(!empty($item->color))
							                                        <b>Color: </b> {{$item->color}}
							                                    @endif                          
							                                </td>
							                                <td>
							                                    {{ $item->quantity }}
							                                </td>
							                                <td>
							                                    ৳  {{ number_format($item->price,2) }}
							                                </td>
							                                  
							                                <td>
							                                    ৳  {{ number_format(($sub_total_price),2) }} 
							                                </td>
							                               
							                                <td>
							                                    ৳  {{ number_format(($sub_total_price),2) }} 
							                                </td>
							                            </tr>

							                        @endforeach
							                    @endif

							                </tbody>

							                <tfoot>
							                    <tr>
							                        <td></td>
							                        <td></td>
							                        <td></td>
							                        <td></td>
							                       
							                        <td colspan="">Total Amount</td>
							                        <td>
							                         ৳  {{ number_format($total_price,2) }}
							                        </td>
							                    </tr>
							                     <tr>
							                        <td></td>
							                        <td></td>
							                        <td></td>
							                        <td></td>
							                        
							                        <td colspan="">Shipping : {{$data->shipping_method}}</td>
							                        <td>							                          
							                         ৳  {{ number_format($data->shipping_cost,2)}}
							                        </td>
							                    </tr>

							                    <tr>
							                        <td></td>
							                        <td></td>
							                        <td></td>
							                        <td></td>
							                      
							                        <td colspan="" > <strong>Discount</strong>
							                        </td>
							                        <td> <strong>৳  {{ number_format(($total_discount),2) }}</strong>
							                        </td>
							                    </tr>

							                    <tr style="background: #d7d7d7;">
							                        <td></td>
							                        <td></td>
							                        <td></td>
							                        <td></td>
							                       
							                        <td colspan="" > <strong>Grand Total</strong>
							                        </td>
							                        <td> <strong>৳  {{ number_format(($total_price + $data->shipping_cost) - $total_discount,2) }}</strong>
							                        </td>
							                    </tr>

							                </tfoot>
							            </table>

		                            </div>
		                        </div>
		                    </div>
		                </div>

		            </div>
		        </div>
		    </div>

        </div>
    </section>

@endsection