{!! Form::model($product_category, ['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => 'product_category_form']) !!}

<?php
	use Illuminate\Support\Facades\URL;
	use Illuminate\Support\Facades\Input;
?>
	<div class="form-fields">
        <h2>Category</h2>
        <ul class="list-group">
			@if(isset($category_lists) && count($category_lists) > 0)

			@foreach($category_lists as $key => $category)

			<?php
			$select_category = 'no';
			if(in_array($key, $product_category)){
				$select_category = 'yes';
			}
			?>

			<li class="list-group-item">
			<div class="form-group">
    <div class="form-check">      
     
      	<input <?=$select_category=='yes'?'checked':''?> type="checkbox" class="form-check-input" id="gridCheck" name="category[]" value="{{$key}}"> <label class="form-check-label" for="gridCheck">{{$category}}</label>
    </div>
  </div>
			
				

			</li>

			@endforeach

			@endif

		</ul> 
		<input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
		
    </div>

    <div class="form-action">
        <button type="submit" class="button" >Save Changes</button>
    </div>	
		

{!! Form::close() !!}