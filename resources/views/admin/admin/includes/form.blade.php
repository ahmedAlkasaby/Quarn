<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">@lang('site.admin_info')</h5>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">@lang('site.name')</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Route::is('admins.create') ?  old('name') : $admin->name}}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">@lang('site.email')</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Route::is('admins.create') ?  old('email') : $admin->email}}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">@lang('site.password')</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" {{ Route::is('admins.create') ? "required" : '' }} >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">@lang('site.password_confirmation')</label>
                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" {{ Route::is('admins.create') ? "required" : '' }}>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="select2Basic" class="form-label">@lang('site.role')</label>
                    <select id="select2Basic" class="select2 form-select form-select-lg @error('role_id') is-invalid @enderror"
                            data-allow-clear="true" name="role_id" required>
                        <option value="">@lang('site.select')</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ isset($admin) && $admin->hasRole($role->name) ? 'selected' : '' }}>
                                {{ $role->display_name }}
                            </option>
                        @endforeach
                    </select>

                    @error('role_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="select2Basic" class="form-label">@lang('site.language')</label>
                    <select id="select2Basic" class="select2 form-select form-select-lg @error('lang') is-invalid @enderror"
                            data-allow-clear="true" name="lang" required>
                        <option value="">@lang('site.select')</option>
                        <option value="ar" {{ isset($admin) && $admin->lang == 'ar' ? 'selected' : '' }}>@lang('site.arabic')</option>
                        <option value="en" {{ isset($admin) && $admin->lang == 'en' ? 'selected' : '' }}>@lang('site.english')</option>
                    </select>

                    @error('role_id')
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
