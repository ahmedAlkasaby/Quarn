@extends('admin.master')
@section('title')
@lang('site.roles_list')
@endsection
@section('css')
<link rel="stylesheet" href={{ url("admin/assets/vendor/libs/typeahead-js/typeahead.css")}} />
<link rel="stylesheet" href={{ url("admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css")}} />
<link rel="stylesheet" href={{ url("admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css")}} />
<link rel="stylesheet" href={{ url("admin/assets/vendor/libs/@form-validation/form-validation.css")}} />
@endsection
@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="container-fluid flex-grow-1 container-p-y">

            @include('admin.includes.success')
            @include('admin.includes.displayErrors')
            <div class="row g-4">
                @if ($roles->count()>0)
                @foreach ($roles as $role)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-normal mb-2">{{ $role->admins->count() }} @lang('site.count_users')
                                </h6>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-1">
                                <div class="role-heading">
                                    <h4 class="mb-1">{{ $role->display_name }}</h4>
                                    @if (auth('admin')->user())

                                    @if (auth('admin')->user()->hasPermission('roles-update'))
                                    <a href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#editRoleModal-{{ $role->id }}" class="role-edit-modal">
                                        <span>@lang('site.edit_role')</span>
                                    </a>
                                    @endif
                                    @if (auth('admin')->user()->hasPermission('roles-delete'))
                                    <a href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $role->id }}"
                                        class="role-edit-modal text-danger mt-1 d-block">
                                        <span>@lang('site.delete_role')</span>
                                    </a>
                                    @else
                                    <a href="javascript:;" class="role-edit-modal text-muted mt-1 d-block" disabled>
                                        <span>@lang('site.delete_role')</span>
                                    </a>
                                    @endif
                                    @endif

                                </div>
                            </div>
                            @include('admin.includes.model.delete',["id"=>$role->id,"main_name"=>"roles","name"=>"role"])
                        </div>
                    </div>
                </div>
                @include('admin.role.edit')
                @endforeach

                @else
                <h1>@lang('site.not_found')</h1>
                @endif
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="row h-100">
                            <div class="col-sm-5">
                                <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                                    <img src={{ asset("admin/assets/img/illustrations/add-new-roles.png")}}
                                        class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body text-sm-end text-center ps-sm-0">
                                    @if (auth()->user()->hasPermission('roles-create'))
                                    <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                        class="btn btn-primary mb-2 text-nowrap add-new-role">
                                        @lang('site.add_role')
                                    </button>
                                    @else
                                    <button class="btn btn-primary mb-2 text-nowrap add-new-role disabled">
                                        @lang('site.add_role')
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.role.create')
        </div>
    </div>
</div>

@endsection
@section('js')
<!-- Vendors JS -->
<script src={{ url("admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js")}}></script>
<script src={{ url("admin/assets/vendor/libs/@form-validation/popular.js")}}></script>
<script src={{ url("admin/assets/vendor/libs/@form-validation/bootstrap5.js")}}></script>
<script src={{ url("admin/assets/vendor/libs/@form-validation/auto-focus.js")}}></script>
<!-- Page JS -->
<script src={{ url("admin/assets/js/app-access-roles.js")}}></script>
<script src={{ url("admin/assets/js/modal-add-role.js")}}></script>
@include('admin.includes.flashMessage')
@endsection