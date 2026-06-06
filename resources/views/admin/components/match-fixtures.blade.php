<div class="admin-panel" id="matches-sec">
    <div class="admin-panel-head">
        <div class="admin-panel-title">
            <span class="admin-panel-icon"><i class="bi bi-calendar-event"></i></span>
            <div>
                <h5>Match Fixtures</h5>
                <p>Schedule and manage upcoming matches</p>
            </div>
        </div>
        <button class="btn admin-btn-add" data-bs-toggle="modal" data-bs-target="#createMatchModal"><i class="bi bi-plus-lg"></i> Add Match</button>
    </div>
    <div class="admin-panel-body">
        <div class="admin-match-grid">
            @forelse($matches as $match)
                <x-admin-match-card :match="$match" />
            @empty
                <div class="admin-match-empty">
                    <i class="bi bi-calendar-x display-6 text-muted"></i>
                    <p class="text-muted mb-0 mt-2">No matches scheduled yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
