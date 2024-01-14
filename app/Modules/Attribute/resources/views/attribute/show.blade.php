@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Attribute</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="{{ route('admin.attribute.index') }}">Attribute</a></li>
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
                                <div class="col-sm-12">
                                    <h2>
                                        Details                          
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12 table-responsive">
                                    <div class="admin-dashboard-table">

                                        <table id="mainTable" class="table table-hover table-striped table-bordered">

                                            <tr>
                                                    <th>FrontEnd Title</th>
                                                    <td>{{ isset($data->frontend_title)?ucfirst($data->frontend_title):''}}</td>
                                                </tr>

                                             <tr>
                                                <th>Backend Title</th>
                                                <td>{{ isset($data->backend_title)?ucfirst($data->backend_title):''}}</td>
                                            </tr>
                                                            
                                            <tr>
                                                <th>Code column</th>
                                                <td>{{ isset($data->code_column)?ucfirst($data->code_column):''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Type</th>
                                                <td>{{ isset($data->type)?ucfirst($data->type):''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Type is required</th>
                                                <td>{{ isset($data->type_is_required)?ucfirst($data->type_is_required):''}}</td>
                                            </tr>

                                            <tr>
                                                <th>Order</th>
                                                <td>{{ isset($data->order)?ucfirst($data->order):''}}</td>
                                               
                                            </tr>
                                            
                                            <tr>
                                                <th>Default Value</th>
                                                <td>{{ isset($data->default_value)?ucfirst($data->default_value):''}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>{{ isset($data->status)?ucfirst($data->status):''}}</td>
                                                
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