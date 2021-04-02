@php
//?
$comments = $comments->filter(function($item, $key) use($field_type) {
return $item['company_type'] == $field_type;
})
@endphp

<div id="heading{{$id}}" class="accordion-header">

    <div class="acb collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$id}}" aria-expanded="false" aria-controls="collapse{{$id}}">
        <div style="width:100%" class="d-flex flex-row justify-content-between align-items-center">
            <div class="me-auto">{{$field_type}}: {{$company[$field_type]}}</div>
            <div class="p-2 acb_arrow"></div>
            <div class="p-2">Комментариев: {{ count($comments) }}</div>
        </div>
    </div>

    <div id="collapse{{$id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$id}}" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            @component('company.comment_form', [
            'id' => $id,
            'field_type' => $field_type,
            'company' => $company
            ])
            @endcomponent

        </div>
    </div>

    @foreach($comments as $comment)
    <div class="d-flex flex-colomn p-2">
        <div class="comment p-3">
            <p class="comment_user">
                <a href="#">{{$comment->user->name}}</a>
                :
                <small>{{$comment->created_by}}</small>
            </p>

            <p class="comment_text">{{$comment->text}}</p>
        </div>
    </div>
    @endforeach
</div>