@extends('layouts/contentNavbarLayout') 

@section('title', 'Store - Add Products')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Store /</span> Add Product
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Product Details</h5>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                <form id="" method="POST" action="{{ route('addproduct') }}" >
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12 input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input class="form-control" id="pproductkey" data-name="{{ route('getproducts') }}" type="text" placeholder="Input products keywords">
                        </div>
                    </div>
                    <div class="row" id="pproduct_list">
                        <table class="table" id="pproductlist">
                        </table>
                    </div>
                    <div class="row">
                        <input class="form-control" type="hidden" id="pproduct_id" name="product_id" readonly/>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="pproduct_name" class="form-label">Product Name</label>
                            <input class="form-control" type="text" id="pproduct_name" name="product_name" readonly/>
                        </div>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="iproduct_price" class="form-label">Product Price</label>
                            <input class="form-control" type="number" id="pproduct_price" name="product_price" placeholder="Product Price" />
                        </div>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="pquantity" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control" id="pquantity" name="quantity" placeholder="Product Quantity"/>
                        </div>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="ptotal_price" class="form-label">Total Price</label>
                            <input type="number" class="form-control" id="ptotal_price" name="total_price" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Add Product</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
@endsection