@extends('layouts.dashboard')
@section('title', 'Blog Lists')
@section('right-button')
<a href="{{ route('add-blog') }}" class="d-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Blog </a></div>
@endsection
@section('content')
@include('dashboard.list')
@endsection
