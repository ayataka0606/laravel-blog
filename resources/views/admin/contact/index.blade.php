<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>問い合わせ一覧</x-section-title>
    <!--インフォメーション-->
    <x-message/>
    <!--問い合わせリスト-->
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>作成日</th>
                    <th>更新日</th>
                    <th>詳細</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <th>{{$contact->id}}</th>
                        <td>{{$contact->title}}</td>
                        <td>{{$contact->created_at->format("Y/m/d")}}</td>
                        <td>{{$contact->updated_at->format("Y/m/d")}}</td>
                        <td><a href="{{route("admin.contact.show",$contact)}}">詳細</a></td>
                        <td>
                            <form method="POST">
                                @csrf
                                @method("DELETE")
                                <button formaction="{{route("admin.contact.destroy",$contact)}}">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>