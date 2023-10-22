<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(): View
    {
        $images = Image::orderBy("updated_at","DESC")->get();
        return view("admin/image/index",compact("images"));
    }
    public function upload(Request $request): RedirectResponse
    {
        if(!empty($request->file("image"))){
            $dir = "blog";
            $file_name = $request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("public/".$dir,$file_name);
            $image = new Image();
            $image->name = $file_name;
            $image->path = "storage/".$dir."/".$file_name;
            $image->save();
            return redirect(route("admin.image.index"))
                ->with("message",$image->name."をアップロードしました。");
        }
        return redirect(route("admin.image.index"))
            ->with("message","ファイルを選択してください。");
    }
    public function destroy(Image $image): RedirectResponse
    {
        $image->delete();
        Storage::disk("public")->delete("blog/".$image->name);
        return redirect(route("admin.image.index"))
            ->with("message",$image->name."を削除しました。");
    }
}
