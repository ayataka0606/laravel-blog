<p>{{$contact->title}}</p>
<p>{{$contact->email}}</p>
<p>{{$contact->content}}</p>
<form method="POST">
    @csrf
    <input type="hidden" name="title" value="{{$contact->title}}"/>
    <input type="hidden" name="email" value="{{$contact->email}}"/>
    <input type="hidden" name="content" value="{{$contact->content}}">
    <button formaction="{{route("contact.thanks")}}">送信</button>
</form>
