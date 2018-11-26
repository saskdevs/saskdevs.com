@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <h2 class="mb-4">{{ $company->name }}</h2>
                <div class="list-group list-group-flush">
                    @foreach ($company->vacancies as $vacancy)
                        @include('vacancy._listing', ['$vacancy' => $vacancy])
                    @endforeach
                </div>
            </div>
            <div class="col-sm-4 offset-sm-1">
                @include('company._card', ['company' => $company])
                @if (Auth::check() && Auth::user()->isOnCompany($company))
                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary btn-block">Edit</a>
                @endif
            </div>
        </div>
    </div>
@endsection
