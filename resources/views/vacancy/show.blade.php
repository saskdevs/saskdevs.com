@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card border-light shadow-sm">
                    <div class="card-header bg-primary text-white">{{ $vacancy->title }}</div>
                    <div class="card-body">
                        {!! nl2br($vacancy->description) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card border-light shadow-sm">
                    <img src="https://placehold.it/500x150" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5>{{ $vacancy->user->name }}</h5>
                        <p>No. Vacancies: {{ $vacancy->user->vacancies->count() }} — <a href="#">View All</a></p>
                        <p><a href="#" target="_blank">Visit Employer Website</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
