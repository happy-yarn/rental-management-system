@extends('layouts.app')

@push('title')
    Edit User
@endpush

@section('content')
<div class="py-5 row">
    <div class="col-6 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Edit User</h1>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <form id="update-user" method="POST" action="{{ route('users.show', ['user' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" value="{{ $user->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Type</label>
                        <select class="form-select" name="type" value={{ $user->type }}>
                            @foreach ($typeOptions as $option)
                                <option value="{{ $option['value'] }}" @if($option['value'] === null) selected @endif>{{ $option['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ $user->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="Enter new password">
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" placeholder="Enter current password">
                        @error('current_password')
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
