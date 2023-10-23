<x-admin-layout>
    <!--インフォメーション-->
    <x-message/>   
    <!--プロフィール設定-->
    <section class="flex flex-col items-center gap-5 p-5">
        <x-section-title>プロフィール</x-section-title>
        @foreach ($admins as $admin)
            <form method="POST" class="flex flex-col gap-5">
                @csrf
                @method("PUT")
                <label>サムネイル</label>
                <select name="image_id">
                    @foreach ($images as $image)
                        <option value="{{$image->id}}" @selected($image->id == $admin->image_id)>
                            {{$image->name}}
                        </option>
                    @endforeach
                </select>
                <label>プロフィール</label>
                <textarea name="profile" cols="100" rows="10">{{old("profile",$admin->profile)}}</textarea>
                <div class="text-center">
                    <button formaction="{{route("admin.profile.profile_update",$admin)}}" class="btn btn-primary">
                        編集
                    </button>
                </div>
            </form>
        @endforeach
    </section>
    <!--資格-->
    <section class="flex flex-col justify-center items-center gap-5 p-5">
        <x-section-title>資格</x-section-title>
        <form method="POST">
            @csrf
            <label>資格名</label>
            <input type="text" name="name">
            <label>ステータス</label>
            <input type="text" name="status">
            <label>ステータ年月</label>
            <input type="date" name="status_date">
            <button formaction="{{route("admin.profile.qualification_store")}}" class="btn btn-primary">
                追加
            </button>
        </form>
        @foreach ($qualifications as $qualification)
            <div class="flex items-center gap-5">
                <form method="POST">
                    @csrf
                    @method("PUT")
                    <label>資格名</label>
                    <input type="text" name="name" value="{{$qualification->name}}">
                    <label>ステータス</label>
                    <input type="text" name="status" value="{{$qualification->status}}">
                    <label>ステータス年月</label>
                    <input type="date" name="status_date" value="{{$qualification->status_date}}">
                    <button formaction="{{route("admin.profile.qualification_update",$qualification)}}" class="btn btn-primary">
                        編集
                    </button>
                </form>
                <form method="POST">
                    @csrf
                    @method("DELETE")
                    <button formaction="{{route("admin.profile.qualification_destroy",$qualification)}}" class="btn btn-secondary">
                        削除
                    </button>
                </form>
            </div>
        @endforeach
    </section>
    <!--スキル-->
    <section class="flex flex-col justify-center items-center gap-5 p-5">
        <x-section-title>スキル</x-section-title>
        <form method="POST">
            @csrf
            <label>スキル名</label>
            <input type="text" name="name">
            <label>スキルレベル</label>
            <input type="text" name="level">
            <button formaction="{{route("admin.profile.skill_store")}}" class="btn btn-primary">
                追加
            </button>
        </form>
        @foreach ($skills as $skill)
            <div class="flex items-center gap-5">
                <form method="POST">
                    @csrf
                    @method("PUT")
                    <label>スキル名</label>
                    <input type="text" name="name" value="{{$skill->name}}">
                    <label>スキルレベル</label>
                    <input type="text" name="level" value="{{$skill->level}}">
                    <button formaction="{{route("admin.profile.skill_update",$skill)}}" class="btn btn-primary">
                        編集
                    </button>
                </form>
                <form method="POST">
                    @csrf
                    @method("DELETE")
                    <button formaction="{{route("admin.profile.skill_destroy",$skill)}}" class="btn btn-secondary">
                        削除
                    </button>
                </form>
            </div>
        @endforeach
    </section>
</x-admin-layout>