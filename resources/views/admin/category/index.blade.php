<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>カテゴリ一覧</x-section-title>
    <!--インフォメーション-->
    <x-message/>
    <!--新規作成ボタン-->
    <div class="text-center">
        <a href="{{route("admin.category.create")}}" class="btn btn-primary">新規作成</a>
    </div>
    <ul>
        @foreach ($categories as $category)
            <li>{{$category->name}}</li>
            <a href="{{route("admin.category.edit",$category)}}">編集</a>
            <form method="POST">
                @csrf
                @method("DELETE")
                <button formaction="{{route("admin.category.destroy",$category)}}">削除</button>
            </form>
        @endforeach
    </ul>
</x-admin-layout>