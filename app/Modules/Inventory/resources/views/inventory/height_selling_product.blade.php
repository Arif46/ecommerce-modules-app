@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-10 col-sm-12">
                        {!! Form::open(['method' =>'GET', 'route' => 'inventory.height.selling.product', 'id'=>'', 'class' => '']) !!}
                        
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::Select('product_id',$proList,Request::old('product_id'),['id'=>'product_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::Select('user_id',$sellerList,Request::old('user_id'),['id'=>'user_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>
                              <div class="col-md-4">
                                {!! Form::Select('category_id',$catList,Request::old('category_id'),['id'=>'category_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>                            
                        </div>

                        <div class="row">
                           
                            <div class="col-md-4">
                                

                                {!! Form::Select('brand_id',$brandList,Request::old('brand_id'),['id'=>'brand_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>
                            <div class="col-md-4">

                                <input type="datetime-local" class="form-control search-input"  name="from_date" placeholder="From Date"> 
                                
                            </div>

                            <div class="col-md-4">
                                  <input type="datetime-local" class="form-control search-input"  name="to_date">
                                <button type="submit" class="admin-search">
                                    <span class="ti-search"></span>
                                </button>
                            </div>
                            
                        </div>
                        {!! Form::close() !!}
                    </div>                                   

                                
                            
                    <div class="col-md-2">
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
                                                         <a target="_blank" href="{{ route('inventory.single.product.report', $values->product_id) }}" class="btn" title="Single product report">
                                                         {{ InventoryHelper::productName( $values->product_id)}}
                                                     </a>
                                                        @endif   
                                                    </td>
                                                    
                                                    <td>
                                                        @if(isset($values->product_seller_id))
                                                         <a target="_blank" href="{{ route('inventory.height.selling.product.by.seller', $values->product_seller_id) }}"  title="Seller wise report">
                                                         {{InventoryHelper::shopName($values->product_seller_id)}}
                                                     </a>
                                                        @endif 


                                                    </td>
                                                    <td>
                                                        @if(isset($values->category_id))
                                                        <a target="_blank" href="{{ route('inventory.height.selling.product.by.cat', $values->category_id) }}" class="btn btn-primary" title="Category wise report">
                                                         {{InventoryHelper::catName($values->category_id)}}
                                                        </a>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if(isset($values->brand_id))
                                                         {{InventoryHelper::brandName($values->brand_id)}}
                                                        @endif  
                                                        
                                                        @if(isset($values->brand_id))
                                                         {{$values->brand_id}}
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

