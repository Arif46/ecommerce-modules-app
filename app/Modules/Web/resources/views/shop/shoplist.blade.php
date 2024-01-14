@extends('Web::layouts.master')
@section('body')
    <!-- breadcrumb area -->
        <div class="breadcrumb-area bg-img pt-50 pb-50 default-overlay-2" style="background-image: url('{{ asset('frontend/assets/img/bg/bg-pro3.jpg') }}');">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2> All Shop </h2>
                    
                </div>
            </div>
        </div>
        <!-- breadcrumb area end-->
    <div class = "shop-area ptb-80" >
        <div class="container">
                        <div class="row">
                            @if(!empty($shopData))                     
                            @foreach($shopData as $shoplist)
                            <div class="col-lg-4 col-md-4"> 
                            <div class="banner_image_area text-center">                    
                            <div class="product-item">
                                <div class="product-image-hover zoom-hover">
                                <a href="{{ route('shop.shoppro', $shoplist->id) }}%20&&ALeKk00rs-wYHuPoMs53xEs8S9j9POh2zg%3A1605544527732&source=hp&ei=T6qyX7aPKsS_8QO6y7eoBg&q">          
                                <img class="primary-image" src="{{URL::to('')}}/uploads/seller/{{$shoplist->relSellerProfile->shop_logo}}" alt=""> 
                                </a>
                                </div>
                                <div class="product-text">
                                    <a href="{{ route('shop.shoppro', $shoplist->id) }}%20&&ALeKk00rs-wYHuPoMs53xEs8S9j9POh2zg%3A1605544527732&source=hp&ei=T6qyX7aPKsS_8QO6y7eoBg&q">                                   
                                    <h1 style="color:#ff6600!important;"> @if(isset($shoplist->relSellerProfile))
                                                            {{$shoplist->relSellerProfile->shop_name}}
                                                        @endif   </h1>
                                     <div class="product-price">@if(isset($shoplist->relSellerProfile))
                                                            {{$shoplist->relSellerProfile->shop_address}}
                                                        @endif   
                                    </div>
                                    </a>
                                    <div class="text-center mt-40">
                                     <a href="{{ route('shop.shoppro', $shoplist->id)}}%20&&ALeKk00rs-wYHuPoMs53xEs8S9j9POh2zg%3A1605544527732&source=hp&ei=T6qyX7aPKsS_8QO6y7eoBg&q" class="button signup-btn text-center" >All Product</a>
                                 </div>
                                </div>
                            </div>                    
                                </div>
                            </div>

                               @endforeach
                            @endif

                        </div>
        </div> 
    </div>

@endsection