@extends('Web::layouts.master')
@section('body')
    <!-- breadcrumb area -->
        @if($typeOf='brand')
         <div class="breadcrumb-area bg-img pt-50 pb-50 default-overlay-2" style="background-image: url('{{URL::to('')}}/uploads/brand/800x800/{{$categoryOrBrandData->image_link}}');">
        @else
        <div class="breadcrumb-area bg-img pt-50 pb-50 default-overlay-2" style="background-image: url('{{URL::to('')}}/uploads/category/800x800/{{$categoryOrBrandData->image_link}}');">
        @endif
        <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>{{$categoryOrBrandData->title}}</h2>                    
                </div>
            </div>
        </div>
        <!-- breadcrumb area end-->
    <div class = "shop-area pb-80 pt-50" >
        <div class="container">
            <div class="row">  
                 <?php
                   $firstTwoCategory = [];
                    ?>                
                     
                <div class="order-xl-3 order-lg-4 col-xl-9 col-lg-8" >              
                    
                    <div class="ht-product-tab">

                        <div class="nav" role="tablist">
                          <!--   <a class="active" href="#grid" data-toggle="tab" role="tab" aria-selected="true" aria-controls="grid"><i class="fa fa-th"></i></a> -->
                           <!--  <a href="#list" data-toggle="tab" role="tab" aria-selected="false" aria-controls="list"><i class="fa fa-th-list" aria-hidden="true"></i></a> -->
                        </div>

                        <div class="shop-content-wrapper">
                            <div class="shop-results"><span>Sort By</span>
                                <select id="sort_by" name="sort_by" >
                                    <option value="">position</option>
                                    <option <?=isset($_GET['sort_by']) && $_GET['sort_by'] == 'name'?'selected':''?> value="name">product name</option>
                                    <option <?=isset($_GET['sort_by']) && $_GET['sort_by'] == 'price'?'selected':''?> value="price">price</option>
                                </select>
                            </div>
                        </div>

                    </div>
                     <div class="ht-product-shop tab-content">
                        <div class="tab-pane active show fade text-center" id="grid" role="tabpanel">
                            <div class="row">

                                @if(!empty($product_data) && count($product_data) > 0)
                                    @foreach($product_data as $product)

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="product-item">
                                                <div class="product-image-hover zoom-hover">
                                                    @if($product->batch =='sold') 
                                                    <span class="sold">Sold</span>
                                                    @endif
                                                    @if($product->batch =='new') 
                                                    <span class="new">New</span>
                                                    @endif
                                                    @if($product->batch =='stock-out') 
                                                    <span class="stock">Stock Out</span>
                                                    @endif
                                                    @if($product->batch =='sale') 
                                                    <span class="sale">Sale</span>
                                                    @endif
                                                    <a href="{{route('product.slug',['slug' => $product->product_slug])}}">
                                                        <img class="primary-image" src="{{URL::to('uploads/product/'.$product->product_id.'/thumbnail/'.$product->image)}}" alt="">
                                                    </a>
                                                    <div class="product-hover">
                                                        <!-- <a href="{{route('product.slug',['slug' => $product->product_slug])}}"><i class="icon icon-FullShoppingCart"></i></a> -->

                                                      <!--   <a href="#" class="add_to_cart_ajax" product_id="{{$product->product_id}}" data_href="{{route('web.cart.add')}}" product_quantity="1"><i class="icon icon-FullShoppingCart"></i></a> -->
                                                        
                                                        <a data_href="{{route('customer.add.to.wishlist')}}" product_id="{{$product->product_id}}" class="add_to_wishlist shop-wishlist" href="#"><i class="icon icon-Heart"></i></a>
                                                        <a class="shop-now-btn shop-card" href="{{route('product.slug',['slug' => $product->product_slug])}}"><i class="icon icon-FullShoppingCart"></i> Buy Now</a>
                                                    </div>
                                                </div>
                                                <div class="product-text">
                                                    <div class="product-rating">
                                                        <?php
                                                            for($i=1;$i<=5;$i++){
                                                                if($i <=$product->average_review) {
                                                                    echo '<i class="fa fa-star"></i>';
                                                                }else{
                                                                    echo '<i class="fa fa-star-o"></i>';
                                                                }
                                                                
                                                            }
                                                        ?>
                                                    </div>
                                                    <h4><a href="{{route('product.slug',['slug' => $product->product_slug])}}">
                                                        {{$product->product_title}}
                                                    </a></h4>
                                                    <div class="product-price"><span>
                                                        ৳ {{number_format($product->sell_price,2)}}
                                                    </span>
                                                    @if($product->old_price != 0 && !empty($product->old_price)) 
                                                    <span class="old_prices" style="text-align: left;">৳ {{number_format($product->old_price,2)}}</span>
                                                    @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                    <p>Product Not Found</p>
                                @endif
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                     {{ $product_data->links() }}
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4">
                        <div class="sider-bar-wrap sidebar-widget widget-style-2">
                            <!-- widget-categories start -->
                            <aside class="widget-categories">
                                 <h3 class="sidebar-title">Filter by Categories</h3>
                                
                                <ul class="sidebar-menu">
                               
                                    @if(Session::has('main_menu'))
                                        <?php  $main_data = Session::get('main_menu'); ?>
                                        @if(count($main_data) > 0)
                                            @foreach($main_data as $menu)
                                                <?php
                                                    if(isset($menu['sub_menu'])){
                                                        if($categoryOrBrandData->slug == $menu['slug']){
                                                           // array_push($firstTwoCategory, $menu['sub_menu']);          
                                                        }else{
                                                            if(isset($menu['sub_menu']) && !empty($menu['sub_menu'])){
                                                                foreach($menu['sub_menu'] as $sub_menu){
                                                                    if($sub_menu['slug'] == $categoryOrBrandData->slug){
                                                                       // array_push($firstTwoCategory, $menu['sub_menu']);          
                                                                    }
                                                                }
                                                            }
                                                        }        
                                                    }                                            
                                                ?>
                                                <li>
                                                <a href="{{route('category.slug',['slug' => $menu['slug']])}}">{{$menu['name']}}</a>

                                                @if(isset($menu['sub_menu']))  
                                            <button class="dropdown-btn">
                                            <i class="fa fa-caret-down"></i>
                                             </button>
                                                    <ul class="dropdown-container">                                                   
                                                        @foreach($menu['sub_menu'] as $sub_menu)
                                                             <li>

                                                                        <a href="{{route('category.slug',['slug' => $sub_menu['slug']])}}">{{$sub_menu['name']}}
                                                                        </a>
                                                                   
                                                                <ul>
                                                                    
                                                                    @if(isset($sub_menu['sub_menu']))  
                                                                        @foreach($sub_menu['sub_menu'] as $sub_menu2)

                                                                            <li>
                                                                                <a href="{{route('category.slug',['slug' => $sub_menu2['slug']])}}">{{$sub_menu2['name']}}
                                                                                </a>
                                                                            </li>

                                                                        @endforeach
                                                                    @endif

                                                                </ul>
                                                            </li>    
                                                        @endforeach                                                    
                                                                
                                                    </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        @endif    
                                    @endif
                                    <!-- <li><a href="#">Clothes</a> <span class="count">(14)</span></li> -->
                                   
                                </ul>
                            </aside>
                            <!-- widget-categories end -->
           
                            <!-- filter-by start -->
                            <aside class="widget filter-by">
                                 <h3 class="sidebar-title">Filter by Price</h3>
                                <ul class="sidebar-menu">
                                  
                                        <li class="single-widget-opt">
                                            <input type="checkbox" <?=isset($_GET['price']) && $_GET['price'] == '0-1000'?'checked':''?> class="<?=isset($_GET['price']) && $_GET['price'] == '0-1000'?'remove-price-filter':'price-filter'?>" id="low" value="0-1000">
                                            <label for="low">৳ 0.00 - ৳ 1000 </label>
                                        </li>
                                        <li class="single-widget-opt">
                                            <input type="checkbox" <?=isset($_GET['price']) && $_GET['price'] == '1001-2000'?'checked':''?> class="<?=isset($_GET['price']) && $_GET['price'] == '1001-2000'?'remove-price-filter':'price-filter'?>" id="l-t-m" value="1001-2000">
                                            <label for="l-t-m">৳ 1001 - ৳ 2000 </label>
                                        <li>
                                        <li class="single-widget-opt">
                                            <input type="checkbox" <?=isset($_GET['price']) && $_GET['price'] == '2001-3000'?'checked':''?> class="<?=isset($_GET['price']) && $_GET['price'] == '2001-3000'?'remove-price-filter':'price-filter'?>" id="medium" value="2001-3000">
                                            <label for="medium">৳ 2001 - ৳ 3000</label>
                                        </li>
                                        <li class="single-widget-opt">
                                            <input type="checkbox" <?=isset($_GET['price']) && $_GET['price'] == '3001-4000'?'checked':''?> class="price-filter" id="m-t-h" value="3001-4000">
                                            <label for="m-t-h">৳ 3001 - ৳ 4000 </label>
                                        </li>
                                        <li class="single-widget-opt">
                                            <input type="checkbox" <?=isset($_GET['price']) && $_GET['price'] == '4001-5000'?'checked':''?> class="<?=isset($_GET['price']) && $_GET['price'] == '4001-5000'?'remove-price-filter':'price-filter'?>" id="high" value="4001-5000">
                                            <label for="high">৳ 4001 - ৳ 5000 </label>
                                        </li>
                                        <li class="single-widget-opt">
                                            <input type="checkbox" <?=isset($_GET['price']) && $_GET['price'] == '5001-10000'?'checked':''?> class="<?=isset($_GET['price']) && $_GET['price'] == '5001-10000'?'remove-price-filter':'price-filter'?>" id="highest" value="5001-100000">
                                            <label for="highest">৳ 5001 And Above </label>
                                        </li>
                                    
                                </ul>                       
                            </aside>
{{--                            <!-- filter-by end -->--}}
{{--                            filter by brand--}}
{{--                            <!-- widget-tags start -->--}}
{{--                            <aside class="widget widget-tags">--}}
{{--                                <!-- <h3 class="sidebar-title">Tags</h3> -->--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#">Women Dress</a></li>--}}
{{--                                    <li><a href="#">Beauty Care</a></li>--}}
{{--                                    <li><a href="#">Gift items</a></li>--}}
{{--                                    <li><a href="#">Kid's Fashion</a></li>--}}
{{--                                    <li><a href="#">Kids & Mom</a></li>--}}
{{--                                    <li><a href="#">Girl Dress</a></li>--}}
{{--                                    <li><a href="#">Ladies Bag</a></li>                                   --}}
{{--                                    <li><a href="#">Shari</a></li>--}}
{{--                                    <li><a href="#">Three piece</a></li>--}}
{{--                                </ul>--}}
{{--                            </aside>--}}

                            <aside class="widget widget-tags">
                                 <h3 class="sidebar-title">Filter by Brands</h3>
                                <ul>
                                    @foreach($brand_data as $key=>$brand)
                                    <li>
                                        <a href="{{route('brand.id',['id' => $key])}}">
                                            {{$brand}}{{$key}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <!-- widget-tags end -->                    
                      
                        </div>
                </div> 
            </div>
        </div> 
    </div>

@include('Web::shop._filter_form')
@endsection