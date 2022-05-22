@extends('layouts.dashboard')
@section('title', 'User Profile')
@section('right-button')
<a href="{{ route('blog-list') }}" class="d-inline-block btn btn-sm btn-secondary shadow-sm"> Back </a></div>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="mb-1">
          <span class="text-dark">Name </span>
          <span class="text-muted float-right">{{ $userDetails->name }}</span>
        </div>
        <div class="mb-1">
          <span class="text-dark">EMail </span>
          <span class="text-muted float-right">{{ $userDetails->email }}</span>
        </div>
        <div class="mb-1">
          <span class="text-dark">Created By </span>
          <span class="text-muted float-right">{{ $userDetails->created_at->format('M d, Y') }}</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        @if($userDetails->user_profile == null || Request::get('change') == 'picture')
        <form action="{{ route('user-profile') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label> Blog Image</label>
            <input type="file" name="user_profile" value="{{ old('user_profile') }}" class="form-control @error('user_profile') is-invalid @enderror">
            @error('user_profile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        @else
        <img class="img-profile rounded-circle mx-auto d-block" width="100" src="{{ asset('storage/'.$userDetails->user_profile) }}">
        <a class="text-primary float-right" href="{{ route('user-profile').'?change=picture' }}">Change profile <i class="fas fa-edit fa-sm"></i></a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
