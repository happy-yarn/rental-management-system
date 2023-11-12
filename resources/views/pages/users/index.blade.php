@extends('layouts.app')

@push('title')
    Users
@endpush

@section('content')
<div class="py-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
    </div>
    <div class="row py-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table last-item-no-border">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created</th>
                            <th scope="col">Updated</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="vertical-align-middle">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex gap">
                                            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-secondary">Edit</a>
                                            <form method="POST" action="{{ route('users.show', ['user' => $user->id]) }}">
                                                @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $users->links() }}
</div>
@endsection
