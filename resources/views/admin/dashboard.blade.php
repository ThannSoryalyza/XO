<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | XO United</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow-x: hidden; }
        .sidebar { position: fixed; top: 0; bottom: 0; left: 0; z-index: 100; padding: 20px 15px; background: #212529; color: #fff; }
        .sidebar .nav-link { color: rgba(255,255,255,0.75); transition: all 0.2s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background: rgba(255,255,255,0.1); border-radius: 4px; }
        .main-content { margin-left: auto; }
        .card-counter { border-left: 4px solid; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 sidebar d-md-block collapse">
            <div class="d-flex align-items-center mb-4 px-2">
                <img src="{{ asset('XO.png') }}" alt="Logo" class="me-2" style="width: 40px; height: 40px; object-fit: contain;">
                <h4 class="m-0 fw-bold">XO Admin</h4>
            </div>
            <hr>
            <ul class="nav flex-column gap-2">
                <li class="nav-item"><a href="#overview" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                <li class="nav-item"><a href="#players-sec" class="nav-link"><i class="bi bi-people me-2"></i> Squad Players</a></li>
                <li class="nav-item"><a href="#managers-sec" class="nav-link"><i class="bi bi-person-badge me-2"></i> Management</a></li>
                <li class="nav-item"><a href="#matches-sec" class="nav-link"><i class="bi bi-calendar-event me-2"></i> Match Fixtures</a></li>
                <li class="nav-item"><a href="#messages-sec" class="nav-link"><i class="bi bi-envelope me-2"></i> Inbox Messages</a></li>
            </ul>
        </nav>

        <main class="col-md-9 col-lg-10 main-content px-md-4 py-4">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="overview">
                <h1 class="h2 fw-bold">Club Management Dashboard</h1>
            </div>

            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4"><div class="card card-counter shadow-sm h-100 py-2 bg-white" style="border-left-color: #0d6efd;"><div class="card-body"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Squad Players</div><div class="h5 mb-0 font-weight-bold text-gray-800">{{ $players_count }} Registered</div></div></div></div>
                <div class="col-xl-3 col-md-6 mb-4"><div class="card card-counter shadow-sm h-100 py-2 bg-white" style="border-left-color: #198754;"><div class="card-body"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Staff</div><div class="h5 mb-0 font-weight-bold text-gray-800">{{ $managers_count }} Active</div></div></div></div>
                <div class="col-xl-3 col-md-6 mb-4"><div class="card card-counter shadow-sm h-100 py-2 bg-white" style="border-left-color: #0dcaf0;"><div class="card-body"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Match Fixtures</div><div class="h5 mb-0 font-weight-bold text-gray-800">{{ $matches_count }} Scheduled</div></div></div></div>
                <div class="col-xl-3 col-md-6 mb-4"><div class="card card-counter shadow-sm h-100 py-2 bg-white" style="border-left-color: #ffc107;"><div class="card-body"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Inbox Logs</div><div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_messages_count }} Inquiries</div></div></div></div>
            </div>

            @include('admin.components.squad-players')
            @include('admin.components.management-staff')
            @include('admin.components.match-fixtures')
            @include('admin.components.message-inbox')

        </main>
    </div>
</div>

<div class="modal fade" id="createPlayerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" action="{{ route('admin.players.store') }}" method="POST" enctype="multipart/form-data">@csrf<div class="modal-header bg-dark text-white"><h5>Add New Squad Player</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Player Full Name</label><input type="text" name="name" class="form-control" required></div><div class="mb-3"><label class="form-label">Jersey Number</label><input type="number" name="number" class="form-control" required></div><div class="mb-3"><label class="form-label">Position Role</label><input type="text" name="position" class="form-control" placeholder="e.g. Forward" required></div><div class="mb-3"><label class="form-label">Profile Image</label><input type="file" name="image" class="form-control" required></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-success">Save Player</button></div></form></div>
</div>
<div class="modal fade" id="editPlayerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" id="editPlayerForm" method="POST" enctype="multipart/form-data">@csrf @method('PUT')<div class="modal-header bg-primary text-white"><h5>Modify Player Records</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Player Name</label><input type="text" name="name" id="edit_player_name" class="form-control" required></div><div class="mb-3"><label class="form-label">Jersey Number</label><input type="number" name="number" id="edit_player_number" class="form-control" required></div><div class="mb-3"><label class="form-label">Position</label><input type="text" name="position" id="edit_player_position" class="form-control" required></div><div class="mb-3"><label class="form-label">Replace Image</label><input type="file" name="image" class="form-control"></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Update Records</button></div></form></div>
</div>

