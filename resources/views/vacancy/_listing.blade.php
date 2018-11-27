<div class="list-group list-group-flush">
    @foreach ($vacancies as $vacancy)
    <a href="{{ route('vacancies.show', [$vacancy]) }}"
       class="list-group-item-action list-group-item p-4 pl-0">
        <div class="row">
            <div class="col-sm-2 d-none d-sm-block">
                @if (!empty($vacancy->company->photo))
                <img src="{{ Storage::url($vacancy->company->photo) }}" alt="" class="img-thumbnail">
                @endif
            </div>
            <div class="col-sm-10">
                <h4 class="mb-1">{{ $vacancy->title }}</h4>
                <p class="text-muted mb-1">{{ $vacancy->company->name }} - <span
                            title="{{ $vacancy->created_at }}">{{ $vacancy->created_at->diffForHumans() }}</span>
                </p>
                <p class="mb-0">{{ substr($vacancy->description, 0, 140) }}</p>
            </div>
        </div>
    </a>
    @endforeach
    @if (count($vacancies) === 0)
    <div class="list-group-item p-4">
        <h4 class="font-weight-normal">No active job listings</h4>
    </div>
    @endif
</div>