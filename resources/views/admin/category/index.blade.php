<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>カテゴリ一覧</x-section-title>
    <!--インフォメーション-->
    <x-message/>
    <!--新規作成ボタン-->
    <div class="text-center">
        <a href="{{route("admin.category.create")}}" class="btn btn-primary">新規作成</a>
    </div>
    <!--カテゴリリスト-->
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>カテゴリ名</th>
                    <th>作成日</th>
                    <th>更新日</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at->format("Y/m/d")}}</td>
                        <td>{{$category->updated_at->format("Y/m/d")}}</td>
                        <td><a href="{{route("admin.category.edit",$category)}}">編集</a></td>
                        <td>
                            <form method="POST">
                                @csrf
                                @method("DELETE")
                                <button formaction="{{route("admin.category.destroy",$category)}}">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>