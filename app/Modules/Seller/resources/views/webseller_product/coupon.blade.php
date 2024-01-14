{!! Form::model($coupon_lists,['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => 'product_coupon_form']) !!}

	<div class="form-fields">
		<h2>Coupon</h2>

		<?php
		    $old_coupon = [];
		    $old_coupon_data = $product->relProductCoupon;

		    if(count($old_coupon_data) > 0){
		        foreach ($old_coupon_data as $oa_key => $oa_value){
		            array_push($old_coupon, $oa_value->coupon_id);
		        }
		    }
		?>

		@if(!empty($coupon_lists))
			@foreach($coupon_lists as $values)

				<p>
				    <label for="coupon_{{$values->id}}" class="">
				        <input <?=in_array($values->id,$old_coupon)?'checked':''?> class="" id="coupon_{{$values->id}}" name="Coupon[]" type="checkbox" value="{{$values->id}}"> {{$values->coupon_name}}({{$values->coupon_code}})
				    </label>  
				</p>

			@endforeach
		@endif
	</div>

	<div class="form-action">
	    <button type="submit" class="button">Save Changes</button>
	</div>

 {!! Form::close() !!}