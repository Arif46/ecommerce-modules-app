@extends('Web::layouts.master')
@section('body')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}"><i class="fa fa-angle-double-right"></i> Home</a>
                </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fa fa-angle-right"></i> Testimonial</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <!-- About Skill Area Start -->
    <div class="about-skill-area pt-80 pb-50">
        <div class="container">
            <div class="row">
                 @if(!empty($testimonialData))
                <?php $count = 1; ?>
                    @foreach($testimonialData as $testimo)

                <div class="col-lg-12 col-md-12">
                    <h2>{{$testimo->title}}</h2>
                    <div class="about-skill-test">
                        <p> {!! $testimo->caption !!}</p>
                    </div>
                </div>
                      <?php $count++;?>
                    @endforeach

                @endif


            </div>
        </div>
    </div>
    <!-- Area End -->
@endsection