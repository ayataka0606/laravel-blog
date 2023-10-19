<x-user-layout>
    <x-slot:description>AYATAKAの検索結果「{{$keyword}}」ページです。</x-slot:description>
    <x-slot:keywords>AYATAKA,検索結果,{{$keyword}}</x-slot:keywords>
    <x-slot:title>AYATAKA | {{$keyword}}</x-slot:title>
    <!--記事一覧-->
    <article>
        <section>
            @foreach ($posts as $post)
                <ul class="flex gap-5 py-3 text-lg">
                    <li><time>{{$post->updated_at->format("Y/m/d")}} :</time></li>
                    <li><a href="/blog/{{$post->slug}}" class="link link-hover">{{$post->title}}</a></li>
                </ul>
            @endforeach
        </section>
    </article>
</x-user-layout>