@extends('layouts/contentNavbarLayout')

@section('title', 'Update')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Partner /</span> Partner Setting
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-header d-flex">
          <div class="avatar_img"><img class="h-100" src="{{ $partner->avatar }}"></div>
          <div class="px-2 pt-2 d-flex align-items-center"><h2>{{ $partner->f_name }} {{ $partner->l_name }}</h2></div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form method="POST" action="{{ route('updatepartner') }}" enctype="multipart/form-data" >
          @csrf
          <div class ="row">
            <div class="col-md-4">
            <input type="file" id="input-file-now" class="form-control dropify" name="file"/>
            </div>
            <div class="col-md-8">
                <div class="row">
                  <div class="mb-3 col-sm-6">
                  <input type="hidden" name="id" value="{{ $partner->id }}">
                  <input type="hidden" name="oavatar" value="{{ $partner->avatar }}">
                  <label for="f_name" class="form-label">First Name</label>
                  <input class="form-control" type="text" id="f_name" value="{{ $partner->f_name }}" name="f_name" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="l_name" class="form-label">Last Name</label>
                  <input class="form-control" type="text" id="l_name" value="{{ $partner->l_name }}" name="l_name" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-12">
                  <label for="percentage" class="form-label">Percentage</label>
                  <input type="hidden" value="{{ $partner->percentage }}" name="opercentage">
                  <input class="form-control" type="number" value="{{ $partner->percentage }}" id="percentage" name="percentage" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="email" class="form-label">e-mail</label>
                  <input class="form-control" type="email" id="email" value="{{ $partner->email }}" name="email" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="password" class="form-label">Password</label>
                  <input class="form-control" type="text" id="password" value="{{ $partner->unhashing_password }}" name="password" autofocus required/>
                  </div>
                </div>
            </div>
          </div>
          <div class="mt-2 float-end">
            <button type="submit" name="submit" class="btn btn-outline-warning me-2">Update</button>
            <a class="btn btn-primary" href="/partners">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection