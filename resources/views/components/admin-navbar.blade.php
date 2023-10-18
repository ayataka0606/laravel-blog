<nav>
    <ul class="flex flex-row gap-2 justify-center">
        <li><a href="/admin/post">ホーム</a></li>
        <li><a href="/admin/post">投稿一覧</a></li>
        <li><a href="/admin/category">カテゴリ一覧</a></li>
        <li><a href="/admin/tag">タグ一覧</a></li>
        <li><a href="/admin/comment">コメント一覧</a></li>
        <li><a href="/admin/contact">問い合わせ一覧</a></li>
        <li>
            <form method="POST">
                @csrf
                <button formaction="{{route("admin.login.destroy")}}">ログアウト</button>
            </form>
        </li>
    </ul>
</nav>