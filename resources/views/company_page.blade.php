@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ $company->name }}</h1>

    <div id="accordionExample">

        @foreach ($cols as $id => $field_type)
            @continue($loop->first)

            @component('company.field', [
                'id' => $id,
                'field_type' => $field_type,
                'company' => $company,
                'comments' => $comments
            ])
            @endcomponent
        @endforeach

    </div>
</div>
@endsection
