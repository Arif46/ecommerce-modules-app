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
                        <li><a href="javascript:void(0);">AdminSellerPayment</a></li>
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
                                        AdminSellerPayment List
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.seller.payment.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.seller.payment.create')}}" class="btn btn-primary">Create Payment</a>
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
                                                <th> Received No </th>
                                                <th> Seller </th>
                                                <th> From (Person) </th>
                                                <th> Amount</th>
                                                <th> Pay By</th>
                                                <th> Special Instruction</th>
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
                                            <td><?php echo $total_rows; ?></td>
                                            <td>
                                                @if(isset($values->received_no))
                                            {{$values->received_no}}
                                            @endif

                                            </td>
                                            <td>
                                                @if(isset($values->seller_id))
                                            {{InventoryHelper::shopName($values->seller_id)}}
                                            @endif

                                            </td>
                                            <td>@if( isset($values->admin_id) && $values->admin_id ==1)

                                                Admin
                                                @endif    
                                            </td>
                                            <td>{{$values->amount}}</td>
                                            <td>
                                                @if( isset($values->pay_by) && $values->pay_by ==1)
                                                Cash
                                                @endif</td>
                                            <td>{{$values->special_instruction}}</td>  
                                            <td>
                                                <a href="{{ route('admin.seller.payment.show', $values->id) }}" class="btn btn-primary">show</a>

                                                
                                                @if(isset($values->approve_or_reject) && $values->approve_or_reject != 1)
                                                <a href="{{ route('admin.seller.payment.edit', $values->id) }}" class="btn btn-info" >Edit</a>
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
