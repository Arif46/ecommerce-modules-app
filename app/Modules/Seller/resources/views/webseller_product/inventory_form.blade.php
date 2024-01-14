{!! Form::model($inventory_data,['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => 'inventory_form']) !!}
<?php
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Input;
?>
    <div class="form-fields">
        <h2>Inventory</h2>
        <p>
            {!! Form::label('warehouse', 'Ware House', array('class' => '')) !!}
            <span class="required"> *</span> 
            {!! Form::Select('warehouse',array('self'=>'Self'),Request::old('warehouse'),['id'=>'', 'class'=>'']) !!}
            <span class="error">{!! $errors->first('warehouse') !!}</span>
        </p>
        <p>
            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">

            {!! Form::label('item_number', 'Item Number', array('class' => '')) !!} 
            <span class="required"> *</span>
            {!! Form::text('item_number',!empty($inventory_data->item_number)?$inventory_data->item_number:$product->item_no,['id'=>'','class'
                            => '','required'=> 'required', 'title'=>'Enter item number' ]) !!}

            <span class="error">{!! $errors->first('item_number') !!}</span>
        </p>
        <p>
            {!! Form::label('quantity', 'Stock Limit', array('class' => '')) !!} 
            {!! Form::number('quantity',Request::old('quantity'),['id'=>'','class'
                            => 'form-control','title'=>'Enter quantity']) !!}

            <span class="error">{!! $errors->first('quantity') !!}</span>
        </p>
        <p>             
            {!! Form::label('note', 'Note', array('class' => '')) !!}
            {!! Form::textarea('note',Request::old('note'),['id'=>'','class'
                            => '', 'title'=>'Enter note', 'rows'=>'9', 'cols'=>'50']) !!}

            <span class="error">{!! $errors->first('note') !!}</span>           
        </p>
    </div>
    
    <div class="form-action">
        <button type="submit" class="button">Save Changes</button>
    </div>

    

    {!! Form::close() !!}