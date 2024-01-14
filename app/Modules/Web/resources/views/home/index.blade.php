@extends('Web::layouts.master')

@section('body')

    <!-- Slider Area Start -->
   @include('Web::home.slider')
    <!-- Slider Area End -->

    @if(Session::has('main_menu'))
                        <?php  $main_data = Session::get('main_menu');
                            $firstTwoCategory = array_slice($main_data, 0, 1);
                        ?>
    @endif


        <!-- Feature Product Area Start -->
        <div class="feature-product-area text-center pt-50 pb-70">
            <div class="container">
                <div class="section-title">
                    <!-- <span>featured SHOP ITEMS</span> -->
                    <h2><span>Our best Categorys</span></h2>
                </div>
            </div>
                    <div class="intro-section2">
    <div class="container">
        <div class="grid row">
            <div class="grid-item col-lg-6 col-md-8 height-x2">
             <div class="category category-absolute category-banner text-white overlay-light overlay-zoom appear-animate" data-animation-options="{
                                            'name': 'fadeInLeftShorter',
                                            'delay': '.3s'
                                        }" style="background-color: #2c769d">
                    <a href="#">
                        <figure class="category-media">
                        <img src="{{ asset('uploads/category/orginal_image/1111.jpg') }}" width="580" height="510"  alt="banner">
                        </figure>
                    </a>
                    <div class="category-content">
                        <h4 class="category-name">Gaming</h4>
                        <span class="category-count">
                            <span>9</span> Products
                        </span>
                    </div>
                </div>

            </div>
            <div class="grid-item col-lg-3 col-md-4 col-6 height-x1">
                <div class="category category-absolute category-banner text-white overlay-light overlay-zoom appear-animate" data-animation-options="{
                                            'name': 'fadeInLeftShorter',
                                            'delay': '.3s'
                                        }" style="background-color: #2c769d">
                    <a href="#">
                        <figure class="category-media">
                         <img src="{{ asset('uploads/category/orginal_image/01.jpg') }}" width="280" height="245"  alt="banner">
                        </figure>
                    </a>
                    <div class="category-content">
                        <h4 class="category-name">Gaming</h4>
                        <span class="category-count">
                            <span>9</span> Products
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid-item col-lg-3 col-md-4 col-6 height-x1">
                <div class="category category-absolute category-banner overlay-light overlay-zoom appear-animate" data-animation-options="{
                                            'name': 'fadeInLeftShorter',
                                            'delay': '.3s'
                                        }" style="background-color: #e7e7e7">
                    <a href="#">
                        <figure class="category-media">
                            <img src="{{ asset('uploads/category/orginal_image/02.jpg') }}" width="280" height="245"  alt="banner">
                        </figure>
                    </a>
                    <div class="category-content">
                        <h4 class="category-name">Accessories</h4>
                        <span class="category-count">
                            <span>29</span> Products
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid-item col-lg-3 col-md-4 col-6 height-x1">
                <div class="category category-absolute category-banner text-white overlay-dark overlay-zoom appear-animate" data-animation-options="{
                                            'name': 'fadeInLeftShorter',
                                            'delay': '.3s'
                                        }" style="background-color: #26334c">
                    <a href="#">
                        <figure class="category-media">
                           <img src="{{ asset('uploads/category/orginal_image/06.jpg') }}" width="280" height="245"  alt="banner">
                        </figure>
                    </a>
                    <div class="category-content">
                        <h4 class="category-name">Women’s Bag</h4>
                        <span class="category-count">
                            <span>9</span> Products
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid-item col-lg-3 col-md-4 col-6 height-x1">
                <div class="category category-absolute category-banner text-white overlay-dark overlay-zoom appear-animate" data-animation-options="{
                                            'name': 'fadeInLeftShorter',
                                            'delay': '.3s'
                                        }" style="background-color: #222327">
                    <a href="#">
                        <figure class="category-media">
                           <img src="{{ asset('uploads/category/orginal_image/07.jpg') }}" width="280" height="245"  alt="banner">
                        </figure>
                    </a>
                    <div class="category-content">
                        <h4 class="category-name">Electronics</h4>
                        <span class="category-count">
                            <span>9</span> Products
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid-item col-lg-6 col-md-8 height-x1">
                <div class="banner banner-fixed intro-banner1 overlay-light overlay-zoom appear-animate" data-animation-options="{
                                            'name': 'fadeInUpShorter',
                                            'delay': '.3s'
                                        }" style="background-color: #f2f3f5">
                    <figure>
                        <img src="{{ asset('uploads/category/orginal_image/05.jpg') }}" width="580" height="245"  alt="banner">
                    </figure>
                    <div class="banner-content text-right y-50">
                        <h4 class="banner-title mb-2 font-weight-normal ls-m">Springwear</h4>
                        <p class="mb-0 text-body ls-m">Our vision is to supply the best equipment
                            and<br /> expertise within the arb, rope access &amp; vertical indbut<br />
                            most importantly, to keep our<br /> customers at the heart of all we do.</p>
                    </div>
                </div>
            </div>

            <div class="grid-space col-1"></div>
        </div>
    </div>
