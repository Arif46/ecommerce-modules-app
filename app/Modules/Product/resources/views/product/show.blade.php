@extends('Admin::layouts.master')
@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Item Details</h2></div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="javascript:history.back()"> <i class="material-icons">backspace</i> Back</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Table list for data -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-md-12 col-lg-12">
                                    <div class="card shadow-none">
                                        <div class="body">
                                            <h3>Product Name: {{ isset($data->title)?ucfirst($data->title):''}}</h3>
                                            <h5>
                                                Slug: {{ isset($data->slug)?ucfirst($data->slug):''}}  <br/><br/>                                             
                                            </h5>                                            

                                            <table id="mainTable" class="table table-hover table-striped table-bordered">
                                                
                                                <tr>
                                                    <th>Seller</th>
                                                    <td>{{ isset($data->relSellerProfiles->shop_name)?ucfirst($data->relSellerProfiles->shop_name):''}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Attribute Set</th>
                                                    <td>{{ isset($data->relAttribute->title)?ucfirst($data->relAttribute->title):''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Type</th>
                                                    <td>{{ isset($data->type)?ucfirst($data->type):''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Item No</th>
                                                    <td>{{ isset($data->item_no)?ucfirst($data->item_no):''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Sell Price</th>
                                                    <td>৳  {{number_format( $data->sell_price,2)}}</td>
                                                </tr>
                                                <tr>
                                                    <th>List Price</th>
                                                    <td>৳  {{number_format( $data->list_price,2)}}</td>
                                                </tr> 
                                                <tr>
                                                    <th>Short Description</th>
                                                    <td>
                                                        <strong>English :</strong>{!! $data->short_description !!}<br>
                                                        @isset($data->short_description_bn)
                                                            <strong>Bangla :</strong>{!! $data->short_description_bn !!}<br>
                                                        @endisset
                                                        @isset($data->short_description_hi)
                                                            <strong>Hindi :</strong>{!! $data->short_description_hi !!}<br>
                                                        @endisset
                                                        @isset( $data->short_description_ch )
                                                            <strong>Chinese :</strong>{!! $data->short_description_ch !!}
                                                        @endisset
                                                    </td>
                                                </tr>
{{--                                                <tr>--}}
{{--                                                    <th>Description</th>--}}
{{--                                                    <td>{!! $data->description !!}</td>--}}
{{--                                                </tr>--}}
{{--                                                 <tr>--}}
{{--                                                    <th>Specification</th>--}}
{{--                                                    <td>{!! $data->specifition !!}</td>--}}
{{--                                                </tr>--}}
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Image</th>
                                                    <td>
                                                        @if(isset($data->relProductImage) && !empty($data->relProductImage))
                                                            @foreach($data->relProductImage as $product_image)
                                                                <img  width="400" class="img-fluid img-responsive" src="{{URL::to($product_image->image_link)}}/orginal_image/{{$product_image->image}}">
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Title</th>
                                                    <td>
                                                        @if(isset($data->relProductSeo) && !empty($data->relProductSeo))
                                                            {{$data->relProductSeo->meta_title}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Keywords</th>
                                                    <td>
                                                        @if(isset($data->relProductSeo) && !empty($data->relProductSeo))
                                                            {{$data->relProductSeo->meta_keywords}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Meta Description</th>
                                                    <td>
                                                        @if(isset($data->relProductSeo) && !empty($data->relProductSeo))
                                                            {{$data->relProductSeo->meta_description}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Batch</th>
                                                    <td>
                                                        {!! $data->batch !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Category</th>
                                                    <td>
                                                        @if(isset($data->relProductCategory) && !empty($data->relProductCategory))
                                                            @foreach($data->relProductCategory as $product_category)
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
                                                        @if(isset($data->relProductAttribute) && !empty($data->relProductAttribute))
                                                            @foreach($data->relProductAttribute as $product_attribute)
                                                                {{$product_attribute->attribute_data}}
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Stock</th>
                                                    <td>
                                                        @if(isset($data->relProductInventory) && !empty($data->relProductInventory))
                                                            {{$data->relProductInventory->quantity}}
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
    </section>        

    
    <a href="javascript:history.back()" class="btn btn-primary">Back</a>
    @if($data->status == 'inactive')
    <h3>Waiting for confirmation</h3>
        <a href="{{ route('admin.product.confirm_product', $data->id) }}" class="btn btn-primary" onclick="return confirm('Are you sure to confirm?')" >Update Now</a>
    @endif  
                   
    
@endsection  