@extends('Admin::layouts.master')
@section('body')

    <section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-8">
                        <h2>Merchant Registration</h2>
                    </div>
                    <div class="col-md-4">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin-dashboard') }}">Home</a></li>
                            <li><a href="javascript:void(0);">Order</a></li>
                            <!--<li class="active">Data</li>-->
                        </ol>
                    </div>
                </div>
            </div>


            <!-- Table list for data -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-md-3 col-sm-12">
                                    <h2>
                                        Pending Seller List
                                    </h2>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    {!! Form::open(['method' =>'GET', 'route' => 'admin.order.search', 'id'=>'', 'class' => '']) !!}
                                    {!! Form::text('search_keywords',@Request::get('search_keywords')? Request::get('search_keywords') : null,['class' => 'form-control search-input','placeholder'=>'email/name']) !!}
                                    <button type="submit" class="admin-search">
                                            <span class="ti-search">
                                    </button>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12 table-responsive">
                                    <div class="admin-dashboard-table">

                                        <table id="mainTable" class="table table-hover table-striped table-bordered">

                                            <thead class="bg-blue-grey">
                                            <tr>
                                                <th>Serial No</th>
                                                {{-- <th> Merchant Info </th>
                                                <th> Shop Info </th>
                                                <th> Order Number </th>
                                                <th> Date </th>
                                                <th> Total Amount </th>
                                                <th> Delivery Status</th>
                                                <th>Payment</th>
                                                <th>Payment status</th> --}}
                                                <th> Shop Name </th>
                                                <th> User Name </th>
                                                <th> Address </th>
                                                <th> Mobile Number </th>
                                                <th> Email </th>
                                                <th> Status </th>
                                                <th> Action </th>

                                            </tr>
                                            </thead>

                                            <tbody>

                                            @if(!empty($data))
                                                @foreach($data as $key => $values)
                                                        <?php //dd($values->relSeller);?>
                                                    <tr>
                                                        <td class="text-center">
                                                            {{-- {{ $values }} --}}
                                                            {{$key+1}}
                                                        </td>
                                                        <td>
                                                            @if(isset($values['relMerchantProfile']['shop_name']))
                                                                {{ $values['relMerchantProfile']['shop_name'] }}
                                                            @else
                                                                N/A 
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $values->username}}
                                                        </td>

                                                        <td>
                                                            @if(isset($values['relMerchantProfile']['shop_address']))
                                                                {{ $values['relMerchantProfile']['shop_address'] }}
                                                            @else
                                                                N/A 
                                                            @endif
                                                        </td>

                                                        <td>
                                                            {{ $values->mobile_no}}
                                                        </td>

                                                        <td>
                                                            {{ $values->email }}
                                                        </td>

                                                        {{-- <td>{{ date('M d, Y',strtotime($values->date)) }}</td> --}}


                                                        {{-- <td>
                                                            ৳ {{number_format(($values->total_price - $values->discount_amount),2)}}
                                                        </td> --}}

                                                        {{-- <td>
                                                            {{ucfirst($values->status)}}
                                                        </td> --}}

                                                        {{-- <td>

                                                            <img src="{{URL::to('')}}/frontend/assets/img/payment/{{@App\Http\Helpers\CartHelper::payment_option()[$values->payment_type]}}.png" height="30" style="height:30px !important; " />
                                                        </td> --}}
                                                        <td>

                                                            @if ($values->status == "pending")

                                                                Pending

                                                            @elseif($values->status == "active")

                                                                Active

                                                            @endif

                                                        </td>

                                                        <td>
                                                            <a href="#" class="btn btn-primary" title="Details" data-toggle="modal" data-target="#userDetailsModal" data-user-id="{{ $values['relMerchantProfile']['id'] }}">Details</a>
                                                            {{-- <a href="{{ route('admin.seller.details', $values->id) }}" class="btn btn-primary" title="Order Details" >Details</a> --}}
                                                            <form method="POST" action="{{ route('admin.cancel.status', $values->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" size="sm" class="btn btn-danger" title="verification" onclick="return confirm('Are you sure to Cancel?')">Cancel</button>
                                                            </form>
                                                            <form method="POST" action="{{ route('admin.verified.status', $values->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-primary" title="verification" onclick="return confirm('Are you sure to Verification?')">Verify</button>
                                                            </form>
                                                        </td>

                                                    </tr>

                                                @endforeach
                                            @endif

                                            </tbody>

                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Modal -->
            <div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Content to display user details -->
                        <div class="modal-body">
                            <div class="user-details">
                                <h5 class="text-center">Pending Seller List Details</h5>
                                <div class="detail-row">
                                    <span class="detail-label">Name:</span>
                                    <span class="detail-value" id="shopName"></span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">NID NO:</span>
                                    <span class="detail-value" id="nid"></span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Tin No:</span>
                                    <span class="detail-value" id="tin"></span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Shop Address:</span>
                                    <span class="detail-value" id="address"></span>
                                </div>
                                <!-- Add more details as needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('a[title="Details"]').click(function (e) {
            e.preventDefault();
            var id = $(this).data('user-id');
            $.ajax({
                url: "/seller-details/" + id,
                //url: "{{ route('admin.seller.details', ['id' => 'id']) }}/",
                method: 'GET',
                success: function (response) {
                    var shopDetails = response.data;
                    $('#shopName').text(shopDetails.shop_name);
                    $('#nid').text(shopDetails.nid_number);
                    $('#tin').text(shopDetails.tin_no);
                    $('#address').text(shopDetails.shop_address);
                    // Clear previous data
                    $('#userDetailsTableBody').empty();

                    //$('#userDetailsModal .modal-body').html(response);
                },
                error: function () {
                    $('#userDetailsModal .modal-body').html('Error fetching user details.');
                }
            });
        });
    });
</script>

