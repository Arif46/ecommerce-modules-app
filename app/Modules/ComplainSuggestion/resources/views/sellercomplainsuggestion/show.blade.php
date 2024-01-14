@extends('Seller::webseller.seller_master')
@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('seller.complain.suggestion.index')}}">Notice</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->

<div class="my-account-area ptb-80">
    <div class="container">
        <div class="row">
                    
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-fields">
                    <div class="about-skill-area">  
                    <h3>Notice Details</h3>                    

                        <div class="cart-main-area">
                            <div class="cart-table table-responsive">
                                <table id="mainTable" class="table table-hover table-striped table-bordered">
    
                                            <tr>
                                                <th style="width:140px; color:#000;">Notice Title</th>
                                                <td style="color:#000;">{{ isset($data->title)?ucfirst($data->title):''}}</td>
                                            </tr>
                                           
                                            <tr>
                                                <th style="color:#000;">Description</th>
                                                <td style="color:#000; text-align: justify;">
                                                    @if(isset($data->com_sugg_desc))
                                                         {{$data->com_sugg_desc}}
                                                    @endif
                                                </td>
                                            </tr>

                                            

                                        </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection