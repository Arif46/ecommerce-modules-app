@extends('Web::layouts.master')

@section('body')

    <!-- breadcrumb area -->
        <div class="breadcrumb-area bg-img pt-50 pb-50 default-overlay-2" style="background-image: url('{{ asset('frontend/assets/img/bg/bg-pro3.jpg') }}');">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2> New Arrivals </h2>
                    
                </div>
            </div>
        </div>
    <!-- breadcrumb area end-->
    <!-- category area Start-->
        <div class="category-style pt-50 pb-0">
           
        </div>
    <!-- Product Area Start -->
	    <div class="product-area text-center pt-0 pb-95">
	        <div class="container">
	            <div class="section-title">
                    <span>New Arrivals</span>
	                <h2><span>Latest Product</span></h2>
	            </div>
	        </div>
	        <div class="container">                
                <div class="row grid" data-show="20" data-load="8">
                            @if(!empty($new_arrivals))
                                @foreach($new_arrivals as $new_pro)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-6 item-hidden grid-item">
                                    <div class="product-item">
                                        <div class="product-image-hover zoom-hover">
                                        @if($new_pro->batch =='sold') 
                                        <span class="sold">Sold</span>
                                        @endif
                                        @if($new_pro->batch =='new') 
                                        <span class="new">New</span>
                                        @endif
                                        @if($new_pro->batch =='stock-out') 
                                        <span class="stock">Stock Out</span>
                                        @endif
                                        @if($new_pro->batch =='sale') 
                                        <span class="sale">Sale</span>
                                        @endif
                                            <a href="{{route('product.slug',['slug' => $new_pro->product_slug])}}" class="img-fitto">
                                                <img class="primary-image img-responsive img-fluid" src="{{URL::to('uploads/product/'.$new_pro->product_id.'/thumbnail/'.$new_pro->image)}}" alt="">
                                            </a>
                                            <div class="product-hover">                                          
                                                <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$new_pro->product_id}}" class="add_to_wishlist shop-wishlist" href="#"><i class="icon icon-Heart"></i></a>
                                                <a class="shop-now-btn shop-card" href="{{route('product.slug',['slug' => $new_pro->product_slug])}}"><i class="icon icon-FullShoppingCart"></i> Buy Now</a>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="product-rating">
                                                <?php
                                                                    for($i=1;$i<=5;$i++){
                                                                        if($i <=$new_pro->average_review) {
                                                                            echo '<i class="fa fa-star"></i>';
                                                                        }else{
                                                                            echo '<i class="fa fa-star-o"></i>';
                                                                        }
                                                                        
                                                                    }
                                                                ?>
                                            </div>
                                            <h4><a href="{{route('product.slug',['slug' => $new_pro->product_slug])}}">{{$new_pro->product_title}}</a></h4>
                                            <!-- <p>{{$new_pro->short_description}}</p> -->
                                            <div class="product-price"><span>৳ {{number_format($new_pro->sell_price,2)}}</span>
                                                 @if($new_pro->old_price != 0 && !empty($new_pro->old_price)) 
                                                 <span class="old_prices" style="text-align: left;">৳ {{number_format($new_pro->old_price,2)}}</span>
                                             @endif</div>
                                        </div>
                                    </div>
                                </div>  
                                @endforeach
                            @endif

                </div>
                <div class="pro-load-more load-more-border text-center mb-20">
                 <a class="load-more-toggle default-btn btn-hover" href="#">Load More</a>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                    {{ $new_arrivals->links() }}
                    </div>                                
                </div>
	        </div>
	    </div>
	    <!-- Product Area End -->

	  

	
@endsection