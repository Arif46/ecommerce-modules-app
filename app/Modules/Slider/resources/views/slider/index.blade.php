@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>All Slider</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to('')}}/admin-dashboard">Home</a></li>
                            <li><a href="javascript:void(0);">Slider</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Filter for data -->


            <!-- Table list for data -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-3 col-sm-12">
                                    <h2>
                                        Slider List                        
                                    </h2>
                                </div>
                                    <div class="col-md-6 col-sm-12">
                                        {!! Form::open(['method' =>'GET', 'route' => 'admin.slider.search', 'id'=>'', 'class' => '']) !!}
                                        {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'Type Search Key']) !!}
                                        <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                        </button>
                                        {!! Form::close() !!}
                                    </div>                               

                                <div class="col-md-3 text-right">
                                   <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Add slider</a>                                      
                                </div>
                            </div>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12 table-responsive">
                                    <div class="admin-dashboard-table">

                                        <table id="mainTable" class="table table-hover table-striped table-bordered">
                                            <thead class="bg-blue-grey">
                                                <tr>
                                                    <th> No</th>
                                                    <th> Title </th>
                                                    <th> Slug </th>
                                                    <th> Caption </th>                           
                                                    <th> Status</th>
                                                    <th> Image</th>
                                                    <th> Action </th>

                                                </tr>
                                            </thead>
                                            <tbody id="sortable">
                                               @if(!empty($data))
                                                   <?php
                                                         $total_rows = 1;
                                                   ?>
                                                   @foreach($data as $values)
                                                   <tr class="sortableRecord" data-id="{{$values->id}}" data-ordering="{{$values->ordering}}">
                                                        <td class="serialNo">
                                                            <?=$total_rows?>
                                                        </td>
                                                        <td>
                                                            {{$values->title}}
                                                        </td>
                                                        <td>
                                                            {{$values->slug}}
                                                        </td>
                                                        <td>
                                                            {{$values->caption}}
                                                        </td>
                                                        <td>
                                                            {{$values->status}}
                                                        </td>
                                                        <td>
                                                        @if(!empty($values->image_link))
                                                            <img style="height: 70px;"  src="{{URL::to('')}}/uploads/slider/{{$values->image_link}}">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.slider.show', $values->id) }}" class="btn btn-primary">Show</a>

                                                            <a href="{{ route('admin.slider.edit', $values->id) }}" class="btn btn-info" >Edit</a>

                                                            <a href="{{ route('admin.slider.destroy', $values->id) }}" class="btn btn-warning" onclick="return confirm('Are you sure to Delete?')" >Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $total_rows++;
                                                    ?>
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
            </div>

        </div>
    </section>

@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $('#sortable').sortable({
            axis: 'y',
            update: function (event, ui) {
                changeSlNo();
                changeOrdering();
                changeAjaxOrder(getData());
            }
        });
        function getData() {
            arrOrdering = [];
            recordObj = $('.sortableRecord');
            $.each(recordObj, function (i, item) {
                dataObj = {};
                if (item != null) {
                    dataObj['id'] = $(this).attr('data-id');
                    dataObj['ordering'] = $(this).attr('data-ordering');
                    arrOrdering.push(dataObj);
                }
            });
            // arrOrdering = JSON.stringify(arrOrdering);
            return arrOrdering;
        }
        function changeAjaxOrder(data = '') {
            $.ajax({
                type: "POST",
                url: "{{route('admin.slider.sorting')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'ordering': data
                },
                beforeSend: function () {
                    //loadeShowHide('show');
                },
                success: function (data) {
                    // result = JSON.parse(data);
                    if (data['status'] == 0){
                        alert(data['message']);
                    }
                },
                error: function () {
                    alert('Error occured')
                },
                complete: function () {
                }
            });
        }
        function changeSlNo() {
            slNo = 1;
            $(".serialNo").each(function () {
                //alert(slNo)
                $(this).html(slNo);
                slNo++;
            });
        }
        changeSlNo();
        function changeOrdering() {
            slNo = 1;
            $(".sortableRecord").each(function () {
                $(this).attr('data-ordering', slNo);
                slNo++;
            });
        }
    </script>
@endsection