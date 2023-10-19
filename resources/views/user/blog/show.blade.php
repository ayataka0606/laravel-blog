<x-user-layout>
    <x-slot:description>{{$post->description}}</x-slot:description>
    <x-slot:keywords>{{$post->keywords}}</x-slot:keywords>
    <x-slot:title>AYATAKA | {{$post->title}}</x-slot:title>
    <!--インフォメーション-->
    <x-message/>
    <!--記事-->
    <article class="prose">
        <h1>{{$post->title}}</h1>
        <time>{{$post->updated_at->format("Y/m/d")}}</time>
        <div>
            {{$post->content}}
        </div>
    </article>
</x-user-layout>