<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

class AdminContactController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::all();
        return view("admin/contact/index",compact("contacts"));
    }
    public function show(Contact $contact): View
    {
        return view("admin/contact/show",compact("contact"));
    }
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return redirect(route("admin.contact.index"))
            ->with("message",$contact->title."を削除しました。");
    }
}
