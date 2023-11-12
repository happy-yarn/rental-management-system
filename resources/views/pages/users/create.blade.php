@extends('layouts.app')

@push('title')
    Create New User
@endpush

@section('content')
<div class="py-5 row">
    <div class="col-6 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Create New User</h1>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card mt-5">
            <div class="card-body p-4">
                <form id="create-new-account" method="POST" action="{{ route('users.create') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Type</label>
                        <select class="form-select" name="type">
                            @foreach ($typeOptions as $option)
                                <option value="{{ $option['value'] }}" @if($option['value'] === null) selected @endif>{{ $option['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
