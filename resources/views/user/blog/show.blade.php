{{$post->slug}}

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session("message"))
    <div>
        {{session("message")}}
    </div>
@endif
<form method="POST">
    @csrf
    <label>名前</label>
    <input type="text" name="name" value="{{old("name")}}">
    <label>コメント内容</label>
    <textarea name="content" cols="30" rows="10">{{old("content")}}</textarea>
    <button formaction="">コメントする</button>
</form>
@foreach ($comments as $comment)
    {{$comment->conetnt}}
@endforeach