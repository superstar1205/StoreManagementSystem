@extends('layouts/contentNavbarLayout') 

@section('title', 'Salse - View Invoice')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Salse /</span> View Invoice 
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Invoice No: {{$inv_no}}</h5>
                        <h6>Date: {{ $date }}</h6>
                    </div>
                    <div>
                    <h4>Customer: <strong>{{$customer}}</strong></h4>
                    </div>
                </div>
            </div>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <th class="text-center">#</th>
                            <th>Product image</th>
                            <th>Product Name</th>
                            <th class="text-center">Product Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Sub Total Price</th>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($invoice as $key => $data)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="text-center"><div class="in_img"><img class="w-100" src="{{ $data->image }}"></div></td>
                                <td>{{ $data->product_name }}</td>
                                <td class="text-center">₪ {{ $data->product_price }}</td>
                                <td class="text-center">{{ $data->product_amount }}</td>
                                <td class="text-center">₪ {{ $data->total_price }}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan=4></td>
                                <td  class="text-center" ><h6>Total Price :</h6></td>
                                <td class="text-center"><h6>₪<span id="t_a">{{$tprice}}</span></h6></td>
                            </tr>
                            <tr>
                                <td colspan=4></td>
                                <td  class="text-center" ><h6>Paid Amount :</h6></td>
                                <td class="text-center"><h6>₪<span id="paid_a">{{$paid}}</span></h6></td>
                            </tr>
                            <tr>
                                <td colspan=4></td>
                                <td  class="text-center" ><h6>Remaining Amount :</h6></td>
                                <td class="text-center"><h6>₪<span id="unpaid_a">{{$unpaid}}</span></h6></td>
                            </tr>
                            <tr>
                                <td colspan=4></td>
                                <td  class="text-center" ><h6>Invoice Status :</h6></td>
                                <td class="text-center"><h6>@if($status==1)<span class="badge bg-label-success me-1">Complete</span>@else<span class="badge bg-label-primary me-1">In Complete</span>@endif</h6></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form method="POST" action="{{ route('updateinvoice') }}">
                    @csrf
                    <div class="row">
                        <input type="hidden" value="{{$inv_no}}" name="inv_no">
                        <input type="hidden" value="{{$paid}}" name="opaid_price">
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="npaid_price" class="form-label">New pay Amount</label>
                            <input class="form-control" type="number" id="npaid_price" name="npaid_price" min="0" placeholder="Max value {{$tprice - $paid}}" max="{{$tprice - $paid}}" required/>
                        </div>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="nunpaid_price" class="form-label">Remaining Amount</label>
                            <input class="form-control" type="number" id="nunpaid_price" name="nunpaid_price" min="0" value="{{$tprice - $paid}}" readonly required/>
                        </div>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="ninv_status" class="form-label">Invoice Status</label>
                            <input class="form-control" type="text" id="ninv_status" name="ninv_status" value="In Complete" readonly required/>
                        </div>
                            <button type="submit" class="my-3 btn btn-warning col-md-3 col-sm-6">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection