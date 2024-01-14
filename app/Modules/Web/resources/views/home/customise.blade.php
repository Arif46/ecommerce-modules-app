@extends('Web::layouts.master')

@section('body')

    @if(Session::has('main_menu'))

        <!-- Banner Area Start -->
        <div class="banner-area mt-100">
            <div class="container">
                <div class="banner-container banner-style-2">
                    <div class="row">
                        <?php  $main_data = Session::get('main_menu');
                            $firstTwoCategory = array_slice($main_data, 3, 2);
                        ?>
                        @if(count($firstTwoCategory) > 0)
                            @foreach($firstTwoCategory as $f_category)
                                <div class="col-md-6">
                                    <a class="banner-image" href="{{route('category.slug',['slug' => $f_category['slug']])}}"><img src="{{URL::to('uploads/category')}}/800x800/{{$f_category['image_link']}}" alt=""></a>
                                </div>
                            @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

    @endif
    


    <!-- Product Area Start -->
	    <div class="product-area text-center pt-70 pb-95">
	        <div class="container">
	            <div class="section-title">
                    <span>Festival item</span>
	                <h2><span>Gift Card</span></h2>
	            </div>
	        </div>
	        <div class="container">                
                <div class="row">
                            @if(!empty($custome_product))
                                @foreach($custome_product as $cust_pro)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                    <div class="product-item">
                                        <div class="product-image-hover zoom-hover">
                                        @if($cust_pro->batch =='sold') 
                                        <span class="sold">Sold</span>
                                        @endif
                                        @if($cust_pro->batch =='new') 
                                        <span class="new">New</span>
                                        @endif
                                        @if($cust_pro->batch =='stock-out') 
                                        <span class="stock">Stock Out</span>
                                        @endif
                                        @if($cust_pro->batch =='sale') 
                                        <span class="sale">Sale</span>
                                        @endif
                                            <a href="{{route('product.slug',['slug' => $cust_pro->product_slug])}}" class="img-fitto">
                                                <img class="primary-image img-responsive img-fluid" src="{{URL::to('uploads/product/'.$cust_pro->product_id.'/thumbnail/'.$cust_pro->image)}}" alt="">
                                            </a>
                                            <div class="product-hover">                                          
                                                <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$cust_pro->product_id}}" class="add_to_wishlist shop-wishlist" href="#"><i class="icon icon-Heart"></i></a>
                                                <a class="shop-now-btn shop-card" href="{{route('product.slug',['slug' => $cust_pro->product_slug])}}"><i class="icon icon-FullShoppingCart"></i> Buy Now</a>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="product-rating">
                                                <?php
                                                                    for($i=1;$i<=5;$i++){
                                                                        if($i <=$cust_pro->average_review) {
                                                                            echo '<i class="fa fa-star"></i>';
                                                                        }else{
                                                                            echo '<i class="fa fa-star-o"></i>';
                                                                        }
                                                                        
                                                                    }
                                                                ?>
                                            </div>
                                            <h4><a href="{{route('product.slug',['slug' => $cust_pro->product_slug])}}">{{$cust_pro->product_title}}</a></h4>
                                            <!-- <p>{{$cust_pro->short_description}}</p> -->
                                            <div class="product-price"><span>৳ {{number_format($cust_pro->sell_price,2)}}</span>
                                                 @if($cust_pro->old_price != 0 && !empty($cust_pro->old_price)) 
                                                 <span class="old_prices" style="text-align: left;">৳ {{number_format($cust_pro->old_price,2)}}</span>
                                             @endif</div>
                                        </div>
                                    </div>
                                </div>  
                                @endforeach
                            @endif

                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                       {{ $custome_product->links() }}
                    </div>                                
                </div>
	        </div>
	    </div>
	    <!-- Product Area End -->

    <div class="google-add-home">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- webart-01 -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-6679975125787544"
                         data-ad-slot="5740116884"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    </div>
                </div>
            </div>
    </div>

	
@endsection