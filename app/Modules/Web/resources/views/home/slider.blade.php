<section class="intro-section appear-animate">
    <div class="container">
        <div class="row grid">
            <div class="grid-item col-xl-3 col-lg-4 height-x2 category-list d-lg-block d-none">
                <ul class="menu menu-options vertical-menu category-menu appear-animate">
                    <li><a href="#" class="menu-title">Categories</a></li>
                    <li><a href="{{route('web.newarrivals')}}">New Arrivals</a></li>
                    
                        @if(Session::has('main_menu'))
                        <?php  $main_data = Session::get('main_menu'); ?>
                        @if(count($main_data) > 0)
                        @foreach($main_data as $menu)
                        <li>
                        <a href="{{route('category.slug',['slug' => $menu['slug']])}}">{{$menu['name']}}</a>
                        @if(!empty($menu['sub_menu']))
                        <div class="megamenu">
                            @if(isset($menu['sub_menu']))
                            <div class="row">
                                @foreach($menu['sub_menu'] as $sub_menu)
                                <div class="col-lg-4">
                                    <a href="{{route('category.slug',['slug' => $sub_menu['slug']])}}">
                                        <h4 class="menu-title">{{$sub_menu['name']}}</h4>
                                    </a>
                                    @if(isset($sub_menu['sub_menu']))
                                    @foreach($sub_menu['sub_menu'] as $sub_menu2)
                                    <ul>
                                        <li>
                                            <a href="{{route('category.slug',['slug' => $sub_menu2['slug']])}}">{{$sub_menu2['name']}}
                                            </a>
                                        </li>
                                    </ul>
                                    @endforeach
                                    @endif
                                </div>
                                @endforeach
                                @if(!empty($menu['image_link']))
                                <div class="col-lg-4">
                                    <div class="menu-banner menu-banner3 banner banner-fixed">
                                        <figure>
                                            <img src="{{URL::to('uploads/category')}}/orginal_image/{{$menu['image_link']}}" width="280" alt="banner">
                                        </figure>
                                        <div class="banner-content banner-date">
                                            <h6 class=" text-white text-right font-weight-bold text-uppercase lh-1 mb-0">
                                                20-22<sup>tm</sup>April</h6>
                                        </div>
                                        <div class="banner-content x-50 w-100 text-center">
                                            <h4 class="banner-subtitle bg-primary d-inline-block mb-1 text-white lh-1 ls-normal text-uppercase font-weight-semi-bold">
                                                Ultimate Sale</h4>
                                            <h3 class="banner-title text-white text-uppercase font-weight-bold lh-1 ls-l mb-0">
                                                Up To 70%</h3>
                                            <p class="text-white font-weight-normal ls-normal mb-2">
                                                Discount Selected Items</p>
                                            <a href="#" class="btn btn-white btn-link btn-underline btn-icon-right btn-icon-right btn-icon-right">Shop
                                                Now<i class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                         @endif
                        </li>
                        @endforeach
                        @endif
                        @endif
                    
                    <li>
                        <a href="#">Electronics</a>
                        <div class="megamenu">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 class="menu-title">Computers</h4>
                                    <ul>
                                        <li><a href="#">Riode</a></li>
                                        <li><a href="#">Acer</a></li>
                                        <li><a href="#">American Dreams</a></li>
                                        <li><a href="#">Apple</a></li>
                                        <li><a href="#">Arcade1UP</a></li>
                                        <li><a href="#">Samsung</a></li>
                                        <li><a href="#">HP</a></li>
                                        <li><a href="#">Sonny</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="menu-title">Tables</h4>
                                    <ul>
                                        <li><a href="#">Ipad</a></li>
                                        <li><a href="#">Dell</a></li>
                                        <li><a href="#">Lenovo</a></li>
                                        <li><a href="#">Peach</a></li>
                                        <li><a href="#">Macintosh</a></li>
                                        <li><a href="#">5G</a></li>
                                        <li><a href="#">Samsung</a></li>
                                        <li><a href="#">Sonny</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <div class="menu-banner menu-banner3 banner banner-fixed">
                                        <figure>
                                            <img src="{{ asset('uploads/category/orginal_image/bs-4.jpg') }}" width="280" alt="banner">
                                        </figure>
                                        <div class="banner-content banner-date">
                                            <h6 class=" text-white text-right font-weight-bold text-uppercase lh-1 mb-0">
                                                20-22<sup>tm</sup>April</h6>
                                        </div>
                                        <div class="banner-content x-50 w-100 text-center">
                                            <h4 class="banner-subtitle bg-primary d-inline-block mb-1 text-white lh-1 ls-normal text-uppercase font-weight-semi-bold">
                                                Ultimate Sale</h4>
                                            <h3 class="banner-title text-white text-uppercase font-weight-bold lh-1 ls-l mb-0">
                                                Up To 70%</h3>
                                            <p class="text-white font-weight-normal ls-normal mb-2">
                                                Discount Selected Items</p>
                                            <a href="#" class="btn btn-white btn-link btn-underline btn-icon-right btn-icon-right">Shop
                                                Now<i class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                   
                    <li><a href="#" class="menu-title">Today Deals</a>
                    </li>
                    <li>
                        <a href="#">
                            Backpacks &amp; Fashion bags
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Daily Deals
                        </a>
                    </li>
                </ul>
            </div>
            <div class="grid-item col-xl-9 col-lg-8 col-md-8 height-x2">
                <div class="slider-wrapper owl-carousel carousel-style-dot">
                    @if(isset($slider_data) && !empty ($slider_data))
                    @foreach ($slider_data as $data)
                    <div class="single-slide" style="background-image: url('{{URL::to('uploads/slider')}}/{{$data->image_link}}'); height: 530px;">
                        <div class="container">
                            <div class="slider-banner text-center">
                                <h2>{{$data->title}}</h2>
                                <p>{!!$data->caption!!}</p>
                                @if(!empty($data->route))
                                <a href="{{$data->route}}" class="banner-btn">Shop now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            
           
        </div>
    </div>
</section>