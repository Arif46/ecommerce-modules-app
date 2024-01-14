<!-- Information Four Area Start style="background-image: url('{{ asset('frontend/assets/img/bg-pic.jpg') }}');"-->
<div class="information-four-area footer-css-top ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 offset-md-1 text-center">
                @if(Session::has('admanager_data'))
                <?php $admanager_data = Session::get('admanager_data');   ?>
                @endif
                @if(isset($admanager_data) && !empty ($admanager_data))
                @foreach ($admanager_data as $databottom)
                @if($databottom->position == 'bottom')
                <h2 style="text-align:center; padding: 20px; font-weight: normal;">{{$databottom->title}}</h2>
                <p>{!!$databottom->caption!!}</p>
                @endif
                @endforeach
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 offset-md-3">
                <div class="newsletter-form mc_embed_signup pb-20">
                    <div class="text-center">
                        
                            <a href="{{route('customer.sign.up')}}" class="button signup-btn" name="subscribe">Sign Up Now</a>
                        </div>
                       
                    </div>
            </div>
        </div>   
    </div>
</div>
<!-- Information Four Area End -->
<!-- Footer Four Area Start -->
<footer class="footer-area pt-100 pb-100">
    <div class="container">        
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 offset-md-1 text-center footer-text">
                    @if(Session::has('admanager_data'))
                    <?php $admanager_data = Session::get('admanager_data');   ?>
                    @endif
                    @if(isset($admanager_data) && !empty ($admanager_data))
                    @foreach ($admanager_data as $dataright)
                    @if($dataright->position == 'footer')
                    <h4>{{$dataright->title}}</h4>
                    <p>{{$dataright->caption}}</p>
                    @endif
                    @endforeach
                    @endif
            </div>
        <div class="col-lg-8 ml-auto mr-auto">
            <div class="subscribe-style-2 text-center">
                <div class="subscribe-form">
                    <a href="{{URL::to('/')}}"><img src="{{ asset('frontend/assets/img/logo/logo-2.png') }}" alt="askmebd.com" height="40"></a>
                </div>
                <div class="footer-menu-2 text-center">
                    <nav>
                        <ul>
                            
                                @if(Session::has('cms_menu'))
                                    <?php $cms_menu = Session::get('cms_menu');   ?>   
                                @endif 

                                @if(isset($cms_menu) && !empty ($cms_menu))
                                     @foreach ($cms_menu as $base_menu)     
                                            <li><a href="{{route('web.cmspage')}}?page_tag={{$base_menu->page_tag}} &&ALeKk00rs-wYHuPoMs53xEs8S9j9POh2zg%3A1605544527732&source=hp&ei=T6qyX7aPKsS_8QO6y7eoBg&q">{{$base_menu->page_tag}}</a></li>
                                     @endforeach
                                 @endif 
                                 <li><a href="{{route('web.faq') }}">Faq</a></li>
                                <li><a href="{{route('web.customise') }}">Gift Card
</a></li>
                                <li><a href="{{route('web.onsell') }}">Campaign</a></li>
                            <li><a href="{{route('customer.login') }}">Login</a></li>
                            <li> <a href="{{route('customer.sign.up') }}">Sign Up</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="footer-social-hm61">
                    <div class="social-link">
                        <a href="https://www.twitter.com/askmebd" target="blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.google-plus.com/askmebd" target="blank"><i class="fa fa-google-plus"></i></a>
                        <a href="https://www.facebook.com/askmebd" target="blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.youtube.com/askmebd" target="blank"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- Footer Four Area End -->
<!--Start of Message Form-->
<div class="modal fade popup_modal" id="popup_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span></button>
            <div class="message-body">
            </div>
        </div>
    </div>
</div>
<!--End of Message Form-->

<!--Mobile Footer-->

<div class="mobile-footer" data-role="footer" data-position="fixed" data-fullscreen="true">

  @if(Auth::check() && Auth::user()->type == 'customer')
   <a class="ui-btn" href="{{route('customer.logout')}}"><img src="{{ asset('frontend/assets/img/icon/logout.png') }}" alt="askmebd.com" height="32"> Logout</a>
  @elseif(Auth::check() && Auth::user()->type == 'seller')
    <a class="ui-btn" href="{{route('seller.logout') }}"><img src="{{ asset('frontend/assets/img/icon/logout.png') }}" alt="askmebd.com" height="32"> Logout</a> 
  @else
   <a href="{{route('customer.sign.up') }}" class="ui-btn"> <img src="{{ asset('frontend/assets/img/icon/sign-up.png') }}" alt="askmebd.com" height="32"> Sign Up </a>
  @endif 
   <a href="{{URL::to('')}}" class="ui-btn">
    <span class="home-btn">
    <img src="{{ asset('frontend/assets/img/icon/icon-white-96.png') }}" alt="askmebd.com" height="32">
    </span></a>

  @if(Auth::check() && Auth::user()->type == 'customer')
  <a href="{{route('customer.dashboard') }}" class="ui-btn" style="border-right: 0px;"> <img src="{{ asset('frontend/assets/img/icon/login.png') }}" alt="askmebd.com" height="32"> Profile</a>
  @elseif(Auth::check() && Auth::user()->type == 'seller')
    <a href="{{route('seller.dashboard') }}" class="ui-btn" style="border-right: 0px;"> <img src="{{ asset('frontend/assets/img/icon/login.png') }}" alt="askmebd.com" height="32"> Profile</a>
  @else
  <a href="{{route('customer.login') }}" class="ui-btn" style="border-right: 0px;"><img src="{{ asset('frontend/assets/img/icon/login.png') }}" alt="askmebd.com" height="32"> Login</a>
  @endif

</div>