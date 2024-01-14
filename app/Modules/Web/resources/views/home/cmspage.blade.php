@extends('Web::layouts.master')
@section('body')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}"><i class="fa fa-angle-double-right"></i> Home</a>
                </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fa fa-angle-right"></i> Page</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- About Skill Area Start -->
    <div class="about-skill-area pt-80 pb-50">
        <div class="container">
            <div class="row">
                 @if(!empty($cmsData))

                                <?php $count = 1; ?>

                                @foreach($cmsData as $cms)

                <div class="col-lg-12 col-md-12">
                    <h2>{{$cms->title}}</h2>
                    <div class="about-skill-test">
                        <p> {!! $cms->description !!}</p>
                    </div>
                </div>
                      <?php $count++;?>
                                @endforeach

                            @endif


            </div>
        </div>
    </div>
    <!-- About Skill Area End -->
        <div class="google-add-home">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- webart-01 -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-6679975125787544"
                         data-ad-slot="5740116884"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    </div>
                </div>
            </div>
    </div>
@endsection