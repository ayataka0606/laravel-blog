<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QualificationPostRequest;
use App\Http\Requests\SkillPostRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Qualification;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $admins = Admin::where("id","=",1)->get();
        $qualifications = Qualification::all();
        $skills = Skill::all();
        $images = Image::all();
        return view("admin/profile/edit",compact("admins","qualifications","skills","images"));
    }
    public function profile_update(Request $request, Admin $admin): RedirectResponse
    {
        $admin->image_id = $request->image_id;
        $admin->profile = $request->profile;
        $admin->update();
        return redirect(route("admin.profile.edit"))
            ->with("message","プロフィールを編集しました。");
    }
    public function skill_store(SkillPostRequest $request): RedirectResponse
    {
        $skill = new Skill();
        $skill->name = $request->name;
        $skill->level = $request->level;
        $skill->admin_id = 1;
        $skill->save();
        return redirect(route("admin.profile.edit"))
            ->with("message",$skill->name."を追加しました。");
    }
    public function skill_update(SkillPostRequest $request, Skill $skill): RedirectResponse
    {
        $skill->name = $request->name;
        $skill->level = $request->level;
        $skill->admin_id = 1;
        $skill->update();
        return redirect(route("admin.profile.edit"))
            ->with("message",$skill->name."を編集しました。");
    }
    public function skill_destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();
        return redirect(route("admin.profile.edit"))
            ->with("message",$skill->name."を削除しました。");
    }
    public function qualification_store(QualificationPostRequest $request): RedirectResponse
    {
        $qualification = new Qualification();
        $qualification->name = $request->name;
        $qualification->status = $request->status;
        $qualification->status_date = $request->status_date;
        $qualification->admin_id = 1;
        $qualification->save();
        return redirect(route("admin.profile.edit"))
            ->with("message",$qualification->name."を追加しました。");
    }
    public function qualification_update(QualificationPostRequest $request, Qualification $qualification): RedirectResponse
    {
        $qualification->name = $request->name;
        $qualification->status = $request->status;
        $qualification->status_date = $request->status_date;
        $qualification->admin_id = 1;
        $qualification->update();
        return redirect(route("admin.profile.edit"))
            ->with("message",$qualification->name."を編集しました。");
    }
    public function qualification_destroy(Qualification $qualification): RedirectResponse
    {
        $qualification->delete();
        return redirect(route("admin.profile.edit"))
            ->with("message",$qualification->name."を削除しました。");
    }
}
