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
            <div class="card-body">
            Info
            </div>
        </div>
    </div>
</div>
@endsection
