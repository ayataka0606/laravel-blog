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
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ステータス</th>
                    <th>タイトル</th>
                    <th>作成日</th>
                    <th>更新日</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>
                            @if($post->published == 0)
                                下書き
                            @else
                                公開済
                            @endif
                        </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at->format("Y/m/d")}}</td>
                        <td>{{$post->updated_at->format("Y/m/d")}}</td>
                        <td><a href="{{route("admin.post.edit",$post)}}">編集</a></td>
                        <td>
                            <form method="POST">
                                @csrf
                                @method("DELETE")
                                <button formaction="{{route("admin.post.destroy",$post)}}">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>