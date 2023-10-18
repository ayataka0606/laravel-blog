<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>カテゴリ新規作成</x-section-title>
    <!--エラーメッセージ-->
    <x-message/>
    <!--カテゴリ作成フォーム-->
    <form method="POST" class="flex flex-col gap-2 px-2">
        @csrf
        <label>ネーム</label>
        <input type="text" name="name" value="{{old("name")}}"/>
        <label>スラッグ</label>
        <input type="text" name="slug" value="{{old("slug")}}"/>
        <label>キーワード</label>
        <input type="text" name="keywords" value="{{old("keywords")}}">
        <label>概要</label>
        <textarea name="description" cols="30" rows="10">{{old("description")}}</textarea>
        <div class="text-center">
            <button formaction="{{route("admin.category.store")}}" class="btn btn-primary">作成</button>
        </div>
    </form>
</x-admin-layout>