@extends('Admin::layouts.master')
@section('body')

<?php
    use Illuminate\Support\Facades\Input;
?>
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>{{$user_data->shop_name}} shop products</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                            <li><a href="javascript:void(0);">Product</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Filter for data -->

     <!-- Table list for data -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <h2>
                                All Product List                        
                            </h2>
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
                                          <th scope="col">#</th>
                                          <th scope="col">Item No</th>
                                          <!-- <th scope="col">Attribute</th> -->
                                          <th scope="col">Cetegory</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Sell Price</th>
                                          <th scope="col">Old Price</th>
                                          <th scope="col">Stock</th>             
                                          <th scope="col">Status</th>
                                          <th scope="col">Featured</th> 
                                          <th scope="col">Type</th>
                                          <th scope="col">Images</th>               
                                          <th scope="col">Action</th>
                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if(!empty($data))
                                           <?php
                                                 $total_rows = 1;
                                           ?>
                                           @foreach($data as $values)
                                           <tr>
                                                <td scope="row"> <?=$total_rows?></td>
                                                 <td>{{$values->item_no}}</td>
                                                <!-- <td>
                                                    @if(isset($values->relProductAttributeSet) && !empty($values->relProductAttributeSet))
                                                        {{$values->relProductAttributeSet->title}}
                                                    @endif
                                                </td> -->
                                                <td>
                                                    @if(isset($values->relProductCategory))
                                                        @foreach($values->relProductCategory as $category_rel)
                                                            @if(isset($category_rel->relCategory))
                                                                {{$category_rel->relCategory->title}}, 
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </td> 
                                               
                                                <td>{{$values->title}}</td>
                                                <td>{{$values->sell_price}}</td>
                                                <td>{{$values->old_price}}</td>
                                                <td>{{isset($values->relProductInventory->quantity)?ucfirst($values->relProductInventory->quantity):''}}</td>
                                                <td>{{$values->status}}</td>
                                                <td>{{$values->is_featured}}</td>
                                                @if($values->type=='simple-product')
                                                 <td>Regular </td>
                                                 @elseif($values->type=='group-product')
                                                 <td>Offer </td>
                                                 @elseif($values->type=='configurable-product')
                                                 <td>Trending </td>
                                                @endif
                                                <td>
                                                     @if(isset($values->relProductImage) && !empty($values->relProductImage))
                                                            @foreach($values->relProductImage as $product_image)
                                                                <img  width="100" class="img-fluid img-responsive" src="{{URL::to($product_image->image_link)}}/thumbnail/{{$product_image->image}}" style="margin-right: 15px;">
                                                                @break
                                                            @endforeach
                                                        @endif
                                                </td>
                                               
                                                <td>
                                                    <a target="_blank" href="{{ route('admin.product.show', $values->id) }}" class="btn btn-primary" >Show</a>

                                                    <a href="{{ route('admin.product.featured', $values->id) }}" onclick="return confirm('Are you sure to <?=$values->is_featured=='yes'?'Unfeatured':'Featured'?> this product?')" class="btn btn-primary" ><?=$values->is_featured=='yes'?'Unfeatured?':'Featured?'?></a>

                                                    @if($values->status!=="active") 
                                                        <a href="{{ route('admin.product.confirm_product', $values->id) }}" onclick="return confirm('Are you sure to Active?')" class="btn btn-primary" >Active</a>
                                                    @endif 
                                                    
                                                    @if($values->status!="cancel") 
                                                    
                                                        @if($values->status!="inactive") 
                                                            <a href="{{ route('admin.product.confirm_product', $values->id) }}" onclick="return confirm('Are you sure to Inactive?')" class="btn btn-primary" >Inactive</a>
                                                        @endif

                                                        <a href="{{ route('admin.product.destroy', $values->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" >Delete</a>


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
                <div class="footer">
                 {{$data->links()}}
                </div>
            </div>
        </div>
    </div>

    </div>
    </section>

              

@endsection

