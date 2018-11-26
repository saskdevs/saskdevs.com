<div class="card border-0 shadow-sm mb-4">
    @if (!empty($company->photo))
    <div class="p-4">
        <img src="{{ Storage::url($company->photo) }}" alt="{{ $company->name }} logo" class="d-block m-auto" style="max-width: 100%;">
    </div>
    @endif
    <div class="card-body">
        <a href="{{ route('companies.show', $company) }}" class="text-primary"><h5>{{ $company->name }}</h5></a>
        <p><a href="{{ route('companies.show', $company) }}">Vacancies: {{ $company->vacancies->count() }}</a></p>
        @if(!empty($company->website))
            <p><a href="{{ $company->website }}" target="_blank">Visit Employer Website</a></p>
        @endif
    </div>
</div>