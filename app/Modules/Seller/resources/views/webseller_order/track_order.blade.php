@extends('Seller::webseller.seller_master')
@section('body')

	<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
 <!-- {!! Form::open(['method' => 'post', 'files'=> true, "class"=>"", 'id' => '']) !!} -->
 <form action="#" method="POST">
    <!-- Cart Main Area Start -->
    <div class="cart-main-area ptb-80 checkout-success">
        <div class="container">                
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">                     
                            @if(isset($data) && !empty($data))
                            <h2><span>Order number : {{ $data->order_number }}</span></h2>
                            @endif                          
                        </div>
                </div>
	            <div class="col-md-8 col-sm-12 offset-md-2">

	            <!-- Multi step form -->
			    <section class="orderstep text-center">
			        <div class="tittle mb-60">
			            <h2>Order Processing System</h2>
			            <p>Once an order is received, it will be assigned to a delivery boy and sends notification at every stage.</p>
			        </div>
			         @if(isset($data) && !empty($data))
			          @foreach($data->relOrderDetail as $item)
			         <?php //dd($data->relOrderDetail); ?>

                     @if($item->id == $id)

                     @if($item->status == 'active' )
                    <style>
                        .orderstep #progressbar li.active:before,
                            .orderstep #progressbar li.active:after {
                                background: #ff6600;
                                color: white;
                            }
                    </style>
                        <ul id="progressbar" class="text-center" style="display: inline-block; ">
                             <a style="color: #ff6600;" href="{{ route('seller.order.track.update', $item->id) }}?status=confirmed" onclick="return confirm('Are you sure to Processing?')" ><li class="active" ></li></a>
                        </ul>
                          <h3> <b style="color:#ff6600;">Pending for Payment . </b> </h3> <h5>Please send payment as soon as possible</h5>
                     @endif

                     @if($item->status == 'cancel' )
                     <style>
                        .orderstep #progressbar li.active:before,
                            .orderstep #progressbar li.active:after {
                                background: #ff6600;
                                color: white;
                            }
                    </style>
                     <div style="text-align: center;">
                        <ul id="progressbar" class="text-center" style="display: inline-block; ">
                            <a style="color: #ff6600;" href="{{ route('seller.order.track.update', $item->id) }}?status=active" onclick="return confirm('Are you sure to Active?')" ><li class="active" style="color:#ff6600;"></li></a>
                        </ul>
                        <h3><b style="color:#ff0000;">Order Cancel</b></h3> <h5>Investors may cancel standing orders, such as a limit or stop order, for any reason so long as the order has not been filled yet.</h5>
                    </div>
                     @endif

                     @if($item->status == 'confirmed' )                       
	                    <ul id="progressbar">
				            <li class="active complate processing" >Processing</li>
				            <a href="{{ route('seller.order.track.update', $item->id) }}?status=processing" onclick="return confirm('Are you sure to Shipped?')" ><li class="shipped">Shipped</li></a>
				            <li class="delivered" >Delivered</li>
				        </ul>
                        
                     @endif

                     @if($item->status == 'processing' )
	                    <ul id="progressbar">
				            <li class="active processing">Processing</li>
				            <li class="active complate shipped">Shipped</li>
				            <a style="color: #ff6600;" href="{{ route('seller.order.track.update', $item->id) }}?status=delivered" onclick="return confirm('Are you sure to delivered?')" ><li class="delivered">Delivered </li></a>
				        </ul>                   
                     @endif

                     @if($item->status == 'delivered' )
	                    <ul id="progressbar">
				            <li class="active processing">Processing</li>
				            <li class="active shipped">Shipped</li>
				            <li class="active delivered">Delivered</li>
				        </ul> 
                     @endif

                     @endif  
                     @endforeach    
                     @endif 

			        <!-- progressbar -->
			       
			    </section>
   				<!-- End Multi step form -->

	            </div>
            </div>
        </div>
    </div>
            <div class="all-cart-buttons text-center mb-40">
            <a href="{{URL::to('seller/order-index')}}" class="button">back</a>          
           </div> 
  {!! Form::close() !!}
@endsection