<x-user-layout>
    <x-slot:description>AYATAKAのブログ一覧ページです。</x-slot:description>
    <x-slot:keywords>AYATAKA,ブログ</x-slot:keywords>
    <x-slot:title>AYATAKA | BLOG</x-slot:title>
    <article>
        <section>
            @foreach ($posts as $post)
                <ul class="flex gap-5 py-3 text-lg">
                    <li><time>{{$post->updated_at->format("Y/m/d")}} :</time></li>
                    <li><a href="/blog/{{$post->slug}}" class="link link-info no-underline">{{$post->title}}</a></li>
                </ul>
            @endforeach
        </section>
    </article>
</x-user-layout>
