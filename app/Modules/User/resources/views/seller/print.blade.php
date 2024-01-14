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
                        <h2>All User List</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                            <li><a href="javascript:void(0);">User</a></li>
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
                                        User List                        
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.user.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.user.create')}}" class="btn btn-primary">Add user</a>                                      
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
                                                    <th> No</th>
                                                    <th> Name </th>
                                                    <th> Email </th>
                                                    <th> Admin Type </th>
                                                    <th> Status</th>
                                                    <th> Mobile</th>
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
                                                        {{$values->username}} {{$values->last_name}}
                                                    </td>
                                                    <td>
                                                        {{$values->email}}
                                                    </td>
                                                    <td>
                                                        {{$values->type}}
                                                    </td>
                                                    <td>
                                                        {{$values->status}}
                                                    </td>
                                                    <td>
                                                        {{$values->mobile_no}}
                                                    </td>
                                                    <!-- <td>
                                                        @if(!empty($values->image))
                                                            <img width="50" height="50" src="{{URL::to('')}}/uploads/user/{{$values->image}}">
                                                        @endif
                                                    </td> -->
                                                    <td>
                                                        <a href="{{ route('admin.user.show', $values->id) }}" class="btn btn-primary">Show</a>

                                                        <a href="{{ route('admin.user.edit', $values->id) }}" class="btn btn-info" >Edit</a>

                                                        <a href="{{ route('admin.user.destroy', $values->id) }}" class="btn btn-warning" onclick="return confirm('Are you sure to Cancel?')" >Cancel</a>
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

