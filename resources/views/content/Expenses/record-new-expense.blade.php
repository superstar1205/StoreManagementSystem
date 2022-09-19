@extends('layouts/contentNavbarLayout') 

@section('title', 'Store - New Expense')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Store /</span> Record New Expense
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Expense Details</h5>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                <form id="" method="POST" action="{{ route('newexpense') }}" >
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6 col-sm-6">
                            <label for="expense_name" class="form-label">Expense Name</label>
                            <input class="form-control" type="text" id="expense_name" placeholder="Please enter expense info" name="expense_name" />
                        </div>
                        <div class="mb-3 col-md-6 col-sm-6">
                            <label for="expense_price" class="form-label">Expense Price</label>
                            <input class="form-control" type="number" id="expense_price" name="expense_price" placeholder="Product Price" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-success me-2 float-end">Record New Expense</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
@endsection