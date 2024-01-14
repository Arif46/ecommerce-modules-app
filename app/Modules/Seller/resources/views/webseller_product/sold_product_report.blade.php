@extends('Seller::webseller.seller_master')
@section('body')

	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-dark">
	    <div class="container">
	        <nav aria-label="breadcrumb">
	            <ul class="breadcrumb">
	                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	                <li class="breadcrumb-item active" aria-current="page">Product Report</li>
	            </ul>
	        </nav>
	    </div>
	</div>
	<!-- Breadcrumb Area End -->

	<div class="my-account-area ptb-80">
        <div class="container-fluid">
            <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">                     
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>                  
                            <h3>Product Report</h3>                           
                        </div>
                    </div>
	            	<div class="col-lg-12 col-md-12 col-sm-12">
	                    <div class="form-fields">
	                        <div class="about-skill-area">
							
	                            <div class="cart-main-area">
		                        	<div class="cart-table table-responsive">                         

		                        		<table class="table table-bordered table-striped">
										  <thead>
										    <tr>
										      <th scope="col">#</th>
										      <th scope="col">Item No</th>			     
										      <th scope="col">Cetegory</th>
										      <th scope="col" style="width: 220px;">Name</th>
								              <th scope="col">Sell Price</th>
										      <th scope="col">Stock</th>
											  <th scope="col">Images</th>
										    </tr>
										  </thead>
										  <tbody>
										  	@if(!empty($sold_product))
											  	<?php
											  		$total_rows = 1;
											  	?>
											  	@foreach($sold_product as $values)
											  		
											    <tr>
											        <th scope="row"> <?=$total_rows?></th>
											         <td>{{$values->item_no}}</td>											       
											        <td>
											        	@if(isset($values->relProductCategory))
											        		@foreach($values->relProductCategory as $category_rel)
											        			@if(isset($category_rel->relCategory))
											        				{{$category_rel->relCategory->title}}, 
											        			@endif
											        		@endforeach
											        	@endif
											        </td> 
											       
											        <td>{{$values->title}} <?php //dd($values); ?></td>
											        <td>{{$values->price}}</td>											      	
								                    <td>{{isset($values->relProductInventory->quantity)?ucfirst($values->relProductInventory->quantity):''}}</td>
											       
											        <td>
											        	 @if(isset($values->relProductImage) && !empty($values->relProductImage))
	                                                            @foreach($values->relProductImage as $product_image)
	                                                                <img  width="100" class="img-fluid img-responsive" src="{{URL::to($product_image->image_link)}}/thumbnail/{{$product_image->image}}" style="margin-right: 15px;">
	                                                              	@break
	                                                            @endforeach
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
									{{ $sold_product->links() }}
		                        	</div>
		                        </div>

	                        </div>
	                    </div>
	                </div>
            </div>
        </div>
    </div>

    
@endsection