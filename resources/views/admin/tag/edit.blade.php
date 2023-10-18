<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>タグ編集</x-section-title>
    <!--エラーメッセージ-->
    <x-message/>
    <!--タグ編集フォームリスト-->
    <form method="POST" class="flex flex-col gap-2 px-2">
        @csrf
        @method("PUT")
        <label>ネーム</label>
        <input type="text" name="name" value="{{old("name",$tag->name)}}"/>
        <label>スラッグ</label>
        <input type="text" name="slug" value="{{old("slug",$tag->slug)}}"/>
        <label>キーワード</label>
        <input type="text" name="keywords" value="{{old("keywords",$tag->keywords)}}">
        <label>概要</label>
        <textarea name="description" cols="30" rows="10">
            {{old("description",$tag->description)}}
        </textarea>
        <div class="text-center">
            <button formaction="{{route("admin.tag.update",$tag)}}" class="btn btn-primary">変更</button>
        </div>
    </form>
</x-admin-layout>