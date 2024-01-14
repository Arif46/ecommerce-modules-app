@extends('Web::customer.customer_master')
@section('body')

    <!-- Breadcrumb Area Start -->
    <div class = "breadcrumb-area bg-dark" >
    <div class="container">
          <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Order List</li>
              </ul>
          </nav>
      </div> 
    </div>
    <!-- Breadcrumb Area End -->

  <div class = "my-account-area ptb-80" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title text-center title-style-2">
                      <h2><span>{{Auth::user()->username }} </span>-  <span> Order List</span> </h2>                   
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="cart-main-area">
            <div class="row">
               @if(!empty($order_data))
                  @foreach($order_data as $key => $values)
                  
                  <?php                  
                  $gtotal = $values->total_price - $values->discount_amount;
                  ?>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="grid-table">
                  <p >                    
                  <h3 >
                    <small>Order No - {{$key + 1}} </small><br>
                    <a href="{{ route('customer.order.show', $values->order_number) }}">{{$values->order_number}}</a>
                  </h3></p>
                  <p class="date">Date - {{ date('M d, Y',strtotime($values->date)) }}</p>
                  <p class="price"> Total Pay - <b> ৳ {{number_format($gtotal,2)}} </b> <img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$values->payment_type]}}.png" height="30" style="height:30px !important; margin-left: 20px; " /></p>
                  <p class="small">Status - <b> 

                  @if(isset($values->relOrderTransaction) && !empty($values->relOrderTransaction))
                  @if($values->relOrderTransaction->status == 'active')
                  Paid
                  @endif
                  @else              

                  @if($values->status == 'active')
                      Pending
                      @endif
                    @if($values->status == 'confirmed') 
                      Processing
                      @endif
                    @if($values->status == 'processing') 
                      Shipped
                      @endif
                    @if($values->status == 'delivered') 
                      Delivered
                      @endif
                      @if($values->status == 'inactive') 
                      Payment Due
                      @endif
                    @if($values->status == 'cancel') 
                      Cancel
                    
                    @endif
                  @endif 
                  </b>
              </p>
                <p class="action"><a class="btn btn-primary" href="{{ route('customer.order.show', $values->order_number) }}"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Details</a>
                    <a class="btn btn-info" href="{{ route('customer.order.track', $values->order_number) }}"> <i class="fa fa-truck" aria-hidden="true"></i> Track Order</a>
                   <!--  <a class="btn btn-warning" href="{{ route('customer.order.track', $values->order_number) }}"> <i class="fa fa-print" aria-hidden="true"></i> Print  </a></p> -->

              </div>
              </div>
              
               @endforeach
              @endif
            </div>

           </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
              {{ $order_data->links() }}
          </div>
        </div>
      </div>
  </div>
@endsection