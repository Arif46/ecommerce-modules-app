<!-- Header Four Area Start -->
<header class="header-two-area">
	<div class="header-top bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-top-links">
                        <div class="account-wishlist">                         
                           <a href="{{ route('seller.dashboard') }}"> Dashboard  </a> |
                           <a href="{{route('seller.complain.suggestion.index')}}">Notice</a>|  
                           <a href="{{route('seller.complain.suggestion.create')}}">Complain or Suggestion</a>|  
                           <a href="{{ route('seller.add.product') }}">Add Product</a> |
                           <a href="{{ route('seller.my.product') }}">Product List</a> |
                           <a class="<?=Route::currentRouteName()=='seller.dashboard'? 'active-hover-m':'active-m'?>" href="{{ route('seller.profile') }}"> Profile  </a>                             
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
                            <li><a href="{{ route('seller.dashboard') }}">Dashboard</a></li>
                            
                            <li><a href="{{ route('seller.add.product') }}">Add Product</a></li>
                            <li><a href="{{ route('seller.my.product') }}">Product List</a></li>
                            <li><a href="{{ route('seller.payment.index') }}">Payment</a></li>
                            <li><a href="{{ route('seller.payment.index') }}">Account</a></li>
                            <li><a href="{{ route('seller.order.index') }}">Order</a></li>
                            <!-- <li><a href="{{ route('seller.coupon') }}">Coupon</a></li> -->
                            <li><a href="{{ route('seller.profile') }}">Profile </a></li>   
                            <!-- <li><a href="{{ route('seller.delivery.option') }}">Delivery</a></li>                           -->
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
                            <a href="{{route('seller.logout') }}">Logout <img src="{{ asset('frontend/assets/img/icon/user.png') }}" alt=""></a>
                            <!-- <ul>
                                <li><a href="{{route('customer.login') }}">Login</a></li>
                                <li><a href="{{route('customer.login') }}">Sign Up</a></li>                                                        
                            </ul> -->
                        </div>
                        
                    </div>
                </div>
            </div>
               
                <!-- Mobile Menu Area Start -->
                <div class="mobile-menu-area row">
                    <div class="mobile-menu seller-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                            <li><a href="{{ route('seller.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('seller.add.product') }}">Add Product</a></li>
                            <li><a href="{{ route('seller.my.product') }}">Product List</a></li>
                            <li><a href="{{ route('seller.payment.index') }}">Payment</a></li>
                            <li><a href="{{ route('seller.order.index') }}"> Order</a></li>
                            <!-- <li><a href="{{ route('seller.coupon') }}">Coupon</a></li> -->                            
                            <li><a href="{{ route('seller.profile') }}">Profile </a></li>
                            <li><a href="{{route('seller.logout') }}">Logout</a></li> 
                            </ul>
                        </nav>                          
                    </div>
                </div>
                <!-- Mobile Menu Area End -->
            </div>
        </div>
    </div>
</header>	

<!-- Header Four Area End -->   
