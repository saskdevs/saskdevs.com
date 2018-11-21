@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <h2 class="mb-4">{{ $vacancy->title }}@if(Auth::check() && Auth::user()->companies->contains($vacancy->company->id)) - <a
                            href="{{ route('vacancies.edit', $vacancy) }}">Edit</a>@endif</h2>
                <div class="">
                    {!! nl2br($vacancy->description) !!}
                </div>
            </div>
            <div class="col-sm-4 offset-sm-1">
                <div class="card border-0 shadow-sm mb-4">
                    <img src="https://placehold.it/500x150" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5>{{ $vacancy->company->name }}</h5>
                        <p><a href="{{ route('companies.show', $vacancy->company) }}">Vacancies: {{ $vacancy->user->vacancies->count() }}</a></p>
                        @if(!empty($vacancy->company->website))
                            <p><a href="#" target="_blank">Visit Employer Website</a></p>
                        @endif
                    </div>
                </div>
                <button class="btn btn-primary btn-block">Apply</button>
            </div>
        </div>

    </div>
@endsection
