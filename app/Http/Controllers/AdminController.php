<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // TARGETING YOUR EXACT DUMPED TABLES
        $players = DB::table('players')->orderBy('id', 'desc')->get();
        $managers = DB::table('managers')->orderBy('id', 'desc')->get();
        $matches = DB::table('match_schedules')->orderBy('match_date', 'asc')->get();
        $messages = DB::table('inquiries')->orderBy('id', 'desc')->get();

        return view('admin.dashboard', [
            'players' => $players,
            'managers' => $managers,
            'matches' => $matches,
            'messages' => $messages,
            'players_count' => $players->count(),
            'managers_count' => $managers->count(),
            'matches_count' => $matches->count(),
            'total_messages_count' => $messages->count(),
            'new_messages_count' => $messages->where('is_read', 0)->count() // 0 means unread in your dump
        ]);
    }

    // Player Actions (Matches your existing columns: name, number, role, position, image)
    public function storePlayer(Request $request) {
        $request->validate(['name' => 'required', 'number' => 'required|numeric', 'position' => 'required', 'role' => 'required', 'image' => 'required|image']);
        $path = $request->file('image')->store('players', 'public');
        DB::table('players')->insert(['name' => $request->name, 'number' => $request->number, 'position' => $request->position, 'role' => $request->role, 'image' => $path, 'created_at' => now(), 'updated_at' => now()]);
        return back()->with('success', 'Player created successfully!');
    }

    public function updatePlayer(Request $request, $id) {
        $request->validate(['name' => 'required', 'number' => 'required|numeric', 'position' => 'required', 'role' => 'required']);
        $player = DB::table('players')->where('id', $id)->first();
        $path = $player->image;
        if ($request->hasFile('image')) {
            if ($path && Storage::disk('public')->exists($path)) Storage::disk('public')->delete($path);
            $path = $request->file('image')->store('players', 'public');
        }
        DB::table('players')->where('id', $id)->update(['name' => $request->name, 'number' => $request->number, 'position' => $request->position, 'role' => $request->role, 'image' => $path, 'updated_at' => now()]);
        return back()->with('success', 'Player records updated!');
    }

    public function destroyPlayer($id) {
        $player = DB::table('players')->where('id', $id)->first();
        if ($player->image && Storage::disk('public')->exists($player->image)) Storage::disk('public')->delete($player->image);
        DB::table('players')->where('id', $id)->delete();
        return back()->with('success', 'Player removed completely!');
    }

    // Manager Actions
    public function storeManager(Request $request) {
        $request->validate(['name' => 'required', 'role' => 'required', 'image' => 'required|image']);
        $path = $request->file('image')->store('managers', 'public');
        DB::table('managers')->insert(['name' => $request->name, 'role' => $request->role, 'image' => $path, 'created_at' => now(), 'updated_at' => now()]);
        return back()->with('success', 'Staff added successfully!');
    }

    public function updateManager(Request $request, $id) {
        $request->validate(['name' => 'required', 'role' => 'required']);
        $manager = DB::table('managers')->where('id', $id)->first();
        $path = $manager->image;
        if ($request->hasFile('image')) {
            if ($path && Storage::disk('public')->exists($path)) Storage::disk('public')->delete($path);
            $path = $request->file('image')->store('managers', 'public');
        }
        DB::table('managers')->where('id', $id)->update(['name' => $request->name, 'role' => $request->role, 'image' => $path, 'updated_at' => now()]);
        return back()->with('success', 'Staff details updated!');
    }

    public function destroyManager($id) {
        $manager = DB::table('managers')->where('id', $id)->first();
        if ($manager->image && Storage::disk('public')->exists($manager->image)) Storage::disk('public')->delete($manager->image);
        DB::table('managers')->where('id', $id)->delete();
        return back()->with('success', 'Staff member deleted!');
    }

    // Match Schedules Actions (Note capitalization on Finish_time from your SQL)
    public function storeMatch(Request $request) {
        $request->validate(['home_team' => 'required', 'away_team' => 'required', 'match_date' => 'required|date', 'match_time' => 'required', 'finish_time' => 'required', 'stadium' => 'required', 'location_type' => 'required', 'image' => 'required|image']);
        $path = $request->file('image')->store('matches', 'public');
        DB::table('match_schedules')->insert(['home_team' => $request->home_team, 'away_team' => $request->away_team, 'match_date' => $request->match_date, 'match_time' => $request->match_time, 'Finish_time' => $request->finish_time, 'stadium' => $request->stadium, 'location_type' => $request->location_type, 'image' => $path, 'created_at' => now(), 'updated_at' => now()]);
        return back()->with('success', 'Match fixture created!');
    }

    public function updateMatch(Request $request, $id) {
        $request->validate(['home_team' => 'required', 'away_team' => 'required', 'match_date' => 'required|date', 'match_time' => 'required', 'finish_time' => 'required', 'stadium' => 'required', 'location_type' => 'required']);
        $match = DB::table('match_schedules')->where('id', $id)->first();
        $path = $match->image;
        if ($request->hasFile('image')) {
            if ($path && Storage::disk('public')->exists($path)) Storage::disk('public')->delete($path);
            $path = $request->file('image')->store('matches', 'public');
        }
        DB::table('match_schedules')->where('id', $id)->update(['home_team' => $request->home_team, 'away_team' => $request->away_team, 'match_date' => $request->match_date, 'match_time' => $request->match_time, 'Finish_time' => $request->finish_time, 'stadium' => $request->stadium, 'location_type' => $request->location_type, 'image' => $path, 'updated_at' => now()]);
        return back()->with('success', 'Match updated successfully!');
    }

    public function destroyMatch($id) {
        $match = DB::table('match_schedules')->where('id', $id)->first();
        if ($match->image && Storage::disk('public')->exists($match->image)) Storage::disk('public')->delete($match->image);
        DB::table('match_schedules')->where('id', $id)->delete();
        return back()->with('success', 'Match completely deleted.');
    }

    // Message Inquiries Actions
    public function markMessageRead($id) {
        DB::table('inquiries')->where('id', $id)->update(['is_read' => 1]);
        return response()->json(['success' => true]);
    }

    public function destroyMessage($id) {
        DB::table('inquiries')->where('id', $id)->delete();
        return back()->with('success', 'Message deleted.');
    }

    public function blockMessageSender($id) {
        $message = DB::table('inquiries')->where('id', $id)->first();
        if ($message) {
            DB::table('inquiries')->where('email', $message->email)->delete();
            return back()->with('success', "Blocked sender email: {$message->email}");
        }
        return back()->with('errors', 'Failed to block sender.');
    }
}