</div>
        </div>
        <!-- Feature Product Area End -->


         <!-- Custom Area Start -->
        <div class="product-area text-center pt-70 pb-80" style="background: #fde7d4;" >
            <div class="overlay-bg-white">
                <div class="container">
                    <div class="section-title pt-40">
                        <h1>new arrivals</h1>
                         <span style="color:#000000;">Latest SHOP ITEMS</span>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        @if(!empty($custome_product))
                            @foreach($custome_product as $c_pro)
                            <div class="col-md-3 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-image-hover zoom-hover">
                                        @if($c_pro->batch =='sold')
                                        <span class="sold">Sold</span>
                                        @endif
                                        @if($c_pro->batch =='new')
                                        <span class="new">New</span>
                                        @endif
                                        @if($c_pro->batch =='stock-out')
                                        <span class="stock">Stock Out</span>
                                        @endif
                                        @if($c_pro->batch =='sale')
                                        <span class="sale">Sale</span>
                                        @endif
                                            <a class="shop-cart-add" product_id="{{$c_pro->product_id}}" data_href="{{route('web.cart.add')}}" product_quantity="1">
                                                <img class="primary-image img-responsive img-fluid" src="{{URL::to('uploads/product/'.$c_pro->product_id.'/thumbnail/'.$c_pro->image)}}" alt="">
                                            </a>
                                            <div class="product-hover">
                                                <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$c_pro->product_id}}" class="add_to_wishlist shop-wishlist" href="#"><i class="icon icon-Heart"></i></a>
                                                <a class="shop-now-btn shop-card" href="{{route('product.slug',['slug' => $c_pro->product_slug])}}"><i class="icon icon-FullShoppingCart"></i> Buy Now</a>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="product-rating">
                                                <?php
                                                                    for($i=1;$i<=5;$i++){
                                                                        if($i <=$c_pro->average_review) {
                                                                            echo '<i class="fa fa-star"></i>';
                                                                        }else{
                                                                            echo '<i class="fa fa-star-o"></i>';
                                                                        }

                                                                    }
                                                                ?>
                                            </div>
                                            <h4><a href="{{route('product.slug',['slug' => $c_pro->product_slug])}}">{{$c_pro->product_title}}</a></h4>
                                            <!-- <p>{{$c_pro->short_description}}</p> -->
                                            <div class="product-price"><span>৳ {{number_format($c_pro->sell_price,2)}}</span>
                                                 @if($c_pro->old_price != 0 && !empty($c_pro->old_price))
                                                 <span class="old_prices" style="text-align: left;">৳ {{number_format($c_pro->old_price,2)}}</span>
                                             @endif</div>
                                        </div>
                                    </div>
                            </div>

                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- Custom Area end -->

        <!-- Category Product Area Start -->
        <div class="product-area text-center pt-70 pb-50">
            <div class="overlay-bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">

                    <div class="section-title pt-40">

                        <h1>Women's Collection</h1>
                        <span style="color:#000000;">SHOP ITEMS</span>
                    </div>

                    <img src="{{ asset('uploads/category/orginal_image/6.jpg') }}" width="300"  alt="banner">

                        </div>
                        <div class="col-md-8">
                            <div class="row">
                        @if(!empty($category_product))
                            @foreach($category_product as $ca_pro)
                            @if($ca_pro->category_title == 'Women')
                            <div class="col-md-4 col-sm-6">
                                    <div class="product-item category-pro">
                                        <div class="product-image-hover zoom-hover">
                                        @if($ca_pro->batch =='sold')
                                        <span class="sold">Sold</span>
                                        @endif
                                        @if($ca_pro->batch =='new')
                                        <span class="new">New</span>
                                        @endif
                                        @if($ca_pro->batch =='stock-out')
                                        <span class="stock">Stock Out</span>
                                        @endif
                                        @if($ca_pro->batch =='sale')
                                        <span class="sale">Sale</span>
                                        @endif
                                            <a class="shop-cart-add" product_id="{{$ca_pro->product_id}}" data_href="{{route('web.cart.add')}}" product_quantity="1">
                                                <img class="primary-image img-responsive img-fluid" src="{{URL::to('uploads/product/'.$ca_pro->product_id.'/thumbnail/'.$ca_pro->image)}}" alt="">
                                            </a>
                                            <div class="product-hover">
                                                <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$ca_pro->product_id}}" class="add_to_wishlist shop-wishlist" href="#"><i class="icon icon-Heart"></i></a>
                                                <a class="shop-now-btn shop-card" href="{{route('product.slug',['slug' => $ca_pro->product_slug])}}"><i class="icon icon-FullShoppingCart"></i> Buy Now</a>
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="product-rating">
                                                <?php
                                                                    for($i=1;$i<=5;$i++){
                                                                        if($i <=$ca_pro->average_review) {
                                                                            echo '<i class="fa fa-star"></i>';
                                                                        }else{
                                                                            echo '<i class="fa fa-star-o"></i>';
                                                                        }

                                                                    }
                                                                ?>
                                            </div>
                                            <h4><a href="{{route('product.slug',['slug' => $ca_pro->product_slug])}}">{{$ca_pro->product_title}}</a></h4>
                                            <!-- <p>{{$ca_pro->short_description}}</p> -->
                                            <div class="product-price"><span>৳ {{number_format($ca_pro->sell_price,2)}}</span>
                                                 @if($ca_pro->old_price != 0 && !empty($ca_pro->old_price))
                                                 <span class="old_prices" style="text-align: left;">৳ {{number_format($ca_pro->old_price,2)}}</span>
                                             @endif</div>
                                        </div>
                                    </div>
                            </div>
                            @endif
                            @endforeach
                        @endif

                    </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Category Product Area end -->

                <!-- Category Product Area Start -->
        <div class="product-area text-center pt-70 pb-80 " style="background:#f1f1f1;">
            <div class="overlay-bg-white">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8">
                                    <div class="row">
                                @if(!empty($category_product_men))
                                    @foreach($category_product_men as $ca_men_pro)
                                    @if($ca_men_pro->category_title == 'Men')
                                    <div class="col-md-4 col-sm-6">
                                            <div class="product-item category-pro">
                                                <div class="product-image-hover zoom-hover">
                                                @if($ca_men_pro->batch =='sold')
                                                <span class="sold">Sold</span>
                                                @endif
                                                @if($ca_men_pro->batch =='new')
                                                <span class="new">New</span>
                                                @endif
                                                @if($ca_men_pro->batch =='stock-out')
                                                <span class="stock">Stock Out</span>
                                                @endif
                                                @if($ca_men_pro->batch =='sale')
                                                <span class="sale">Sale</span>
                                                @endif
                                                    <a class="shop-cart-add" product_id="{{$ca_men_pro->product_id}}" data_href="{{route('web.cart.add')}}" product_quantity="1">
                                                        <img class="primary-image img-responsive img-fluid" src="{{URL::to('uploads/product/'.$ca_men_pro->product_id.'/thumbnail/'.$ca_men_pro->image)}}" alt="">
                                                    </a>
                                                    <div class="product-hover">
                                                        <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$ca_men_pro->product_id}}" class="add_to_wishlist shop-wishlist" href="#"><i class="icon icon-Heart"></i></a>
                                                        <a class="shop-now-btn shop-card" href="{{route('product.slug',['slug' => $ca_men_pro->product_slug])}}"><i class="icon icon-FullShoppingCart"></i> Buy Now</a>
                                                    </div>
                                                </div>
                                                <div class="product-text">
                                                    <div class="product-rating">
                                                        <?php
                                                                            for($i=1;$i<=5;$i++){
                                                                                if($i <=$ca_men_pro->average_review) {
                                                                                    echo '<i class="fa fa-star"></i>';
                                                                                }else{
                                                                                    echo '<i class="fa fa-star-o"></i>';
                                                                                }

                                                                            }
                                                                        ?>
                                                    </div>
                                                    <h4><a href="{{route('product.slug',['slug' => $ca_men_pro->product_slug])}}">{{$ca_men_pro->product_title}}</a></h4>
                                                    <!-- <p>{{$ca_men_pro->short_description}}</p> -->
                                                    <div class="product-price"><span>৳ {{number_format($ca_men_pro->sell_price,2)}}</span>
                                                         @if($ca_men_pro->old_price != 0 && !empty($ca_men_pro->old_price))
                                                         <span class="old_prices" style="text-align: left;">৳ {{number_format($ca_men_pro->old_price,2)}}</span>
                                                     @endif</div>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                    @endforeach
                                @endif

                                </div>
                        </div>
                        <div class="col-md-4">

                            <div class="section-title pt-40">

                                <h1>Men's Collection</h1>
                                <span style="color:#000000;">SHOP ITEMS</span>
                            </div>

                            <img src="{{ asset('uploads/category/orginal_image/4.jpg') }}" width="300"  alt="banner">

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Category Product Area end -->

        <!-- Feature Product Area Start -->
        <div class="feature-product-area text-center pt-50 pb-70">
            <div class="container">
                <div class="section-title">
                    <!-- <span>featured SHOP ITEMS</span> -->
                    <h2><span>products you may like</span></h2>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 r-mt-30">
                        <div class="row">
                            @if(!empty($featured_product))
                            @foreach($featured_product as $f_pro)
                            <div class="col-lg-3 col-md-3 col-sm-6">

                            <div class="product-item">
                                <div class="product-image-hover zoom-hover">
                                    @if($f_pro->batch =='sold')
                                    <span class="sold">Sold</span>
                                    @endif
                                    @if($f_pro->batch =='new')
                                    <span class="new">New</span>
                                    @endif
                                    @if($f_pro->batch =='stock-out')
                                    <span class="stock">Stock Out</span>
                                    @endif
                                    @if($f_pro->batch =='sale')
                                    <span class="sale">Sale</span>
                                    @endif
                                    <a class="shop-cart-add" product_id="{{$f_pro->product_id}}" data_href="{{route('web.cart.add')}}" product_quantity="1">
                                        <img class="primary-image img-responsive img-fluid" src="{{URL::to('uploads/product/'.$f_pro->product_id.'/thumbnail/'.$f_pro->image)}}" alt="">
                                    </a>

                                    <div class="product-hover">
                                       <!-- <a href="#" class="shop-cart-add" product_id="{{$f_pro->product_id}}" data_href="{{route('web.cart.add')}}" product_quantity="1"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> -->
                                       <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$f_pro->product_id}}" class="add_to_wishlist shop-wishlist" href="#"><i class="icon icon-Heart"></i></a>
                                        <a href="{{route('product.slug',['slug' => $f_pro->product_slug])}}" class="shop-card"><i class="icon icon-FullShoppingCart"></i> Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-text">
                                    <div class="product-rating">
                                            <?php
                                                        for($i=1;$i<=5;$i++){
                                                                    if($i <=$f_pro->average_review) {
                                                                        echo '<i class="fa fa-star"></i>';
                                                                    }else{
                                                                        echo '<i class="fa fa-star-o"></i>';
                                                                    }

                                                                }
                                                            ?>
                                        </div>
                                    <h4><a href="{{route('product.slug',['slug' => $f_pro->product_slug])}}">{{$f_pro->product_title}}</a></h4>
                                     <div class="product-price"><span>৳ {{number_format($f_pro->sell_price,2)}}</span>
                                        @if($f_pro->old_price != 0 && !empty($f_pro->old_price))
                                        <span class="old_prices">৳ {{number_format($f_pro->old_price,2)}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            </div>

                               @endforeach
                            @endif

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- Feature Product Area End -->

        <!-- Banner Area Start -->
        <div class="banner-area style-1">
            <div class="container">
                <div class="row no-gutters">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="single-banner-image">
                                <a href="#"><img class="img-responsive img-fluid" src="{{URL::to('uploads/category')}}/orginal_image/bs-3.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12  r-mt-30">
                            <div class="single-banner-image mini-banner">
                                <a href="#"><img class="img-responsive img-fluid"  src="{{URL::to('uploads/category')}}/orginal_image/5.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 r-mt-30">
                            <div class="single-banner-image mini-banner">
                                <a href="#"><img class="img-responsive img-fluid"  src="{{URL::to('uploads/category')}}/orginal_image/bt-4.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Banner Area End -->

        <!--Start of Newsletter Form-->
        <div class="modal fade" id="newslettermodal1" tabindex="-1" role="dialog">
            <div class="modal-dialog text-center" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span></button>
                    <div class="newsletter-popup" style="background-image: url('{{URL::to('uploads/category')}}/thumbnail/T@2x1.jpg'); background-position: top left; border: 3px dashed #d7d7d7;  padding: 30px;">
                        <form class="newsletter-content" method="post" action="#">
                            <h2>SignUp Now</h2>

                           @if(Session::has('admanager_data'))
                            <?php $admanager_data = Session::get('admanager_data');   ?>
                            @endif

                            @if(isset($admanager_data) && !empty ($admanager_data))
                            @foreach ($admanager_data as $datapopup)
                            @if($datapopup->position == 'popup' && $datapopup->type == 'home')
                            <h4 style="font-weight: normal; padding: 25px;">{{$datapopup->title}}</h4>
                            <div style="text-align: center;">{!!$datapopup->caption!!}</div>
                            @endif
                            @endforeach
                            @endif
                            <br><br>

                            <div class="text-center checkbox-btn buttons-set">
                                <a href="{{route('customer.sign.up')}}" class="button signup-btn" name="subscribe">Sign Up Now</a>
                            </div>
                            <!-- <div class="checkbox_newsletter">
                                <input type="checkbox" id="checkbox">
                                <label for="checkbox"> Don't show this popup again</label>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Newsletter Form-->'

        @foreach($logos as $logo)
            <img height="100" width="100" src="{{ url('uploads/brand/800x800/' . $logo->image_link) }}" alt="">
        @endforeach


        <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="113718916726843"
        theme_color="#7646ff">
      </div>

@endsection
