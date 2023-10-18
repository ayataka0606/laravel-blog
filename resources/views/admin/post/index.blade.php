<h1>投稿一覧</h1>
@if (session("message"))
    <div>
        {{session("message")}}
    </div>
@endif
<form method="POST">
    @csrf
    <button formaction="{{route("admin.login.destroy")}}">ログアウト</button>
</form>
<a href="{{route("admin.post.create")}}">新規作成</a>
<ul>
    @foreach ($posts as $post)
        <li>{{$post->title}}</li>
        @if($post->published === 0)
            <p>下書き</p>
        @else
            <p>公開済</p>
        @endif
        <a href="{{route("admin.post.edit",$post)}}">編集</a>
        <form method="POST">
            @csrf
            @method("DELETE")
            <button formaction="{{route("admin.post.destroy",$post)}}">削除</button>
        </form>
    @endforeach
</ul>