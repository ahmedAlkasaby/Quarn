@extends('admin.master')
@section('title')
@lang('site.update_teacher')
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4 text-muted fw-light">@lang('site.edit_teacher')</h4>

    <form action="{{ route('teachers.update',['teacher'=>$teacher->id]) }}" method="post">
        @csrf
        @method('put')
       @include('admin.teacher.includes.form')
    </form>
</div>
@endsection

