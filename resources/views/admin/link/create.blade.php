@extends('admin.layouts.master')

@section('contain')

<div class="pagetitle">
    <h1>Link</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Create Link</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Link Create</h5>
            
            <!-- Custom Styled Validation -->
            <form action='{{ route('link_store') }}' method="post" class="row g-3 needs-validation" novalidate>
              @csrf
              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">URL</label>
                <input type="text" placeholder="your Url here" class="form-control" name="url" id="validationCustom01" required>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" type="submit">Shorten</button>
              </div>
            </form><!-- End Custom Styled Validation -->

          </div>
        </div>

      </div>


    </div>
  </section>

@endsection