<?php

namespace App\Http\Controllers;

use App\Models\LeagueStanding;
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
        $standings = LeagueStanding::orderBy('position')->get();

        return view('admin.dashboard', [
            'players' => $players,
            'managers' => $managers,
            'matches' => $matches,
            'messages' => $messages,
            'standings' => $standings,
            'players_count' => $players->count(),
            'managers_count' => $managers->count(),
            'matches_count' => $matches->count(),
            'standings_count' => $standings->count(),
            'total_messages_count' => $messages->count(),
            'new_messages_count' => $messages->where('is_read', 0)->count() // 0 means unread in your dump
        ]);
    }

    // Player Actions (Matches your existing columns: name, number, role, position, image)
    public function storePlayer(Request $request) {
        $request->validate([
            'name' => 'required',
            'number' => 'required|numeric',
            'position' => 'required|in:GK,DF,MD,FW',
            'image' => 'required|image',
        ]);
        $path = $request->file('image')->store('players', 'public');
        DB::table('players')->insert([
            'name' => $request->name,
            'number' => $request->number,
            'position' => $request->position,
            'role' => $request->position,
            'image' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return back()->with('success', 'Player created successfully!');
    }

    public function updatePlayer(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'number' => 'required|numeric',
            'position' => 'required|in:GK,DF,MD,FW',
        ]);
        $player = DB::table('players')->where('id', $id)->first();
        $path = $player->image;
        if ($request->hasFile('image')) {
            if ($path && Storage::disk('public')->exists($path)) Storage::disk('public')->delete($path);
            $path = $request->file('image')->store('players', 'public');
        }
        DB::table('players')->where('id', $id)->update([
            'name' => $request->name,
            'number' => $request->number,
            'position' => $request->position,
            'role' => $request->position,
            'image' => $path,
            'updated_at' => now(),
        ]);
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
        $request->validate([
            'home_team' => 'required',
            'away_team' => 'required',
            'match_date' => 'required|date',
            'match_time' => 'required',
            'finish_time' => 'required',
            'stadium' => 'required',
            'location_type' => 'required',
            'home_logo' => 'nullable|image',
            'away_logo' => 'nullable|image',
        ]);

        $homeLogo = $request->hasFile('home_logo') ? $request->file('home_logo')->store('match-logos', 'public') : null;
        $awayLogo = $request->hasFile('away_logo') ? $request->file('away_logo')->store('match-logos', 'public') : null;

        DB::table('match_schedules')->insert([
            'home_team' => $request->home_team,
            'away_team' => $request->away_team,
            'home_logo' => $homeLogo,
            'away_logo' => $awayLogo,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'Finish_time' => $request->finish_time,
            'stadium' => $request->stadium,
            'location_type' => $request->location_type,
            'image' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Match fixture created!');
    }

    public function updateMatch(Request $request, $id) {
        $request->validate([
            'home_team' => 'required',
            'away_team' => 'required',
            'match_date' => 'required|date',
            'match_time' => 'required',
            'finish_time' => 'required',
            'stadium' => 'required',
            'location_type' => 'required',
            'home_logo' => 'nullable|image',
            'away_logo' => 'nullable|image',
        ]);

        $match = DB::table('match_schedules')->where('id', $id)->first();
        $homeLogo = $match->home_logo ?? null;
        $awayLogo = $match->away_logo ?? null;

        if ($request->hasFile('home_logo')) {
            if ($homeLogo && Storage::disk('public')->exists($homeLogo)) {
                Storage::disk('public')->delete($homeLogo);
            }
            $homeLogo = $request->file('home_logo')->store('match-logos', 'public');
        }

        if ($request->hasFile('away_logo')) {
            if ($awayLogo && Storage::disk('public')->exists($awayLogo)) {
                Storage::disk('public')->delete($awayLogo);
            }
            $awayLogo = $request->file('away_logo')->store('match-logos', 'public');
        }

        DB::table('match_schedules')->where('id', $id)->update([
            'home_team' => $request->home_team,
            'away_team' => $request->away_team,
            'home_logo' => $homeLogo,
            'away_logo' => $awayLogo,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'Finish_time' => $request->finish_time,
            'stadium' => $request->stadium,
            'location_type' => $request->location_type,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Match updated successfully!');
    }

    public function destroyMatch($id) {
        $match = DB::table('match_schedules')->where('id', $id)->first();
        if ($match->image && Storage::disk('public')->exists($match->image)) {
            Storage::disk('public')->delete($match->image);
        }
        if ($match->home_logo && Storage::disk('public')->exists($match->home_logo)) {
            Storage::disk('public')->delete($match->home_logo);
        }
        if ($match->away_logo && Storage::disk('public')->exists($match->away_logo)) {
            Storage::disk('public')->delete($match->away_logo);
        }
        DB::table('match_schedules')->where('id', $id)->delete();
        return back()->with('success', 'Match completely deleted.');
    }

    // League Standings Actions
    public function storeStanding(Request $request) {
        $data = $request->validate([
            'position' => 'required|integer|min:1',
            'club_name' => 'required|string|max:255',
            'played' => 'required|integer|min:0',
            'won' => 'required|integer|min:0',
            'drawn' => 'required|integer|min:0',
            'lost' => 'required|integer|min:0',
            'goals_for' => 'required|integer|min:0',
            'goals_against' => 'required|integer|min:0',
            'points' => 'required|integer|min:0',
            'logo' => 'nullable|image',
        ]);

        $path = $this->storeStandingLogo($request);

        LeagueStanding::create([
            'position' => $data['position'],
            'club_name' => $data['club_name'],
            'logo' => $path,
            'played' => $data['played'],
            'won' => $data['won'],
            'drawn' => $data['drawn'],
            'lost' => $data['lost'],
            'goals_for' => $data['goals_for'],
            'goals_against' => $data['goals_against'],
            'points' => $data['points'],
        ]);

        return back()->with('success', 'Club added to league standings!');
    }

    public function updateStanding(Request $request, $id) {
        $data = $request->validate([
            'position' => 'required|integer|min:1',
            'club_name' => 'required|string|max:255',
            'played' => 'required|integer|min:0',
            'won' => 'required|integer|min:0',
            'drawn' => 'required|integer|min:0',
            'lost' => 'required|integer|min:0',
            'goals_for' => 'required|integer|min:0',
            'goals_against' => 'required|integer|min:0',
            'points' => 'required|integer|min:0',
            'logo' => 'nullable|image',
        ]);

        $standing = LeagueStanding::findOrFail($id);
        $path = $standing->logo;
        if ($request->hasFile('logo')) {
            $this->deleteStandingLogo($path);
            $path = $this->storeStandingLogo($request);
        }

        $standing->update([
            'position' => $data['position'],
            'club_name' => $data['club_name'],
            'logo' => $path,
            'played' => $data['played'],
            'won' => $data['won'],
            'drawn' => $data['drawn'],
            'lost' => $data['lost'],
            'goals_for' => $data['goals_for'],
            'goals_against' => $data['goals_against'],
            'points' => $data['points'],
        ]);

        return back()->with('success', 'League standing updated!');
    }

    public function destroyStanding($id) {
        $standing = LeagueStanding::findOrFail($id);
        $this->deleteStandingLogo($standing->logo);
        $standing->delete();
        return back()->with('success', 'Club removed from standings.');
    }

    private function storeStandingLogo(Request $request): ?string
    {
        if (! $request->hasFile('logo')) {
            return null;
        }

        $directory = public_path('img/clubs');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('logo');
        $filename = time() . '_' . $file->hashName();
        $file->move($directory, $filename);

        return 'img/clubs/' . $filename;
    }

    private function deleteStandingLogo(?string $path): void
    {
        if (empty($path)) {
            return;
        }

        if (str_starts_with($path, 'clubs/') && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        if (str_starts_with($path, 'img/clubs/') && is_file(public_path($path))) {
            unlink(public_path($path));
        }
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
