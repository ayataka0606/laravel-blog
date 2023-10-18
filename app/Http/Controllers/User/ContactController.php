<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactPostRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(): View
    {
        return view("user/contact/index");
    }
    public function confirm(ContactPostRequest $request): View
    {
        $contact = $request;
        return view("user/contact/confirm",compact("contact"));
    }
    public function thanks(ContactPostRequest $request): View
    {
        $contact = new Contact();
        $contact->title = $request->title;
        $contact->email = $request->email;
        $contact->content = $request->content;
        $contact->save();
        return view("user/contact/thanks");
    }
}
