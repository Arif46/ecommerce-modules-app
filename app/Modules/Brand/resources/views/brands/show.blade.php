@extends('Admin::layouts.master')
@section('body')

    <section class = "content" >
    <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Brand</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Brand</a></li>
                        </ol>
                    </div>
                </div>
            </div>

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
                                                <th>Description</th>
                                                <td>{!! $data->description !!}</td>
                                            </tr>

                                            <tr>
                                                <th>Status</th>
                                                <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Meta Title</th>
                                                <td>{{ $data->meta_title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Meta Description</th>
                                                <td>{{ $data->meta_description }}</td>
                                            </tr>
                                            <tr>
                                                <th>Meta Keyword</th>
                                                <td>{{ $data->meta_keyword }}</td>
                                            </tr>

{{--                                            <tr>--}}
{{--                                                <th>Show in Main Menu</th>--}}
{{--                                                <td>{{ $data->show_in_main_menu }}</td>--}}
{{--                                            </tr>--}}

                                            <tr>
                                                <th>Image</th>
                                                <td>
                                                    @if(!empty($data->image_link))
                                                    <a target="_blank" href="{{ url('uploads/brand/800x800/' . $data->image_link) }}">
                                                        <img width="500" src="{{ url('uploads/brand/800x800/' . $data->image_link) }}">
                                                    </a>
                                                    @endif
                                                </td>
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