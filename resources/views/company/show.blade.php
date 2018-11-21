@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">{{ $company->name }}</h2>
                <div class="list-group list-group-flush">
                    @foreach ($company->vacancies as $vacancy)
                        @include('vacancy._listing', ['$vacancy' => $vacancy])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
