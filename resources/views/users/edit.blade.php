@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Transaction') }}</div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-2 justify-content-end">
                            <label for="username" class="col-md-5 col-form-label text-md-start">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username usernamedit" type="text" class="form-control" name="username" value="{{ $user->username }}">
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="name" class="col-md-5 col-form-label text-md-start">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="role" class="col-md-5 col-form-label text-md-start">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role', $user->role) }}" required autocomplete="role" autofocus>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="password" class="col-md-5 col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <small class="form-text text-danger">Kosongkan jika tidak ingin mengganti password</small>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-end">
                            <label for="admin" class="col-md-5 col-form-label text-md-start">{{ __('Admin') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" name="admin" value="0">
                                <input id="admin" type="checkbox" class="@error('admin') is-invalid @enderror" name="admin" value="true" {{ old('admin', $user->admin) ? 'checked' : '' }}>

                                @error('admin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-end">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-secondary float-end">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection