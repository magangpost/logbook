@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="container-fluid h-custom">
                    <div class="row d-flex justify-content-center align-items-center h-100 ms-5">
                        <div class="col-md-9 col-lg-6 col-xl-3">
                            <img src="{{asset('assets/img/profilposind.png')}}"
                            class="img-fluid" alt="Sample image">
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-7 offset-xl-1">


                            <div class="card-body me-5">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-2 justify-content-end">
                                        <label for="username" class="col-md-5 col-form-label text-md-start">{{ __('Username') }}</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-2 justify-content-end">
                                        <label for="name" class="col-md-5 col-form-label text-md-start">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                            <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>

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

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-2 justify-content-end">
                                        <label for="password-confirm" class="col-md-5 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0 justify-content-end">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary float-end">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
