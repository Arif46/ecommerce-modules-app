@extends('Web::customer.customer_master')
@section('body')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <div class="my-account-area ptb-80">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 table-responsive">
                    <div class="section-title text-center title-style-2">
                        <h2><span>{{Auth::user()->username }} Wishlist </span></h2>
                    </div>
                    <div class="cart-main-area">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th> {{__('messages.Products')}} </th>
                                    <th> {{__('messages.Action')}} </th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($wishlist_data))
                                    @foreach($wishlist_data as $key => $wishlist)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                @if(isset($wishlist->relProduct) && !empty($wishlist->relProduct))
                                                    <a href="{{route('product.slug',['slug' => $wishlist->relProduct->product_slug])}}">
                                                        {{$wishlist->relProduct->product_title}}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($wishlist->relProduct) && !empty($wishlist->relProduct))
                                                    <a class="btn btn-primary btn-sm"
                                                       href="{{route('product.slug',['slug' => $wishlist->relProduct->product_slug])}}">
                                                        Details
                                                    </a>
                                                    <a class="shop-cart-add btn btn-primary btn-sm"
                                                       product_id="{{$wishlist->product_id}}"
                                                       data_href="{{route('web.cart.add')}}"
                                                       product_quantity="1">
                                                        Add to Cart
                                                    </a>
                                                    <a class="btn btn-danger btn-sm"
                                                       href="{{route('customer.remove.to.wishlist',['id' => $wishlist->product_id])}}"
                                                       onclick="return confirm('Are you sure to Delete?')">
                                                        Remove
                                                    </a>

                                                @endif
                                            </td>
                                        </tr>

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
@section('script')
    <script>
        $(document).on("click", ".shop-cart-add", function (e) {
            // $(document).on(".shop-cart-add",'click',function(e) {
            e.preventDefault();
            var product_id = $(this).attr('product_id');
            var product_quantity = $(this).attr('product_quantity');
            var url = $(this).attr('data_href');

            $.ajax({
                url: url,
                method: "POST",
                data: {_token: '{!! csrf_token() !!}', product_id: product_id, product_quantity: product_quantity},
                dataType: "json",
                beforeSend: function (xhr) {

                }
            }).done(function (response) {

                $('#cart_data_put').html(response.cart_body);
                $('#total_item_put').html(response.total_item);
                $('.sidebar-active').addClass('inside');
                $('.wrapper').addClass('overlay-active');
                // window.location.href = "{{ route('web.my.cart') }}";
                setTimeout(function () {
                    $('.sidebar-active').removeClass('inside');
                    $('.wrapper').removeClass('overlay-active');
                }, 2500); //25 sec

            }).fail(function (jqXHR, textStatus) {
                alert("Request failed: " + jqXHR.responseText);
            });


            return false;
        });
        $(document).on("click", ".remove-product-mc", function (e) {

            var product_id = jQuery(this).attr('product_id');

            var url = '{{ route('web.cart.remove.item.mc') }}';

            $.ajax({
                url: url,
                method: "POST",
                data: {_token: '{!! csrf_token() !!}', product_id: product_id},
                dataType: "json",
                beforeSend: function (xhr) {

                }
            }).done(function (response) {

                if(response.result == 'success'){
                    jQuery('#cart_data_put').html(response.cart_body);
                    jQuery('#total_item_put').html(response.total_item);
                }

                if(response.result == 'error'){
                    jQuery('#cart_data_put').html('');
                    jQuery('#total_item_put').html('0');
                }


            }).fail(function (jqXHR, textStatus) {
                alert("Request failed: " + jqXHR.responseText);
            });
        });
    </script>
@endsection
