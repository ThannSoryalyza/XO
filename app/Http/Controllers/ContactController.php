<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // 💡 Change from Inquiry to Message

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // 💡 Save directly to the Message model so it updates the Admin Panel inbox
        Message::create($data);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
