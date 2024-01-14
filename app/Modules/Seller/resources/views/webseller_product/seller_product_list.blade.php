@extends('Seller::webseller.seller_master')
@section('body')

	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-dark">
	    <div class="container">
	        <nav aria-label="breadcrumb">
	            <ul class="breadcrumb">
	                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
	            </ul>
	        </nav>
	    </div>
	</div>
	<!-- Breadcrumb Area End -->
	<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
	<div class="my-account-area ptb-80">
        <div class="container-fluid">
            <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title text-center title-style-2">                     
                            <h2><span>{{ $verifaid_user->shop_name }}</span></h2>                  
                            <h3>Add New Product</h3>                           
                        </div>
                    </div>
            	<div class="col-lg-12 col-md-12 col-sm-12">
 		<?php $url = route('seller.product.store'); ?>
          {!! Form::open(array('url' => $url, 'method' => 'post', 'id'=>'', 'files'=> true)) !!}

	      <div class="modal-body">
			    <div class="form-fields">
			        <h2>Basic Information</h2>

			        <p>

		                {!! Form::label('category_id', 'Category', array('class' => '')) !!} <span class="required"> *</span>

		                {!! Form::Select('category_id', $category_lists ,Request::old('category_id'),['id'=>'', 'class'=>'', 'required'=>'required']) !!}
		                <span class="error">{!! $errors->first('category_id') !!}</span>

		                
	      			</p>
					<p>

						{!! Form::label('brand_id', 'Brand', array('class' => '')) !!} <span class="required"> *</span>

						{!! Form::Select('brand_id', $brand_lists ,Request::old('brand_id'),['id'=>'', 'class'=>'', 'required'=>'required']) !!}
						<span class="error">{!! $errors->first('brand_id') !!}</span>


					</p>
			        <p>
			            <label>Title</label> <span class="required"> *</span> 
			            {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'important','required'=>
			            'required', 'title'=>'Enter title', 'onkeyup'=>"convert_to_slug();"]) !!}
			            <span class="error">{!! $errors->first('title') !!}</span>
			        </p>

			        <p>
			            <label>Link</label>
			            {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => '','required'=>'required', 'title'=>'Enter slug', 'readonly' => true ]) !!}
			            <span class="error">{!! $errors->first('slug') !!}</span>    
			        </p>			        
			        <p>
			            <label>Sell Price</label> <span class="required"> *</span> 
			            {!! Form::text('sell_price',Request::old('sell_price'),['id'=>'','class'=> '','required'=> 'required', 'title'=>'Enter sell price' ]) !!}
			            <span class="error">{!! $errors->first('sell_price') !!}</span>
			        </p>
					<p>
						{!! Form::label('quantity', 'Quantity', array('class' => '')) !!}
						<input  name="quantity" type="number" id="quantity" >
					</p>
					<p>
			            {!! Form::label('short_description', 'Description', array('class' => '')) !!} 
			            {!! Form::textarea('short_description',Request::old('short_description'),['id'=>'short_description','class'
			                    => '', 'title'=>'Enter short_description', 'rows'=>'3', 'cols'=>'5']) !!}
			            <span class="error">{!! $errors->first('short_description') !!}</span>
			        </p>



			        <p class="mt-40">
			           <label>Add Picture</label>
			           <input type="file" name="image" accept="image/*" class="form-control">      
			        </p>

			        <!-- <input type="hidden" name="status" value="<?=empty($product->status)?'inactive':$product->status?>" id="status"> -->
			        <input type="hidden" name="attribute_set_id" id="attribute_set_id" value="1">
		            <input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->id}}">
		            <input type="hidden" name="type" id="type" value="simple-product">
		            <input type="hidden" name="is_featured" id="is_featured" value="no">
		            <input type="hidden" name="status" id="status" value="active">
		            <input type="hidden" name="seller_id" id="seller_id" value="{{Auth::user()->id}}">

		            <input type="hidden" name="item_no" id="item_no" value="AFS-2021">
			    </div>
	      		<div class="form-action">
	      		<button type="submit" class="button">Save Changes</button>
	      		</div>
	      </div>
	      
	      {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
	<script>
        var today = new Date();
        var date = '-'+today.getFullYear() + (today.getMonth()+1) + today.getDate()+ today.getHours() + today.getMinutes() + today.getSeconds();

        function convert_to_slug(){
            var str = document.getElementById("title").value;           
            var str1 = date;
            str = str.replace(/[^a-zA-Z0-12\s]/g,"");
            str = str.toLowerCase();
            str = str.replace(/\s/g,'-');           
            // var str1 = "afshini-";
            var res = str.concat(str1);          
            document.getElementById("slug").value = res;
        }

    </script>
    <script>
    CKEDITOR.replace( 'short_description' );   
    </script>

@endsection