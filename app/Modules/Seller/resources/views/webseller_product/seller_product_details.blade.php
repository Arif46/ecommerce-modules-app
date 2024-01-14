@extends('Seller::webseller.seller_master')
@section('body')

	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-dark">
	    <div class="container">
	        <nav aria-label="breadcrumb">
	            <ul class="breadcrumb">
	                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	                <li class="breadcrumb-item active" aria-current="page">My Product</li>
	            </ul>
	        </nav>
	    </div>
	</div>
	<!-- Breadcrumb Area End -->

	<div class="my-account-area pb-80 pt-80">
        <div class="container">
            <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">                     
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>                 
                            <h3>Product Details</h3>                           
                        </div>
                    </div>
            	<div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-fields">
                        <div class="about-skill-area">                           
                      <div class="row clearfix">
                                <div class="col-md-12">
                                	<h4>Product Name: {{ isset($product->title)?ucfirst($product->title):''}}</h4>
                                            <p>
                                                Slug: {{ isset($product->slug)?ucfirst($product->slug):''}}                                               
                                            </p>      
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="cart-table table-responsive"> 
                                     <table id="mainTable" class="table table-hover table-striped table-bordered">
                                                
                                                <tr>
                                                    <th>Seller</th>
                                                    <td>{{ isset($product->relSellerProfiles->shop_name)?ucfirst($product->relSellerProfiles->shop_name):''}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Attribute Set</th>
                                                    <td>{{ isset($product->relAttribute->title)?ucfirst($product->relAttribute->title):''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Type</th>
                                                    <td>{{ isset($product->type)?ucfirst($product->type):''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Item No</th>
                                                    <td>{{ isset($product->item_no)?ucfirst($product->item_no):''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Sell Price</th>
                                                    <td>{{ isset($product->sell_price)?ucfirst($product->sell_price):''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>List Price</th>
                                                    <td>{{ isset($product->list_price)?ucfirst($product->list_price):''}}</td>
                                                </tr> 
                                                <tr>
                                                    <th>Short Description</th>
                                                    <td>{!! $product->short_description !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{!! $product->description !!}</td>
                                                </tr>
                                                 <tr>
                                                    <th>Specification</th>
                                                    <td>{!! $product->specifition !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{{ isset($product->status)?ucfirst($product->status):'' }}</td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>
                                                        @if(isset($product->relProductImage) && !empty($product->relProductImage))
                                                            @foreach($product->relProductImage as $product_image)
                                                                <img  width="200" class="img-fluid img-responsive" src="{{URL::to($product_image->image_link)}}/thumbnail/{{$product_image->image}}" style="margin-right: 15px;">
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Title</th>
                                                    <td>
                                                        @if(isset($product->relProductSeo) && !empty($product->relProductSeo))
                                                            {{$product->relProductSeo->meta_title}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Keywords</th>
                                                    <td>
                                                        @if(isset($product->relProductSeo) && !empty($product->relProductSeo))
                                                            {{$product->relProductSeo->meta_keywords}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Description</th>
                                                    <td>
                                                        @if(isset($product->relProductSeo) && !empty($product->relProductSeo))
                                                            {{$product->relProductSeo->meta_description}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Image</th>
                                                    <td>
                                                        @if(isset($product->relProductSeo) && !empty($product->relProductSeo))
                                                            {{$product->relProductSeo->meta_image_link}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Category</th>
                                                    <td>
                                                        @if(isset($product->relProductCategory) && !empty($product->relProductCategory))
                                                            @foreach($product->relProductCategory as $product_category)
                                                                @if(isset($product_category->relCategory) && !empty($product_category->relCategory))
                                                                    {{$product_category->relCategory->title}} , 
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Attribute</th>
                                                    <td>
                                                        @if(isset($product->relProductAttribute) && !empty($product->relProductAttribute))
                                                            @foreach($product->relProductAttribute as $product_attribute)
                                                                <b>{{ucfirst($product_attribute->attribute_code)}}:: </b>
                                                                {{trim(str_replace("==",",",$product_attribute->attribute_data),",")}}
                                                                <br/>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Stock</th>
                                                    <td>
                                                        @if(isset($product->relProductInventory) && !empty($product->relProductInventory))
                                                            {{$product->relProductInventory->quantity}}
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
    </div>

   
    
@endsection