<!DOCTYPE html>
<html lang="ja" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AYATAKA</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <header>
        <div class="text-center p-5">
            <h1 class="text-3xl"><a href="/admin/post">AYATAKA</a></h1>
        </div>
    </header>
    <nav class="overflow-x-auto sticky top-0 left-0 right-0 bg-base-300 z-50">
        <ul class="flex gap-5 whitespace-nowrap py-5 md:justify-center">
            <li><a href="/admin/post">投稿一覧</a></li>
            <li><a href="/admin/category">カテゴリ一覧</a></li>
            <li><a href="/admin/image">画像一覧</a></li>
            <li>
                <form method="POST">
                    @csrf
                    <button formaction="{{route("admin.login.destroy")}}">ログアウト</button>
                </form>
            </li>
        </ul>
    </nav>
    {{$slot}}
</body>
</html>