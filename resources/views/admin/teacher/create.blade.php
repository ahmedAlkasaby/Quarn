@extends('admin.master')
@section('title')
    @lang('site.create_teacher')
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4 text-muted fw-light">@lang('site.create_teacher')</h4>

    <form action="{{ route('teachers.store') }}" method="post">
        @csrf
       @include('admin.teacher.includes.form')
    </form>
</div>
@endsection


