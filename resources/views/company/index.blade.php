@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">All Companies</h2>
                <div class="list-group list-group-flush">
                    @foreach ($companies as $company)
                        <a href="{{ route('companies.show', $company) }}"
                           class="list-group-item-action list-group-item p-4 pl-0">
                            <div class="row">
                                <div class="col-sm-2 d-none d-sm-block">
                                    @if (!empty($company->photo))
                                        <img src="{{ Storage::url($company->photo) }}" alt="{{ $company->name }} logo" class="img-thumbnail">
                                    @endif
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="mb-1">{{ $company->name }}</h4>
                                    <p class="text-muted mb-1">Saskatoon</p>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam asperiores beatae consequuntur deleniti ea eligendi, ex excepturi fugit harum inventore modi obcaecati reiciendis saepe voluptatem. Doloremque ex explicabo odio?</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
