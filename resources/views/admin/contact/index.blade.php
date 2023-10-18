@if (session("message"))
    <div>
        {{session("message")}}
    </div>
@endif

<ul>
    @foreach ($contacts as $contact)
        <li>{{$contact->title}}</li>
        <a href="{{route("admin.contact.show",$contact)}}">詳細</a>
        <form method="POST">
            @csrf
            @method("DELETE")
            <button formaction="{{route("admin.contact.destroy",$contact)}}">削除</button>
        </form>
    @endforeach
</ul>