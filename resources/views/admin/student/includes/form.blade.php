<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">@lang('site.student_info')</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">@lang('site.name')</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Route::is('students.create') ?  old('name') : $student->name}}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="select2Basic" class="form-label">@lang('site.circle')</label>
                    <select id="select2Basic" class="select2 form-select form-select-lg @error('circle_id') is-invalid @enderror"
                            data-allow-clear="true" name="circle_id" required>
                        <option value="" {{ !isset($student) || is_null($student->circle_id) ? 'selected' : '' }}>@lang('site.select')</option>
                        @foreach ($circles as $circle)
                            <option value="{{ $circle->id }}" {{ Route::is('students.edit') && $student->circle_id == $circle->id ? 'selected' : '' }}>
                                {{ $circle->nameLang() }}
                            </option>
                        @endforeach
                    </select>

                    @error('circle_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>





                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">@lang('site.save')</button>
                </div>

            </div>
        </div>
    </div>
</div>
