@extends('Admin::layouts.master')
@section('body')

<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-8">
                    <h2>Attribute</h2>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                        <li><a href="{{ route('admin.attribute.index') }}">Attribute</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">

                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <h2>
                                    Attribute option                         
                                </h2>
                            </div>
                            <div class="col-sm-6 align-right">
                                <a data-toggle="modal"  data-color="blue" href="#open_modal" class="btn btn-primary">Add Option</a>
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
                                                <th> No</th>
                                                <th> Fronted Title </th>
                                                <th> Backend Title </th>                        
                                                <th> Slug </th>
                                                <th> Status</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(!empty($attr_option))
                                                <?php
                                                    $serial = 1;
                                                ?>
                                                @foreach($attr_option as $attr)
                                                    <tr>
                                                        <td>
                                                            {{$serial}}
                                                        </td>
                                                        <td>
                                                            {{$attr->frontend_title}}
                                                            <span style="width: 20px; height: 20px; background-color:{{$attr->slug}}; display: flex; float: left; margin-right: 5px;"></span>
                                                        </td>                        
                                                        <td>
                                                            {{$attr->backend_title}}
                                                        </td>                        
                                                        
                                                        <td>
                                                            {{$attr->slug}}
                                                        </td>
                                                        <td>
                                                            {{$attr->status}}
                                                        </td>
                                                        <td>
                                                            
                                                            <a class="btn btn-primary" href="{{ route('admin.attribute.option.edit', $attr->id) }}" 
                                                               >Edit</a>
                                                            
                                                            <a href="{{ route('admin.attribute.option.destroy', $attr->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')" >Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $serial++;
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

  <!-- modal for attribute update -->
<div class="modal fade" id="open_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Attribute Option</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.attribute.option.store',  'files'=> true, 'id'=>'', 'class' => 'form-horizontal attribute_option_form']) !!}
                  
                        @include('Attribute::attribute._form_option')
                        <input type="hidden" value="{{$attid}}">
                  
                {!! Form::close() !!}
            </div>
           
        </div>
    </div>
</div>

<script type="text/javascript">
  

  function convert_to_slug(){
    var str = document.getElementById("frontend_title").value;
    str = str.replace(/[^a-zA-Z0-12\s]/g,"");
    str = str.toLowerCase();
    str = str.replace(/\s/g,'-');
    document.getElementById("slug").value = str;

}

</script>

@endsection