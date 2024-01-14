{!! Form::model($product, ['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => 'product_form_basic_info']) !!}

<?php
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Input;
?>
    <div class="form-fields">
        <h2>Basic Information</h2>
        <p>
            <label>Title</label>
            {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'important','required'=>
            'required', 'title'=>'Enter title', 'onkeyup'=>"convert_to_slug();"]) !!}
            <span class="error">{!! $errors->first('title') !!}</span>
        </p>
        <p>
            <label>Product Type</label>
            {!! Form::Select('type',array('simple-product'=>'Regular','configurable-product'=>'Festival','group-product' => 'Sell Offer'),Request::old('type'),['id'=>'', 'class'=>'form-control']) !!}
            <span class="error">{!! $errors->first('type') !!}</span>
        </p>
        <p>
            <label>Link</label> 
            {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => '','required'=>'required', 'title'=>'Enter slug', 'readonly' => true ]) !!}
            <span class="error">{!! $errors->first('slug') !!}</span>    
        </p>
        <p>
            <label>SKU</label><small> ( Product code will be different to others product ) </small> 
            {!! Form::text('item_no',Request::old('item_no'),['id'=>'','class' => '','title'=>'Enter sku' ]) !!}
            <span class="error">{!! $errors->first('item_no') !!}</span>
        </p>
        <p>
            <label>Sell Price</label>
            {!! Form::text('sell_price',Request::old('sell_price'),['id'=>'','class'
                        => '','required'=> 'required', 'title'=>'Enter sell price' ]) !!}
            <span class="error">{!! $errors->first('sell_price') !!}</span>
        </p>
        <p>
            <label>Discount Price</label>
            {!! Form::text('old_price',Request::old('old_price'),['id'=>'','class'
                        => '', 'title'=>'Enter discount price' ]) !!}
            <span class="error">{!! $errors->first('old_price') !!}</span>
        </p>
        <p>
            <label>Inventory Price</label>
            {!! Form::text('list_price',Request::old('list_price'),['id'=>'','class'
                => '', 'title'=>'Enter inventory price' ]) !!}
            <span class="error">{!! $errors->first('list_price') !!}</span>    
        </p>
        <p>
        <label>Status</label>
         {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Request::old('status'),['id'=>'', 'class'=>'form-control']) !!}
        <span class="error">{!! $errors->first('status') !!}</span>
        </p>
        <p>
        <label>Featured</label>
        {!! Form::Select('is_featured',array('no'=>'No','yes'=>'Yes'),Request::old('is_featured'),['id'=>'', 'class'=>'form-control']) !!}
        <span class="error">{!! $errors->first('is_featured') !!}</span>
        </p>

        <p>
        <label>Batch</label>
        {!! Form::Select('batch',array('batch'=>'','sale'=>'Sale','sold'=>'Sold','stock-out'=>'Stock out','new'=>'New'),Request::old('batch'),['id'=>'', 'class'=>'form-control']) !!}
        <span class="error">{!! $errors->first('batch') !!}</span>
        </p>

        <!-- <input type="hidden" name="status" value="<?=empty($product->status)?'inactive':$product->status?>" id="status"> -->
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">

    </div>

   <div class="form-action">
        <button type="submit" class="button"> Save Changes</button>
    </div>
    


{!! Form::close() !!}

    <script>
        var today = new Date();
        var date = '-'+today.getFullYear() + (today.getMonth()+1) + today.getDate() + today.getHours() + today.getMinutes() + today.getSeconds();

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