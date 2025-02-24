@extends('admin.master')
@section('title')
    @lang('site.create_admin')
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4 text-muted fw-light">@lang('site.create_admin')</h4>

    <form action="{{ route('admins.store') }}" method="post">
        @csrf
       @include('admin.admin.includes.form')
    </form>
</div>
@endsection


