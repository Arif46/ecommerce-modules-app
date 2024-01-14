@extends('Seller::webseller.seller_master')
@section('body')

	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-dark">
	    <div class="container">
	        <nav aria-label="breadcrumb">
	            <ul class="breadcrumb">
	                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	                <li class="breadcrumb-item active" aria-current="page">Product</li>
	            </ul>
	        </nav>
	    </div>
	</div>

	<div class="my-account-area pb-50 pt-40">
        <div class="container-fluid">
            <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2" style="margin-bottom: 20px;">
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>
                            <h3>Product List</h3>                           
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 offset-md-3 mb-0 mt-0">
	              	
	                    <span> {!! Form::open(['method' =>'GET', 'route' => 'seller.product.search', 'id'=>'', 'class' => '']) !!}
	                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Search Product']) !!}
	                                        <button type="submit" class="admin-search">
	                                            <i class="fa fa-search" aria-hidden="true"></i>
	                                        </button>
	                                        {!! Form::close() !!}
	                	</span>
            		</div>
            		<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="product-area text-center">
						    <div class="container">
						    	<!--  <div class="row grid" data-show="20" data-load="8"> -->
						        <div class="row">
						            @if(!empty($product))
						            <?php
						             $total_rows = 1;
						             ?>
						            @foreach($product as $values)
						            <div class="col-lg-3 col-md-3 col-sm-12 item-hidden grid-item">
						                <div class="product-item">
						                	<div class="pro_link">
						                		<a class="btn btn-info" href="{{ route('seller.product.edit',$values->id) }}"> Update</a>
										        	
										        	<a class="btn btn-primary" href="{{ route('seller.product.details', $values->id) }}">View</a>
							                        
							                          <a class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" href="{{ route('seller.product.delete',$values->id) }}">Delete</a>
						                	</div>
						                    <div class="product-image-hover zoom-hover" style="max-height: 220px;">
						                        @if($values->batch =='sold')
						                        <span class="sold">Sold</span>
						                        @endif
						                        @if($values->batch =='new')
						                        <span class="new">New</span>
						                        @endif
						                        @if($values->batch =='stock-out')
						                        <span class="stock">Stock Out</span>
						                        @endif
						                        @if($values->batch =='sale')
						                        <span class="sale">Sale</span>
						                        @endif
						                        <a href="{{ route('seller.product.edit',$values->id) }}">
						                            @if(isset($values->relProductImage) && !empty($values->relProductImage))
						                            @foreach($values->relProductImage as $product_image)
						                            <img class="img-fluid img-responsive" src="{{URL::to($product_image->image_link)}}/thumbnail/{{$product_image->image}}" style="margin-right: 15px;">
						                            @break
						                            @endforeach
						                            @endif
						                        </a>
						                    </div>
						                    <div class="product-text" style="padding:0px 0px; border-bottom: 1px solid #d7d7d7; padding-bottom: 5px;">
						                        <h4><a target="_blank" href="{{ route('seller.product.details', $values->id) }}">{{$values->title}}</a></h4>
						                        <p><span style="color:#202020;">@if(isset($values->relProductCategory))
						                            @foreach($values->relProductCategory as $category_rel)
						                            @if(isset($category_rel->relCategory))
						                            {{$category_rel->relCategory->title}},
						                            @endif
						                            @endforeach
						                            @endif</span> <span style="color:#202020;">/ {{$values->status}}</span>
						                        </p>
						                        <p></p>                       
						                        <div class="product-price"><span>৳ {{number_format($values->sell_price,2)}}</span>
						                        </div>
						                    </div>
						                </div>
						            </div>
						            <?php
						                    $total_rows++;
						                    ?>
						            @endforeach
						            @endif
						        </div>
						    </div>

						</div>
                    </div>
              <!--       <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pro-load-more load-more-border text-center mt-20">
                                <a class="load-more-toggle default-btn btn-hover" href="#">Load More</a>
                    </div>
                    </div> -->
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-20">
                    	{{ $product->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add New category</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <?php $url = route('seller.product.store'); ?>
          {!! Form::open(array('url' => $url, 'method' => 'post', 'id'=>'')) !!}

	      <div class="modal-body">
	      		
      		<div class="form-fields">
      			<p>
      				

	                {!! Form::label('category_id', 'Category', array('class' => '')) !!} <span class="required"> *</span>

	                {!! Form::Select('category_id', $category_lists ,Request::old('category_id'),['id'=>'', 'class'=>'', 'required'=>'required']) !!}
	                <span class="error">{!! $errors->first('category_id') !!}</span>

	                <input type="hidden" name="attribute_set_id" id="attribute_set_id" value="1">
	                <input type="hidden" name="type" id="type" value="simple-product">
	                <input type="hidden" name="status" id="status" value="inactive">
	                <input type="hidden" name="seller_id" id="seller_id" value="{{Auth::user()->id}}">
      			</p>
      			<p>
      				<button type="submit" class="btn btn-primary float-right">Add New</button>
      			</p>
      		</div>

	      </div>
	      
	      {!! Form::close() !!}
	    </div>
	  </div>
	</div>
    
@endsection