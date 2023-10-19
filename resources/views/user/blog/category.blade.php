<x-user-layout>
    <x-slot:description>AYATAKAのカテゴリ別一覧ページです。</x-slot:description>
    <x-slot:keywords>AYATAKA,ブログ,カテゴリ</x-slot:keywords>
    <x-slot:title>AYATAKA | CATEGORY</x-slot:title>
    <ul>
        @foreach ($categories as $category)
            <li class="text-3xl font-bold">{{$category->name}}</li>
            @foreach ($posts as $post)
                @if ($post->category->id == $category->id)
                    <ul class="flex gap-5 py-5 text-lg">
                        <li><time>{{$post->updated_at->format("Y/m/d")}} :</time></li>
                        <li><a href="/blog/{{$post->slug}}" class="link link-info no-underline">{{$post->title}}</a></li>
                    </ul> 
                @endif
            @endforeach
        @endforeach
    </ul>
</x-user-layout>