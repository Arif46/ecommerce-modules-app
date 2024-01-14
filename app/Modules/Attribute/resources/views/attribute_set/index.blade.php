@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>All Attribute Set</h2>
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
                                <div class="col-md-3 col-sm-12">
                                    <h2>
                                        Attribute Set List                        
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.attribute.set.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.attribute.set.create')}}" class="btn btn-primary">Add Attribute Set</a>                                      
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
                                                    <th> Title </th>
                                                    <th> Slug </th>
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
                                                                {{$values->slug}}
                                                            </td>
                                                            <td>
                                                                {{$values->status}}
                                                            </td>
                                                            <td>
                                                                
                                                                <a href="{{ route('admin.attribute.set.show', $values->id) }}" class="btn btn-primary">Show</a>
                                                                <a href="{{ route('admin.attribute.set.edit', $values->id) }}" class="btn btn-info" >Edit</a>
                                                                <a href="{{ route('admin.attribute.set.destroy', $values->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" >Delete</a>
                                                                <a type="button" href="{{ route('admin.attribute.set.items', $values->id) }}" class="btn btn-warning" >
                                                                   Assign attribute items
                                                                </a>
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

