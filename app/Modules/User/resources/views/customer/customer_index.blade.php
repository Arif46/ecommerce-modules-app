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
                        <h2>Customer</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                            <li><a href="javascript:void(0);">Customer</a></li>
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
                                        Customer                         
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.customer.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.customer.create')}}" class="btn btn-primary">Add customer</a>                                      
                                </div>
                            </div>
                        </div>

                        <div class="body">
                              <div class="row clearfix">
                                @if(count($data) > 0)
                                <?php
                                $total_rows = 1;
                                ?>
                                @foreach($data as $values)
                                <div class="col-md-4">
                                    <h4 style="float: left;">{{$values->username}}</h4> <h5 class="text-right" style="float: right; margin-right: 15px;"> <i class="fa fa-ellipsis-v" aria-hidden="true"></i> <?=$total_rows?> </h5>
                                    <div class="admin-dashboard-table table-responsive">
                                        <table id="mainTable" class="table table-hover table-striped table-bordered">
                                            <tbody>
                                               
                                                <tr>
                                                    <td>Email </td>
                                                    <td>
                                                        {{$values->email}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile no </td>
                                                    <td>
                                                        {{$values->mobile_no}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Type </td>
                                                    <td>
                                                        {{$values->type}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status </td>
                                                    <td>
                                                        {{$values->status}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan= "2">
                                                        <a href="{{ route('admin.customer.destroy', $values->id) }}" class=" btn-warning" onclick="return confirm('Are you sure to Cancel?')">Cancel</a>
                                                        <a href="{{ route('admin.customer.deletes', $values->id) }}" class=" btn-danger" onclick="return confirm('Are you sure to Delete?')">Delete</a>
                                                        <a href="{{ route('admin.customer.show', $values->id) }}" class="btn-success">Show</a>
                                                        <a href="{{ route('admin.customer.edit', $values->id) }}" class="btn-primary">Edit</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>                                   
                                </div>
                                                   <?php
                                                         $total_rows++;
                                                    ?>
                                                    @endforeach
                                                @endif
                                
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

