<x-admin-layout>
    <!--セクションタイトル-->
    <x-section-title>管理者ログイン画面</x-section-title>
    <!--エラーメッセージ-->
    <x-message/>
    <form method="POST" class="flex flex-col gap-2 px-2">
        @csrf
        <label>ログイン</label>
        <input type="text" name="login_id"/>
        <label>パスワード</label>
        <input type="password" name="password"/>
        <div class="text-center">
            <button formaction="{{route("admin.login.create")}}" class="btn btn-primary">ログイン</button>
        </div>
    </form>
</x-admin-layout>