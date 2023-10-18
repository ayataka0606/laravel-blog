@if (session("message"))
    <div>
        {{session("message")}}
    </div>
@endif
<ul>
    @foreach ($comments as $comment)
        <li>{{$comment->content}}</li>
        @if ($comment->published == 0)
            <p>未承認</p>
        @else
            <p>承認</p>
        @endif
        <form method="POST">
            @csrf
            @method("PUT")
            <button formaction="{{route("admin.comment.update",$comment)}}">承認</button>
        </form>
        <form method="POST">
            @csrf
            @method("DELETE")
            <button formaction="{{route("admin.comment.destroy",$comment)}}">削除</button>
        </form>
    @endforeach
</ul>
