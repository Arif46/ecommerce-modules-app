@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            
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

