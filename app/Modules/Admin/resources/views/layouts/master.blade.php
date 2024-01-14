<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Askmebd || {{isset($pageTitle)?$pageTitle:''}}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link href="{{ asset('frontend/assets/img/favicon.png') }}" type="img/x-icon" rel="shortcut icon">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet"/>
    <!-- Custom Css -->
    <link href="{{ asset('admin/css/plugins.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/responsive.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- Jquery Core Js -->
    <script src="{{ asset('admin/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/ckeditor/texteditor.js') }}"></script>
</head>

<body class="wrapper">
<!-- header start -->
<header class="header-area transparent-bar sticky-bar header-black header-padding header-hm6 mobile-menu-black">
    <div class="container-fluid">
        <div class="header-wrap header-flex">
            <div class="logo mt-45">
                <a href="{{ url('admin-dashboard') }}">
                    <img class="logo-normally-none" width="120" src="{{ asset('frontend/assets/img/logo/logo-2.png') }}"
                         alt="askmebd">
                    <img class="logo-sticky-none" width="120" src="{{ asset('frontend/assets/img/logo/logo-2.png') }}"
                         alt="askmebd">
                </a>
            </div>
            <div class="main-menu">
                <nav>
                    <ul>
                        <li><a href="{{ url('admin-dashboard') }}">Dashboard</a></li>

                        <li><a href="javascript:void(0);">Order Manage</a>
                            <ul class="submenu">

                                <li><a href="{{route('admin.order.index')}}"> All Order</a></li>

                                <li><a href="">Traking</a></li>

                                <li><a href="{{route('admin.coupon.index')}}">Coupon</a></li>
                                <li><a href="{{route('admin.shipping.options.index')}}">Shipping Method</a></li>

                                <li><a href="{{route('admin.payment.index')}}"> All Payments</a></li>
                                <li><a href="{{route('admin.complain.suggestion.index')}}"> Complain or Suggestion</a></li>
                                <li><a href="{{route('admin.notice.index')}}">Notice</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);">Product Manage</a>
                            <ul class="submenu">
                                 <li><a href="{{route('admin.product.index')}}"> All Product</a></li>

                                 <li><a href="{{route('admin.brand.index')}}">Brand Manage</a></li>

                                <li><a href="{{route('admin.category.index')}}">Category Manage</a></li>

                                 <li><b>Color & Size Manage</b></li>
                                  <li><a href="{{ route('admin.color.index') }}"> Color Manage</a></li>
                                  <li><a href="{{ route('admin.size.index') }}"> Size Manage</a></li>
                            </ul>
                        </li>

                         <li><a href="javascript:void(0);">Inventory</a>
                            <ul class="submenu">
                                <li><a href="{{route('inventory.seller.summary.list')}}">Seller Summary</a></li>
                                <li><a href="{{route('inventory.height.selling.product')}}">Highest Sell Product</a></li>
                                <li><a href="{{route('report.product.in.list')}}">Product In</a></li>
                                <li><a href="{{route('report.product.out.list')}}">Product Out </a></li>
                                <li><a href="{{route('inventory.seller.summary.list')}}">Highest Order(Amount) </a></li>

                            </ul>
                        </li>

                        <li><a href="javascript:void(0);">Account</a>
                            <ul class="submenu">
                                <li><a href="{{ url('account-details-list') }}">Seller Account Summary</a></li>

                                <li><a href="{{route('admin.seller.payment.index')}}"> Seller Payment List</a></li>
                                <li><a href="{{route('admin.seller.payment.create')}}">Create Seller Payment </a></li>

                                <li><a href="{{route('admin.seller.payment.create')}}"> Seller Payment Options</a></li>
                                <li><a href="{{route('admin.payment.options.index')}}">Payment Options</a></li>

                            </ul>
                        </li>

                        <li><a href="javascript:void(0);">Settings </a>

                            <ul class="submenu">
                                <li><b>CMS </b></li>
                                <li><a href="{{route('admin.cms.index')}}">Page Manage</a></li>
                                <li><a href="{{route('admin.slider.index')}}">Slider Manage</a></li>
                                <li><a href="{{route('admin.admanager.index')}}">Home Add</a></li>
                                <li><a href="{{route('admin.faq.index')}}">FAQ</a></li>
                                <li><b>Commission</b></li>
                                <li><a href="{{route('admin.seller.commission.index')}}">Seller Commission Agreement</a></li>
                                <li><a href="{{route('admin.commission.index')}}">Commission manage</a></li>

                                  <li><a href="{{ route('admin.color.index') }}"> Color Settings</a></li>
                                  <li><a href="{{ route('admin.size.index') }}"> Size Settings</a></li>
                            </ul>
                        </li>



                        <li><a href="{{route('admin.user.index')}}">User Manage</a>
                            <ul class="submenu">
                                @if((Auth::user())->type == \App\AppConfig::USER_ROLE_TYPE_SUPER_ADMIN)
                                    <li><a href="{{route('admin.user.index')}}"> Admin</a></li>
                                @endif
                                <li><a href="{{route('admin.seller.list')}}"> Seller </a></li>
                                <li><a href="{{route('admin.seller.list')}}"> To Be Seller </a></li>
                                <li><a href="{{route('admin.customer.index')}}">Customer</a></li>
                            </ul>
                        </li>
                        <li><a type="button" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="">
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                Sign Out
                            </a></li>
                    </ul>
                </nav>
            </div>
            <div class="header-right-wrap mt-55">
                <div class="header-search mr-20">
                    <button class="sidebar-trigger-search">
                            <span class="ti-search">
                    </button>
                </div>
                <div class="bar-icon">
                    <button class="header-navbar-active">
                            <span class="ti-menu">
                    </button>
                </div>
            </div>
        </div>
        <div class="mobile-menu-area">
            <div class="mobile-menu">
                <nav id="mobile-menu-active">
                    <ul class="menu-overflow">
                        <!-- Mobile Menu -->
                        <li><a href="{{route('admin.category.index')}}">Category</a></li>
                        <li><a href="javascript:void(0);">Attribute</a>
                            <ul class="submenu">
                                <li><a href="{{ route('admin.attribute.index') }}"> Attribute List</a></li>
                                <li><a href="{{ route('admin.attribute.set.index') }}"> Attribute Set</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);">Seller</a>
                            <ul class="submenu">
                                <li><a href="{{route('admin.seller.list')}}"> Seller List</a></li>
                                <li><a href="{{route('admin.order.index')}}"> All Order</a></li>
                                <li><a href="{{route('admin.product.index')}}"> All Product</a></li>
                                <li><a href="{{route('admin.payment.index')}}"> All Payments</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('admin.shipping.options.index')}}">Shipping</a></li>
                        <li><a href="{{route('admin.payment.options.index')}}">Payment</a></li>
                        <li><a href="{{route('admin.coupon.index')}}">Coupon</a></li>
                        <li><a href="{{route('admin.cms.index')}}">CMS Page</a></li>
                        <li><a href="{{route('admin.slider.index')}}">Slider</a></li>
                        <li><a href="{{route('admin.admanager.index')}}">Home Add</a></li>
                        <li><a href="{{route('admin.faq.index')}}">FAQ</a></li>
                        <li><a href="{{route('admin.user.index')}}">User</a>
                            <ul class="submenu">
                                <li><a href="{{route('admin.user.index')}}"> Admin</a></li>
                                <li><a href="{{route('admin.seller.index')}}">Seller</a></li>
                                <li><a href="{{route('admin.customer.index')}}">Customer</a></li>
                            </ul>
                        </li>
                        <li><a type="button" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="">
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                Sign Out
                            </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- breadcrumb area -->
