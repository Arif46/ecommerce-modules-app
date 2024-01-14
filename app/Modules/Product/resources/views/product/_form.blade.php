<div class="body">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Category</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('category_id', $category_lists ,Request::old('category_id'),['id'=>'', 'class'=>'form-control']) !!}
                    {!! $errors->first('category_id') !!}
                </div>
            </div>
        </div>
    </div>
    
  
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Title</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('title',Request::old('title'),['id'=>'title','class' => 'form-control','required'=>
                        'required', 'title'=>'Enter title', 'onkeyup'=>"convert_to_slug();"]) !!}
                    {!! $errors->first('title') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Link</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('slug',Request::old('slug'),['id'=>'slug','class' => 'form-control','required'=>'required', 'title'=>'Enter slug', 'readonly' => true ]) !!}
                    {!! $errors->first('slug') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Sell price</label><span class="required"> *</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('sell_price',Request::old('sell_price'),['id'=>'','class'=> 'form-control','required'=> 'required', 'title'=>'Enter sell price' ]) !!}
                    {!! $errors->first('sell_price') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Inventory Price</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('list_price',Request::old('list_price'),['id'=>'','class' => 'form-control','title'=>'Inventory Price' ]) !!}
                    {!! $errors->first('list_price') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Description</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::label('short_description', 'Description', array('class' => '')) !!} 
                        {!! Form::textarea('short_description',Request::old('short_description'),['id'=>'short_description','class'
                                => 'form-control', 'title'=>'Enter short_description', 'rows'=>'3', 'cols'=>'5']) !!}
                        {!! $errors->first('short_description') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Type</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">                   
                     {!! Form::Select('type',array('simple-product'=>'Retail Product','configurable-product'=>'Fastival','group-product' => 'Offer Product'),Request::old('type'),['id'=>'', 'class'=>'form-control']) !!}
                    {!! $errors->first('type') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>SKU</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::text('item_no',Request::old('item_no'),['id'=>'','class' => 'form-control','title'=>'Enter Code' ]) !!}
                    {!! $errors->first('item_no') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Status</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' => 'Cancel'),Request::old('status'),['id'=>'', 'class'=>'form-control']) !!}
                    {!! $errors->first('status') !!}
                </div>
            </div>
        </div>
    </div>
        <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Stock</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                @if(!empty($inventory_data))
                <div class="form-line">
                    {!! Form::text('quantity',$inventory_data->quantity,Request::old('quantity'),['id'=>'','class' => 'form-control','title'=>'Quantity' ]) !!}
                    {!! $errors->first('quantity') !!}
                </div>
                @else
                <div class="form-line">
                    {!! Form::text('quantity',Request::old('quantity'),['id'=>'','class' => 'form-control','title'=>'Quantity' ]) !!}
                    {!! $errors->first('quantity') !!}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Featured</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                   {!! Form::Select('is_featured',array('no'=>'No','yes'=>'Yes'),Request::old('is_featured'),['id'=>'', 'class'=>'form-control']) !!}
                    {!! $errors->first('is_featured') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Batch</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                   {!! Form::Select('batch',array('batch'=>'','sale'=>'Sale','sold'=>'Sold','stock-out'=>'Stock out','new'=>'New'),Request::old('batch'),['id'=>'', 'class'=>'form-control']) !!}
                    {!! $errors->first('batch') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label>Product Images</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">                       
                        <p class="error mb-20">Supported format :: jpeg,png,jpg,gif </p>

                        <div class="mb-20">
                            <input type="file" name="image" accept="image/*" class="form-control">      
                        </div>

                        @if(isset($product->relProductImage) && !empty($product->relProductImage))
                         @foreach($product->relProductImage as $product_image)
                          <img  width="150" class="img-fluid img-responsive" src="{{URL::to($product_image->image_link)}}/orginal_image/{{$product_image->image}}" style="margin-right: 15px;">
                          @endforeach
                          @endif
                    </div>
                </div>
            </div>
    </div>   
</div>
<div class="footer">
    <div class="row clearfix">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
            <button class="btn bg-blue-grey btngmt waves-effect" type="submit">Save</button>
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