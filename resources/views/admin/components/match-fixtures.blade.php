<div class="card shadow-sm mb-5" id="matches-sec">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 fw-bold text-dark"><i class="bi bi-calendar-event me-2"></i>Match Schedule & Fixture Track</h5>
        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createMatchModal"><i class="bi bi-plus-lg"></i> Add New Match</button>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Banner</th>
                        <th>Match Fixture</th>
                        <th>Event Date & Timing</th>
                        <th>Stadium Grounds</th>
                        <th>Category</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($matches as $match)
                    <tr>
                        <td class="ps-4">
                            @if($match->image)
                                <img src="{{ asset('storage/' . $match->image) }}" class="rounded shadow-sm" style="width: 55px; height: 38px; object-fit: cover;">
                            @endif
                        </td>
                        <td><strong>{{ $match->home_team }}</strong> <span class="text-muted mx-1">vs</span> <strong>{{ $match->away_team }}</strong></td>
                        <td>
                            <div class="fw-bold">{{ $match->match_date }}</div>
                            <small class="text-muted"><i class="bi bi-clock"></i> {{ $match->match_time }} - {{ $match->Finish_time }}</small>
                        </td>
                        <td>{{ $match->stadium }}</td>
                        <td><span class="badge {{ $match->location_type === 'Home' ? 'bg-primary' : 'bg-dark' }}">{{ $match->location_type }}</span></td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary edit-match-btn me-1"
                                    data-id="{{ $match->id }}"
                                    data-home="{{ $match->home_team }}"
                                    data-away="{{ $match->away_team }}"
                                    data-date="{{ $match->match_date }}"
                                    data-time="{{ $match->match_time }}"
                                    data-finish="{{ $match->Finish_time }}"
                                    data-stadium="{{ $match->stadium }}"
                                    data-location="{{ $match->location_type }}"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.matches.destroy', $match->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this match fixture layout?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center py-4 text-muted">No matches scheduled in system records.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
