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
                @if ($company->location)
                <p class="text-muted mb-1">{{ $company->location->name }}</p>
                @endif
                <p class="mb-0">{{ substr($company->description, 0, 140) }}</p>
            </div>
        </div>
    </a>
@endforeach
</div>
