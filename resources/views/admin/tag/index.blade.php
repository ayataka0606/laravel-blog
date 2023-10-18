<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>タグ一覧</x-section-title>
    <!--インフォメーション-->
    <x-message/>
    <!--新規作成ボタン-->
    <div class="text-center">
        <a href="{{route("admin.tag.create")}}" class="btn btn-primary">新規作成</a>
    </div>
    <!--タグリスト-->
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タグ名</th>
                    <th>作成日</th>
                    <th>更新日</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->created_at->format("Y/m/d")}}</td>
                        <td>{{$tag->updated_at->format("Y/m/d")}}</td>
                        <td><a href="{{route("admin.tag.edit",$tag)}}">編集</a></td>
                        <td>
                            <form method="POST">
                                @csrf
                                @method("DELETE")
                                <button formaction="{{route("admin.tag.destroy",$tag)}}">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>