<div class="modal fade" id="createManagerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" action="{{ route('admin.managers.store') }}" method="POST" enctype="multipart/form-data">@csrf<div class="modal-header bg-dark text-white"><h5>Add New Staff Member</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Staff Member Name</label><input type="text" name="name" class="form-control" required></div><div class="mb-3"><label class="form-label">Assigned Role</label><input type="text" name="role" class="form-control" required></div><div class="mb-3"><label class="form-label">Photo Image</label><input type="file" name="image" class="form-control" required></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-success">Save Staff</button></div></form></div>
</div>
<div class="modal fade" id="editManagerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" id="editManagerForm" method="POST" enctype="multipart/form-data">@csrf @method('PUT')<div class="modal-header bg-primary text-white"><h5>Modify Staff Records</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Staff Name</label><input type="text" name="name" id="edit_manager_name" class="form-control" required></div><div class="mb-3"><label class="form-label">Assigned Role</label><input type="text" name="role" id="edit_manager_role" class="form-control" required></div><div class="mb-3"><label class="form-label">Replace Image</label><input type="file" name="image" class="form-control"></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Update Details</button></div></form></div>
</div>

<div class="modal fade" id="createMatchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" action="{{ route('admin.matches.store') }}" method="POST" enctype="multipart/form-data">@csrf<div class="modal-header bg-dark text-white"><h5>Create New Match</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Home Team</label><input type="text" name="home_team" class="form-control" required></div><div class="mb-3"><label class="form-label">Away Team</label><input type="text" name="away_team" class="form-control" required></div><div class="mb-3"><label class="form-label">Match Date</label><input type="date" name="match_date" class="form-control" required></div><div class="row"><div class="col-6 mb-3"><label class="form-label">Kickoff</label><input type="time" name="match_time" class="form-control" required></div><div class="col-6 mb-3"><label class="form-label">Finish</label><input type="time" name="finish_time" class="form-control" required></div></div><div class="mb-3"><label class="form-label">Stadium</label><input type="text" name="stadium" class="form-control" required></div><div class="mb-3"><label class="form-label">Location Type</label><select name="location_type" class="form-select" required><option value="Home">Home Match</option><option value="Away">Away Match</option></select></div><div class="mb-3"><label class="form-label">Banner Image</label><input type="file" name="image" class="form-control" required></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-success">Schedule Match</button></div></form></div>
</div>
<div class="modal fade" id="editMatchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" id="editMatchForm" method="POST" enctype="multipart/form-data">@csrf @method('PUT')<div class="modal-header bg-primary text-white"><h5>Modify Match Fixture</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Home Team</label><input type="text" name="home_team" id="edit_home_team" class="form-control" required></div><div class="mb-3"><label class="form-label">Away Team</label><input type="text" name="away_team" id="edit_away_team" class="form-control" required></div><div class="mb-3"><label class="form-label">Match Date</label><input type="date" name="match_date" id="edit_match_date" class="form-control" required></div><div class="row"><div class="col-6 mb-3"><label class="form-label">Kickoff</label><input type="time" name="match_time" id="edit_match_time" class="form-control" required></div><div class="col-6 mb-3"><label class="form-label">Finish</label><input type="time" name="finish_time" id="edit_finish_time" class="form-control" required></div></div><div class="mb-3"><label class="form-label">Stadium</label><input type="text" name="stadium" id="edit_stadium" class="form-control" required></div><div class="mb-3"><label class="form-label">Location Type</label><select name="location_type" id="edit_location_type" class="form-select" required><option value="Home">Home Match</option><option value="Away">Away Match</option></select></div><div class="mb-3"><label class="form-label">Replace Banner</label><input type="file" name="image" class="form-control"></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Update Fixture</button></div></form></div>
</div>

