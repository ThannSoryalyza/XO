<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display the specified message and mark it as read.
     */
    public function show($id)
    {
        $message = \App\Models\Message::findOrFail($id);

        // Mark as read when clicked
        $message->update(['is_read' => true]);

        return view('messages.show', compact('message'));
    }

    /**
     * Explicitly update a message's status to read.
     */
    public function update(Request $request, $id)
    {
        $message = \App\Models\Message::findOrFail($id);
        $message->update(['is_read' => true]);

        return redirect()->route('admin.dashboard')->with('success', 'Message marked as read.');
    }

    /**
     * Remove the specified message from the database.
     */
    public function destroy($id)
    {
        $message = \App\Models\Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
