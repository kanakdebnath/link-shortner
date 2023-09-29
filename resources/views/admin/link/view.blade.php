@extends('admin.layouts.master')

@section('contain')


<div class="pagetitle">
    <h1>Link analytics</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Link analytics</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Link analytics</h5>
              
              <p>Url: <a class="link" href="#">{{ $result->url }}</a></p>
              <p>Short Link: <a class="link" title="Copy Link" href="#">{{ $result->getLink() }}</a></p>

            </div>
          </div>

      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Link analytics</h5>
          
          <div class="table-responsive">

          <!-- Bordered Table -->
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Platfrom</th>
                <th scope="col">Device </th>
                <th scope="col">Location </th>
                <th scope="col">IP</th>
                <th scope="col">View Time</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($result->visits as $item)
              <tr>
                <td>{{ $item->platform  }}</td>
                <td>{{ $item->device  }}</td>
                <td>{{ $item->location   }}</td>
                <td>{{ $item->ip   }}</td>
                <td>{{ date('d-m-Y', strtotime($item->created_at))  }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>


          <!-- End Bordered Table -->

        </div>
      </div>

  </div>


    </div>
  </section>

@endsection
@push('script')
<script type="text/javascript">
    $('.link').click(function (e) {
        e.preventDefault();
        var copyText = $(this).html();

        document.addEventListener('copy', function(e) {
            e.clipboardData.setData('text/plain', copyText);
            e.preventDefault();
        }, true);

        document.execCommand('copy');  
        alert('copied text: ' + copyText); 
 });
</script>
@endpush