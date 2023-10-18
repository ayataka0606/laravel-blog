<a href="{{route("admin.tag.index")}}">{{$tag->name}}</a>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST">
    @csrf
    @method("PUT")
    <label>ネーム</label>
    <input type="text" name="name" value="{{old("name",$tag->name)}}"/>
    <label>スラッグ</label>
    <input type="text" name="slug" value="{{old("slug",$tag->slug)}}"/>
    <label>キーワード</label>
    <input type="text" name="keywords" value="{{old("keywords",$tag->keywords)}}">
    <label>概要</label>
    <textarea name="description" cols="30" rows="10">{{old("description",$tag->description)}}</textarea>
    <button formaction="{{route("admin.tag.update",$tag)}}">変更</button>
</form>