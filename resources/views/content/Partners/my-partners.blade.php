@extends('layouts/contentNavbarLayout')

@section('title', 'Partners')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Partner /</span> Partners
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Partners</h5>
      <hr class="my-0">
      <div class="card-body">
        <div class="table-responsive text-nowrap pb-5">
            <table class="table">
                <thead>
                  <th class="text-center">#</th>
                  <th>Partner</th>
                  <th>Partner Name</th>
                  <th class="text-center">Partner Percentage</th>
                  <th>Partner Email</th>
                  <th>Actions</th>
                </thead>
                <tbody id="partner_list" data-name="{{ route('delete_partner') }}"  class="table-border-bottom-0">
                @foreach($partners as $key => $partner)
                  <tr>
                    <td class="text-center">{{ $key+1 }}</td>
                    <td class="text-center"><div class="avatar_img"><img class="h-100" src="{{ $partner->avatar }}"></div></td>
                    <td>{{ $partner->f_name }} {{ $partner->l_name }}</td>
                    <td class="text-center">{{ $partner->percentage }}</td>
                    <td >{{ $partner->email }}</td>
                    <td >
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{!! route('paytopartner', ['i'=>$partner->id, 'p'=>$partner->percentage, 'fn'=>$partner->f_name, 'ln'=>$partner->l_name]) !!}"><i class="bx bx-dollar me-1"> Pay</i></a>
                          <a class="dropdown-item" href="{!! route('patnersetting', ['i'=>$partner->id]) !!}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" onclick="delete_partner({{ $partner->id }}, {{ $partner->percentage }})"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
                <tr>
                  <td colspan=5>
                    <div class="pb-4">
                        <h5>If you want to change partner info like percentage..., click "Edit" in Action field.</h5>
                        <h5>If you want to make payment to partner, click "Pay" in Action field. </h5>
                    </div>
                  </td>
                </tr>
                </tbody>

            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection