<a href="{{ route('vacancies.show', [$vacancy]) }}"
   class="list-group-item-action list-group-item p-4 pl-0">
    <div class="row">
        <div class="col-sm-2 d-none d-sm-block">
            <img src="https://placehold.it/250x250" alt="" class="img-thumbnail">
        </div>
        <div class="col-sm-10">
            <h4 class="mb-1">{{ $vacancy->title }}</h4>
            <p class="text-muted mb-1">{{ $vacancy->company->name }} - <span
                        title="{{ $vacancy->created_at }}">{{ $vacancy->created_at->diffForHumans() }}</span>
            </p>
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad,
                aliquam
                aspernatur consequatur doloremque et explicabo id illum, ipsam itaque
                laudantium </p>
        </div>
    </div>
</a>