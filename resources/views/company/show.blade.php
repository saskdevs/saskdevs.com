@extends('layouts.app', ['pageTitle' => $company->name])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <h2 class="mb-4">{{ $company->name }}</h2>
                <div class="mb-4">
                    {!! nl2br(e($company->description)) !!}
                </div>

                <h2 class="mb-4">Jobs</h2>
                @include('vacancy._listing', ['vacancies' => $company->vacancies()->latest()->get()])
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
