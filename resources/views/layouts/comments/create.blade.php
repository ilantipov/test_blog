<form action="{{ url('comment/create') }}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
    {!! csrf_field() !!}
    <input type="hidden" name="article_id" value="{{$article->id}}">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Введите текст комментария</label>
        <textarea class="form-control" id="body" name="body" rows="3"></textarea>

    </div>
    <button type="submit" class="btn btn-small btn-primary">Отправить на модерацию</button >
</form>

