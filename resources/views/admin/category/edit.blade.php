<a href="{{route("admin.category.index")}}">{{$category->name}}</a>
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
    <input type="text" name="name" value="{{old("name",$category->name)}}"/>
    <label>スラッグ</label>
    <input type="text" name="slug" value="{{old("slug",$category->slug)}}"/>
    <label>キーワード</label>
    <input type="text" name="keywords" value="{{old("keywords",$category->keywords)}}">
    <label>概要</label>
    <textarea name="description" cols="30" rows="10">{{old("description",$category->description)}}</textarea>
    <button formaction="{{route("admin.category.update",$category)}}">変更</button>
</form>