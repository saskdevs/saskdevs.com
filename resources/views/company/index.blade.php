@extends('layouts.app', ['pageTitle' => 'Tech Companies in Sask'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2 class="mb-4">All Companies</h2>
                @include('company._listing', ['companies' => $companies])
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Don't see your company here?</h5>
                        <p class="card-text">Email us at <a href="mailto:community@saskdevs.com">community@saskdevs.com</a> to arrange creating a company profile.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
