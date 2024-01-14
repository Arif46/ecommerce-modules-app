@extends('Admin::layouts.master')
@section('body')
<section class = "content" >
    <div class="container-fluid">

        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-8">
                    <h2>All Brands</h2>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                        <li><a href="{{route('admin.color.index')}}">Color</a></li>
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
                                        Color List
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.color.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.color.create')}}" class="btn btn-primary">Add Color</a>
                                </div>
                            </div>
                        </div>

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-12 table-responsive">
                                <div class="admin-dashboard-table">

                                    <table id="mainTable" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th> Title </th>
                                                <th> Color </th>
                                                <th> Action </th>

                                            </tr>
                                    </thead>

                                    <tbody>
                                      @if(!empty($data) )
                                       <?php
                                       $total_rows = 1;
                                       ?>
                                       @foreach($data as $values)
                                           <tr>
                                            <td>{{$total_rows }}</td>
                                            <td>
                                            {{$values->title}}
                                            </td>

                                            <td>
                                                @if(isset($values->color_code))
                                                     <span style="background-color:#{{$values->color_code}}; padding:5px 10px; "> &nbsp; </span>
                                                @else
                                                    <span style="background-color:{{$values->slug}}; padding:5px 10px; "> &nbsp; </span>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <a href="{{ route('admin.color.show', $values->id) }}" class="btn btn-primary">show</a>
                                                <a href="{{ route('admin.color.edit', $values->id) }}" class="btn btn-info" >Edit</a>
                                            </td>

                                            
                                        </tr>
                                        <?php
                                        $total_rows++;
                                        ?>
                                        @endforeach
                                      @endif

                                    </tbody>
                                    </table>
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div> </section>

@endsection
