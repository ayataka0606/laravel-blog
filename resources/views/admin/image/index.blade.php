<x-admin-layout>
    <!--エラーメッセージ-->
    <x-message/>
    <form method="POST" enctype="multipart/form-data" class="flex flex-col justify-center items-center p-5">
        @csrf
        <input type="file" name="image" class="file-input w-full max-w-xs" />
        <button formaction="{{route("admin.image.upload")}}" class="btn btn-primary">アップロード</button>
    </form>
    <div class="flex gap-5 p-5 justify-center flex-wrap">
        @foreach ($images as $image)
            <a href="/storage/blog/{{$image->name}}"><img src="{{asset($image->path)}}" width="200" height="100"/></a>
        @endforeach
    </div>
</x-admin-layout>