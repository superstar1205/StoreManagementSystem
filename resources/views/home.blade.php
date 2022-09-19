@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">

@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
@endif

  <div class="col-12 col-md-12 col-lg-12 order-3 order-md-2">
    
    <div class="row">
  <!--/ Total Revenue -->
      <div class="col-12 col-md-12 col-lg-5 order-3 order-md-2">
        <div class="row">
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <span class="bg-label-success rounded-2 p-1"><i class="bx bx-wallet fs-1 rounded"></i></span>
                </div>
                <span class="fw-semibold d-block mb-1">Casher Box</span>
                <h3 class="card-title mb-2">₪ {{ $casher }}</h3>
              </div>
            </div>
          </div>
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <span class="bg-label-danger rounded-2 p-1"><i class="bx bx bx-credit-card fs-1"></i></span>
                </div>
                <span class="fw-semibold d-block mb-1">Expense Amount</span>
                <h3 class="card-title mb-2">₪ {{ $total_ex->e_total }}</h3>
              </div>
            </div>
          </div>
          <div class="col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                  <div class="card-title ">
                    <span class="bg-label-primary px-1 pt-2 pb-3 rounded-2"><i class="bx bx bx-spreadsheet fs-1"></i> </span>
                    <h4 class="text-nowrap fs-5">Invoices Report</h4>
                  </div>
                </div>
                <div class="mt-sm-auto">
                  <div class="row">
                    <div class="col-sm-4">
                    <small class="text-success text-nowrap fw-semibold">Paid Amount</small>
                    <h4 class="mb-0">₪ {{$inv_res->paid}}</h4>
                    </div>
                    <div class="col-sm-4">
                    <small class="text-success text-nowrap fw-semibold">Remaining Amount</small>
                    <h4 class="mb-0">₪ {{$inv_res->remain}}</h4>
                    </div>
                    <div class="col-sm-4">
                    <small class="text-success text-nowrap fw-semibold">Total Amount</small>
                    <h4 class="mb-0">₪ {{$inv_res->total}}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7 order-2 order-md-3 order-lg-2 mb-4">
        <div class="row">
        @if (Auth::user()->id == 1)
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-body">
                <h6 class="text-end">(Just Me)</h6>
                <div class="d-flex justify-content-center">
                  <img class="dash_img" src="{{Auth::user()->avatar}}">
                </div>
                <div class="divider divider-primary">
                  <div class="divider-text">{{Auth::user()->f_name }} {{Auth::user()->l_name}}</div>
                </div>
                <small class="text-success text-nowrap fw-semibold">Percentage: {{Auth::user()->percentage}}%</small>
                <h4>Profit Assign</h4>
                <h3>₪ {{$inv_res->paid * Auth::user()->percentage / 100 - $total_ex->e_total }}</h3>
              </div>
            </div>
          </div>
          @foreach($partners as $partner)
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-body">
                <h6 class="text-end">(Partner)</h6>
                <div class="d-flex justify-content-center">
                  <img class="dash_img" src="{{$partner->avatar}}">
                </div>
                <div class="divider divider-primary">
                  <div class="divider-text">{{$partner->f_name }} {{$partner->l_name}}</div>
                </div>
                <small class="text-success text-nowrap fw-semibold">Percentage: {{$partner->percentage}}%</small>
                <div class="row">
                <h6>Total Assign Amount: ₪ {{$inv_res->paid * $partner->percentage / 100 }}</h6>
                  @foreach($partner_expenses as $expart)
                  @if($expart->partner_id == $partner->id)
                  <h6>Paid Amount: ₪ {{$expart->ep}}</h6>
                  <h6>Remain Amount: ₪ {{$inv_res->paid * $partner->percentage / 100 - $expart->ep}}</h6>
                  @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-body">
                <h6 class="text-end">(Just Me)</h6>
                <div class="d-flex justify-content-center">
                  <img class="dash_img" src="{{Auth::user()->avatar}}">
                </div>
                <div class="divider divider-primary">
                  <div class="divider-text">{{Auth::user()->f_name }} {{Auth::user()->l_name}}</div>
                </div>
                <small class="text-success text-nowrap fw-semibold">Percentage: {{Auth::user()->percentage}}%</small>
                <h4>Profit Assign</h4>
                <h6>₪ {{$inv_res->paid * Auth::user()->percentage / 100 }}</h6>
                @foreach($partner_expenses as $pe)
                @if($pe->partner_id == Auth::user()->id)
                <h6>Recieved Amount : ₪ {{$pe->ep}}</h6>
                <h6>Remain Amount : ₪ {{ $inv_res->paid * Auth::user()->percentage / 100 - $pe->ep }}</h6>
                @endif
                @endforeach
              </div>
            </div>
          </div>
          @foreach($partners as $partner)
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-body">
                <h6 class="text-end">(Partner)</h6>
                <div class="d-flex justify-content-center">
                  <img class="dash_img" src="{{$partner->avatar}}">
                </div>
                <div class="divider divider-primary">
                  <div class="divider-text">{{$partner->f_name }} {{$partner->l_name}}</div>
                </div>
                <small class="text-success text-nowrap fw-semibold">Percentage: {{$partner->percentage}}%</small>
                <div class="row">
                <h6>Total Assign Amount: ₪ {{$inv_res->paid * $partner->percentage / 100 }}</h6>
                  @foreach($partner_expenses as $expart)
                  @if($expart->partner_id == $partner->id)
                  <h6>Paid Amount: ₪ {{$expart->ep}}</h6>
                  <h6>Remain Amount: ₪ {{$inv_res->paid * $partner->percentage / 100 - $expart->ep}}</h6>
                  @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @endif
        </div>
      </div>
    </div>

    <!-- Lists -->
    <div class="row">
      <!-- Invoices -->
      <div class="col-md-6 col-lg-4 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Invoices</h5>
          </div>
          <div class="card-body inv_card overflow-auto  scrollable-container ps ps--active-y" id="invo_list">
            <ul class="p-0 m-0 ">
              @foreach($invoices as $invoice)
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                @if($invoice->inv_status == 1)
                <span class="badge bg-label-success me-1"><i class="bx bx-brightness fs-4"></i></span>
                @else
                <span class="badge bg-label-primary me-1"><i class="bx bx-brightness-half fs-4"></i></span>
                @endif
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Invoice No</small>
                    <h6 class="mb-0">{{$invoice -> invoice_no}}</h6>
                  </div>
                  @if($invoice->inv_status == 1)
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">+ ₪ {{$invoice->paid_price}}</h6>
                  </div>
                  @else
                  <div class="user-progress d-flex align-items-center gap-1">
                    <div class="d-flex flex-column">
                    <h6 class="mb-0 text-end float-end">+ ₪ {{$invoice->paid_price}}</h6>
                    <small class="text-success fw-semibold image.png float-end"><i class='bx bx-up-arrow-alt'></i> +{{$invoice->unpaid_price}}</small>
                    </div>
                  </div>
                  @endif
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

      <!-- Expense -->
      <div class="col-md-6 col-lg-4 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Expenses</h5>
          </div>
          <div class="card-body inv_card overflow-auto  scrollable-container ps ps--active-y" id="exp_list">
            <ul class="p-0 m-0 ">
              @foreach($expenses as $expense)
              <li class="d-flex mb-4 pb-1">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Expense Detail</small>
                    <h6 class="mb-0">{{$expense -> expense_name}}</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <div class="d-flex flex-column">
                    <h6 class="mb-0 text-end float-end">- ₪ {{$expense->expense_price}}</h6>
                    </div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

      <!-- Products -->
      <div class="col-md-6 col-lg-4 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Store</h5>
          </div>
          <div class="card-body inv_card overflow-auto  scrollable-container ps ps--active-y" id="pro_list">
            <ul class="p-0 m-0 ">
              @foreach($products as $product)
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 rounded-2 me-3">
                <img class="w-100 rounded-2" src="{{ $product->image }}"></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">{{$product->product_name}}</small>
                    <h6 class="mb-0">{{$product -> product_num}}</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">₪ {{$product->product_price}}</h6>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
@endsection