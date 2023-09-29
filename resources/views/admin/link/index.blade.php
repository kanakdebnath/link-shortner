@extends('admin.layouts.master')

@section('contain')


<div class="pagetitle">
    <h1>Link</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Link List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Link List</h5>
              
              <div class="table-responsive">

              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Summary</th>
                    <th scope="col">Visits</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($results as $item)
                      
                  <tr>
                    <td>
                      <a target="blank" href="{{ $item->url }}">{{ $item->url }}</a> <br>
                      <a target="blank" href="{{ $item->getLink() }}"><small class="link">{{ $item->getLink() }}</small></a> 
                    </td>
                    <td>{{ count($item->visits) }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->updated_at)) }}</td>
                    <td>

                    <a href="{{ route('link_view', $item->id) }}">
                      <span class="badge rounded-pill text-bg-success">Details</span>
                    </a>

                    <a href="{{ route('link_view', $item->id) }}">
                      <span class="badge rounded-pill copy text-bg-info">Copy</span>
                    </a>

                    <a class="button-delete" data-id="{{$item->id}}" data-url='{{ route('link_delete') }}' href='#'>
                      <span class="badge rounded-pill text-bg-danger">Delete</span>
                    </a>
                    
                    </td>
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