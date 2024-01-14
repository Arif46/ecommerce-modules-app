<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
?>

{!! Form::model($product, ['method' => 'PATCH', 'files'=> true, 'route'=> ['seller.product.update_image', $product->id],"class"=>"", 'id' => '']) !!}

<div class="form-fields">
    <h2>Add Product Image</h2>
    <p>
    	<strong>Note:  </strong><span class="error"> Supported format :: jpeg,png,jpg,gif & file size max :: 2MB </span>& Image Width & Height Maximum <strong class="error">960x1400 px</strong>
    </p>
    <p>
    	@if (isset($imagedata) && !empty($imagedata))
    		<div class="row">
				@foreach ($imagedata as $image)
					<div class="col-md-3 imgdiv" id="parent-{{$image->id}}" >				
						<div style="float: left;" ><img width="100" class="img img-responsive" src="{{URL::to($image->image_link)}}/thumbnail/{{$image->image}}">
						</div>
						<div style="float: left;" class="middle" id="child-{{$image->id}}"  >
							<div class="row">
								<center><a class="btnclass" id="merchant_product_image" style="color: #000;   border: 1px solid #007bff;border-radius: 6px;padding: 2px 4px;cursor: pointer;" onclick="DeleteImage('{{$image->id}}');"><i class="fa fa-trash"></i></a>

									<a class="btnclass" style="color:white" ><i class="fa fa-eye" aria-hidden="true"></i> Delete</a></center>
							</div>
						</div>				
					</div>
				@endforeach
			</div>
		@endif
    </p>
    <p>
    	<div class="input-group control-group increment-image" style="margin-top:10px" >
			<input  type="file" name="file[]" class="form-control m-r-10">
			<div class="input-group-btn"> 
				<button class="btn btn-image-plus" style="height: 40px;" type="button"><i class="fa fa-plus"></i></button>

			</div>
		</div>
		<div class="clone hide">
			<div class="control-group input-group" style="margin-top:10px" >
				<input type="file" name="file[]"  class="form-control  m-r-10">
				<div class="input-group-btn"> 
					<button class="btn btn-image-plus-more" style="height: 40px;"type="button"><i class="fa fa-trash"></i></button>
				</div>
			</div>
		</div>
    </p>
</div>    
<div class="row">
       

		<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">

							
					</div>
				</div>
				<div class="form-group">
					<div class="buttons-set">
						<input type="submit" name="save_continue" class="button coupon_btn" value="Save & Continue">

					</div>
				</div>
			</div>

</div>

<div class="modal open_modal_update" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Preview Image</h4>
			</div>
			<div class="modal-body">

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{!! Form::close() !!}