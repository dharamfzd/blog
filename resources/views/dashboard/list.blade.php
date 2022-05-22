<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table v-middle">
          <thead>
            <tr class="bg-light">
              <th class="border-top-0">#</th>
              <th class="border-top-0">Name</th>
              <th class="border-top-0">Description</th>
              <th class="border-top-0">Image</th>
              <th class="border-top-0">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $c=1 @endphp
            @forelse($blogs as $blog)
            <tr>
              <td>{{ $c++ }}</td>
              <td>{{ substr($blog->blog_name, 0, 20) }}</td>
              <td>{{ substr($blog->blog_description, 0, 30) }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="m-r-10">
                    <img class="img-fluid rounded" width="30" src="{{ asset('storage/'.$blog->blog_image) }}">
                  </div>
                </div>
              </td>
              <td>
                <a class="text-success" href="{{ route('blog-details', $blog->id) }}"><i class="fas fa-eye fa-sm"></i></a>
                <a class="text-primary" href="{{ route('blog-edit', $blog->id) }}"><i class="fas fa-edit fa-sm"></i></a>
                <a class="text-danger blog-delete" href="{{ route('blog-delete', $blog->id) }}"><i class="fas fa-trash fa-sm"></i></a>
              </td>
            </tr>
            @empty
            <td>No blog</td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@section('Java-script')
  <script type="text/javascript">
    $('.blog-delete').click(function(event){
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be to recover this blog!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = url;
        } else {
          swal("Your blog is safe!");
        }
      })
     });
  </script>
@endsection
