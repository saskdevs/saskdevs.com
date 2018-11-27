@extends('layouts.app', ['pageTitle' => 'Home'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">Recent Jobs</h2>

                @include('vacancy._listing', ['$vacancies' => $vacancies])
            </div>
        </div>
    </div>
@endsection
