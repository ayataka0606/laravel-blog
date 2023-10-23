<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>投稿編集</x-section-title>
    <!--エラーメッセージ-->
    <x-message/>
    <!--投稿編集フォーム-->
    <form method="POST" class="flex flex-col gap-2 px-2">
        @csrf
        @method("PUT")
        <label>タイトル</label>
        <input type="text" name="title" value="{{old("title",$post->title)}}"/>
        <label>スラッグ</label>
        <input type="text" name="slug" value="{{old("slug",$post->slug)}}"/>
        <label>キーワード</label>
        <input type="text" name="keywords" value="{{old("keywords",$post->keywords)}}"/>
        <label>概要</label>
        <textarea name="description" cols="30" rows="10">{{old("description",$post->description)}}</textarea>
        <div class="flex w-full gap-5">
            <div class="w-1/2 flex flex-col">
                <label>内容</label>
                <textarea id="editor" name="content" cols="100" rows="30">{{old("content",$post->content)}}</textarea>
            </div>
            <article class="prose w-1/2">
                <div id="preview"></div>
            </article>
        </div>
        <label>カテゴリ</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @selected($category->id == old("category_id",$post->category_id))>
                    {{$category->name}}
                </option>
            @endforeach
        </select>
        <label>サムネイル</label>
        <select name="image_id">
            @foreach ($images as $image)
                <option value="{{$image->id}}" @selected($image->id == old("image_id",$post->image_id))>
                    {{$image->name}}
                </option>
            @endforeach
        </select>
        <label>ステータス</label>
        <select name="published">
            <option value="0" @selected("0" == old("published",$post->published))>下書き</option>
            <option value="1" @selected("1" == old("published",$post->published))>公開</option>
        </select>
        <div class="text-center">
            <button formaction="{{route("admin.post.update",$post)}}" class="btn btn-primary">変更</button>
        </div>
    </form>
</x-admin-layout>