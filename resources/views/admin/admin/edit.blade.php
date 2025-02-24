@extends('admin.master')
@section('title')
@lang('site.update_admin')
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4 text-muted fw-light">@lang('site.edit_admin')</h4>

    <form action="{{ route('admins.update',['admin'=>$admin->id]) }}" method="post">
        @csrf
        @method('put')
       @include('admin.admin.includes.form')
    </form>
</div>
@endsection

