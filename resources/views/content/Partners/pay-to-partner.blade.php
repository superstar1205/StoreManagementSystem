@extends('layouts/contentNavbarLayout') 

@section('title', 'Partner - Make Payment')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Partner /</span> Record New Payment
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Partner: {{ $partner_name }}</h4>
                    <div>
                    <h5>Percentage: {{ $partner_percentage }}%</h5>
                    <h6>Total Amount: {{ $inv_res->paid }}$</h6>
                    <h6>Paid Amount: {{ $oreceive }}$</h6>
                    </div>
                </div>
                <p> You have to pay {{ $inv_res->paid }}$ * {{ $partner_percentage }}% - {{$oreceive}} '=' {{$partner_percentage * $inv_res->paid / 100 - $oreceive}} $ </p>
            </div>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                <form id="" method="POST" action="{{ route('paidtopartner') }}" >
                    @csrf
                    <div class="row">
                        <input type="hidden" name="partner_id" value="{{ $partner_id }}">
                        <input type="hidden" name="partner_name" value="{{ $partner_name }}">
                        <div class="input-group">
                        <input type="number" name="pay_amount" class="form-control" placeholder="Enter pay amount" aria-label="pay amount" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Record new payment</button>
                        </div>
                        
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
@endsection