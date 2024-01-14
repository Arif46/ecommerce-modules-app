@extends('Admin::layouts.master')
@section('body')

	<section class="content">
        <div class="container-fluid">

        	<div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>{{$user_data->shop_name}} Shop - Payment</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                            <li><a href="javascript:void(0);">Payment</a></li>
                            <!--<li class="active">Data</li>-->
                        </ol>
                    </div>
                </div>
            </div>
   

            <!-- Table list for data -->
		    <div class="row clearfix">
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            <div class="card">

                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-3 col-sm-12">
                                    <h2>
                                        {{$user_data->shop_name}} Payment List                        
                                    </h2>
                                </div>                                     

                               
                            </div>
                        </div>

		                <div class="body">
		                     <div class="row clearfix">
		                        <div class="col-md-12 table-responsive">
		                            <div class="admin-dashboard-table">

		                                <table id="mainTable" class="table table-hover table-striped table-bordered">
		                                	<thead class="bg-blue-grey">
		                                        <tr>
		                                            <th>#</th>
		                                            <th> Seller </th>
		                                            <th> Order Number </th>
		                                            <th> Transaction Number </th>
		                                            <th> Payment Type</th>
		                                            <th> Date</th>
		                                            <th> Amount</th>
		                                            <th> Status</th>
		                                           
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                    	@if(!empty($data))
                                        			@foreach($data as $key => $values)

                                                    <?php
                                                                //dd($values);
                                                                ?>
                                        				<tr>
                                            				<td>{{$key+1}}</td>
                                            				<td>
                                            					@if(isset($values->relSeller) && !empty($values->relSeller))
                                            						{{$values->relSeller->shop_name}}
                                            					@endif
                                            				</td>
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

                                                                @if(isset($values->relOrderHead) && !empty($values->relOrderHead))
                                            					 ৳ {{number_format((($values->relOrderHead->total_price ) - $values->relOrderHead->discount_amount),2)}}
                                                                 @endif
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

		                                {{ $data->links() }}

		                            </div>
		                        </div>
		                    </div>
		                </div>

		            </div>
		        </div>

        </div>
    </section>    

@endsection