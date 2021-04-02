<div class="company_card card w-500">
    <div class="card-body">
        <h5 class="card-title">{{ $card->name }}</h5>
        <p class="card-text">{{ $card->description }}</p>
        <a href="/company/{{$card->id}}" class="btn btn-primary">Подробнее</a>
    </div>
</div>