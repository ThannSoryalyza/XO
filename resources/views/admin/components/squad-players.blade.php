<div class="admin-panel" id="players-sec">
    <div class="admin-panel-head">
        <div class="admin-panel-title">
            <span class="admin-panel-icon"><i class="bi bi-people"></i></span>
            <div>
                <h5>Squad Players</h5>
                <p>Manage registered players and positions</p>
            </div>
        </div>
        <button class="btn admin-btn-add" data-bs-toggle="modal" data-bs-target="#createPlayerModal"><i class="bi bi-plus-lg"></i> Add Player</button>
    </div>
    <div class="admin-panel-body">
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Photo</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Position</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($players as $player)
                    <tr>
                        <td class="ps-4">
                            @if($player->image)
                                <img src="{{ media_asset($player->image) }}" alt="{{ $player->name }}" class="admin-avatar">
                            @else
                                <div class="admin-avatar-fallback">N/A</div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $player->name }}</td>
                        <td><span class="admin-badge">#{{ $player->number }}</span></td>
                        <td><span class="admin-badge-pos">{{ $player->position }}</span></td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary admin-btn-icon edit-player-btn me-1" data-id="{{ $player->id }}" data-name="{{ $player->name }}" data-number="{{ $player->number }}" data-position="{{ $player->position }}"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.players.destroy', $player->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove player permanently?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger admin-btn-icon"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="admin-empty">No squad players registered yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
