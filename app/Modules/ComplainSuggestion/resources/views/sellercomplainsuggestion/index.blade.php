@extends('Seller::webseller.seller_master')

@section('body')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
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
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>
                            <h3>Notice Board</h3>
                        </div>
                    </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-fields">
                    <div class="about-skill-area">   

                        <div class="row">
                            <div class="col-lg-6">
                                 {!! Form::open(['method' =>'GET', 'route' => 'seller.complain.suggestion.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search"></span>
                                        </button>
                                        {!! Form::close() !!}
                            </div>
                        </div>                   

                        <div class="cart-main-area">
                            <div class="cart-table table-responsive">


                                <table id="mainTable" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>         
                                                <th>Notice Title </th>
                                                <th> Description </th>
                                                <th> Action </th>
                                            </tr>
                                    </thead>

                                    <tbody>
                                      @if(!empty($data) )
                                      
                                       @foreach($data as $values)
                                       
                                           <tr>
                                            <td>
                                            {{substr($values->title, 0, 25)}}
                                            </td>
                                            <td>
                                            {{substr($values->com_sugg_desc, 0, 40)}}
                                            </td>
                                            <td>
                                                
                                                @if( ($values->user_status==2) )
                                                <a href="{{ route('seller.complain.suggestion.show', $values->id) }}" class="btn btn-primary">Readed</a>
                                                @else
                                                <a href="{{ route('seller.complain.suggestion.show', $values->id) }}" class="btn btn-primary"><span style="color:#f00 !important;">Read</span></a></b>

                                                @endif
                                            </td>
                                        </tr>  
                                        @endforeach
                                      @endif
                                    </tbody>
                                    </table>
                            </div>
                            {{ $data->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                    

@endsection
