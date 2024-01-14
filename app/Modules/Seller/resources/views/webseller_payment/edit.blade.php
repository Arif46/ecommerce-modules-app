@extends('Admin::layouts.master')
@section('body')

<section class="content">
    <div class="container-fluid">

    	<div class="block-header">
            <div class="row clearfix">
                <div class="col-md-8">
                    <h2>Payment Options</h2>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                        <li><a href="javascript:void(0);">Payment Options</a></li>
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
                                    Edit Payment Options                          
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-12">
                            	<div class="card">             		

                                	{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['admin.payment.options.update', $data->id],"class"=>"", 'id' => '']) !!}

										@include('Common::payment_options._form')

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