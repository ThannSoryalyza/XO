<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Show the page
    public function index() {
        return view('contact');
    }

    // Handle the form submission
   // Handle the form submission
    public function store(Request $request) {
        // 1. Validation
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'role'    => 'required',
            'message' => 'required|min:5',
        ]);

        // 2. Email Data
        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'role'    => $request->role,
            'body'    => $request->message,
        ];

        // 3. Send the Email using Laravel's native Mailer
        Mail::raw("New Message from XO United Website:\n\n" .
                  "From: {$data['name']}\n" .
                  "Email: {$data['email']}\n" .
                  "Role: {$data['role']}\n" .
                  "Message: {$data['body']}", function ($message) use ($data) {
            $message->to('lizathannsorya@gmail.com')
                    ->subject('New XO United Inquiry: ' . $data['name']);
        });

        // 4. Success Message
        return back()->with('success', 'Your message has been sent to XO United!');
    }
}
