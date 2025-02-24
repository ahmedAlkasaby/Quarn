@extends('admin.master')
@section('title')
@lang('site.update_student')
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4 text-muted fw-light">@lang('site.edit_student')</h4>

    <form action="{{ route('students.update',['student'=>$student->id]) }}" method="post">
        @csrf
        @method('put')
       @include('admin.student.includes.form')
    </form>
</div>
@endsection

