@extends('admin.layouts.master')

@section('contain')


<div class="pagetitle">
    <h1>Contact</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Contact List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact List</h5>
              
              <div class="table-responsive">

              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($results as $item)
                      
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      {{ $item->name }}
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->message }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
            </div>

              <div class="d-flex">
                {!! $results->links() !!}
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
    $('.copy').click(function (e) {
        e.preventDefault();

        var $row = $(this).closest("tr");
        var copyText = $row.find(".link").html();

        document.addEventListener('copy', function(e) {
            e.clipboardData.setData('text/plain', copyText);
            e.preventDefault();
        }, true);

        document.execCommand('copy');  
        alert('copied text: ' + copyText); 
 });
</script>
@endpush