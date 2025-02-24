<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">@lang('site.teacher_info')</h5>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">@lang('site.name')</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Route::is('teachers.create') ?  old('name') : $teacher->name}}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">@lang('site.email')</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Route::is('teachers.create') ?  old('email') : $teacher->email}}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">@lang('site.password')</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" {{ Route::is('teachers.create') ? "required" : '' }} >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">@lang('site.password_confirmation')</label>
                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" {{ Route::is('teachers.create') ? "required" : '' }}>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">@lang('site.save')</button>
                </div>

            </div>
        </div>
    </div>
</div>
