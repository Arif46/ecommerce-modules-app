@extends('Admin::layouts.master')
@section('body')

	<section class="content">
        <div class="container-fluid">

        	<div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Color</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="{{route('admin.notice.index')}}">Notice</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">

                    	<div class="header">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <h2>
                                        Add Notice
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                	<div class="card">     

                                		{!! Form::open(['route' => 'admin.complain.suggestion.store',  'files'=> true, 'id'=>'colorform', 'class' => '']) !!}

											@include('ComplainSuggestion::complainsuggestion._form')

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
