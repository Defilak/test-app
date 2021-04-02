<div class="p-2">
    <h5>Комментарий</h5>
    <form class="card-body comment_form" method="POST" action="/company/{{$company->id}}/add_comment" onsubmit="handleAddCommentForm(event, this)">
        @csrf
        <input class="form-control" name="company_type" hidden value={{$field_type}}>
        
        <div class="mb-2">
            <textarea class="form-control" name="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>