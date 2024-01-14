{!! Form::model($product, ['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => 'product_description']) !!}

<?php
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Input;
?>
    <div class="form-fields">
        <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('admin/ckeditor/texteditor.js') }}"></script>
        <h2>Description</h2>
        <p>
            {!! Form::label('short_description', 'Short description', array('class' => '')) !!} 
            {!! Form::textarea('short_description',Request::old('short_description'),['id'=>'short_description','class'
                    => '', 'title'=>'Enter short_description', 'rows'=>'3', 'cols'=>'50']) !!}
            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
            <span class="error">{!! $errors->first('short_description') !!}</span>    
        </p>
        <p>
            {!! Form::label('specification', 'Fabric & Care', array('class' => '')) !!}
            {!! Form::textarea('specification',Request::old('specification'),['id'=>'specification','class'
                            => '', 'title'=>'Enter specification', 'rows'=>'5', 'cols'=>'50']) !!}

            <span class="error">{!! $errors->first('specification') !!}</span>
        </p>

        <p>
            {!! Form::label('size_guide', 'Size Guide', array('class' => '')) !!}
            {!! Form::textarea('size_guide',Request::old('size_guide'),['id'=>'size_guide','class'
                            => '', 'title'=>'Enter Size Guide', 'rows'=>'5', 'cols'=>'50']) !!}

            <span class="error">{!! $errors->first('size_guide') !!}</span>
        </p>

        <p>
            {!! Form::label('description', 'Product Details', array('class' => '')) !!}
            {!! Form::textarea('description',Request::old('description'),['id'=>'main_description','class'
                            => 'main_description', 'title'=>'Enter Description', 'rows'=>'5', 'cols'=>'50']) !!}
            <span class="error">{!! $errors->first('description') !!}</span>
        </p>
    </div>

    
    <div class="form-action">
        <button type="submit" class="button" class="button">Save Changes</button>
    </div>

    <script>
    CKEDITOR.replace( 'short_description' );
    CKEDITOR.replace( 'specification' );
    CKEDITOR.replace( 'size_guide' );
    CKEDITOR.replace( 'main_description' );
    </script>
    
           
{!! Form::close() !!}