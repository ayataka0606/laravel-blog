<x-user-layout>
    <x-slot:description>{{$post->description}}</x-slot:description>
    <x-slot:keywords>{{$post->keywords}}</x-slot:keywords>
    <x-slot:title>AYATAKA | {{$post->title}}</x-slot:title>
    <!--インフォメーション-->
    <x-message/>
    <!--記事-->
    <article class="prose">
        <div class="flex items-center justify-between">
            <h1>{{$post->title}}</h1>
            <time><span>公開日: </span>{{$post->updated_at->format("Y/m/d")}}</time>
        </div>
        @if ($post->image->name !="dummy.jpg")
            <img class="m-auto" src="{{asset($post->image->path)}}" width="1000" height="200"/>
        @endif
        <div>
            {!!$htmlContent!!}
        </div>
    </article>
</x-user-layout>