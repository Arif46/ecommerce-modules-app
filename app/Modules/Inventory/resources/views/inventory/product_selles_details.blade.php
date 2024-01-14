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
                                                    <th> SL</th>
                                                    <th> Product Name </th>
                                                    <th> Shop Name(Seller)</th>
                                                    <th> Category </th>
                                                    <th> Brand </th>
                                                    <th> Color </th>
                                                    <th> Size </th>
                                                    <th> Number of Sell</th>
                                                    <th> Amount </th>
                                                    
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
                                                        @if(isset($values->product_id))
                                                         {{ InventoryHelper::productName( $values->product_id)}}
                                                        @endif   
                                                    </td>
                                                    
                                                    <td>
                                                        @if(isset($values->product_seller_id))
                                                         {{$values->product_seller_id}}
                                                        @endif   
                                                    </td>
                                                    <td>
                                                        @if(isset($values->category_id))
                                                         {{$values->category_id}}
                                                        @endif   
                                                    </td>
                                                    <td>
                                                        @if(isset($values->brand_id))
                                                         {{$values->brand_id}}
                                                        @endif   
                                                    </td>

                                                     <td>
                                                        @if(isset($values->color))
                                                         {{$values->color}}
                                                        @endif   
                                                    </td>
                                                     <td>
                                                        @if(isset($values->size))
                                                         {{$values->size}}
                                                        @endif   
                                                    </td>
                                                    
                                                    

                                                    <td>
                                                        @if(isset($values->pro_quantity))
                                                         {{$values->pro_quantity}} Unit
                                                        @endif   
                                                    </td>

                                                    <td>
                                                        @if(isset($values->pro_price))
                                                         {{$values->pro_price}} BDT
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

