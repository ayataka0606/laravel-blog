<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>カテゴリ編集</x-section-title>
    <!--エラーメッセージ-->
    <x-message/>
    <!--カテゴリ編集フォーム-->
    <form method="POST" class="flex flex-col gap-2 px-2">
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
        <div class="text-center">
            <button formaction="{{route("admin.category.update",$category)}}" class="btn btn-primary">変更</button>
        </div>
    </form>
</x-admin-layout>