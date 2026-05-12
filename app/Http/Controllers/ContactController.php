<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // ADD THIS: This shows the contact form page
    public function index()
    {
        return view('contact'); // Make sure your file is named resources/views/contact.blade.php
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'role'    => 'required|string',
            'message' => 'required|string',
        ]);

        Contact::create($data);

        Mail::send([], [], function ($message) use ($data) {
            $message->to('lizathannsorya@gmail.com')
                ->subject('New Message from ' . $data['name'])
                ->html("<h3>New Contact Submission</h3><p>Name: {$data['name']}</p><p>Message: {$data['message']}</p>");
        });

        return back()->with('success', 'Message sent successfully!');
    }
}
