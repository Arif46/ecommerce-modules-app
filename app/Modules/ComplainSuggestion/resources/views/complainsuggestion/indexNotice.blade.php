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
                        <li><a href="{{route('admin.notice.index')}}">{{$pageTitle}}</a></li>
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
                                <div class="col-md-3 col-sm-12">
                                    <h2>
                                        {{$pageTitle}} List
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.color.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.notice.create')}}" class="btn btn-primary">Add {{$pageTitle}}</a>
                                </div>
                            </div>
                        </div>

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-12 table-responsive">
                                <div class="admin-dashboard-table">

                                    <table id="mainTable" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th> Title </th>
                                                <th> Seller Contact </th>
                                                <th> Description </th>
                                                <th> Created at </th>
                                                <th> Action </th>

                                            </tr>
                                    </thead>

                                    <tbody>
                                      @if(!empty($data) )
                                      
                                       @foreach($data as $values)
                                       
                                           <tr>
                                            <td>
                                            {{substr($values->title, 0, 25)}}
                                            </td>

                                            <td>
                                                @if(isset($values->mail))
                                                   <b> Email:</b> {{$values->mail}}          
                                                @endif
                                                @if(isset($values->phone_no))
                                                  <b> Tel:</b> {{$values->phone_no}}          
                                                @endif

                                                @if(!isset($values->mail) && !isset($values->phone_no))
                                                Notice for all seller
                                                @endif

                                            </td>

                                            <td>
                                            {{substr($values->com_sugg_desc, 0, 40)}}
                                            </td>

                                            <td>
                                                @if(isset($values->created_at))
                                                 {{ date_format($values->created_at,"d M Y || h:i A")}}
                                                @endif  
                                            </td>
                                            <td>
                                                
                                                @if($values->admin_status==1)
                                                <b><a href="{{ route('admin.complain.suggestion.show', $values->id) }}" class="btn btn-primary"><span style="color:#f00 !important;">Read</span></a></b>
                                                @else
                                                <a href="{{ route('admin.complain.suggestion.show', $values->id) }}" class="btn btn-primary">Readed</a>
                                                @endif 
                                                
                                                @if((Auth::user())->type == \App\AppConfig::USER_ROLE_TYPE_SUPER_ADMIN || Auth::user()->type == \App\AppConfig::USER_ROLE_TYPE_ADMIN )
                                                 <a href="{{ route('admin.notic.edit', $values->id) }}" class="btn btn-info" >Edit</a> 
                                                
                                                <a href="{{ route('admin.complain.suggestion.destroy', $values->id) }}"class="btn btn-warning" onclick="return confirm('Are you sure to Delete?')">Delete</a>
                                                @endif 
                                            </td>

                                            
                                        </tr>  

                                        @endforeach
                                      @endif

                                    </tbody>
                                    </table>
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div> </section>

@endsection
