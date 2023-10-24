<?php
    $themes = array(
        "light",
        "dark",
        "cupcake",
        "bumblebee",
        "emerald",
        "corporate",
        "synthwave",
        "retro",
        "cyberpunk",
        "valentine",
        "halloween",
        "garden",
        "forest",
        "aqua",
        "lofi",
        "pastel",
        "fantasy",
        "wireframe",
        "black",
        "luxury",
        "dracula",
        "cmyk",
        "autumn",
        "business",
        "acid",
        "lemonade",
        "night",
        "coffee",
        "winter",
    );
    $theme = array_rand($themes,1);
?>
<!DOCTYPE html>
<html lang="ja" data-theme="{{$themes[$theme]}}">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content={{$description}}>
    <meta name="keywords" content={{$keywords}}>
    <title>{{$title}}</title>
    <link rel="alternate" type="application/atom+xml" href="{{env("APP_URL")}}/feed.atom" title="Atom">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8558173050909097"
     crossorigin="anonymous"></script>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-base-200">
    <div class="max-w-5xl m-auto bg-base-100">
        <header>
            <div class="text-center py-5">
                <h1 class="text-3xl"><a href="/">AYATAKA</a></h1>
            </div>
        </header>
        <nav class="overflow-x-auto sticky top-0 left-0 right-0 bg-base-100 z-50 px-5">
            <ul class="flex gap-5 whitespace-nowrap py-2 md:justify-center items-center">
                <li><a href="{{route("about.index")}}">About</a></li>
                <li><a href="{{route("blog.category")}}">Category</a></li>
            </ul>
        </nav>
        <form method="GET" class="text-center">
            <input type="text" name="keyword" placeholder="サイト内検索"/>
            <button formaction="{{route("blog.search")}}" class="btn btn-primary">
                Search
            </button>
        </form>
        <main class="min-h-screen">
            <div class="max-w-3xl m-auto p-5">
                {{$slot}}
            </div>
        </main>
    </div>
</body>
</html>