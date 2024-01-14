@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-3">
                        <h2>Seller Summary</h2>
                    </div>
                    
                               
                    <div class="col-md-6 col-sm-12">
                        {!! Form::open(['method' =>'GET', 'route' => 'inventory.seller.summary.list', 'id'=>'', 'class' => '']) !!}
                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Search by Shop Name\Username\Mobile\Email']) !!}
                        <button type="submit" class="admin-search">
                            <span class="ti-search">
                        </button>
                        {!! Form::close() !!}
                    </div>                                   

                                
                            
                    <div class="col-md-3">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                            <li><a href="javascript:void(0);">Seller</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Table list for data -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="header">
                            
                          
                            
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12 table-responsive">
                                    <div class="admin-dashboard-table">

                                        <table id="mainTable" class="table table-hover table-striped table-bordered">
                                            <thead class="bg-blue-grey">
                                                <tr>
                                                    <th> #</th>
                                                    <th> Shop </th>
                                                    <th> Shop Address</th>
                                                    <th> Contact  </th>
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
                                                        @if(isset($values->shop_name))
                                                         Shop: {{$values->shop_name}}
                                                        @endif 

                                                        @if(isset($values->username))
                                                           <br/>Username: {{$values->username}}
                                                        @endif          
                                                    </td>

                                                    

                                                    <td>
                                                        @if(isset($values->shop_address))
                                                            {{$values->shop_address}}
                                                        @endif          
                                                    </td>
                                                    <td>
                                                       Email: {{$values->email}}<br>
                                                       Mobile: {{$values->mobile_no}}
                                                    </td>
                                                    
                                                    
                                                    <td>
                                                        <a href="{{ route('admin.all.seller.product.index', $values->id) }}" class="btn btn-primary">Products</a>
                                                        <a href="{{ route('admin.all.seller.order.index', $values->id) }}" class="btn btn-info" >Orders</a>
                                                        <a href="{{ route('admin.all.seller.payment.index', $values->id) }}" class="btn btn-info" >Pending Order</a>

                                                        @if(InventoryHelper::pendingProductCount($values->id)>0)
                                                        <a class="btn btn-danger"  style="color: #ff0000;"> 
                                                            Pending Pro: {{InventoryHelper::pendingProductCount($values->id) }}
                                                        </a>
                                                        @endif 

                                                        @if(InventoryHelper::stockOutProduct($values->id)>0)

                                                          {{isset($values->relProductInventory->quantity)?ucfirst($values->relProductInventory->quantity):''}}  

                                                        <a class="btn btn-danger"  style="color: #ff0000;"> 
                                                            Stock Out: {{InventoryHelper::stockOutProduct($values->id) }}
                                                        </a>
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

