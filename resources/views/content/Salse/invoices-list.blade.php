@extends('layouts/contentNavbarLayout')

@section('title', 'Salse - Invoices')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Salse /</span> Invoices
</h4>

<div class="card">
  <h5 class="card-header">Products</h5>
  <div class="card-datatable table-responsive p-2">
    <table class="dt-responsive table border-top dataTable dtr-column collapsed" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
      <thead>
        <tr>
          <th  class="text-center">#</th>
          <th>Invoice No</th>
          <th>Customer</th>
          <th>Paid price</th>
          <th>Unpaid price</th>
          <th>Total price</th>
          <th>Status</th>
          <th>Date</th>
          <!-- <th>Partners</th> -->
          <th  class="text-center">Action</th>
        </tr>
      </thead>
      <tbody id="inv_list" data-name="{{ route('delet_inv') }}" class="table-border-bottom-0">
        @foreach($invoices as $key => $invoice)
        <tr>
          <td  class="text-center">{{ $key+1 }}</td>
          <td>{{ $invoice->invoice_no }}</td>
          <td >{{ $invoice->customer }}</td>
          <td>₪ {{ $invoice->paid_price }}</td>
          <td>₪ {{ $invoice->unpaid_price }}</td>
          <td >₪ {{ $invoice->tprice }}</td>
          <td>@if( $invoice->inv_status == 1 )<span class="badge bg-label-success me-1">Complete <i class="bx bx-badge-check"></i></span>@else<span class="badge bg-label-primary me-1">In Complete</span>@endif</td>
          <td >{{ $invoice->updated_at }}</td>
          <td  class="text-center">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                @if( $invoice->inv_status ==0 )<a class="dropdown-item" href="{!! route('editinvoice', ['i'=>$invoice->invoice_no, 't'=>$invoice->tprice]) !!}"><i class="bx bx-edit me-1"></i> Edit</a>@endif
                <a class="dropdown-item" href="{!! route('viewinvoice', ['i'=>$invoice->invoice_no, 't'=>$invoice->tprice]) !!}"><i class="bx bx-low-vision me-1"></i> View</a>
                <a class="dropdown-item" onclick="delete_inv( {{ $invoice->invoice_no }} )"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="3"></td>
          <td>₪ {{ $total->paid }}</td>
          <td>₪ {{ $total->remain }}</td>
          <td>₪ {{ $total->total }}</td>
        </tr>
      </tbody>
    </table>

  </div>
</div>


@endsection
