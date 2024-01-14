@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>All Notices</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Notices</a></li>
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
                                        Notices Board                        
                                    </h2>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.events.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                </div>                               

                                <div class="col-md-3 col-sm-12 text-right">
                                        <a href="{{route('admin.events.create')}}" class="btn btn-primary">Add Notices</a>      
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
                                                    <th> Title </th>
                                                    <th> Description </th>
                                                    <th> Date</th>                     
                                                    <th> Download File </th>
                                                    <th> Position</th> 
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
                                                            {{$values->title}}
                                                        </td>
                                                        <td>
                                                            {!!str_limit($values->caption, $limit = 200, $end = '...')!!}
                                                        </td>                                                      
                                                        <td>
                                                            {{$values->created_at}}
                                                        </td>                         
                                                                                                          
                                                        <td>
                                                        @if(!empty($values->image_link))
                                                           <a href="{{ url('uploads/events/'.$values->image_link) }}" class="btn" target="blank">
                                                           <i class="fa fa-cloud-download" aria-hidden="true"></i> Download </a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{$values->type}}
                                                        </td>
                                                        <td>
                                                            {{$values->status}}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.events.edit', $values->id) }}" class="btn btn-info" >Edit</a>

                                                            <a href="{{ route('admin.events.destroy', $values->id) }}" class="btn btn-warning" onclick="return confirm('Are you sure to Delete?')" >Delete</a>
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

