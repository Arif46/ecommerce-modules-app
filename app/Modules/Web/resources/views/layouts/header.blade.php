<!-- Header Four Area Start -->
<header class="header-two-area">
    <div class="header-top bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="header-top-links">
                        <div class="account-wishlist">
                            @if(Auth::check() && Auth::user()->type == 'seller')
                                <a href="{{route('seller.dashboard') }}">Dashboard</a> |
                            @endif
                            @if(Auth::check() && Auth::user()->type == 'customer')
                                <a href="{{route('customer.dashboard') }}">Dashboard</a> |
                            @endif
                            <!-- <a href="{{route('web.faq')}}">FAQ</a> -->
                            @if(Auth::check() && Auth::user()->type == 'seller')
                                <a href="{{route('seller.logout')}}">Logout</a>
                            @endif
                            @if(Auth::check() && Auth::user()->type == 'customer')
                                <a href="{{route('customer.logout')}}">Logout</a>
                            @endif
                        </div>
                        @if(!Auth::check())
                            <div class="col-lg-8 col-md-8 col-sm-6">
                            <span class="welcome-text">
                                <!-- Top Slider Area Start -->
                                <a href="{{route('seller.area')}}">Merchant Corner </a> | <a href="#">Complain & Suggestion </a> | <a
                                        href="#">Track Order </a>
                            </span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="account-wishlist">
                                    <a href="{{route('customer.login') }}">Login </a> |
                                    <a href="{{route('customer.sign.up') }}"> Sign Up </a>
                                    <!-- DropDown Menu -->
                                    <div class="dropdown ml-5">
                                        <a href="#language">ENG</a>
                                        <ul class="dropdown-box">
                                            <li>
                                                <a href="#USD">BAN</a>
                                            </li>
                                            <li>
                                                <a href="#EUR">ENG</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End DropDown Menu -->
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-sticky">
        <div class="menu-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{URL::to('/')}}"><img src="{{ asset('frontend/assets/img/logo/logo-2.png') }}"
                                                            alt="afshini.com" class="img-responsive img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 d-none d-md-block d-lg-block d-xl-block">
                        <!-- Header Search  -->
                        <div class="header-search hs-simple">
                            {!! Form::open(['method' =>'GET', 'route' => 'search', 'class' => 'header-search1']) !!}
                            <input type="text" name="keywords" placeholder="Search for item..." autocomplete="off"
                                   value="<?php if(isset($_GET[" keywords"])){ echo $_GET['keywords']; } ?>">
                            <button class="btn btn-search" type="submit" title="submit-button"><i
                                        class="fa fa-search"></i></button>
                            {!! Form::close() !!}
                        </div>
                        <!-- End Header Search -->
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="header-two-content">
                            @if(Auth::check() && Auth::user()->type == 'customer')
                                <div class="header-settings">
                                    <a href="{{route('customer.wishlist')}}" class="wishlist-toggle" title="wishlist">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            @endif

                            <div class="cart-box-wrapper">
                                <a class="cart-info header-navbar-active">
                                    <?php
                                    if (Session::has('cart')) {
                                        $cart_item_count = count(Session::get('cart'));
                                    } else {
                                        $cart_item_count = 0;
                                    }
                                    ?>
                                    <img src="{{ asset('frontend/assets/img/icon/cart-2.png') }}" alt="">
                                    <span id="total_item_put">{{$cart_item_count}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area Start -->
                <div class="mobile-menu-area row">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="{{URL::to('')}}">Home</a></li>
                                <li><a href="{{route('web.newarrivals')}}">New Arrivals</a></li>
                                @if(Session::has('main_menu'))
                                        <?php $main_data = Session::get('main_menu'); ?>
                                    @if(count($main_data) > 0)
                                        @foreach($main_data as $menu)
                                            <li class="megamenu">
                                                <a href="{{route('category.slug',['slug' => $menu['slug']])}}">{{$menu['name']}}</a>
                                                @if(isset($menu['sub_menu']))
                                                    <ul class="mega-menu mega-menu-width-img">
                                                        @foreach($menu['sub_menu'] as $sub_menu)
                                                            <li>
                                                                <ul>
                                                                    <li>
                                                                        <a href="{{route('category.slug',['slug' => $sub_menu['slug']])}}">{{$sub_menu['name']}}
                                                                        </a>
                                                                    </li>
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
                                                        @if(!empty($menu['image_link']))
                                                            <!-- <li class="menu-img">
                                                            <img src="{{URL::to('uploads/category')}}/orginal_image/{{$menu['image_link']}}" alt="{{$menu['name']}}"   class="img-responsive img-fluid">
                                                        </li> -->
                                                        @endif
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                @endif
                                <!--  <li><a href="{{route('web.customise') }}">Customise</a></li>
                                <li><a href="{{route('web.onsell') }}">Sale</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu Area End -->
            </div>
        </div>
    </div>
</header>
<!-- Header Four Area end -->
<!-- summary-info start -->
<div class="summary-info sidebar-active">
    <div class="wrap-sidebar">
        <div class="sidebar-nav-icon">
            <button class="op-sidebar-close"><i class="fa fa-close"></i></button>
        </div>
        <div class="summary-info-all">
            <div id="cart_data_put">
                @include('Web::cart._cart')
            </div>
        </div>
    </div>
</div>
