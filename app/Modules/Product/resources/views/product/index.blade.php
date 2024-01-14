@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Products</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Product</a></li>
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
                                <div class="col-md-2 col-sm-12">
                                    <h2>
                                        Product                         
                                    </h2>
                                </div>
                                    <div class="col-md-3 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.product.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-7 col-sm-12 text-right">
                                        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Product</a>
                                        <a href="{{ route('admin.product.active') }}" class="btn btn-primary">Active Product</a>
                                        <a href="{{ route('admin.product.inactive') }}" class="btn btn-info">Inactive Product</a>
                                        <a href="{{ route('admin.product.cancel') }}" class="btn btn-danger">Cancel Product</a>                                      
                                </div>
                            </div>
                        </div>

                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="admin-dashboard-table  table-responsive ">

                                <table id="mainTable" class="table table-hover table-striped table-bordered">
                                    <thead class="bg-blue-grey">
                                       
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Item No</th>
                                              <th scope="col">Shop Name</th>
                                              <th scope="col">Cetegory</th>
                                              <th scope="col">Title</th>
                                              <th scope="col">Sell Price</th>
                                              <th scope="col">Old Price</th>
                                              <th scope="col">Stock</th>             
                                              <th scope="col">Status</th>
                                              
                                              <th scope="col">Type</th>
                                              <th scope="col">Images</th>
                                              <th scope="col">Featured</th>                
                                              <!-- <th scope="col">Action</th> -->
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
                                                 <td>{{$values->item_no}}</td>
                                                <td>
                                                    @if(!empty($values->relSellerProfiles))
                                                        {{$values->relSellerProfiles->shop_name}}
                                                    @endif
                                                </td>
                                                <td>
                                                        @if(isset($values->relProductCategory))
                                                            @foreach($values->relProductCategory as $category_rel)
                                                                @if(isset($category_rel->relCategory))
                                                                    {{$category_rel->relCategory->title}}, 
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td> 
                                                <td>
                                                    <strong>English :</strong>{{$values->title}} <br>
                                                    @isset($values->title_bn)
                                                        <strong>Bangla :</strong>{{$values->title_bn}}<br>
                                                    @endisset
                                                    @isset($values->title_hi)
                                                        <strong>Hindi :</strong>{{$values->title_hi}}<br>
                                                    @endisset
                                                    @isset($values->title_ch)
                                                        <strong>Chinese :</strong>{{$values->title_ch}}
                                                    @endisset
                                                </td>
                                                
                                                 <td>{{number_format($values->sell_price,2)}}</td>
                                                 <td>{{number_format($values->list_price,2)}}</td>
                                                    <td>{{isset($values->relProductInventory->quantity)?ucfirst($values->relProductInventory->quantity):''}}</td>
                                                    <td>{{$values->status}}</td>
                                                    
                                                    @if($values->type=='simple-product')
                                                     <td>Regular </td>
                                                     @elseif($values->type=='group-product')
                                                     <td>Offer</td>
                                                     @elseif($values->type=='configurable-product')
                                                     <td>Fastival </td>
                                                    @endif  
                                                <td>
                                                    
                                                     @if(isset($values->relProductImage) && !empty($values->relProductImage))
                                                            @foreach($values->relProductImage as $product_image)
                                                                <img  width="100" class="img-fluid img-responsive" src="{{URL::to($product_image->image_link)}}/thumbnail/{{$product_image->image}}" style="margin-right: 15px;">
                                                                @break
                                                            @endforeach
                                                        @endif
                                                </td>
                                                <td>{{$values->is_featured}}</td>
                                                </tr>
                                                <tr>
                                                <td colspan="12">                                                  
                                                    <a href="{{ route('admin.product.show', $values->id) }}" class="btn btn-primary" >Show</a>

                                                    <a href="{{ route('admin.product.edit', $values->id) }}" class="btn btn-info" >Edit</a>

                                                    <a href="{{ route('admin.product.featured', $values->id) }}" onclick="return confirm('Are you sure to <?=$values->is_featured=='yes'?'Unfeatured':'Featured'?> this product?')" class="btn btn-primary" ><?=$values->is_featured=='yes'?'Unfeatured?':'Featured?'?></a>

                                                    @if(isset($values->relProductInventory->quantity)?ucfirst($values->relProductInventory->quantity):'' !=="0") 
                                                        <a href="{{ route('admin.product.stockout', $values->id) }}" onclick="return confirm('Are you sure to Update?')" class="btn btn-primary" >Stock</a>
                                                        @else
                                                        <a href="{{ route('admin.product.stockout', $values->id) }}" onclick="return confirm('Are you sure to Update?')" class="btn btn-primary" >Stock Out</a>
                                                    @endif 

                                                    @if($values->status!=="active") 
                                                        <a href="{{ route('admin.product.confirm_product', $values->id) }}" onclick="return confirm('Are you sure to Active?')" class="btn btn-primary" >Inactive</a>
                                                    @endif 
                                                    @if($values->status!="cancel") 
                                                    
                                                        @if($values->status!="inactive") 
                                                            <a href="{{ route('admin.product.confirm_product', $values->id) }}" onclick="return confirm('Are you sure to Inactive?')" class="btn btn-primary" >Active</a>
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

                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            {{$data->links()}}
                        </div>                        
                    </div>
                </div>

            </div>
        </div>
    </div>

        </div>
    </section>

   
</div>
                

@endsection

