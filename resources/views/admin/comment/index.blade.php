<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>コメント一覧</x-section-title>
    <!--インフォメーション-->
    <x-message/>
    <!--コメントリスト-->
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>内容</th>
                    <th>作成日</th>
                    <th>更新日</th>
                    <th>承認</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <th>{{$comment->id}}</th>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->created_at->format("Y/m/d")}}</td>
                        <td>{{$comment->updated_at->format("Y/m/d")}}</td>
                        <td>
                            <form method="POST">
                                @csrf
                                @method("PUT")
                                <button formaction="{{route("admin.comment.update",$comment)}}">承認</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST">
                                @csrf
                                @method("DELETE")
                                <button formaction="{{route("admin.comment.destroy",$comment)}}">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>