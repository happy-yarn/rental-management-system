@extends('layouts.app')

@push('title')
    Login
@endpush

@section('content')
    <div class="text-left">
        <h1>{{ config('app.name') }}</h1>
        <p class="lead">
            Please enter your crendentials to continue.
        </p>
        <div class="card">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            aria-describedby="emailHelp" name="email" placeholder="Enter email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Enter password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('login') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
