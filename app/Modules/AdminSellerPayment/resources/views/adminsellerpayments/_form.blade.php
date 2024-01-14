<div class="body">
    @csrf
    <div class="row clearfix">
        <div class="col-md-6 ">
            <div class="form-group">
                <label>From (Admin)</label><span class="required"> *</span> 
                <div class="form-line">
                    {!! Form::Select('admin_id',$adminList,Request::old('admin_id'),['id'=>'admin_id', 'class'=>'form-control', 'readonly' => true ]) !!}
                    {!! $errors->first('admin_id') !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Seller</label><span class="required"> *</span>
                <div class="form-line">
                    {!! Form::Select('seller_id',$sellerList,Request::old('seller_id'),['id'=>'', 'class'=>'form-control']) !!}
                    {!! $errors->first('seller_id') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-6">
            <div class="form-group">
                <label>Amount</label><span class="required"> *</span>
                <div class="form-line">
                    {!! Form::number('amount',Request::old('amount'),['id'=>'amount','class' => 'form-control', 'title'=>'Enter amount' ,'required'=>'required']) !!}
                    <span class="error">{!! $errors->first('amount') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Pay By</label><span class="required"> *</span>
                <div class="form-line">
                    {!! Form::Select('pay_by',[1 => 'Cash',2 => 'Bank',3 => 'Mobile Bank'],Request::old('pay_by'),['id'=>'', 'class'=>'form-control']) !!}
                    {!! $errors->first('pay_by') !!}
                </div>
            </div>
        </div>
    </div>

       

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="form-group">
                <label>Special Instruction[From admin]</label>
                <div class="form-line">
                    {!! Form::textarea('special_instruction',Request::old('special_instruction'),['id'=>'special_instruction','class' => 'form-control','title'=>'Enter special_instruction', 'rows'=>'3', 'cols'=>'50']) !!}

                    <span class="error">{!! $errors->first('special_instruction') !!}</span>
                </div>
            </div>
        </div>      

    </div>

    

    <div class="row clearfix">

         <div class="col-md-6">
            <div class="form-group">
                <label>Admin Note</label><span class="required"> *</span>
                <div class="form-line">
                    {!! Form::text('admin_note',Request::old('admin_note'),['id'=>'admin_note','class' => 'form-control', 'title'=>'Enter admin note' ]) !!}
                    <span class="error">{!! $errors->first('admin_note') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Admin Note(Bn)</label>
                <div class="form-line">
                    {!! Form::text('admin_note_bn',Request::old('admin_note_bn'),['id'=>'admin note bangla','class' => 'form-control', 'title'=>'Enter admin note' ]) !!}
                    <span class="error">{!! $errors->first('admin_note_bn') !!}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
       
        <div class="col-md-6">
            <div class="form-group">
                <label>Admin Note(Hi)</label>
                <div class="form-line">
                    {!! Form::text('admin_note_hi',Request::old('admin_note_hi'),['id'=>'admin_note_hi ','class' => 'form-control', 'title'=>'Enter admin note hindi' ]) !!}
                    <span class="error">{!! $errors->first('admin_note_hi') !!}</span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Admin Note(Ch)</label>
                <div class="form-line">
                    {!! Form::text('admin_note_ch',Request::old('admin_note_ch'),['id'=>'admin_note_ch ','class' => 'form-control', 'title'=>'Enter admin note Ch' ]) !!}
                    <span class="error">{!! $errors->first('admin_note_ch') !!}</span>
                </div>
            </div>
        </div>

    </div>

    


    <div class="row clearfix">       
        <div class="col-md-4">
            <div class="form-group">
                <label>Received copy (Supported format :: jpeg,png,jpg,gif & file size max :: 1MB)</label>
                <div class="form-line">

                    <div style="position:relative;">
                        <a class='btn btn-primary btn-sm font-10' href='javascript:;'>
                            Choose File...
                            <input name="image_link" type="file"
                                   style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                                   name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>


                    </div>

                    @if(isset($data['image_link'] ) && !empty($data['image_link']) )
                        <a target="_blank" href="{{ url('uploads/brand/' . $data->image_link) }}"
                           style="margin-top: 25px;" class="btn btn-primary btn-sm font-10"><img
                                    src="{{ url('uploads/brand/800x800/' . $data->image_link) }}" width="300"
                                    alt="{{$data['image_link']}}"/>
                        </a>
                    @endif

                </div>
            </div>
        </div>
            
        <div class="col-md-4">
            <div class="form-group">
                <label>Transaction Id</label>
                <div class="form-line">
                    {!! Form::text('transaction_id',Request::old('transaction_id'),['id'=>'transaction_id ','class' => 'form-control', 'title'=>'Enter admin note Ch' ]) !!}
                    <span class="error">{!! $errors->first('transaction_id') !!}</span>
                </div>
            </div>
        </div>

         <div class="col-md-4">
            <div class="form-group">
                <label>Payment Date</label>
                <div class="form-line">
                    {!! Form::date('payment_date',Request::old('payment_date'),['id'=>'payment_date ','class' => 'form-control', 'title'=>'Enter Payment Date' ]) !!}
                    <span class="error">{!! $errors->first('payment_date') !!}</span>
                </div>
            </div>
        </div>
    </div>

   
  


</div>

<div class="footer">
    <div class="row clearfix align-right">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
            <button class="btn bg-blue-grey btngmt waves-effect" type="submit">Save</button>
        </div>
    </div>
</div>
<!--validate and convet to slug part-->

<script>
    var today = new Date();
    var date = '-' + today.getFullYear() + (today.getMonth() + 1) + today.getDate() + today.getHours() + today.getMinutes() + today.getSeconds();

    function convert_to_slug() {
        var str = document.getElementById("title").value;
        var str1 = date;
        str = str.replace(/[^a-zA-Z0-12\s]/g, "");
        str = str.toLowerCase();
        str = str.replace(/\s/g, '-');
        // var str1 = "afshini-";
        var res = str.concat(str1);
        document.getElementById("slug").value = res;
    }

</script>

</script>