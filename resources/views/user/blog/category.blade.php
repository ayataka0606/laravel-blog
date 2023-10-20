<x-user-layout>
    <x-slot:description>AYATAKAのカテゴリ別一覧ページです。</x-slot:description>
    <x-slot:keywords>AYATAKA,ブログ,カテゴリ</x-slot:keywords>
    <x-slot:title>AYATAKA | CATEGORY</x-slot:title>
    <nav class="overflow-x-auto p-2 my-5 border-y text-lg">
        <ul class="flex flex-row gap-5">
            @foreach ($categories as $category)
                <li><a href="#{{$category->name}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </nav>
    <ul>
        @foreach ($categories as $category)
            <li id="{{$category->name}}" class="text-3xl font-bold">{{$category->name}}</li>
            @foreach ($posts as $post)
                @if ($post->category->id == $category->id)
                    <ul class="flex gap-5 py-5 text-lg">
                        <li><time>{{$post->updated_at->format("Y/m/d")}} :</time></li>
                        <li><a href="/blog/{{$post->slug}}" class="link link-hover">{{$post->title}}</a></li>
                    </ul> 
                @endif
            @endforeach
        @endforeach
    </ul>
</x-user-layout>