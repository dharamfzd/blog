@extends('layouts.dashboard')
@section('title', $blog->id ? 'Edit blog' : 'New blog')
@section('right-button')
<a href="{{ route('blog-list') }}" class="d-inline-block btn btn-sm btn-secondary shadow-sm"> Back </a></div>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('add-blog') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $blog->id ?? ''}}">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" name="blog_name" value="{{ old('blog_name', $blog->blog_name) }}" class="form-control @error('blog_name') is-invalid @enderror" placeholder="Blog Name" >
            @error('blog_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Description:</label>
            <textarea name="blog_description" class="form-control @error('blog_description') is-invalid @enderror"> {{ old('blog_description', $blog->blog_description) }} </textarea>
            @error('blog_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="blog_image" value="{{ old('blog_image') }}" class="form-control @error('blog_image') is-invalid @enderror">
            @error('blog_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">{{ $blog->id ? 'Update' : 'Save' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
