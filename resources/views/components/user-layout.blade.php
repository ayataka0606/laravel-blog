<!DOCTYPE html>
<html amp lang="ja" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content={{$description}}>
    <meta name="keywords" content={{$keywords}}>
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
    <link rel="canonical" href="{{env("APP_URL")}}">
    <link rel="amphtml" href="{{env("APP_URL")}}">
    <link rel="alternate" type="application/atom+xml" href="{{env("APP_URL")}}/feed.atom" title="Atom">
    <!-- AMP CSS ボイラープレートの指定 -->
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <!-- head タグの最後の要素に AMP JS ライブラリを追加 -->
    <script async src="https://cdn.ampproject.org/v0.js"></script>
</head>
<body class="bg-base-100">
    <div class="max-w-5xl m-auto bg-base-200">
        <header>
            <div class="text-center py-5">
                <h1 class="text-3xl"><a href="/">AYATAKA</a></h1>
            </div>
        </header>
        <nav class="overflow-x-auto sticky top-0 left-0 right-0 bg-base-300 z-50 px-5">
            <ul class="flex gap-5 whitespace-nowrap py-2 md:justify-center">
                <li><a href="{{route("about.index")}}">About</a></li>
                <li><a href="{{route("blog.category")}}">Category</a></li>
            </ul>
        </nav>
        <main class="min-h-screen">
            <div class="max-w-3xl m-auto p-5">
                {{$slot}}
            </div>
        </main>
    </div>
</body>
</html>