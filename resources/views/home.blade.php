@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($vacancies as $job)
                    <div class="list-group list-group-flush shadow-sm">
                        <a href="{{ route('vacancies.show', [$job]) }}"
                           class="list-group-item-action list-group-item p-4">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="https://placehold.it/250x250" alt="" class="img-thumbnail">
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="mb-1">{{ $job->title }}</h4>
                                    <p class="text-muted mb-1">{{ $job->user->name }} - <span
                                                title="{{ $job->created_at }}">{{ $job->created_at->diffForHumans() }}</span>
                                    </p>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, aliquam
                                        aspernatur consequatur doloremque et explicabo id illum, ipsam itaque
                                        laudantium </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
