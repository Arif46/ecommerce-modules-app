@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Attribute Set</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="{{ route('admin.attribute.set.index') }}">Attribute Set</a></li>
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
                                                <th>Title</th>
                                                <td>{{ isset($data->title)?ucfirst($data->title):''}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Slug</th>
                                                <td>{{ isset($data->slug)?ucfirst($data->slug):''}}</td>
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