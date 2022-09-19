@extends('layouts/contentNavbarLayout')

@section('title', 'Create New Partner')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Partner /</span> Create New Partner
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Partner Infomation</h5>
      <hr class="my-0">
      <div class="card-body">
        <form method="POST" action="{{ route('newpartner') }}" enctype="multipart/form-data" >
          @csrf
          <div class ="row">
            <div class="col-md-4">
            <input type="file" id="input-file-now" class="form-control dropify" name="file" required/>
            </div>
            <div class="col-md-8">
                <div class="row">
                  <div class="mb-3 col-sm-6">
                  <label for="f_name" class="form-label">First Name</label>
                  <input class="form-control" type="text" placeholder="First Name" id="f_name" name="f_name" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="l_name" class="form-label">Last Name</label>
                  <input class="form-control" type="text" placeholder="Last Name" id="l_name" name="l_name" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-12">
                  <label for="percentage" class="form-label">Percentage</label>
                  <input class="form-control" type="number" placeholder="Percentage in the partnership" id="percentage" name="percentage" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="email" class="form-label">e-mail</label>
                  <input class="form-control" type="email" id="email" name="email" autofocus required/>
                  </div>
                  <div class="mb-3 col-sm-6">
                  <label for="password" class="form-label">Password</label>
                  <input class="form-control" type="password" id="password" name="password" autofocus required/>
                  </div>
                </div>
            </div>
          </div>
          <div class="mt-2 float-end">
            <button type="submit" name="submit" class="btn btn-outline-warning me-2">Create New Partner</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection