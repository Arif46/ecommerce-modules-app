@extends('Admin::layouts.master')
@section('body')

<section class="content">
    <div class="container-fluid">

    	<div class="block-header">
            <div class="row clearfix">
                <div class="col-md-8">
                    <h2>CMS</h2>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                        <li><a href="javascript:void(0);">CMS</a></li>
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
                                    Edit CMS                          
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-12">
                            	<div class="card">             		

                                	{!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['admin.cms.update', $data->id],"class"=>"", 'id' => '']) !!}

										@include('Cms::cms._form')

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