<div class="modal fade" id="viewMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content border-0 shadow-lg"><div class="modal-header bg-dark text-white"><h5 class="modal-title fw-bold"><i class="bi bi-envelope-open me-2"></i> Message Details</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body p-4"><div class="mb-3"><label class="text-muted small fw-bold text-uppercase d-block">Sender Name</label><div id="modal_msg_name" class="fs-5 fw-bold text-dark"></div></div><div class="mb-3"><label class="text-muted small fw-bold text-uppercase d-block">Email Address</label><div id="modal_msg_email" class="text-secondary"></div></div><div class="mb-3"><label class="text-muted small fw-bold text-uppercase d-block">Subject</label><span id="modal_msg_subject" class="badge bg-danger px-2 py-1"></span></div><hr class="my-3"><div class="mb-1"><label class="text-muted small fw-bold text-uppercase d-block">Message Content</label><div id="modal_msg_body" class="p-3 bg-light rounded text-dark text-wrap" style="white-space: pre-wrap; word-break: break-word;"></div></div></div><div class="modal-footer bg-light"><button type="button" class="btn btn-secondary fw-bold shadow-sm" data-bs-dismiss="modal">Close Window</button></div></div></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Edit Player Hook
    const playerModal = new bootstrap.Modal(document.getElementById('editPlayerModal'));
    document.querySelectorAll('.edit-player-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editPlayerForm').action = '/admin/players/' + this.getAttribute('data-id');
            document.getElementById('edit_player_name').value = this.getAttribute('data-name');
            document.getElementById('edit_player_number').value = this.getAttribute('data-number');
            document.getElementById('edit_player_position').value = this.getAttribute('data-position');
            playerModal.show();
        });
    });

    // Edit Manager Hook
    const managerModal = new bootstrap.Modal(document.getElementById('editManagerModal'));
    document.querySelectorAll('.edit-manager-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editManagerForm').action = '/admin/managers/' + this.getAttribute('data-id');
            document.getElementById('edit_manager_name').value = this.getAttribute('data-name');
            document.getElementById('edit_manager_role').value = this.getAttribute('data-role');
            managerModal.show();
        });
    });

    // Edit Match Hook
    const matchModal = new bootstrap.Modal(document.getElementById('editMatchModal'));
    document.querySelectorAll('.edit-match-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editMatchForm').action = '/admin/matches/' + this.getAttribute('data-id');
            document.getElementById('edit_home_team').value = this.getAttribute('data-home');
            document.getElementById('edit_away_team').value = this.getAttribute('data-away');
            document.getElementById('edit_match_date').value = this.getAttribute('data-date');
            document.getElementById('edit_match_time').value = this.getAttribute('data-time');
            document.getElementById('edit_finish_time').value = this.getAttribute('data-finish');
            document.getElementById('edit_stadium').value = this.getAttribute('data-stadium');
            document.getElementById('edit_location_type').value = this.getAttribute('data-location');
            matchModal.show();
        });
    });

    // Message Row Click & Read Status Trigger Hook
    const msgModal = new bootstrap.Modal(document.getElementById('viewMessageModal'));
    document.querySelectorAll('.view-message-trigger').forEach(row => {
        row.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            document.getElementById('modal_msg_name').innerText = this.getAttribute('data-name');
            document.getElementById('modal_msg_email').innerText = this.getAttribute('data-email');
            document.getElementById('modal_msg_subject').innerText = this.getAttribute('data-subject');
            document.getElementById('modal_msg_body').innerText = this.getAttribute('data-message');
            msgModal.show();

            if (this.classList.contains('table-primary')) {
                const rowElement = this;
                const statusBox = document.getElementById(`read-status-box-${id}`);
                const badge = document.getElementById(`unread-badge-${id}`);

                fetch(`/admin/messages/${id}/read`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json', 'Accept': 'application/json' }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        rowElement.classList.remove('table-primary', 'fw-bold');
                        rowElement.classList.add('text-muted');
                        if (badge) badge.remove();
                        if (statusBox) statusBox.innerHTML = '<span class="text-success small me-2"><i class="bi bi-check-all fs-5"></i> Read</span>';
                    }
                });
            }
        });
    });
});
</script>
</body>
</html>
