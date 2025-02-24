<div class="card">
    <div class="card-datatable table-responsive">
        <div class="card-header d-flex flex-wrap py-0 flex-column flex-sm-row justify-content-between mt-4 mb-4">
            <div class="me-5 ms-n2 pe-5">
                <div class="dataTables_filter">
                    <form action="{{ route('students.index')}}" method="get" class="d-flex align-admins-center">
                        <input type="search" name="search" class="form-control me-2" placeholder="@lang('site.filter')"
                            aria-controls="DataTables_Table_0" value="{{ request('search') }}" style="flex: 1;">

                        <button class="btn btn-primary" style="flex-shrink: 0;" type="submit">
                            <span>
                                <i class="ti ti-filter me-0 me-sm-1"></i>
                                <span class="d-none d-sm-inline-block">@lang('site.filter')</span>
                            </span>
                        </button>
                    </form>

                </div>
            </div>
            <div class="d-flex align-items-center">


                @if (auth()->user()->hasPermission('students-create'))
                <a href="{{ route('students.create') }}">
                    <button class="btn btn-primary add-new waves-effect waves-light">

                    <span class="d-none d-sm-inline-block"><i class="ti ti-plus"></i> @lang('site.new')</span>
                    </button>
                </a>

                @else
                <button disabled class="btn btn-secondary add-new btn-primary ms-2 waves-effect waves-light">
                    <span>
                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                        <span class="d-none d-sm-inline-block">@lang('site.new')</span>
                    </span>
                </button>
                @endif

            </div>
        </div>

        <table class="datatable table table-striped border-top w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('site.student')</th>
                    <th>@lang('site.circles')</th>

                    <th class="text-lg-center">@lang('site.action')</th>
                </tr>
            </thead>
            <tbody>
                @if($students->isNotEmpty())
                @foreach ($students as $student)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->circle->nameLang() }}</td>


                    <td class="text-lg-center">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    @if (auth()->user()->hasPermission('students-update'))
                                    <a class="dropdown-item edit-btn" href="{{ route('students.edit', $student->id) }}">

                                        <i class="ti ti-pencil me-1"></i> @lang('site.edit')
                                    </a>

                                    @else
                                    <button disabled class="dropdown-item">
                                        <i class="ti ti-pencil me-1"></i> @lang('site.edit')
                                    </button>
                                    @endif
                                </li>
                                <li>
                                    @if (auth()->user()->hasPermission('students-delete'))
                                    <button class="dropdown-item delete-btn" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $student->id }}">
                                        <i class="ti ti-trash me-1"></i> @lang('site.delete')
                                    </button>
                                    @else
                                    <button class="dropdown-item" disabled>
                                        <i class="ti ti-trash me-1"></i> @lang('site.delete')
                                    </button>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @include('admin.includes.model.delete',["id"=>$student->id,"main_name"=>"students","name"=>"student"])
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center">@lang('site.there_is_no_data')</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="m-3">
            {{ $students->links() }}
        </div>
    </div>
</div>
