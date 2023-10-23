<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Qualification;
use App\Models\Skill;

class AboutController extends Controller
{
    public function index(): View
    {
        $admins = Admin::where("id","=",1)->get();
        $profile = $admins[0]->profile;
        $image_id = $admins[0]->image_id;
        $image = Image::where("id","=",$image_id)->first();
        $skills = Skill::all();
        $qualifications =Qualification::all();
        return view("user/about/index",compact("image","profile","skills","qualifications"));
    }
}
