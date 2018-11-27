@extends('layouts.app', ['pageTitle' => $vacancy->title])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <h2 class="mb-4">{{ $vacancy->title }}</h2>
                <div class="">
                    {!! nl2br(e($vacancy->description)) !!}
                </div>
            </div>
            <div class="col-sm-4 offset-sm-1">
                @include('company._card', ['company' => $vacancy->company])

                <a href="mailto:{{ $vacancy->email }}" class="btn btn-primary btn-block mb-4">Apply</a>

                @if(Auth::check() && Auth::user()->companies->contains($vacancy->company->id))
                <a href="{{ route('vacancies.edit', $vacancy) }}" class="btn btn-primary btn-block">Edit</a>
                @endif
            </div>
        </div>

    </div>
@endsection
