@extends('Admin::layouts.master')
@section('body')
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-8">
                    <h2>All Attribute</h2>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.attribute.index') }}">Atribute</a></li>
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
                                       Color & Size                    
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.attribute.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.attribute.create')}}" class="btn btn-primary">Add Attribute</a>                                      
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
                                                <th>Serial No</th>
                                                <th> FrondEnd Title </th>                            
                                                <th> Backend Title </th>                            
                                                <th> Code Column </th>
                                                <th> Type </th>
                                                <th> Is Required </th>
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
                                                        {{$values->frontend_title}}
                                                    </td>
                                                    
                                                     <td>
                                                        {{$values->backend_title}}
                                                    </td>
                                                    
                                                    <td>
                                                        {{$values->code_column}}
                                                    </td>
                                                    <td>
                                                        {{$values->type}}
                                                    </td>
                                                    <td>
                                                        {{$values->type_is_required}}
                                                    </td>
                                                    
                                                    <td>
                                                        {{$values->status}}
                                                    </td>                                                    

                                                    <td>
                                                        <a href="{{ route('admin.attribute.show', $values->id) }}" class="btn btn-primary">Show</a>
                                                        <a href="{{ route('admin.attribute.edit', $values->id) }}" class="btn btn-info" >Edit</a>
                                                        <a href="{{ route('admin.attribute.destroy', $values->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" >Delete</a>
                                                        @if($values->type == 'checkbox')
                                                            <a href="{{ route('admin.attribute.option', $values->id) }}" class="btn btn-warning" >Attribute Value</a>
                                                        @endif
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

