@extends('Admin::layouts.master')
@section('body')
	
	<section class="content">
        <div class="container-fluid">

        	<div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>{!! $pageTitle !!}</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>                            
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
                                       All Order List                        
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
                     <div class="row clearfix">
                        <div class="col-md-12 table-responsive">
                            <div class="admin-dashboard-table">

                                <table id="mainTable" class="table table-hover table-striped table-bordered">

                                    <thead class="bg-blue-grey">
                                        <tr>
                                            <th>Serial No</th>
                                            <th> Shop Name </th>
                                            <th> From Date </th>
                                            <th> To Date </th>
                                            <th>SSL Payment</th>
                                            <th>MobileBanking Payment</th>
                                            <th>Cashon Payment</th>
                                            <th> Total Amount </th>
                                            <th> Paid Amount </th>
                                            <th> Due Amount </th>
                                            <th> Action </th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @if(!empty($data))
                                        @foreach($data as $key => $values)
                                        <?php //dd($values->relSeller);?>
                                        <tr>
                                            <td>{{$key+1}}</td>
                                           <td>
                                              {{$values->shop_name}}
                                            </td>
                                           
                                            <td>{{ date('M d, Y',strtotime($values->date)) }}</td>
                                            <td>{{ date('M d, Y',strtotime($values->date)) }}</td>
                                            

                                            <td>
                                               20000.00
                                            </td>

                                            <td>
                                               50000.00
                                            </td>
                                            
                                            <td>
                                               70000
                                            </td>
                                            <td>
                                                140000.00                                            
                                            </td>

                                            <td>
                                                100000.00                                            
                                            </td>

                                            <td>
                                                40000.00                                            
                                            </td>

                                            <td>
                                                <a href="" class="btn btn-primary" title="Account Details" >Details</a>
                                                
                                            </td>

                                        </tr>

                                        @endforeach
                                        @endif

                                    </tbody>


                                </table>
                               
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
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