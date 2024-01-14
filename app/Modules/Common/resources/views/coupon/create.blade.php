@extends('Admin::layouts.master')
@section('body')

	<section class="content">
        <div class="container-fluid">

        	<div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Coupon</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Coupon</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Table list for data -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">

                    	<div class="header">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <h2>
                                        Add Coupon
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                	<div class="card">

	                                	{!! Form::open(['route' => 'admin.coupon.store',  'files'=> true, 'id'=>'', 'class' => '']) !!}

											@include('Common::coupon._form')

										{!! Form::close() !!}

									</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('script')
    <script>
        $('.couponPercentage').hide();
        $('.how_many_top_buyer_area').hide();
        $(function () {
            $("#datepicker,#datepicker1").datepicker();
            $('#calculation_percentage').click(function (){
                $('.couponPercentage').show();
                $('.couponAmount').hide();
            });
            $('#calculation_fixed').click(function (){
                $('.couponPercentage').hide();
                $('.couponAmount').show();
            });
            $('#isForTopBuyers').click(function (){
                if ($(this).is(":checked")){
                    $('.how_many_top_buyer_area').show();
                }else{
                    $('.how_many_top_buyer_area').hide();
                }
            });

        });
    </script>
@stop
