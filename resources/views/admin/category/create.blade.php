<a href="{{route("admin.category.index")}}">カテゴリ作成</a>
<form method="POST">
    @csrf
    <button formaction="{{route("admin.login.destroy")}}">ログアウト</button>
</form>

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
    <label>ネーム</label>
    <input type="text" name="name" value="{{old("name")}}"/>
    <label>スラッグ</label>
    <input type="text" name="slug" value="{{old("slug")}}"/>
    <label>キーワード</label>
    <input type="text" name="keywords" value="{{old("keywords")}}">
    <label>概要</label>
    <textarea name="description" cols="30" rows="10">{{old("description")}}</textarea>
    <button formaction="{{route("admin.category.store")}}">作成</button>
</form>