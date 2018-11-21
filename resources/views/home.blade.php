@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">Recent Jobs</h2>
                <div class="list-group list-group-flush">
                    @foreach ($vacancies as $vacancy)
                        @include('vacancy._listing', ['$vacancy' => $vacancy])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
