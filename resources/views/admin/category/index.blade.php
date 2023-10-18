<a href="{{route("admin.category.create")}}">新規作成</a>
@if (session("message"))
    <div>
        {{session("message")}}
    </div>
@endif
<ul>
    @foreach ($categories as $category)
        <li>{{$category->name}}</li>
        <a href="{{route("admin.category.edit",$category)}}">編集</a>
        <form method="POST">
            @csrf
            @method("DELETE")
            <button formaction="{{route("admin.category.destroy",$category)}}">削除</button>
        </form>
    @endforeach
</ul>