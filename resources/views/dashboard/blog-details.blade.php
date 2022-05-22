@extends('layouts.dashboard')
@section('title', 'Blog Details')
@section('right-button')
<a href="{{ route('blog-list') }}" class="d-inline-block btn btn-sm btn-secondary shadow-sm"> Back </a></div>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-7">
    <div class="card">
      <div class="card-body">
        <a href="{{ route('blog-details', $blog->id) }}">
          <h1 class="text-primary">{{ $blog->blog_name }}</h1>
          <img class="img-fluid rounded mx-auto d-block img-thumbnail w-100" style="height:200px;" src="{{ asset('storage/'.$blog->blog_image) }}">
        </a>
        <p class="py-2"><strong> Details </strong> - {{ $blog->blog_description }} </p>
        <div class="d-flex">
          <div class="mr-auto">
            <span class="text-dark"> Created - </span>
            <span class="text-muted">{{  $blog->created_at->format('M d, Y') }}</span>
          </div>
          <div class="">
            <span class="text-dark"> By - </span>
            <span class="text-muted">{{ $blog->user->name }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if(count($blogs))
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h5 class="text-center py-2 text-muted"> Other Blogs </h5><hr>
        @foreach($blogs as $blog)
        <a href="{{ route('blog-details', $blog->id) }}">
          <h6 class="text-primary">{{ $blog->blog_name }}</h6>
          <img class="img-fluid rounded mx-auto d-block img-thumbnail w-100" style="height:100px;" src="{{ asset('storage/'.$blog->blog_image) }}">
        </a>
        <p class="py-2">{{ substr($blog->blog_description, 0, 30) }}
          <a href="{{ route('blog-details', $blog->id) }}" class="btn btn-primary btn-sm float-right">View</a>
        </p>
        <hr>
        @endforeach
        {{ $blogs->links() }}
      </div>
    </div>
  </div>
  @endif
</div>
@endsection
