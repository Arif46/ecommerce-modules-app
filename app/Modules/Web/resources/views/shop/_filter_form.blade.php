{!! Form::open(['url' => $currentURL, 'method' => 'get', 'id' => 'submit_search_filter', 'class' => '']) !!}

	<input type="hidden" id="filter_price" name="price" value="<?=isset($_GET['price']) && !empty($_GET['price'])?$_GET['price']:'';?>">
	<input type="hidden" id="filter_sort_by" name="sort_by" value="<?=isset($_GET['sort_by']) && !empty($_GET['sort_by'])?$_GET['sort_by']:'';?>">
	<input type="hidden" id="" name="keywords" value="<?=isset($_GET['keywords']) && !empty($_GET['keywords'])?$_GET['keywords']:'';?>">

{!! Form::close() !!}