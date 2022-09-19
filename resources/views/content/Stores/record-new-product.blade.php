@extends('layouts/contentNavbarLayout')

@section('title', 'Record New product')



@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Store /</span> Record New Product
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Product Details</h5>
      <hr class="my-0">
      <div class="card-body">
        <form method="POST" action="{{ route('newproduct') }}" enctype="multipart/form-data" >
            @csrf
          <div class ="row">
            <div class="col-md-6">
            <input type="file" id="input-file-now" class="form-control dropify" name="file" required/>
            </div>
            <div class="col-md-6">
                <div class="row">
                  <div class="mb-3 col-sm-6">
                  <label for="product_name" class="form-label">Product Name</label>
                  <input class="form-control" type="text" placeholder="Product Name" id="product_name" name="product_name" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="product_num" class="form-label">Product Number</label>
                  <input class="form-control" type="number" placeholder="Current your Store holding Number" id="product_num" name="product_num" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="product_price" class="form-label">Product Price</label>
                  <input class="form-control" type="number" placeholder="Product Price" id="product_price" name="product_price" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="total_price" class="form-label">Total Price</label>
                  <input class="form-control" type="text" id="total_price" name="total_price" readonly/>
                  </div>
                </div>
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" name="submit" class="btn btn-primary me-2">Record New Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection