@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST">
    @csrf
    <label>ログイン</label>
    <input type="text" name="login_id"/>
    <label>パスワード</label>
    <input type="password" name="password"/>
    <button formaction="{{route("admin.login.create")}}">ログイン</button>
</form>