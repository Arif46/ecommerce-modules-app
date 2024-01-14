{!! Form::model($seo_data, ['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => 'seoform']) !!}

<?php
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Input;
?>
    <div class="form-fields">
        <h2>SEO</h2>
        <p>
            {!! Form::label('meta_title', 'Meta Title', array('class' => '')) !!}
            <span class="required"> *</span> 
            {!! Form::text('meta_title', Request::old('meta_title'),['id'=>'','class' => '','required'=> 'required',  'meta_title'=>'Enter meta title']) !!}
            <span class="error">{!! $errors->first('meta_title') !!}</span>
        </p>
        <p>
            {!! Form::label('meta_keywords', 'Meta Keywords', array('class' => '')) !!} <span class="required"> *</span>
            {!! Form::text('meta_keywords',Request::old('meta_keywords'),['id'=>'','class' => '','required'=> 'required', 'title'=>'Enter meta keywords' ]) !!}

            <span class="error">{!! $errors->first('meta_keywords') !!}</span>
        </p>
        <p>
            {!! Form::label('meta_image_link', 'Meta Image', array('class' => '')) !!}
                    
            {!! Form::text('meta_image_link',Request::old('meta_image_link'),['id'=>'','class' => '','title'=>'Enter meta image']) !!}

            <span class="error">{!! $errors->first('meta_image_link') !!}</span>
        </p>
        <p>
            {!! Form::label('meta_description', 'Meta description', array('class' => '')) !!}
                
            {!! Form::textarea('meta_description',Request::old('meta_description'),['id'=>'','class' => '', 'title'=>'Enter meta description', 'rows'=>'9', 'cols'=>'50']) !!}

            <span class="error">{!! $errors->first('meta_description') !!}</span>
            
        </p>
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
    </div>

    
    <div class="form-action">
        <button type="submit" class="button">Save Changes</button>
    </div>


{!! Form::close() !!}