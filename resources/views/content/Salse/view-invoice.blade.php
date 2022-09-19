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
                        <h4>Invoice No: {{$inv_no}}</h4>
                        <h5>Date: {{ $date }}</h5>
                    </div>
                    <div>
                    <h4>Customer: <strong>{{$customer}}</strong></h4>
                    <h4>Seller: <strong>{{$seller}}</strong></h4>
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
                                <td  class="text-center" ><h5>Total Price :</h5></td>
                                <td class="text-center"><h4>₪ {{$tprice}}</h4></td>
                            </tr>
                            <tr>
                                <td colspan=4></td>
                                <td  class="text-center" ><h5>Paid Amount :</h5></td>
                                <td class="text-center"><h4>₪ {{$paid}}</h4></td>
                            </tr>
                            <tr>
                                <td colspan=4></td>
                                <td  class="text-center" ><h5>Remaining Amount :</h5></td>
                                <td class="text-center"><h4>₪ {{$unpaid}}</h4></td>
                            </tr>
                            <tr>
                                <td colspan=4></td>
                                <td  class="text-center" ><h5>Invoice Status :</h5></td>
                                <td class="text-center"><h4>@if($status==1)<span class="badge bg-label-success me-1">Complete <i class="bx bx-badge-check"></i></span>@else<span class="badge bg-label-primary me-1">In Complete</span>@endif</h4></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection