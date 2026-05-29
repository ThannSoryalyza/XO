<div class="card shadow-sm mb-5" id="players-sec">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 fw-bold text-dark"><i class="bi bi-people me-2"></i>Squad Players Register</h5>
        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createPlayerModal"><i class="bi bi-plus-lg"></i> Add New Player</button>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Profile Image</th>
                        <th>Player Name</th>
                        <th>Squad Number</th>
                        <th>Field Position</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($players as $player)
                    <tr>
                        <td class="ps-4">
                            @if($player->image)
                                <img src="{{ asset( $player->image) }}" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">N/A</div>
                            @endif
                        </td>
                        <td class="fw-bold">{{ $player->name }}</td>
                        <td><span class="badge bg-secondary"># {{ $player->number }}</span></td>
                        <td>{{ $player->position }}</td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary edit-player-btn me-1" data-id="{{ $player->id }}" data-name="{{ $player->name }}" data-number="{{ $player->number }}" data-position="{{ $player->position }}"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.players.destroy', $player->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove player permanently?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No squad players registered yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
