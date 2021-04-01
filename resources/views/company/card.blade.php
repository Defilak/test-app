<div class="card w-500">
    <div class="card-body">
        <h5 class="card-title">{{ $card->name }}</h5>
        <p class="card-text">{{ $card->description }}</p>
        
        @isset($card->full)
            <p>{{ $card->address }}</p>
            <p>{{ $card->director }}</p>
            <p>{{ $card->phone_number }}</p>
        @endisset

        <a href="/company/{{$card->id}}" class="btn btn-primary">Подробнее</a>
    </div>
</div>
