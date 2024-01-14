@extends('Admin::layouts.master')
@section('body')

    <section class = "content" >
    <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>{{$pageTitle}}</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            @if(isset($data->created_for) || ($data->notice_for_all=='yes'))
                            <li><a href="{{route('admin.notice.index')}}">Noticr</a></li>
                            @else
                            <li><a href="{{route('admin.complain.suggestion.index')}}">Complain or Suggestion</a></li>
                            @endif
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
                                        Details                          
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12 table-responsive">
                                    <div class="admin-dashboard-table">

                                        <table id="mainTable" class="table table-hover table-striped table-bordered">
    
                                            <tr>
                                                <th>Title</th>
                                                <td>{{ isset($data->title)?ucfirst($data->title):''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact</th>
                                                <td>
                                                    @if(isset($data->mail))
                                                   <b> Email:</b> {{$data->mail}}          
                                                @endif
                                                @if(isset($data->phone_no))
                                                  <b> Tel:</b> {{$data->phone_no}}          
                                                @endif

                                                 @if(!isset($values->mail) && !isset($values->phone_no))
                                                Notice for all seller
                                                @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>
                                                    @if(isset($data->com_sugg_desc))
                                                         {{$data->com_sugg_desc}}
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
    </section>    

@endsection