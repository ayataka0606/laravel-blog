<a href="{{route("admin.tag.create")}}">新規作成</a>
@if (session("message"))
    <div>
        {{session("message")}}
    </div>
@endif
<ul>
    @foreach ($tags as $tag)
        <li>{{$tag->name}}</li>
        <a href="{{route("admin.tag.edit",$tag)}}">編集</a>
        <form method="POST">
            @csrf
            @method("DELETE")
            <button formaction="{{route("admin.tag.destroy",$tag)}}">削除</button>
        </form>
    @endforeach
</ul>