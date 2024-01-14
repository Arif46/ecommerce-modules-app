<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Askme BD
        {{-- @if(isset($pageTitle))
           {{$pageTitle}}
       @endif --}}
    </title>
    <meta name="keywords"
          content="bangladesh online shop, bangladesh, best fashion, fashion, clothing, fragrance, accessories, comfortable , stylish , men, women, children, cloth, gift item, bd shop, shop, online store,  buy, sell, festival, kids & mom, Free home delivery, return, 01312-3044266">
    <meta name="description"
          content="askmebd Online Shopping in Bangladesh - askmebd.com is Online Shopping at Low price in Dhaka, Chittagong, Khulna, Sylhet , Mymensingh , Rajshahi and Barishal. askmebd is best online shop in bangladesh. We are in  top 5 online shopping site in dhaka, bangladesh. We have various latest collections for all types of product and stylish womens collection for dresses with cash on delivery. We are best online shop in bangladesh list. We keep the best quick & easy online shopping in Bangladesh. Please visit our site to get best collection with style just arrived now.">
    <meta property="og:url" content="http://www.askmebd.com/"/>
    <meta property="og:type" content="website">
    <meta property="og:title" content="Online Shopping in Bangladesh at Low price - askmebd.com"/>
    <meta property="og:description"
          content="Online Shopping in Bangladesh at Low price in ✓ Dhaka, ✓ Chittagong,✓  Khulna, ✓ Sylhet , ✓ Mymensingh , ✓ Rajshahi and ✓ Barishal."/>
    <meta property='og:site_name' content='askmebd'/>
    <meta property="og:image" content="{{ asset('frontend/assets/img/logo/afshini_logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/img/favicon.png') }}">
    <link href="{{ asset('frontend/assets/img/favicon.png') }}" type="img/x-icon" rel="shortcut icon">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Add to Home">
    <link rel="manifest" href="{{URL::to('/')}}/manifest.json">
    <link rel="manifest" href="{{URL::to('/')}}/manifest.webmanifest">
    <meta name="application-name" content="askmebd">
    <link rel="icon" sizes="16x16 32x32 92x92" href="{{ asset('frontend/assets/img/icon/icon-96.png') }}">
    <link rel="icon" sizes="192x192" href="{{ asset('frontend/assets/img/icon/icon-192.png') }}">
    <link rel="shortcut icon" sizes="16x16" href="{{ asset('frontend/assets/img/favicon.png') }}">
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('frontend/assets/img/icon/icon-96.png') }}">
    <meta name="theme-color" content="#122344">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @include('Web::layouts.frontend_css')
    <meta name="google-site-verification" content="9cxLWp9tFjf6Oe0aJzhjZWHrAQEdg2ELwd4qq5BQ-dk"/>

    <script data-ad-client="ca-pub-6679975125787544" async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<!-- <body class="wrapper" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);" oncontextmenu="return false;"> -->
<body class="wrapper">
<!-- header for desktop  -->
@include('Web::layouts.header')

@if(Session::has('danger'))
    <div class="alert alert-danger fade show" role="alert">
        <span class="close" data-dismiss="alert">×</span>
        {{Session::get('danger')}}
    </div>
@endif

@if(Session::has('message'))
    <div class="alert alert-success fade show" role="alert">
        <span class="close" data-dismiss="alert">×</span>
        {{Session::get('message')}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger fade show" role="alert">
        <span class="close" data-dismiss="alert">×</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Body Part -->
@yield('body')


<!-- Footer part -->
@include('Web::layouts.footer')

<!-- script -->
@include('Web::layouts.frontend_js')

@include('Web::layouts.frontend_script')
<script language="javascript">
    function disableselect(e) {
        return false;
    }

    function reEnable() {
        return true;
    }

    //if IE4+
    document.onselectstart = new Function("return false")

    //if NS6
    if (window.sidebar) {
        document.onmousedown = disableselect
        document.onclick = reEnable
    }

    function disableCtrlKeyCombination(e) {
        //CTRL+key combinations
        var forbiddenKeys = new Array('a', 'n', 'c', 'x', 'v', 'j', 'w');
        var key;
        var isCtrl;
        if (window.event) {
            key = window.event.keyCode;//IE
            if (window.event.ctrlKey) {
                isCtrl = true;
            } else {
                isCtrl = false;
            }
        } else {
            key = e.which;//firefox
            if (e.ctrlKey) {
                isCtrl = true;
            } else {
                isCtrl = false;
            }
        }
        //if ctrl is pressed check if other key is in forbidenKeys array
        if (isCtrl) {
            for (i = 0; i < forbiddenKeys.length; i++) {
                //case-insensitive comparation
                if (forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase()) {/*alert("You don't have access to copy this content");*/
                    return false;
                }
            }
        }
        return true;
    }
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-185647920-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-185647920-1');
</script>
@yield('script')
</body>
</html>
