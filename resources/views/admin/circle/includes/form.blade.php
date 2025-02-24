<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">@lang('site.circle_info')</h5>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">@lang('site.name_ar')</label>
                    <input type="text" id="name" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"
                        value="{{Route::is('circles.create') ?  old('name_ar') : $circle->nameLang()}}" required>
                    @error('name_ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">@lang('site.name_en')</label>
                    <input type="text" id="name" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                        value="{{Route::is('circles.create') ?  old('name_en') : $circle->nameLang()}}" required>
                    @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="select2Basic" class="form-label">@lang('site.teacher')</label>
                    <select id="select2Basic" class="select2 form-select form-select-lg @error('teacher_id') is-invalid @enderror"
                            data-allow-clear="true" name="teacher_id" required>
                        <option value="" {{ !isset($circle) || is_null($circle->teacher_id) ? 'selected' : '' }}>@lang('site.select')</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ Route::is('circles.edit') && $circle->teacher_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('teacher_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">@lang('site.date')</label>
                    <input type="datetime-local" id="date" name="date" class="form-control"
                           value="{{ old('date', isset($circle) && $circle->date ? \Carbon\Carbon::parse($circle->date)->format('Y-m-d\TH:i') : '') }}"
                           required>

                    @error('date')
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
