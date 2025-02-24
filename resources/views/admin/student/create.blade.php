@extends('admin.master')
@section('title')
    @lang('site.create_Student')
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4 text-muted fw-light">@lang('site.create_circle')</h4>

    <form action="{{ route('students.store') }}" method="post">
        @csrf
       @include('admin.student.includes.form')
    </form>
</div>
@endsection

@section('css')
<link rel="stylesheet" href={{ url("admin/assets/vendor/libs/select2/select2.css")}} />
@endsection

@section('js')
<script src={{ url("admin/assets/vendor/libs/select2/select2.js")}}></script>

@endsection


