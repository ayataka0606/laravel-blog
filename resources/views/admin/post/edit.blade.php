<a href="{{route("admin.post.index")}}">投稿作成</a>
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
    @method("PUT")
    <label>タイトル</label>
    <input type="text" name="title" value="{{old("title",$post->title)}}"/>
    <label>スラッグ</label>
    <input type="text" name="slug" value="{{old("slug",$post->slug)}}"/>
    <label>キーワード</label>
    <input type="text" name="keywords" value="{{old("keywords",$post->keywords)}}">
    <label>概要</label>
    <textarea name="description" cols="30" rows="10">{{old("description",$post->description)}}</textarea>
    <label>内容</label>
    <textarea name="content" cols="30" rows="10">{{old("content",$post->content)}}</textarea>
    <label>カテゴリ</label>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}" @selected($category->id == old("category_id",$post->category_id))>
                {{$category->name}}
            </option>
        @endforeach
    </select>
    <label>タグ</label>
    <ul>
        @foreach ($tags as $tag)
            <li>
                <input type="checkbox" name="tag_ids[]" value="{{$tag->id}}" @checked(in_array($tag->id,old("tag_ids",$tagIds)))>
                {{$tag->name}}
            </li>
        @endforeach
    </ul>
    <select name="published">
        <option value="0" @selected("0" == old("published",$post->published))>下書き</option>
        <option value="1" @selected("1" == old("published",$post->published))>公開</option>
    </select>
    <button formaction="{{route("admin.post.update",$post)}}">作成</button>
</form>