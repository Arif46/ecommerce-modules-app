@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Assign OR unassign attributes for `{{$data->title}}` attribute set</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="{{ route('admin.attribute.set.index') }}">Attribute Set</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="body">

                            <div class="row">
                                <div class="col-md-12">
                                    @if(Session::has('message'))
                                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <p style="margin-bottom: 10px;color: #96980a;">N.B. Please select checkbox to
                                        assigned OR unassigned attribute. If you want to add more attribute & their
                                        value, please <a target="_blank" href="{{route('admin.attribute.index')}}"
                                                         style="color: #364553;">Click</a> here.</p>
                                </div>

                                <div class="col-md-6">

                                    <h4>Unassigned Attribute</h4>

                                    {!! Form::open(['route' => 'admin.attribute.set.items.assigned.store',  'files'=> true, 'class' => 'form-horizontal']) !!}

                                    <input type="hidden" name="attribute_set_id" value="{{$data->id}}">

                                    <div class="table-responsive" style="position: relative;">

                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <th>#</th>
                                            <th>Backend Title</th>
                                            <th>Frontend Title</th>
                                            <th>Type</th>
                                            </thead>

                                            <tbody>

                                            @if(count($attribute_list) > 0)
                                                @foreach($attribute_list as $attribute)

                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="unassigned_attr[]"
                                                                   value='{{$attribute->id}}'
                                                                   style="opacity: 1;left:20px;">
                                                        </td>
                                                        <td>
                                                            {{$attribute->backend_title}}
                                                        </td>
                                                        <td>
                                                            {{$attribute->frontend_title}}
                                                        </td>
                                                        <td>
                                                            {{$attribute->type}}
                                                        </td>

                                                    </tr>

                                                @endforeach
                                            @endif

                                            </tbody>

                                        </table>

                                        <div class="col-md-12">
                                            {!! Form::submit('Assigned', ['class' => 'btn btn-primary pull-right']) !!}
                                            &nbsp;
                                        </div>

                                    </div>

                                    {!! Form::close() !!}

                                </div>


                                <div class="col-md-6 ">

                                    <h4>Assigned Attribute</h4>

                                    {!! Form::open(['route' => 'admin.attribute.set.items.unassigned.store',  'files'=> true, 'class' => 'form-horizontal']) !!}

                                    <input type="hidden" name="attribute_set_id" value="{{$data->id}}">

                                    <div class="table-responsive" style="position: relative;">

                                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Backend Title</th>
                                                <th>Frontend Title</th>
                                                <th>Type</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @if(count($asssigned_attribute) > 0)
                                                @foreach($asssigned_attribute as $attribute)

                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="assigned_attr[]"
                                                                   value="{{$attribute->id}}"
                                                                   style="opacity: 1;left:20px;">
                                                        </td>
                                                        <td>
                                                            {{$attribute->relAttribute->backend_title}}
                                                        </td>
                                                        <td>
                                                            {{$attribute->relAttribute->frontend_title}}
                                                        </td>
                                                        <td>
                                                            {{$attribute->relAttribute->type}}
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            @endif

                                            </tbody>
                                        </table>
                                        <div class="col-md-12">
                                            {!! Form::submit('Unassigned', ['class' => 'btn btn-warning pull-right btn-sm font-10 m-t-15','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}
                                            &nbsp;
                                        </div>

                                    </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection