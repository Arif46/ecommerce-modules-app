@extends('Admin::layouts.master')
@section('body')

<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-8">
                    <h2>CMS</h2>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                        <li><a href="javascript:void(0);">CMS</a></li>
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
                                            <th>Page Tag</th>
                                            <td>{{ isset($data-> page_tag)?ucfirst($data-> page_tag):''}}</td>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ isset($data->title)?ucfirst($data->title):''}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Description</th>
                                            <td>{!! $data->description !!}</td>
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