@extends('layouts.app')

@section('title', '404')

@section('app-content')
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h3 class="mb-2 mx-2">Page Not Found</h3>
            <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
            <div class="mt-3 mb-3">
                <img src="{{ asset('assets/img/illustrations/page-misc-error-light.png') }}" alt="page-misc-error-light" width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png" />
            </div>
            <a href="javascript:void(0)" onclick="history.back();" class="btn btn-primary">Back To Previous Page</a>
        </div>
    </div>
@endsection

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-misc.css') }}">
@endpush
