@extends('Admin::layouts.master')
@section('body')

<?php
    use Illuminate\Support\Facades\Input;
?>
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>{{$user_data->shop_name}} shop Order</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                            <li><a href="javascript:void(0);">Order</a></li>
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
                                <div class="col-md-6 col-sm-12">
                                    <h2>
                                      {{$user_data->shop_name}} Order List                        
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
                                            <th>Serial No</th>
                                            <th> Order Number </th>
                                            <th> Date </th>
                                            <th> Total Amount </th>
                                            <th> Delivery Status</th>
                                            <th>Payment Method</th>
                                            <th>Payment status</th>
                                            <th> Action </th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @if(!empty($data))
                                        @foreach($data as $key => $values)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            
                                            <td><a href="{{ route('admin.order.show', $values->id) }}">{{$values->order_number}}</a></td>
                                            <td>{{ date('M d, Y',strtotime($values->date)) }}</td>
                                            

                                            <td>
                                               ৳ {{number_format(($values->total_price - $values->discount_amount),2)}}
                                            </td>

                                            <td>
                                                {{ucfirst($values->status)}}
                                            </td>
                                            
                                            <td>
                                                
                                                <img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$values->payment_type]}}.png" height="30" style="height:30px !important; " />
                                            </td>
                                            <td>
                                                 @if ($values->status=="delivered")
                                                   
                                                    Paid

                                                @elseif($values->status=="active")

                                                        Unpaid

                                                @else($values->status !="active")
                                                        
                                                            Paid
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.order.show', $values->id) }}" class="btn btn-primary" title="Order Details" >Details</a>
                                                <a href="{{ route('admin.order.destroy', $values->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Cancel?')" >
                                                    Cancel
                                                </a>
                                            </td>

                                        </tr>

                                        @endforeach
                                        @endif

                                    </tbody>


                                </table>
                                {{$data->links()}}

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

