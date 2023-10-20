<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>投稿新規作成</x-section-title>
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
        <div class="flex w-full gap-5">
            <div class="w-1/2 flex flex-col">
                <label>内容</label>
                <textarea id="editor" name="content" cols="100" rows="30">
                    {{old("content")}}
                </textarea>
            </div>
            <article class="prose w-1/2">
                <div id="preview"></div>
            </article>
        </div>
        <label>カテゴリ</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == old("category_id"))>
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        <label>サムネイル</label>
        <select name="image_id">
            @foreach ($images as $image)
                <option value="{{$image->id}}" @selected($image->id == old("image_id"))>
                    {{$image->name}}
                </option>
            @endforeach
        </select>
        <label>ステータス</label>
        <select name="published">
            <option value="0" @selected("0" == old("published"))>下書き</option>
            <option value="1" @selected("1" == old("published"))>公開</option>
        </select>
        <div class="text-center">
            <button formaction="{{route("admin.post.store")}}" class="btn btn-primary">新規作成</button>
        </div>
    </form>
</x-admin-layout>
