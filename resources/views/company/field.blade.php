@php
//?
$comments = !$comments ? [] : $comments->filter(function($item, $key) use($field_type) {
return $item['company_type'] == $field_type;
})
@endphp

<div id="heading{{$id}}" class="accordion-header mb-5">

    <div class="acb collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$field_type}}" aria-expanded="false" aria-controls="collapse_{{$field_type}}">
        <div style="width:100%" class="d-flex flex-row justify-content-between align-items-center">
            <div class="me-auto">
                @if($field_type !== '')
                    {{$field_type}}: {{$company[$field_type]}}
                @endif
            </div>
            <div class="p-2 acb_arrow"></div>
            <div class="p-2">Комментариев: {{ count($comments) }}</div>
        </div>
    </div>

    <div id="collapse_{{$field_type}}" class="accordion-collapse collapse" aria-labelledby="heading{{$id}}" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            @auth
            @component('company.comment_form', [
                'id' => $id,
                'field_type' => $field_type,
                'company' => $company
                ])
            @endcomponent
            @endauth

        </div>
    </div>

    @auth
    @if(count($comments) > 0)
    <div id="commentsContainer_{{$field_type}}" class="border p-2 mt-2">
        <h5>Комментарии</h5>
        @foreach($comments as $comment)
        <div class="d-flex flex-colomn">
            <div class="comment p-2 mb-2">
                <p class="comment_user">
                    <a href="#">{{$comment->user->name}}</a>
                    :
                    <small>{{$comment->created_at}}</small>
                </p>

                <p class="border comment_text p-2">{{$comment->text}}</p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div id="commentsContainer_{{$field_type}}" class="border p-2 mt-2 d-none">

    </div>
    @endif

    @endauth
</div>