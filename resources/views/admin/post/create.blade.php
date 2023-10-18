<x-admin-layout>
    <!--エラーメッセージ-->
    <x-message/>
    <!--投稿作成フォーム-->
    <form method="POST" class="flex flex-col gap-2 px-2">
        @csrf
        <label>タイトル</label>
        <input type="text" name="title" value="{{old("title")}}"/>
        <label>スラッグ</label>
        <input type="text" name="slug" value="{{old("slug")}}"/>
        <label>キーワード</label>
        <input type="text" name="keywords" value="{{old("keywords")}}">
        <label>概要</label>
        <textarea name="description" cols="30" rows="10">{{old("description")}}</textarea>
        <label>内容</label>
        <textarea name="content" cols="30" rows="10">{{old("content")}}</textarea>
        <label>カテゴリ</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == old("category_id"))>
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        <label>タグ</label>
        <ul>
            @foreach ($tags as $tag)
                <li>
                    <input type="checkbox" name="tag_ids[]"
                        value="{{$tag->id}}"
                        @checked(is_array(old("tag_ids")) && in_array($tag->id,old("tag_ids")))>
                    {{$tag->name}}
                </li>
            @endforeach
        </ul>
        <select name="published">
            <option value="0" @selected("0" == old("published"))>下書き</option>
            <option value="1" @selected("1" == old("published"))>公開</option>
        </select>
        <div class="text-center">
            <button formaction="{{route("admin.post.store")}}" class="btn btn-primary">新規作成</button>
        </div>
    </form>
</x-admin-layout>