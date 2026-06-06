<div class="admin-panel" id="standings-sec">
    <div class="admin-panel-head">
        <div class="admin-panel-title">
            <span class="admin-panel-icon"><i class="bi bi-trophy"></i></span>
            <div>
                <h5>League Standings</h5>
                <p>Update club positions and points</p>
            </div>
        </div>
        <button class="btn admin-btn-add" data-bs-toggle="modal" data-bs-target="#createStandingModal"><i class="bi bi-plus-lg"></i> Add Club</button>
    </div>
    <div class="admin-panel-body">
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0 table-sm">
                <thead>
                    <tr>
                        <th class="ps-4">Logo</th>
                        <th>Pos</th>
                        <th>Club</th>
                        <th class="text-center">P</th>
                        <th class="text-center">W</th>
                        <th class="text-center">D</th>
                        <th class="text-center">L</th>
                        <th class="text-center">GF</th>
                        <th class="text-center">GA</th>
                        <th class="text-center">GD</th>
                        <th class="text-center">Pts</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($standings as $team)
                    <tr>
                        <td class="ps-4">
                            @if($team->logo)
                                <img src="{{ media_asset($team->logo) }}" alt="{{ $team->club_name }}" class="admin-avatar rounded-circle">
                            @else
                                <div class="admin-avatar-fallback rounded-circle">N/A</div>
                            @endif
                        </td>
                        <td class="fw-bold text-danger">{{ $team->position }}</td>
                        <td class="fw-semibold">{{ $team->club_name }}</td>
                        <td class="text-center">{{ $team->played }}</td>
                        <td class="text-center">{{ $team->won }}</td>
                        <td class="text-center">{{ $team->drawn }}</td>
                        <td class="text-center">{{ $team->lost }}</td>
                        <td class="text-center">{{ $team->goals_for }}</td>
                        <td class="text-center fw-medium text-danger">-{{ $team->goals_against }}</td>
                        <td class="text-center">{{ $team->goal_difference >= 0 ? '+' : '' }}{{ $team->goal_difference }}</td>
                        <td class="text-center fw-bold">{{ $team->points }}</td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary admin-btn-icon edit-standing-btn me-1"
                                    data-id="{{ $team->id }}"
                                    data-logo="{{ $team->logo ? media_asset($team->logo) : '' }}"
                                    data-position="{{ $team->position }}"
                                    data-club="{{ $team->club_name }}"
                                    data-played="{{ $team->played }}"
                                    data-won="{{ $team->won }}"
                                    data-drawn="{{ $team->drawn }}"
                                    data-lost="{{ $team->lost }}"
                                    data-gf="{{ $team->goals_for }}"
                                    data-ga="{{ $team->goals_against }}"
                                    data-points="{{ $team->points }}"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.standings.destroy', $team->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this club from standings?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger admin-btn-icon"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="12" class="admin-empty">No league standings added yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
