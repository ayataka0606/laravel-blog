<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>問い合わせ詳細</x-section-title>
    <!--問い合わせ詳細-->
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <tbody>
                    <tr><th>ID</th><td>{{$contact->id}}</td></tr>
                    <tr><th>タイトル</th><td>{{$contact->title}}</td></tr>
                    <tr><th>作成日</th><td>{{$contact->created_at->format("Y/m/d")}}</td></tr>
                    <tr><th>更新日</th><td>{{$contact->updated_at->format("Y/m/d")}}</td></tr>
                    <tr><th>メールアドレス</th><td>{{$contact->email}}</td></tr>
                    <tr><th>内容</th><td>{{$contact->content}}</td></tr>
            </tbody>
        </table>
    </div>
</x-admin-layout>