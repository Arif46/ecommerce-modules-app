@extends('Web::customer.customer_master')
@section('body')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Rating</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <div class="my-account-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-title text-center title-style-2">
                    <h2><span>{{Auth::user()->username }} Review </span> </h2>                      
                </div>
                    <div class="cart-main-area">
                    <div class="cart-table table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th> Rating </th>
                                <th> Product Name </th>
                                <th> Review Title</th>
                                <th> Review</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if(count($review_data) > 0)
                               <?php
                                    $total_rows = 1;
                               ?>
                                   @foreach($review_data as $values)
                                       <tr>
                                            <td>
                                                <?=$total_rows?>
                                                    
                                            </td>
                                            <td>
                                                {{$values->rating_value_score}}
                                            </td>
                                            <td>
                                                @if (isset($values->relProduct))
                                                   {{$values->relProduct->product_title}}
                                                @endif
                                                
                                            </td>
                                            <td>
                                                {{$values->title}}
                                            </td>
                                            <td>
                                                {!!$values->review!!}
                                            </td>                                            
                                        </tr>
                                    <?php
                                    $total_rows++;
                                    ?>
                                    @endforeach
                            @endif

                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>			


@endsection