@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>All Coupon</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Coupon</a></li>
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
                                <div class="col-md-6">
                                    <h2>
                                        Coupon
                                    </h2>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{route('admin.coupon.create')}}" class="btn btn-primary">Add coupon</a>
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
                                                <th> Coupon Name </th>
                                                <th> Coupon Code </th>
                                                <th> Coupon Details </th>
                                                <th> Amount </th>
                                                <th> Validity </th>
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
                                                            <strong>
                                                                English :
                                                            </strong>
                                                            {{$values->coupon_name}} <br>

                                                            @isset($values->coupon_name_bn)
                                                                <strong>
                                                                    Bangla :
                                                                </strong>
                                                                {{$values->coupon_name_bn}} <br>
                                                            @endisset

                                                            @isset($values->coupon_name_bn)
                                                                <strong>
                                                                    Hindi :
                                                                </strong>
                                                                {{$values->coupon_name_hi}} <br>
                                                            @endisset

                                                            @isset($values->coupon_name_ch)
                                                                <strong>
                                                                    Chinese :
                                                                </strong>
                                                                {{$values->coupon_name_ch}}
                                                            @endisset

                                                        </td>
                                                        <td>
                                                            {{$values->coupon_code}}
                                                        </td>
                                                        <td>
                                                            {!! $values->coupon_details !!}
                                                        </td>
                                                        <td>
                                                            {!! $values->amount !!}
                                                        </td>
                                                        <td>
                                                            Valid from: {!! $values->valid_from !!}
                                                            Valid to: {!! $values->valid_to !!}
                                                        </td>
                                                        <td>
                                                            {{$values->status}}
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('admin.coupon.edit', $values->id) }}" class="btn btn-info" >Edit</a>
                                                            <a href="{{ route('admin.coupon.destroy', $values->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" >Delete</a>
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

