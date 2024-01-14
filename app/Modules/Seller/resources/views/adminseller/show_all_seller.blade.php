@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>All Seller List</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                            <li><a href="javascript:void(0);">Seller</a></li>
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
                                <div class="col-md-3">
                                    <h2>
                                        Seller                         
                                    </h2>
                                </div>
                              
                                <div class="col-md-9 text-right">
                                   <a href="{{route('admin.seller.create')}}" class="btn btn-primary">Add seller</a>                                      
                                    <a href="{{route('admin.seller.index')}}" class="btn btn-primary">Seller Grid View</a>

                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3 col-sm-12">
                                   
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.seller.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Search by Shop Name\Mobile\Email']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                                   

                                <div class="col-md-3 text-right">
                                   
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
                                                    <th> #</th>
                                                    <th> Shop </th>
                                                    <th> Shop Address</th>
                                                    <th> Email </th>
                                                    <th> Mobile </th>
                                                    <th> Status</th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @if(!empty($data))
                                                   <?php
                                                        $total_rows = 1;
                                                   ?>
                                                   @foreach($data as $values)
                                                   <tr>
                                                    <td>
                                                        <?=$total_rows?>
                                                    </td>
                                                    <td>
                                                        @if(isset($values->relSellerProfile))
                                                            {{$values->relSellerProfile->shop_name}}
                                                        @endif          
                                                    </td>
                                                    <td>
                                                        @if(isset($values->relSellerProfile))
                                                            {{$values->relSellerProfile->shop_address}}
                                                        @endif          
                                                    </td>
                                                    <td>
                                                        {{$values->email}}
                                                    </td>
                                                    <td>
                                                        {{$values->mobile_no}}
                                                    </td>
                                                    <td>
                                                        {{$values->status}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.all.seller.product.index', $values->id) }}" class="btn btn-primary">Items</a>
                                                        <a href="{{ route('admin.all.seller.order.index', $values->id) }}" class="btn btn-info" >Orders</a>
                                                        <a href="{{ route('admin.all.seller.payment.index', $values->id) }}" class="btn btn-info" >Order Payment</a>

                                                        <a style="color: #ff0000;">Product pending count </a> 
                                                    </td>

                                                    </tr>
                                                    <?php
                                                         $total_rows++;
                                                    ?>
                                                    @endforeach
                                                @endif
                                            </tbody>
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

