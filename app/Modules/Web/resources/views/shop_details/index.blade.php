@extends('Web::layouts.master')
@section('body')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">	Product Details
                    <!-- {{$product_data->product_title}} -->
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Product Details Area Start -->
    <div class="product-details-area pt-80 pb-75">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">

                    <div class="single-product-image product-image-slider fix">

                        <div class="p-image">
                            <div class="zoom-gallery">
                                <a id ="pop-zoom-gallery" href="{{URL::to('uploads/product/'.$product_data->product_id.'/orginal_image/'.$product_data->image)}}"  data-size="860x1060"  data-author="{{$product_data->product_title}}" class="product-zoom">
                                    <img src="{{URL::to('uploads/product/'.$product_data->product_id.'/orginal_image/'.$product_data->image)}}" alt="" class="img-responsive img-fluid pro-detail-img">
                                </a>
                            </div>
                        </div>

                        @if(isset($product_data->relProductImage) && !empty($product_data->relProductImage))

                            @foreach($product_data->relProductImage as $product_image)
                                @if($product_data->image != $product_image->image)

                                    <div class="p-image">
                                        <div class="zoom-gallery">
                                            <a id ="pop-zoom-gallery" href="{{URL::to('uploads/product/'.$product_image->product_id.'/orginal_image/'.$product_image->image)}}" data-size="860x1060"  data-author="{{$product_data->product_title}}" class="product-zoom">
                                                <img src="{{URL::to('uploads/product/'.$product_image->product_id.'/orginal_image/'.$product_image->image)}}" alt="" class="img-responsive img-fluid pro-detail-img">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        @endif

                    </div>
                    <div class="single-product-thumbnail product-thumbnail-slider float-left" id="gallery_01">
                        <div class="p-thumb" style="width: 142px;">
                            <img src="{{URL::to('uploads/product/'.$product_data->product_id.'/thumbnail/'.$product_data->image)}}" alt="" class="img-responsive img-fluid pro-thumb-img">
                        </div>

                        @if(isset($product_data->relProductImage) && !empty($product_data->relProductImage))

                            @foreach($product_data->relProductImage as $product_image)
                                @if($product_data->image != $product_image->image)
                                    <div class="p-thumb" style="width: 142px;">
                                        <img src="{{URL::to('uploads/product/'.$product_image->product_id.'/thumbnail/'.$product_image->image)}}" alt="" class="img-responsive img-fluid pro-thumb-img">
                                    </div>
                                @endif
                            @endforeach

                        @endif


                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <div class="p-d-wrapper">
                        <h1>{{$product_data->product_title}}</h1>
                        <div class="p-rating-review">
                            <div class="product-rating">
                                <?php
                                for($i=1;$i<=5;$i++){
                                    if($i <=$product_data->average_review) {
                                        echo '<i class="fa fa-star"></i>';
                                    }else{
                                        echo '<i class="fa fa-star-o"></i>';
                                    }

                                }
                                ?>
                            </div>
                            <span>{{$product_data->total_review}} review</span>
                            <a href="#" class="scroll-down">Add your review</a>
                        </div>
                        <div class="p-d-price">
                        	<span class="price-amount">
                                ৳ {{number_format($product_data->sell_price,2)}}                               
                            </span>
                            <?php  if($product_data->old_price != 0 && !empty($product_data->old_price)) {
                            ?>
                            <span class="old_prices">৳ {{number_format($product_data->old_price,2)}}</span>
                            <span class="discount-amount">
                               ( ৳ {{ $product_data->old_price-$product_data->sell_price }} Off )</span>
                            <?php } ?>
                        </div>
                        <div style="clear: both; display: block;">
                            {{--                        <span class="model-stock"> @if (!empty($product_data->quantity) && $product_data->quantity > 0)--}}
                            {{--                                          In stock--}}
                            {{--                                          @else--}}
                            {{--                                          <img src="{{URL::to('frontend/assets/img/sold-out.png')}}" height="20" alt="">  Stock Out--}}
                            {{--                                            @endif  <span>--}}
                            {{--                        <span>SKU</span>{{$product_data->item_no}}</span></span>--}}

                            <span class="model-stock"> @if (!empty($stockData) && $stockData > 0)
                                    In stock
                                @else
                                    <img src="{{URL::to('frontend/assets/img/sold-out.png')}}" height="20" alt="">  Stock Out
                                @endif  <span>
                        <span>SKU</span>{{$product_data->item_no}}</span></span>
                        </div>

                        <div class="color-size-container">
                            <a href="#sizeguidemodal" data-toggle="modal" data-target="#sizeguidemodal" style="color: #ff3300; text-decoration: underline;" >Size Chart</a>
                            <?php
                            if(isset($product_data->relProductAttribute) && !empty($product_data->relProductAttribute))
                            {
                            foreach ($product_data->relProductAttribute as $value)
                            {
                            $attr_name = $value->attribute_code;
                            ?>
                            <div class="heading">{{$attr_name}}</div>
                            @if ($attr_name == 'color' || $attr_name == 'colour')
                                <?php
                                $explode_attr_data = array_filter(explode("==",$value->attribute_data));
                                ?>
                                @if(count($explode_attr_data) > 0)
                                    <input type="hidden" name="color" value="color" id="color">

                                    @foreach($explode_attr_data as $key => $attr_value)
                                        <div class="color-or-size pro-details-color-content">
                                            <label for="attribute_data_color_{{$key}}" style="background-color: {{$attr_value}}"></label>
                                            <input class="p_color_list" type="radio" id="attribute_data_color_{{$key}}" name="color" value="{{$attr_value}}" style="visibility: hidden; display: none;">
                                        </div>
                                    @endforeach
                                    <br/>
                                @endif
                            @endif

                            @if ($attr_name == 'size')
                                <?php
                                $explode_attr_data = array_filter(explode("==",$value->attribute_data));
                                ?>
                                @if(count($explode_attr_data) > 0)
                                    <input type="hidden" name="size" value="size" id="size">
                                    @foreach($explode_attr_data as $key => $attr_value)
                                        <div class="color-or-size pro-details-size-content">
                                            <label for="attribute_data_size_{{$key}}">{{$attr_value}}</label>
                                            <input class="p_size_list" type="radio" id="attribute_data_size_{{$key}}" name="size" value="{{$attr_value}}" style="visibility: hidden; display: none;">
                                        </div>
                                    @endforeach
                                @endif
                            @endif


                            <?php
                            }
                            }
                            ?>


                        </div>


                        {{--                        --}}
                        @if (!empty($product_data->quantity) && $product_data->quantity > 0)
                            <div class="qty-cart-add">
                                <label for="qty">qty</label>
                                <input class="change_product_qty" type="number" value="1" placeholder="1" id="qty">
                                <a class="add_to_cart_ajax qty_put" product_id="{{$product_data->product_id}}" data_href="{{route('web.cart.add')}}" product_quantity="1" product_color_size="" href="#">Add to cart</a>
                            </div>
                        @endif
                        <?php
                        $current_date = date('Y-m-d');
                        ?>
                    <!-- @if(!empty($coupon_code) && $current_date >= $coupon_code->valid_from && $current_date <=  $coupon_code->valid_to)
                        <div class="coupon-code-show">
                        <h2>{{$coupon_code->coupon_details}} <br>Discount code  <span> {{$coupon_code->coupon_code}}</span> Amount <span> $ {{number_format($coupon_code->amount,2)}} </span></h2>
                            </div>
                        @endif -->
                    <!-- <div class="p-d-buttons">
                            <a href="#sizeguidemodal" data-toggle="modal" data-target="#sizeguidemodal" >Size Guide</a>
                             <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$product_data->product_id}}" class="add_to_wishlist" href="#">Add to wish list</a>

                            <a href="#" onclick="FBShareOp();" > <i class="fa fa-facebook-square" aria-hidden="true"></i>  &nbsp; Facebook </a >

                        </div> -->
                        <div class="return-policy">
                            <div class="delivery-option">
                                <a href="{{ route('shop.shoppro', $shoplist->users_id)}}%20&&ALeKk00rs-wYHuPoMs53xEs8S9j9POh2zg%3A1605544527732&source=hp&ei=T6qyX7aPKsS_8QO6y7eoBg&q"><h4 class="py-2 mb-1" style="border-bottom: 1px solid rgb(241, 241, 241); margin-bottom: 28px !important;"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                        @if(!empty($shoplist->shop_name))
                                            {{$shoplist->shop_name}}
                                        @endif
                                        <?php //dd($shoplist); ?> <span  style="font-size: 16px; padding-left: 30px; color: #ff6600;"> (   View Profile )</span>
                                    </h4>
                                </a>
                            <!-- <a href="{{ route('shop.shoppro', $shoplist->users_id)}}%20&&ALeKk00rs-wYHuPoMs53xEs8S9j9POh2zg%3A1605544527732&source=hp&ei=T6qyX7aPKsS_8QO6y7eoBg&q" class="text-center" > View Profile </a> -->

                            </div>
                        </div>
                        <div class="return-policy">
                            <div class="delivery-option">
                                <h4 class="py-2 mb-1" style="border-bottom: 1px solid rgb(241, 241, 241); margin-bottom: 28px !important;"><i class="fa fa-truck"></i> Delivery Option:
                                </h4>
                                <div class="row">
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-6 col-6" style="border-bottom: 1px solid rgb(241, 241, 241);">
                                        <h5 class="" style="margin-bottom: 5px !important;"><i class="fa fa-map-marker"></i> Inside Dhaka </h5>
                                        <p>Estimated time 1-3 business days</p>
                                    </div>
                                    <div style="border-bottom: 1px solid rgb(241, 241, 241); margin-bottom: 15px;" class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <h5 class="" style="margin-bottom: 5px !important;"><i class="fa fa-map-marker"></i> Outside Dhaka </h5>
                                        <p>Estimated time 3-6 business days</p>
                                    </div>
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-6 col-6" style="border-bottom: 1px solid rgb(241, 241, 241);">
                                        <h5 class="" style="margin-bottom: 5px !important;"><i class="fa fa-clock-o"></i> 3 Days Returns </h5>
                                        <p>Change of mind is not applicable</p>
                                    </div>
                                    <div style="border-bottom: 1px solid rgb(241, 241, 241); margin-bottom: 15px;" class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <h5 class="" style="margin-bottom: 5px !important;"><i class="fa fa-mobile" aria-hidden="true"></i> For more call us </h5>
                                        <p> +880-1312-304426</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!empty($product_data->short_description))
                            <div class="pro-shot-details">
                                <h4>Description</h4>
                                <p>{!!$product_data->short_description!!}</p>
                            </div>
                        @endif
                        @if(!empty($product_data->specification))
                            <div class="fabric-care">
                                <h4>Fabric Care & Specification</h4>
                                <p> {!!$product_data->specification!!}</p>
                            </div>
                    @endif
                    <!--  @if(!empty($product_data->description))
                        <div class="fabric-description">
                            <h4>Description</h4>
                           <p> {!!$product_data->description!!}</p>
                        </div>
                        @endif  -->
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($product_data->description))
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="product-details-section">
                            <div class="p-tab-btn">
                                <h4>Product Details</h4>
                            </div>
                            <p>{!!$product_data->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Related Products Area Start -->
    <div class="related-products-area text-center">
        <div class="container">
            <div class="section-title title-style-2">
                <h2><span>Related Products</span></h2>
            </div>
        </div>

        <div class="container">
            <div class="custom-row">
                <div class="related-product-carousel owl-carousel carousel-style-one">

                    @if(!empty($related_product_data))
                        @foreach($related_product_data as $related_product)

                            <div class="custom-col">
                                <div class="product-item">
                                    <div class="product-image-hover zoom-hover">
                                        @if($related_product->batch =='sold')
                                            <span class="sold">Sold</span>
                                        @endif
                                        @if($related_product->batch =='new')
                                            <span class="new">New</span>
                                        @endif
                                        @if($related_product->batch =='stock-out')
                                            <span class="stock">Stock Out</span>
                                        @endif
                                        @if($related_product->batch =='sale')
                                            <span class="sale">Sale</span>
                                        @endif
                                        <a href="{{route('product.slug',['slug' => $related_product->product_slug])}}">
                                            <img class="primary-image" src="{{URL::to('uploads/product/'.$related_product->product_id.'/thumbnail/'.$related_product->image)}}" alt="">
                                        </a>
                                        <div class="product-hover">
                                            <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$related_product->product_id}}" class="add_to_wishlist shop-wishlist" href="#"><i class="icon icon-Heart"></i></a>
                                            <a  class="shop-now-btn shop-card" href="{{route('product.slug',['slug' => $related_product->product_slug])}}"><i class="icon icon-FullShoppingCart"></i> Buy Now</a>
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <div class="product-rating">
                                            <?php
                                            for($i=1;$i<=5;$i++){
                                                if($i <=$related_product->average_review) {
                                                    echo '<i class="fa fa-star"></i>';
                                                }else{
                                                    echo '<i class="fa fa-star-o"></i>';
                                                }

                                            }
                                            ?>
                                        </div>
                                        <h4><a href="{{route('product.slug',['slug' => $related_product->product_slug])}}">
                                                {{$related_product->product_title}}
                                            </a></h4>
                                        <div class="product-price"><span>
		                                	৳ {{number_format($related_product->sell_price,2)}}
                                                @if($related_product->old_price != 0 && !empty($related_product->old_price))
                                                    <span class="old_prices">৳ {{number_format($related_product->old_price,2)}}</span>
                                                @endif
		                                </span></div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="scroll-area review-area ">
            <div class="p-review-wrapper">
                <div class="section-title title-style-2 text-center"><h2><span>Customer Reviews</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <p class="total-review-text">Total  Reviews: {{$product_data->total_review}}</p>
                    <div class="customer-review-details">
                        @if(!empty($product_review))
                            @foreach($product_review as $review)

                                <div class="review-details">
                                    <div class="rating">
                                        <?php
                                        for($i=1;$i<=5;$i++){
                                            if($i <=$review->rating_value_score) {
                                                echo '<i class="fa fa-star"></i>';
                                            }else{
                                                echo '<i class="fa fa-star-o"></i>';
                                            }

                                        }
                                        ?>
                                    </div>
                                    <h4>{{$review->title}}</h4>
                                    <p>{{$review->review}}</p>
                                </div>

                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">

                    <div class="rating-block">

                        <form action="{{route('product.review')}}" method="post" class="rating-form" id="rating-form">

                            <div class="submit-rating-container">
                                <div class="submit-rating-title"><h4>your rating</h4></div>
                                <div class="submit-rating-wrapper">
                                    <div class="submit-single-rating">
                                        <span></span>
                                        <div class="raty-default"></div>

                                    </div>

                                </div>
                            </div>

                            <div class="rating-form-box">
                                <label for="r-name" class="important">Nickname</label>
                                <input type="text" name="nickname" placeholder="" id="nickname">
                            </div>
                            <div class="rating-form-box">
                                <label for="r-summary" class="important">Review Headline</label>
                                <input type="text" name="review_headline" placeholder="" id="review-headline">
                            </div>
                            <div class="rating-form-box">
                                <label for="r-review" class="important">Comments</label>
                                <textarea name="review" id="review-comments" cols="30" rows="10"></textarea>
                            </div>
                            <div class="rating-form-box" align="text-center">
                                <input type="hidden" name="product_id" value="{{$product_data->product_id}}" id="product_id">
                                <input type="hidden" name="product_slug" value="{{$product_data->product_slug}}" >
                                <button class="review-btn" id="submit-review-btn">Submit Review</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>

        </div>
    </div>


    <!--Start of sizeguide Form-->
    <div class="modal fade" id="sizeguidemodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog text-center modal-lg modal-xl" role="document">
            <div class="modal-content" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span></button>
                <div class="sizeguide-popup" style=" border: 1px dashed #d7d7d7;  padding: 0px; text-align: left;">
                    <div class="table table-responsive table-striped table-bordered table-hover" style="width: 100%;" align="center">
                        <table width="100%">
                            <tr>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Available</th>
                            </tr>
                            @foreach($size_color as $data)
                                <tr>
                                    <td>{{$data->size}}</td>
                                    <td>{{$data->color}}</td>
                                    @if($data->quantity > 0)
                                        <td>Available</td>
                                    @else
                                        <td>StockOut</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>

                        {!!$product_data->size_guide!!}
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--End of sizeguide Form-->

    <!--Product zoom popup-->

    <div id="gallery-pswp" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip">
                        <!-- <a href="#" class="pswp__share--facebook"></a>
                    <a href="#" class="pswp__share--twitter"></a>
                    <a href="#" class="pswp__share--pinterest"></a>
                    <a href="#" download class="pswp__share--download"></a> -->
                    </div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        (function() {

            var initPhotoSwipeFromDOM = function(gallerySelector) {

                var parseThumbnailElements = function(el) {
                    var thumbElements = el.childNodes,
                        numNodes = thumbElements.length,
                        items = [],
                        el,
                        childElements,
                        thumbnailEl,
                        size,
                        item;

                    for (var i = 0; i < numNodes; i++) {
                        el = thumbElements[i];

                        // include only element nodes
                        if (el.nodeType !== 1) {
                            continue;
                        }

                        childElements = el.children;

                        size = el.getAttribute('data-size').split('x');

                        // create slide object
                        item = {
                            src: el.getAttribute('href'),
                            w: parseInt(size[0], 10),
                            h: parseInt(size[1], 10),
                            author: el.getAttribute('data-author')
                        };

                        item.el = el; // save link to element for getThumbBoundsFn

                        if (childElements.length > 0) {
                            item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                            if (childElements.length > 1) {
                                item.title = childElements[1].innerHTML; // caption (contents of figure)
                            }
                        }


                        var mediumSrc = el.getAttribute('data-med');
                        if (mediumSrc) {
                            size = el.getAttribute('data-med-size').split('x');
                            // "medium-sized" image
                            item.m = {
                                src: mediumSrc,
                                w: parseInt(size[0], 10),
                                h: parseInt(size[1], 10)
                            };
                        }
                        // original image
                        item.o = {
                            src: item.src,
                            w: item.w,
                            h: item.h
                        };

                        items.push(item);
                    }

                    return items;
                };

                // find nearest parent element
                var closest = function closest(el, fn) {
                    return el && (fn(el) ? el : closest(el.parentNode, fn));
                };

                var onThumbnailsClick = function(e) {
                    e = e || window.event;
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;

                    var eTarget = e.target || e.srcElement;

                    var clickedListItem = closest(eTarget, function(el) {
                        return el.tagName === 'A';
                    });

                    if (!clickedListItem) {
                        return;
                    }

                    var clickedGallery = clickedListItem.parentNode;

                    var childNodes = clickedListItem.parentNode.childNodes,
                        numChildNodes = childNodes.length,
                        nodeIndex = 0,
                        index;

                    for (var i = 0; i < numChildNodes; i++) {
                        if (childNodes[i].nodeType !== 1) {
                            continue;
                        }

                        if (childNodes[i] === clickedListItem) {
                            index = nodeIndex;
                            break;
                        }
                        nodeIndex++;
                    }

                    if (index >= 0) {
                        openPhotoSwipe(index, clickedGallery);
                    }
                    return false;
                };

                var photoswipeParseHash = function() {
                    var hash = window.location.hash.substring(1),
                        params = {};

                    if (hash.length < 5) { // pid=1
                        return params;
                    }

                    var vars = hash.split('&');
                    for (var i = 0; i < vars.length; i++) {
                        if (!vars[i]) {
                            continue;
                        }
                        var pair = vars[i].split('=');
                        if (pair.length < 2) {
                            continue;
                        }
                        params[pair[0]] = pair[1];
                    }

                    if (params.gid) {
                        params.gid = parseInt(params.gid, 10);
                    }

                    return params;
                };

                var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                    var pswpElement = document.querySelectorAll('.pswp')[0],
                        gallery,
                        options,
                        items;

                    items = parseThumbnailElements(galleryElement);

                    // define options (if needed)
                    options = {

                        galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                        getThumbBoundsFn: function(index) {
                            // See Options->getThumbBoundsFn section of docs for more info
                            var thumbnail = items[index].el.children[0],
                                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                                rect = thumbnail.getBoundingClientRect();

                            return { x: rect.left, y: rect.top + pageYScroll, w: rect.width };
                        },

                        addCaptionHTMLFn: function(item, captionEl, isFake) {
                            if (!item.title) {
                                captionEl.children[0].innerText = '';
                                return false;
                            }
                            captionEl.children[0].innerHTML = item.title + '<br/><small>Photo: ' + item.author + '</small>';
                            return true;
                        },

                    };


                    if (fromURL) {
                        if (options.galleryPIDs) {
                            // parse real index when custom PIDs are used
                            // https://photoswipe.com/documentation/faq.html#custom-pid-in-url
                            for (var j = 0; j < items.length; j++) {
                                if (items[j].pid == index) {
                                    options.index = j;
                                    break;
                                }
                            }
                        } else {
                            options.index = parseInt(index, 10) - 1;
                        }
                    } else {
                        options.index = parseInt(index, 10);
                    }

                    // exit if index not found
                    if (isNaN(options.index)) {
                        return;
                    }





                    options.mainClass = 'pswp--minimal--dark';
                    options.barsSize = { top: 0, bottom: 0 };
                    options.captionEl = false;
                    options.fullscreenEl = false;
                    options.shareEl = false;
                    options.bgOpacity = 1;
                    options.tapToClose = true;
                    options.tapToToggleControls = false;

                    if (disableAnimation) {
                        options.showAnimationDuration = 0;
                    }

                    // Pass data to PhotoSwipe and initialize it
                    gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);

                    // see: http://photoswipe.com/documentation/responsive-images.html
                    var realViewportWidth,
                        useLargeImages = false,
                        firstResize = true,
                        imageSrcWillChange;

                    gallery.listen('beforeResize', function() {

                        var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
                        dpiRatio = Math.min(dpiRatio, 2.5);
                        realViewportWidth = gallery.viewportSize.x * dpiRatio;


                        if (realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200) {
                            if (!useLargeImages) {
                                useLargeImages = true;
                                imageSrcWillChange = true;
                            }

                        } else {
                            if (useLargeImages) {
                                useLargeImages = false;
                                imageSrcWillChange = true;
                            }
                        }

                        if (imageSrcWillChange && !firstResize) {
                            gallery.invalidateCurrItems();
                        }

                        if (firstResize) {
                            firstResize = false;
                        }

                        imageSrcWillChange = false;

                    });

                    gallery.listen('gettingData', function(index, item) {
                        if (useLargeImages) {
                            item.src = item.o.src;
                            item.w = item.o.w;
                            item.h = item.o.h;
                        } else {
                            item.src = item.m.src;
                            item.w = item.m.w;
                            item.h = item.m.h;
                        }
                    });

                    gallery.init();
                };

                // select all gallery elements
                var galleryElements = document.querySelectorAll(gallerySelector);
                for (var i = 0, l = galleryElements.length; i < l; i++) {
                    galleryElements[i].setAttribute('data-pswp-uid', i + 1);
                    galleryElements[i].onclick = onThumbnailsClick;
                }

                // Parse URL and open gallery if it contains #&pid=3&gid=1
                var hashData = photoswipeParseHash();
                if (hashData.pid && hashData.gid) {
                    openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
                }
            };

            initPhotoSwipeFromDOM('#pop-zoom-gallery');

        })();
    </script>


@endsection