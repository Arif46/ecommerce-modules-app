@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>All Shiiping Options</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Shipping Options</a></li>
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
                                        Shipping Options List
                                    </h2>
                                </div>
                                <div class="col-md-6 col-sm-12">

                                </div>

                                <div class="col-md-3 text-right">
                                    <a href="{{route('admin.shipping.options.create')}}" class="btn btn-primary">Add
                                        shipping options</a>
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
                                                <th> Type</th>
                                                <th> Value</th>
                                                <th> Courier Servics</th>
                                                <th> Courier Details</th>
                                                <th> Condition</th>
                                                <th> Status</th>
                                                <th> Action</th>

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
                                                            {{$values->shipping_type}}
                                                        </td>
                                                        <td>
                                                            {{$values->shipping_value}}
                                                        </td>
                                                        <td>
                                                            {!! $values->courier_service !!}
                                                        </td>
                                                        <td>
                                                            {!! $values->courier_details !!}
                                                        </td>
                                                        <td>
                                                            {{$values->conditional}}
                                                        </td>
                                                        <td>
                                                            {{$values->status}}
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('admin.shipping.options.edit', $values->id) }}"
                                                               class="btn btn-info">Edit</a>
                                                            <a href="{{ route('admin.shipping.options.destroy', $values->id) }}"
                                                               class="btn btn-danger"
                                                               onclick="return confirm('Are you sure to Delete?')">Delete</a>
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

