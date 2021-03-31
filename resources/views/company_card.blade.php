<div class="card w-500">
    <div class="card-body">
        <h5 class="card-title">{{ $name }}</h5>
        <p class="card-text">{{ $description }}</p>
        @isset($full)
        <p>{{ $address }}</p>
        <p>{{ $director }}</p>
        <p>{{ $phone_number }}</p>
        @endisset
        <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
    </div>
</div>
