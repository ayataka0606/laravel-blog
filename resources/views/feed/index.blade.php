<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="ja">
    <id>ayataka.tech</id>
    <title>AYATAKA</title>
    <updated>2023-10-06T12:34:14+09:00</updated>
    <link rel="hub" href="https://pubsubhubbub.appspot.com/"/>
    <link rel="self" type="application/atom+xml" href="https://ayataka.tech/feed.atom"/>
    <author>
        <name>ayataka.tech</name>
    </author>
    @foreach($posts as $post)
        <entry>
            <id>{{env("APP_URL")}}/blog/{{$post->slug}}</id>
            <title><![CDATA[{{$post->title}}]]></title>
            <link rel="alternate" type="text/html" href="{{env("APP_URL")}}/blog/{{$post->slug}}">
            <updated>{{$post->updated_at->format(DateTime::ATOM)}}</updated>
            <summary><![CDATA[{{$post->description}}]]></summary>
        </entry>
    @endforeach
</feed>