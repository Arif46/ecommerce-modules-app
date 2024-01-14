{!! Form::model($shipping_method_lists,['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => 'product_shipping_form']) !!}

	<div class="form-fields">
		<h2>Devlivery Option</h2>

		<?php
		    $old_shipping = [];
		    $old_shipping_data = $product->relProductShipping;

		    if(count($old_shipping_data) > 0){
		        foreach ($old_shipping_data as $oa_key => $oa_value){
		            array_push($old_shipping, $oa_value->shipping_method_id);
		        }
		    }
		?>

		@if(!empty($shipping_method_lists))
			@foreach($shipping_method_lists as $values)

				<p>
				    <label for="shipping_{{$values->id}}" class="">
				        <input <?=in_array($values->id,$old_shipping)?'checked':''?> class="" id="shipping_{{$values->id}}" name="Shipping[]" type="checkbox" value="{{$values->id}}"> {{$values->courier_service}}(tk. {{number_format($values->shipping_value,2)}})
				    </label>  
				</p>

			@endforeach
		@endif
		
	</div>

	<div class="form-action">
	    <button type="submit" class="button">Save Changes</button>
	</div>

 {!! Form::close() !!}