<div class="breadcrumb-area pt-50 pb-15">
    <div class="container">
        <div class="breadcrumb-content breadcrumb-black2 text-center">
            <!-- <h2>Admin</h2>                -->
        </div>
    </div>
</div>
<!-- main-search start -->
<div class="main-search-active">
    <div class="sidebar-search-icon">
        <button class="search-close"><span class="ti-close"></button>
    </div>
    <div class="sidebar-search-input">
        <form>
            <div class="form-search">
                <input id="search" class="input-text" value="" placeholder="Search Entire Store" type="search">
                <button>
                    <i class="ti-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- summary-info start -->
<div class="summary-info sidebar-active">
    <div class="wrap-sidebar">
        <div class="sidebar-nav-icon">
            <button class="op-sidebar-close"><span class="ti-close"></button>
        </div>
        <div class="summary-info-all">
            <div class="summary-logo">
                <a href="index.html">
                    <img src="{{ asset('frontend/assets/img/logo/logo-2.png') }}" alt="">
                </a>
            </div>
            <div class="summary-list-wrap">
                <div class="summary-list">
                    <ul>
                        <li><a href="{{route('admin.category.index')}}">Category</a></li>
                        <li><a href="{{ route('admin.attribute.index') }}"> Attribute List</a></li>
                        <li><a href="{{ route('admin.attribute.set.index') }}"> Attribute Set</a></li>
                        <li><a href="{{route('admin.seller.list')}}"> Seller List</a></li>
                        <li><a href="{{route('admin.order.index')}}"> All Order</a></li>
                        <li><a href="{{route('admin.product.index')}}"> All Product</a></li>
                        <li><a href="{{route('admin.payment.index')}}"> All Payments</a></li>
                        <li><a href="{{route('admin.shipping.options.index')}}">Shipping</a></li>
                        <li><a href="{{route('admin.payment.options.index')}}">Payment</a></li>
                        <li><a href="{{route('admin.coupon.index')}}">Coupon</a></li>
                        <li><a href="{{route('admin.cms.index')}}">CMS Page</a></li>
                        <li><a href="{{route('admin.slider.index')}}">Slider</a></li>
                        <li><a href="{{route('admin.admanager.index')}}">Home Add</a></li>
                        <li><a href="{{route('admin.events.index')}}">Event</a></li>
                        <li><a href="{{route('admin.faq.index')}}">FAQ</a></li>
                        <li><a href="{{route('admin.user.index')}}"> Admin</a></li>
                        <li><a href="{{route('admin.seller.index')}}">Seller</a></li>
                        <li><a href="{{route('admin.customer.index')}}">Customer</a></li>
                        <li><a type="button" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="">
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                Sign Out
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-area pt-80 pb-80">
    <div class="container-fluid">
        <div class="row flex-row-reverse">
            <div class="col-lg-12">
                <!-- Main Content -->
                @yield('body')
            </div>
        </div>
    </div>
</div>
@include('Admin::error.msg')
<footer class="footer-area theme-bg pt-10 pb-10">
    <div class="container">
        <div class="footer-bottom pt-25">
            <div class="row">
                <div class="col-12">
                    <div class="copyright text-center">
                        <p>
                            Copyright ©
                            <a href="#">askmebd.com</a>
                            . All Right Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap Core Js -->
<script src="{{ asset('admin/js/vendor/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/js/vendor/jquery-migrate-v3.3.0.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.js') }}"></script>
<!-- Select Plugin Js -->
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<!-- Slimscroll Plugin Js -->
<script src="{{ asset('admin/js/vendor/plugins.js') }}"></script>
<!-- <script src="{{ asset('admin/js/jquery.meanmenu.js') }}"></script> -->
<script src="{{ asset('admin/js/main.js') }}"></script>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


<script>
    $( document ).ready(function() {
        $('.print-window').click(function() {
                     window.print();
                     return false;
            });
    });
</script>

<script>
    function printDiv() {
    var divContents = document.getElementById("print-area").innerHTML;
    var a = window.open('', '', 'height=1200, width=800');
    a.document.write('<html><body>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
    }
</script>

@yield('script')
</body>

</html>
