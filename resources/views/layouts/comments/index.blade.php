@if (count($comments) > 0)
    <h5>Комментарии к статье</h5>
    @foreach ($comments->all() as $comment)
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{$comment->body}}</p>
            <div class="card-footer text-muted">
                Размещено: {{$comment->created_at}} пользователем {{$comment->user->name}}
                @if (Auth::check())

                        <a href="{{ url('/comment/changeModerationState') }}/{{$comment->id}}" class="small">
                            @if ($comment->moderated_at)
                                Снять с публикации
                            @else
                                Опубликовать
                            @endif
                        </a>
                    <a href="{{ url('/comment/delete') }}/{{$comment->id}}" class="small">Удалить</a>

                @endif

            </div>
        </div>
    </div>
    @endforeach
@endif
<script>
    import Button from "@/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
