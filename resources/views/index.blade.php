@extends('layouts.app')

@section('content')
<div class="container">

    <div id="cardsContainer" class="row">
        @foreach ($cards as $card)
        <div class="col-lg-3 g-3">
            @component('company.card', ['card' => $card])
            @endcomponent
        </div>
        @endforeach
    </div>

    @auth
    <div class="row">

        <div class="col-md-3 g-4">
            <p>
                <a class="btn btn-primary btn-lg" data-bs-toggle="collapse" href="#addCompanyBlock" role="button" aria-expanded="{{ $errors->any() ? 'true' : 'false' }}" aria-controls="addCompanyBlock">
                    Добавить компанию
                </a>
            </p>
        </div>

        <div class="collapse {{$errors->any() ? 'show' : ''}}" id="addCompanyBlock">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card card-body col-lg-8">
                <form method="POST" action="/company/add" onsubmit="handleAddCompanyForm(event, this)">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" name="name" placeholder="Название">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="description" placeholder="Общая информация">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="inn" placeholder="ИНН">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="director" placeholder="Генеральный директор">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="address" placeholder="Адрес">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="phone_number" placeholder="Телефон">
                    </div>
                    <button onclick="" type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>

    </div>
    @endauth

</div>
@endsection