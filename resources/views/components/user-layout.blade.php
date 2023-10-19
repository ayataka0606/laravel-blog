<!DOCTYPE html>
<html lang="ja" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content={{$description}}>
    <meta name="keywords" content={{$keywords}}>
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
    <link rel="alternate" type="application/atom+xml" href="{{env("APP_URL")}}/feed.atom" title="Atom">
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
                <li>
                    <form method="GET">
                        <input type="text" name="keyword" placeholder="サイト内検索"/>
                        <button formaction="{{route("blog.search")}}" class="btn btn-primary">
                            Search
                        </button>
                    </form>
                </li>
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