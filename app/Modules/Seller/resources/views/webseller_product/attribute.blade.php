<div class="form-fields">
    <h2>Attribute</h2>
    @if(!empty($attributes))
        <table class="table" id="parentBox">
            <thead>
            <tr>
                <th>#</th>
                <th>Size</th>
                <th>Color</th>
                <th>Quantity</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
{{--            {{count($product->relColorSizeWiseQuantity)}}--}}
            @if(count($product->relColorSizeWiseQuantity))
                @foreach($product->relColorSizeWiseQuantity as $csq)
                    <tr style='background: lightseagreen;margin: 2px' class="EachRow">
                        <td class='serialSC' data-size-color-id="{{$csq->id}}" style='color:white'>{{$loop->iteration}}</td>
                        <td>
                            <select class='form-control sizeF'>
                                @foreach($sizes as $sizeId=>$sizeTitle)
                                    @if($sizeId == $csq->size_id)
                                        <option value="{{$sizeId}}" selected>{{$sizeTitle}}</option>
{{--                                    @else--}}
{{--                                        <option value="{{$sizeId}}">{{$sizeTitle}}</option>--}}
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class='form-control colorF'>
                                @foreach($colors as $colorId=>$colorTitle)
                                    @if($colorId == $csq->color_id)
                                        <option value="{{$colorId}}" selected>{{$colorTitle}}</option>
{{--                                    @else--}}
{{--                                        <option value="{{$colorId}}">{{$colorTitle}}</option>--}}
                                    @endif

                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type='number' class='form-control quantityF' value='{{$csq->quantity}}'>
                        </td>
                        <td>
                            @if(!$loop->first)
                                <i class="fa fa-minus-circle float-right fa-2 deduct-attribute-row"
                                   style="cursor: pointer" aria-hidden="true"></i>
                            @endif
                        </td>

                    </tr>
                @endforeach
            @else
                <tr style='background: lightseagreen;margin: 2px' class="EachRow">
                    <td class='serialSC' style='color:white'>1</td>
                    <td>
                        <select class='form-control sizeF'>
                            @foreach($sizes as $sizeId=>$sizeTitle)
                                <option value="{{$sizeId}}">{{$sizeTitle}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class='form-control colorF'>
                            @foreach($colors as $colorId=>$colorTitle)
                                <option value="{{$colorId}}">{{$colorTitle}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type='number' class='form-control quantityF' value='0'>
                    </td>
                    <td></td>

                </tr>
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5">
                    <i class="fa fa-plus-circle float-right fa-2 add-more-attribute" style="cursor: pointer"
                       aria-hidden="true"></i>
                </td>
            </tr>
            </tfoot>
        </table>
        <button class="btn btn-info float-right" id="submitProductAttributes">Submit</button>
    @endif
</div>
