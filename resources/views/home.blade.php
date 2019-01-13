@extends('layouts.app', ['pageTitle' => 'Home'])

@section('content')
    <div class="container hero">
        <div class="logo">
            <h1 class="open-sans">SASK</h1>
            <h1 class="open-sans-condensed">DEVS</h1>
            <p>Discover Tech companies and Job opportunities in Saskatchewan</p>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5">
                <h2 class="mb-4 light-header">Recent Jobs</h2>

                @include('vacancy._listing', ['vacancies' => $vacancies])
            </div>
            <div class="col-md-5 offset-md-2">
                <h2 class="mb-4 light-header">New Company Profiles</h2>

                @include('company._listing', ['companies' => $companies])
            </div>
        </div>
    </div>
@endsection
