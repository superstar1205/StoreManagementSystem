@extends('layouts/contentNavbarLayout')

@section('title', 'Expenses')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Expenses /</span> Expenses Report
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Expenses</h5>
      <hr class="my-0">
      <div class="card-body">
        <div class="table-responsive text-nowrap pb-5">
            <table class="table">
                <thead>
                  <th class="text-center">#</th>
                  <th>Expense Name</th>
                  <th class="text-center">Expense price</th>
                  <th>Date</th>
                  <th>Actions</th>
                </thead>
                <tbody id="expense_list" data-name="{{ route('delete_expense') }}"  class="table-border-bottom-0">
                @foreach($expenses as $key => $expense)
                  <tr>
                    <td class="text-center">{{ $key+1 }}</td>
                    <td>{{ $expense->expense_name }}</td>
                    <td class="text-center">₪ {{ $expense->expense_price }}</td>
                    <td >{{ $expense->updated_at }}</td>
                    <td >
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" onclick="delete_expense({{$expense->id}})"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection