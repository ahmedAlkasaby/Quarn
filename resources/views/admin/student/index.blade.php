@extends('admin.master')


@section('title')
@lang('site.tecehrs_list')

@endsection

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="container-fluid flex-grow-1 container-p-y">
            @include('admin.includes.success')
            @include('admin.includes.displayErrors')
            @include('admin.student.includes.table')
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href={{ url("admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css")}} />
@endsection

@section('js')
<script src={{ url("admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js")}}></script>

@include('admin.includes.flashMessage')

@endsection
