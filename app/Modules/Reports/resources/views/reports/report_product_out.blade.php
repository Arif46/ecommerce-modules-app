@extends('Admin::layouts.master')
@section('body')
    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        {!! Form::open(['method' =>'GET', 'route' => 'report.product.out.list', 'id'=>'', 'class' => '']) !!}
                        
                        <div class="row">
                            <div class="col-md-3">
                                {!! Form::Select('product_id',$proList,Request::old('product_id'),['id'=>'product_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::Select('seller_id',$sellerList,Request::old('seller_id'),['id'=>'seller_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>
                              <div class="col-md-3">
                                {!! Form::Select('category_id',$catList,Request::old('category_id'),['id'=>'category_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>  

                            <div class="col-md-3">
                                {!! Form::Select('brand_id',$brandList,Request::old('brand_id'),['id'=>'brand_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>

                        </div>

                        <div class="row">
                           
                            <div class="col-md-3">
                                {!! Form::Select('color_id',$colorList,Request::old('color_id'),['id'=>'color_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>

                            <div class="col-md-3">
                                {!! Form::Select('size_id',$sizeList,Request::old('size_id'),['id'=>'size_id', 'class'=>'form-control search-input', 'readonly' => true ]) !!}
                            </div>

                            <div class="col-md-3">
                                <input type="datetime-local" class="form-control search-input"  name="from_date" placeholder="From Date"> 
                                
                            </div>

                            <div class="col-md-3">
                                  <input type="datetime-local" class="form-control search-input"  name="to_date">
                                <button type="submit" class="admin-search">
                                    <span class="ti-search"></span>
                                </button>
                            </div>
                            
                        </div>
                        {!! Form::close() !!}
                    </div>                                   

                                
                            
                    
                </div>
            </div>

            <!-- Table list for data -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="header">                            
                          <div class="row clearfix">
                          	<div class="col-md-12">
                          		 @if(!empty($data))     
                                    @foreach($data as $key => $values)
			                      		@if(isset($reProId) && $reProId !="")
			                      			@if($key==0)
				                      		 Product: {{ $values->pro_name?? ''}}
				                      		@endif
			                      		@endif

			                      		@if(isset($reProId) && $reProId !="")
			                      			@if($key==0)
				                      		 Shop: {{ $values->pro_name?? ''}}
				                      		@endif
			                      		@endif

			                      		@if(isset($reProId) && $reProId !="")
			                      			@if($key==0)
				                      		 Category: {{ $values->pro_name?? ''}}
				                      		@endif
			                      		@endif

			                      		@if(isset($reProId) && $reProId !="")
			                      			@if($key==0)
				                      		 Brand: {{ $values->pro_name?? ''}}
				                      		@endif
			                      		@endif
			                      		@if(isset($reProId) && $reProId !="")
			                      			@if($key==0)
				                      		 Color: {{ $values->pro_name?? ''}}
				                      		@endif
			                      		@endif
			                      		@if(isset($reProId) && $reProId !="")
			                      			@if($key==0)
				                      		 Sizt: {{ $values->pro_name?? ''}}
				                      		@endif
			                      		@endif
			                      		@if(isset($reProId) && $reProId !="")
			                      			@if($key==0)
				                      		 Date: {{ $values->pro_name?? ''}}
				                      		@endif
			                      		@endif
                                    @endforeach
                          		@endif


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
                                                    <th> SL</th>
                                                    <th> Product Name </th>
                                                    <th> Shop Name(Seller)</th>
                                                    <th> Category </th>
                                                    <th> Brand </th>
                                                    <th> Color</th>
                                                    <th> Size</th>
                                                    <th> Number of Unit </th>
                                                    <th> Date </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @if(!empty($data))
                                                   <?php
                                                        $total_rows = 1;
                                                   ?>
                                                   @foreach($data as $values)
                                                   <tr>
                                                    <td>
                                                        <?=$total_rows?>
                                                    </td>
                                                   

                                                    <td>
                                                                                                                
                                                        @if(isset($values->pro_name))
                                                         {{$values->pro_name}}
                                                        @endif   
                                                    </td>

                                                    <td>
                                                                                                                
                                                        @if(isset($values->shop_name))
                                                         {{$values->shop_name}}
                                                        @endif   
                                                    </td>

                                                    <td>
                                                                                                                
                                                        @if(isset($values->cat_name))
                                                         {{$values->cat_name}}
                                                        @endif   
                                                    </td>

                                                    <td>
                                                                                                                
                                                        @if(isset($values->brand_name))
                                                         {{$values->brand_name}}
                                                        @endif   
                                                    </td>

                                                    <td>
                                                                                                                
                                                        @if(isset($values->color_title))
                                                         {{$values->color_title}}
                                                        @endif   
                                                    </td>

                                                    <td>
                                                                                                                
                                                        @if(isset($values->size_title))
                                                         {{$values->size_title}}
                                                        @endif   
                                                    </td>
                                                    <td>
                                                        @if(isset($values->product_quantity))
                                                         {{$values->product_quantity}} 
                                                        @endif   
                                                    </td>
                                                    <td>
                                                        @if(isset($values->product_out_date))
                                                         {{$values->product_out_date}} 
                                                        @endif   
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

