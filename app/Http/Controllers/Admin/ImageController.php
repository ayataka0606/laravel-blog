<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ImageController extends Controller
{
    public function index(): View
    {
        $images = Image::all();
        return view("admin/image/index",compact("images"));
    }
    public function upload(Request $request): RedirectResponse
    {
        if(!isNull($request->id)){
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
            ->with("message","ファイルを指定してください。");
    }
}
