@extends('Seller::webseller.seller_master')
@section('body')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-dark">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('seller.my.product')}}">My Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
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
                        <h3>Update Product</h3>
                        <a href="javascript:history.back()" class="mt-15 ">Back</a>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-fields">
                        <div class="about-skill-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#basic-info"
                                       role="tab" aria-controls="basic-info" aria-selected="true">Basic Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#product-image"
                                       role="tab" aria-controls="product-image" aria-selected="false">Add Image</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="description-tab" data-toggle="tab" href="#description"
                                       role="tab" aria-controls="description" aria-selected="false">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab"
                                       aria-controls="seo" aria-selected="false">Seo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="category-tab" data-toggle="tab" href="#category" role="tab"
                                       aria-controls="category" aria-selected="false">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="attribute-tab" data-toggle="tab" href="#attribute"
                                       role="tab" aria-controls="attribute" aria-selected="false">Size & Color</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inventory-tab" data-toggle="tab" href="#inventory"
                                       role="tab" aria-controls="inventory" aria-selected="false">Inventory</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                       aria-controls="review" aria-selected="false">Review</a>
                                </li>
                                <!--               <li class="nav-item">
                                                  <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Delivery Option</a>
                                              </li> -->
                                <!--  <li class="nav-item">
                                     <a class="nav-link" id="coupon-tab" data-toggle="tab" href="#coupon" role="tab" aria-controls="coupon" aria-selected="false">Coupon</a>
                                 </li> -->
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  show active" id="basic-info" role="tabpanel"
                                     aria-labelledby="basic-info-tab">
                                    @include('Seller::webseller_product.basic_info')
                                </div>
                                <div class="tab-pane fade" id="product-image" role="tabpanel"
                                     aria-labelledby="product-image-tab">
                                    @include('Seller::webseller_product.product_image')
                                </div>
                                <div class="tab-pane fade" id="description" role="tabpanel"
                                     aria-labelledby="description-tab">
                                    @include('Seller::webseller_product.description')
                                </div>
                                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                    @include('Seller::webseller_product.seo')
                                </div>
                                <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
                                    @include('Seller::webseller_product.category')
                                </div>
                                <div class="tab-pane fade" id="attribute" role="tabpanel"
                                     aria-labelledby="attribute-tab">
                                    @include('Seller::webseller_product.attribute')
                                </div>
                                <div class="tab-pane fade" id="inventory" role="tabpanel"
                                     aria-labelledby="inventory-tab">
                                    @include('Seller::webseller_product.inventory_form')
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    @include('Seller::webseller_product.review')
                                </div>
                            <!--  <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                                   @include('Seller::webseller_product.shipping')
                                    </div> -->
                                <div class="tab-pane fade" id="coupon" role="tabpanel" aria-labelledby="coupon-tab">
                                    @include('Seller::webseller_product.coupon')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var productId = {{$id}}
        /*start of addmore attribute*/
        var pAttr = `<tr style='background: lightseagreen;margin: 2px' class='EachRow' style='color:white'>
        <td class='serialSC' style='color:white'></td>
        <td>
        <select class='form-control sizeF'>
        @foreach($sizes as $sizeId=>$sizeTitle)
        <option value="{{$sizeId}}">{{$sizeTitle}}</option>
        @endforeach
        </select>
        </td>
        <td>
        <select class='form-control colorF'>
           @foreach($colors as $colorId=>$colorTitle)
        <option value="{{$colorId}}">{{$colorTitle}}</option>
           @endforeach
        </select>
    </td>
    <td><input type='number' class='form-control quantityF' value='0'></td>
    <td><i class="fa fa-minus-circle float-right fa-2 deduct-attribute-row" style="cursor: pointer" aria-hidden="true"></i></td>
    </tr>`;

        function updateSerialNumber() {
            let sl = 1;
            $('.serialSC').each(function () {
                $(this).html(sl++)
            })
        }

        function removeAttributeRow(selector) {
            $(selector).closest('.EachRow').fadeOut(100, function () {
                $(selector).closest('.EachRow').remove();
                updateSerialNumber()
            });
        }

        $('.add-more-attribute').click(function () {
            $(this).closest('table').find('tbody').append(pAttr)
            updateSerialNumber()
        })
        $(document).on('click', '.deduct-attribute-row', function (e) {
            e.preventDefault();
            removeAttributeRow($(this))
        });

        /*end of add more attribute*/

        function checkIfDuplicate(data) {
            const unique = new Set();
            const showError = data.some(element => unique.size === unique.add(element.id).size);
            //alert(showError);
            console.log(showError);
            return true;
        }

        /*submit attribute*/
        $('#submitProductAttributes').click(function () {

            // $('#parentBox').closest('tbody').find('tr').each()
            var arr = [];
            $.each($('.EachRow'), function (index, value) {
                var perRow = {
                    size: '',
                    color: '',
                    existing: null,
                    quantity: 0
                }
                perRow.size = $(this).find('.sizeF').val()
                perRow.color = $(this).find('.colorF').val()
                perRow.quantity = $(this).find('.quantityF').val()
                if ($(this).find('.serialSC').attr("data-size-color-id")) {
                    perRow.existing = $(this).find('.serialSC').attr("data-size-color-id")
                }
                arr.push(perRow)
            })
            console.log(arr)
            if (!checkIfDuplicate(arr)) {
                return false;
            }
            $.ajax({
                type: "POST",
                url: "{{route('seller.product.update.attribute')}}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    'productAttributes': arr,
                    'productId': productId
                },
                beforeSend: function () {
                    //loadeShowHide('show');
                },
                success: function (data) {
                    // result = JSON.parse(data);
                    if (data['status'] == 200) {
                        url = window.location.href.split('?')[0];
                        window.location = url+"?tab=attribute-tab"
                        $('#attribute-tab').click();
                    }else{
                        alert(data['error']);
                    }
                },
                error: function () {
                    alert('Error occured')
                },
                complete: function () {
                }
            });
        })
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
        var tab = getParameterByName('tab');
        if (tab !== null){
            $('#'+tab).click()
        }
        /*end of submitting attribute */

    </script>
@endsection
