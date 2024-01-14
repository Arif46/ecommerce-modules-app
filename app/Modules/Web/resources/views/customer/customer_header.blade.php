<!-- Header Four Area Start -->
<header class="header-two-area">
    <div class="header-top bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-top-links">
                        <div class="account-wishlist">                         
                          
                          <a href="{{route('customer.complain.suggestion.create') }}">Complain or Suggestion</a> |  
                          <a href="{{route('customer.dashboard') }}">Dashboard</a> |  
                           <a href="{{ route('customer.profile') }}">Profile</a> |
                          <a data-toggle="modal" data-target="#chanePasswordModal" href="#">Password</a> |
                           <a href="{{ route('customer.order', $status ='all') }}">Order</a>
                        </div>                            
  
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
                        <a href="{{URL::to('/')}}"><img src="{{ asset('frontend/assets/img/logo/logo-2.png') }}" alt="Afshini"></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 d-none d-md-block d-lg-block d-xl-block">
                <div class="main-menu display-none">
                    <nav>
                        <ul>
                            <li><a href="{{URL::to('')}}">Home</a></li>
                            <li><a href="{{route('customer.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                            <li><a href="{{ route('customer.address') }}">Address</a></li>
                            <li><a href="{{ route('customer.wishlist') }}">Wishlist</a></li>
                            <li><a href="{{ route('customer.review') }}">Reviews</a></li>
                             <li><a href="{{ route('customer.order', $status ='all') }}">Order</a></li>
                            <li><a href="{{route('web.my.cart')}}" class="">Cart</a></li>                      
                        </ul>
                    </nav>
                </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header-two-content">
                        <div class="search-form-two">
                            <a href="#" class=""><img src="{{ asset('frontend/assets/img/icon/search.png') }}" alt=""></a>
                            {!! Form::open(['method' =>'GET', 'route' => 'search', 'class' => 'header-search1']) !!}    
                        <input type="text" name="keywords" placeholder="Search for item..." value="<?php if(isset($_GET["keywords"])){ echo $_GET['keywords']; } ?>" >
                        <button><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                        </div>
                        <div class="header-settings">
                            <a href="{{route('customer.logout') }}">Logout <img src="{{ asset('frontend/assets/img/icon/user.png') }}" alt=""></a>
                            <!-- <ul>
                                <li><a href="{{route('customer.login') }}">Login</a></li>
                                <li><a href="{{route('customer.login') }}">Sign Up</a></li>                                                        
                            </ul> -->
                        </div>
                        <div class="cart-box-wrapper">
                           <a class="cart-info header-navbar-active" >
                                <?php 
                                    if(Session::has('cart')){ 
                                        $cart_item_count = count(Session::get('cart'));
                                    }else{ 
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
                                <li><a href="{{route('customer.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                                <li><a href="{{ route('customer.address') }}">Address</a></li>
                                <li><a href="{{ route('customer.wishlist') }}">Wishlist</a></li>
                                <li><a href="{{ route('customer.review') }}">Reviews</a></li>
                                 <li><a href="{{ route('customer.order', $status ='all') }}">Order</a></li>
                                <li><a href="{{route('web.my.cart')}}">Cart</a></li>
                                <li><a href="{{route('customer.logout') }}">Logout</a></li>
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
