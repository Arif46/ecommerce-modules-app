@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>All Payment Options</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Payment Options</a></li>
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
                                        Payment Options List                        
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                       
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.payment.options.create')}}" class="btn btn-primary">Add payment options</a>                                      
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
                                                    <th> Account Number</th>
                                                    <th> Account Details</th>
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
                                                            
                                                             <img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$values->payment_type]}}.png" height="50" style="height:50px !important; " />
                                                        </td>
                                                        <td>
                                                            {{$values->account_number}}
                                                        </td>
                                                        <td>
                                                            {!! $values->account_details !!}
                                                        </td>
                                                        <td>
                                                            {{$values->status}}
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="{{ route('admin.payment.options.show', $values->id) }}" class="btn btn-primary">Show</a>
                                                            <a href="{{ route('admin.payment.options.edit', $values->id) }}" class="btn btn-info" >Edit</a>
                                                            <a href="{{ route('admin.payment.options.destroy', $values->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" >Delete</a>
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

