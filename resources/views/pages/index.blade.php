@extends('layouts.app')

@push('title')
    Landing Page
@endpush

@section('content')
    <div class="d-flex justify-content-center align-items-center height-vh-full">
        <div class="text-center">
            <h1>{{ config('app.name') }}</h1>
            <div class="row">
                <div class="col-8 mx-auto">
                    <p class="lead">
                        A simple rental management system to reduce background jobs and ease of manage tenant profile and tracking of payments, complains, maintenance and so on...
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
