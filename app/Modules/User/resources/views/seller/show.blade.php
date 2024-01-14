@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Seller</h2>
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
                                <div class="col-sm-12 col-md-8">
                                    <h2>
                                        Details                          
                                    </h2>
                                </div>
                                <div class="col-sm-12 col-md-4 text-right">
                                    <a href="{{ route('admin.seller.index') }}" >Back</a>
                                </div>
                            </div>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="admin-dashboard-table  table-responsive">

                                        <table id="mainTable" class="table table-hover table-striped table-bordered">
                                            <tr>
                                                <th>Shop Name</th>
                                                <td>{{ isset($data->shop_name)?ucfirst($data->shop_name):''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Shop Address</th>
                                                <td>{{ isset($data->shop_address)?ucfirst($data->shop_address):''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mobile</th>
                                                <td>{{ isset($data->mobile_no)?ucfirst($data->mobile_no):''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ isset($data->email)?ucfirst($data->email):''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Seller Name</th>
                                                <td>{{ isset($data->username)?ucfirst($data->username):''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Type</th>
                                                <td>{{ isset($data->type)?ucfirst($data->type):''}}</td>
                                            </tr>
                                            

                                            <tr>
                                                <th>Status</th>
                                                <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
                                            </tr>
                                            
                                            
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