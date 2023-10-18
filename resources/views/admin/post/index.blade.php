<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>投稿一覧</x-section-title>
    <!--インフォメーション-->
    <x-message/>
    <!--新規作成ボタン-->
    <div class="text-center">
        <a href="{{route("admin.post.create")}}" class="btn btn-primary">新規作成</a>
    </div>
    <!--投稿リスト-->
    <x-posts-table :$posts/>
</x-admin-layout>