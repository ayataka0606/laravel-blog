<form method="POST">
    @csrf
    <label>タイトル</label>
    <input type="text" name="title"/>
    <label>メールアドレス</label>
    <input type="email" name="email">
    <label>内容</label>
    <textarea name="content" cols="30" rows="10"></textarea>
    <button formaction="{{route("contact.confirm")}}">確認画面へ</button>
</form>