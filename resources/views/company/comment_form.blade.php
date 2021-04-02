<div class="col-lg-8">
    <form class="comment_form" method="POST" action="/company/{{$id}}/comment/new" onsubmit="handleAddCommentForm(event, this)">
        @csrf
        <input class="form-control" name="field_type" hidden value={{$field_type}}>
        
        <div class="mb-3">
            <textarea class="form-control" name="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>