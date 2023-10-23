@extends('layouts.app')

@push('title')
    Login
@endpush

@section('content')
    <div class="d-flex justify-content-center align-items-center height-vh-full">
        <div class="text-left">
            <h1>{{ config('app.name') }}</h1>
            <p class="lead">
                Please enter your crendentials to continue.
            </p>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
