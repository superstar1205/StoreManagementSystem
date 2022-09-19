@extends('layouts/contentNavbarLayout') 

@section('title', 'Salse - New Invoice')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Salse /</span> Record New Invoice
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Invoice Details</h5>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                <form id="" method="POST" action="{{ route('newinvoice') }}" >
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="iinvoice_no" class="form-label">Invoice No</label>
                            <input class="form-control" type="text" id="iinvoice_no" name="iinvoice_no" value="{{ $invoice_no }}" readonly required/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="icustomer" class="form-label">Customer Name</label>
                            <input class="form-control" type="text" id="icustomer" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12 input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input class="form-control" id="iproductkey" data-name="{{ route('getproducts') }}" type="text" placeholder="Input products keywords">
                        </div>
                    </div>
                    <div class="row" id="iproduct_list">
                        <table class="table" id="iproductlist">
                        </table>
                    </div>
                    <div class="row">
                            <input class="form-control" type="hidden" id="iproduct_id" readonly/>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="iproduct_name" class="form-label">Product Name</label>
                            <input class="form-control" type="text" id="iproduct_name" readonly/>
                        </div>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="iproduct_price" class="form-label">Product Price</label>
                            <input class="form-control" type="number" id="iproduct_price"  placeholder="Product Price" />
                        </div>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="iquantity" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control" id="iquantity" placeholder="Product Quantity"/>
                        </div>
                        <div class="mb-3 col-md-3 col-sm-6">
                            <label for="itotal_price" class="form-label">Sub Total Price</label>
                            <input type="number" class="form-control" id="itotal_price" />
                        </div>
                        <div class="mb-3">
                            <a class="btn btn-outline-success me-2"  data-name="{{ route('addiproduct') }}" id="iproductadd" type="button">Add product on invoice</a>
                        </div>
                    <h4>Added products in Current invoice</h4>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <th class="text-center">#</th>
                                <th>Product image</th>
                                <th >Product Name</th>
                                <th class="text-center">Product Price</th>
                                <th  class="text-center">Quantity</th>
                                <th  class="text-center">Total Price</th>
                                <th>Remove</th>
                            </thead>
                            <tbody id="invoice_list" data-name="{{ route('deletiproduct') }}" class="table-border-bottom-0">
                                <tr>
                                    <td colspan=5>Added product will show in here.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4 col-sm-6">
                            <label for="iproduct_name" class="form-label">Paid Price</label>
                            <input class="form-control" type="number" id="paid_price" name="paid_price" min="0" max="0" required/>
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6">
                            <label for="iproduct_name" class="form-label">Unpaid Price</label>
                            <input class="form-control" type="number" id="unpaid_price" name="unpaid_price" min="0" readonly required/>
                        </div>
                        <div class="mb-3 col-md-4 col-sm-6">
                            <label for="iproduct_name" class="form-label">Invoice Status</label>
                            <input class="form-control" type="text" id="inv_status" name="inv_status" readonly required/>
                        </div>
                    </div>
                    <div class="mt-2 float-end">
                        <button type="submit" class="float-end btn btn-danger me-2">Create Invoice</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
</div>
@endsection