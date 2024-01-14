{!! Form::model($review_data,['method' => 'PATCH', 'files'=> true, "class"=>"", 'id' => 'inventoryform']) !!}

<?php
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Input;
?>

<div class="form-fields">
  
                <h4>Review</h4>
                <div class="cart-main-area mt-20">
                    <div class="cart-table table-responsive">
                            <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th> Rating </th>
                                            <th> Customer Name</th>
                                            <th> Review Title</th>
                                            <th> Comment </th>
                                            <th> Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @if(count($review_data) > 0)
                                     <?php
                                     $total_rows = 1;
                                     ?>
                                     @foreach($review_data as $values)
                                     <tr>
                                        <td>
                                            <?=$total_rows?>
                                        </td>
                                        <td>
                                            {{$values->rating_value_score}}
                                        </td>
                                        <td>
                                            {{$values->nickname}}
                                        </td>
                                        <td>
                                            {{$values->title}}
                                        </td>
                                        <td>
                                           {!!$values->review!!}
                                       </td>
                                       <td>
                                            @if ($values->status=='inactive')
                                                <p style="color: red">{{$values->status}}</p>

                                                @elseif($values->status=='active')

                                                <p style="color: green">{{$values->status}}</p>

                                                @elseif($values->status=='cancel')

                                                <p style="color: orange">{{$values->status}}</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure to Cancel?')" href="{{ route('seller.product.review.delete',$values->id) }}">Delete</a>
                                        </td>

                                </tr>
                                <?php
                                $total_rows++;
                                ?>
                                @endforeach
                                @endif

                                    </tbody>
                            </table>
                    </div>
                </div>
    
        
</div>
    
{!! Form::close() !!}

