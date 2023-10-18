<ul>
    @foreach ($posts as $post)
        <li><a href="/blog/{{$post->slug}}">{{$post->id}}</a></li>
    @endforeach
    @foreach ($comments as $comment)
        <li>{{$comment->post_id}}</li>
    @endforeach
</ul>