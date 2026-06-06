<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | XO United</title>
    <?php if (isset($component)) { $__componentOriginal82e3f864bb766fbb95cb0a10b750823c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82e3f864bb766fbb95cb0a10b750823c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.favicon','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('favicon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82e3f864bb766fbb95cb0a10b750823c)): ?>
<?php $attributes = $__attributesOriginal82e3f864bb766fbb95cb0a10b750823c; ?>
<?php unset($__attributesOriginal82e3f864bb766fbb95cb0a10b750823c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82e3f864bb766fbb95cb0a10b750823c)): ?>
<?php $component = $__componentOriginal82e3f864bb766fbb95cb0a10b750823c; ?>
<?php unset($__componentOriginal82e3f864bb766fbb95cb0a10b750823c); ?>
<?php endif; ?>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
<body class="admin-body">

<div class="admin-layout">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-stripe"></div>
        <div class="admin-brand">
            <img src="<?php echo e(asset('img/XO.png')); ?>" alt="XO United">
            <div class="admin-brand-text">
                <h4>XO Admin</h4>
                <p>Control Panel</p>
            </div>
        </div>
        <ul class="admin-nav nav flex-column">
            <li><a href="#overview" class="nav-link active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="#players-sec" class="nav-link"><i class="bi bi-people"></i> Squad Players</a></li>
            <li><a href="#managers-sec" class="nav-link"><i class="bi bi-person-badge"></i> Management</a></li>
            <li><a href="#matches-sec" class="nav-link"><i class="bi bi-calendar-event"></i> Match Fixtures</a></li>
            <li><a href="#standings-sec" class="nav-link"><i class="bi bi-trophy"></i> League Standings</a></li>
            <li>
                <a href="#messages-sec" class="nav-link">
                    <i class="bi bi-envelope"></i> Inbox Messages
                    <span class="sidebar-inbox-badge <?php echo e($new_messages_count > 0 ? '' : 'd-none'); ?>" id="sidebar-inbox-badge"><?php echo e($new_messages_count); ?></span>
                </a>
            </li>
        </ul>
        <div class="admin-sidebar-footer">
            <a href="<?php echo e(url('/')); ?>" target="_blank"><i class="bi bi-box-arrow-up-right"></i> View Public Site</a>
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="mt-3">
                <?php echo csrf_field(); ?>
                <button type="submit" class="admin-logout-btn"><i class="bi bi-box-arrow-right"></i> Log Out</button>
            </form>
        </div>
    </aside>

    <main class="admin-main">

            <?php if(session('success')): ?>
                <div class="alert admin-alert admin-alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert admin-alert admin-alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <ul class="mb-0 ps-3">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="admin-topbar" id="overview">
                <div>
                    <h1>Club Management Dashboard</h1>
                    <p>Manage players, staff, fixtures, standings, and messages.</p>
                </div>
                <span class="admin-season-badge">Season 2025/26</span>
            </div>

            <div class="admin-stats">
                <div class="admin-stat-card">
                    <div class="admin-stat-icon admin-stat-icon--players"><i class="bi bi-people-fill"></i></div>
                    <div>
                        <p class="admin-stat-label">Squad Players</p>
                        <p class="admin-stat-value"><?php echo e($players_count); ?></p>
                        <p class="admin-stat-sub">Registered</p>
                    </div>
                </div>
                <div class="admin-stat-card">
                    <div class="admin-stat-icon admin-stat-icon--staff"><i class="bi bi-person-badge-fill"></i></div>
                    <div>
                        <p class="admin-stat-label">Staff</p>
                        <p class="admin-stat-value"><?php echo e($managers_count); ?></p>
                        <p class="admin-stat-sub">Active</p>
                    </div>
                </div>
                <div class="admin-stat-card">
                    <div class="admin-stat-icon admin-stat-icon--matches"><i class="bi bi-calendar-event-fill"></i></div>
                    <div>
                        <p class="admin-stat-label">Match Fixtures</p>
                        <p class="admin-stat-value"><?php echo e($matches_count); ?></p>
                        <p class="admin-stat-sub">Scheduled</p>
                    </div>
                </div>
                <div class="admin-stat-card">
                    <div class="admin-stat-icon admin-stat-icon--inbox"><i class="bi bi-envelope-fill"></i></div>
                    <div>
                        <p class="admin-stat-label">Inbox</p>
                        <p class="admin-stat-value"><?php echo e($total_messages_count); ?></p>
                        <p class="admin-stat-sub"><?php echo e($new_messages_count); ?> unread</p>
                    </div>
                </div>
            </div>

            <?php echo $__env->make('admin.components.squad-players', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('admin.components.management-staff', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('admin.components.match-fixtures', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('admin.components.league-standings', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('admin.components.message-inbox', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    </main>
</div>

<div class="modal fade" id="createPlayerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" action="<?php echo e(route('admin.players.store')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?><div class="modal-header admin-modal-header"><h5>Add New Squad Player</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Player Full Name</label><input type="text" name="name" class="form-control" required></div><div class="mb-3"><label class="form-label">Jersey Number</label><input type="number" name="number" class="form-control" required></div><div class="mb-3"><label class="form-label">Position</label><select name="position" class="form-select" required><option value="">Select position</option><option value="GK">GK - Goalkeeper</option><option value="DF">DF - Defender</option><option value="MD">MD - Midfielder</option><option value="FW">FW - Forward</option></select></div><div class="mb-3"><label class="form-label">Profile Image</label><input type="file" name="image" class="form-control" required></div></div><div class="modal-footer admin-modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-success">Save Player</button></div></form></div>
</div>
<div class="modal fade" id="editPlayerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" id="editPlayerForm" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?><div class="modal-header admin-modal-header"><h5>Modify Player Records</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Player Name</label><input type="text" name="name" id="edit_player_name" class="form-control" required></div><div class="mb-3"><label class="form-label">Jersey Number</label><input type="number" name="number" id="edit_player_number" class="form-control" required></div><div class="mb-3"><label class="form-label">Position</label><select name="position" id="edit_player_position" class="form-select" required><option value="GK">GK - Goalkeeper</option><option value="DF">DF - Defender</option><option value="MD">MD - Midfielder</option><option value="FW">FW - Forward</option></select></div><div class="mb-3"><label class="form-label">Replace Image</label><input type="file" name="image" class="form-control"></div></div><div class="modal-footer admin-modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Update Records</button></div></form></div>
</div>

<div class="modal fade" id="createManagerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" action="<?php echo e(route('admin.managers.store')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?><div class="modal-header admin-modal-header"><h5>Add New Staff Member</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Staff Member Name</label><input type="text" name="name" class="form-control" required></div><div class="mb-3"><label class="form-label">Assigned Role</label><input type="text" name="role" class="form-control" required></div><div class="mb-3"><label class="form-label">Photo Image</label><input type="file" name="image" class="form-control" required></div></div><div class="modal-footer admin-modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-success">Save Staff</button></div></form></div>
</div>
<div class="modal fade" id="editManagerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" id="editManagerForm" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?><div class="modal-header admin-modal-header"><h5>Modify Staff Records</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Staff Name</label><input type="text" name="name" id="edit_manager_name" class="form-control" required></div><div class="mb-3"><label class="form-label">Assigned Role</label><input type="text" name="role" id="edit_manager_role" class="form-control" required></div><div class="mb-3"><label class="form-label">Replace Image</label><input type="file" name="image" class="form-control"></div></div><div class="modal-footer admin-modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Update Details</button></div></form></div>
</div>

<div class="modal fade" id="createMatchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" action="<?php echo e(route('admin.matches.store')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?><div class="modal-header admin-modal-header"><h5>Create New Match</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Home Team</label><input type="text" name="home_team" class="form-control" required></div><div class="mb-3"><label class="form-label">Away Team</label><input type="text" name="away_team" class="form-control" required></div><div class="mb-3"><label class="form-label">Match Date</label><input type="date" name="match_date" class="form-control" required></div><div class="row"><div class="col-6 mb-3"><label class="form-label">Kickoff</label><input type="time" name="match_time" class="form-control" required></div><div class="col-6 mb-3"><label class="form-label">Finish</label><input type="time" name="finish_time" class="form-control" required></div></div><div class="mb-3"><label class="form-label">Stadium</label><input type="text" name="stadium" class="form-control" required></div><div class="mb-3"><label class="form-label">Location Type</label><select name="location_type" class="form-select" required><option value="Home">Home Match</option><option value="Away">Away Match</option></select></div><div class="row"><div class="col-6 mb-3"><label class="form-label">Home Team Logo</label><input type="file" name="home_logo" class="form-control" accept="image/*"><small class="text-muted">Optional — e.g. XO.png</small></div><div class="col-6 mb-3"><label class="form-label">Away Team Logo</label><input type="file" name="away_logo" class="form-control" accept="image/*"><small class="text-muted">Optional — e.g. VSK.png</small></div></div></div><div class="modal-footer admin-modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-success">Schedule Match</button></div></form></div>
</div>
<div class="modal fade" id="editMatchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><form class="modal-content" id="editMatchForm" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?><div class="modal-header admin-modal-header"><h5>Modify Match Fixture</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="mb-3"><label class="form-label">Home Team</label><input type="text" name="home_team" id="edit_home_team" class="form-control" required></div><div class="mb-3"><label class="form-label">Away Team</label><input type="text" name="away_team" id="edit_away_team" class="form-control" required></div><div class="mb-3"><label class="form-label">Match Date</label><input type="date" name="match_date" id="edit_match_date" class="form-control" required></div><div class="row"><div class="col-6 mb-3"><label class="form-label">Kickoff</label><input type="time" name="match_time" id="edit_match_time" class="form-control" required></div><div class="col-6 mb-3"><label class="form-label">Finish</label><input type="time" name="finish_time" id="edit_finish_time" class="form-control" required></div></div><div class="mb-3"><label class="form-label">Stadium</label><input type="text" name="stadium" id="edit_stadium" class="form-control" required></div><div class="mb-3"><label class="form-label">Location Type</label><select name="location_type" id="edit_location_type" class="form-select" required><option value="Home">Home Match</option><option value="Away">Away Match</option></select></div><div class="row"><div class="col-6 mb-3"><label class="form-label">Home Team Logo</label><div class="d-flex align-items-center gap-2 mb-2"><img id="edit_match_home_logo_preview" src="" alt="Home logo" class="rounded border d-none" style="width:40px;height:40px;object-fit:contain;"><span class="text-muted small" id="edit_match_home_logo_hint">No logo uploaded</span></div><input type="file" name="home_logo" class="form-control" accept="image/*"></div><div class="col-6 mb-3"><label class="form-label">Away Team Logo</label><div class="d-flex align-items-center gap-2 mb-2"><img id="edit_match_away_logo_preview" src="" alt="Away logo" class="rounded border d-none" style="width:40px;height:40px;object-fit:contain;"><span class="text-muted small" id="edit_match_away_logo_hint">No logo uploaded</span></div><input type="file" name="away_logo" class="form-control" accept="image/*"></div></div></div><div class="modal-footer admin-modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Update Fixture</button></div></form></div>
</div>

<div class="modal fade" id="createStandingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg"><form class="modal-content" action="<?php echo e(route('admin.standings.store')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?><div class="modal-header admin-modal-header"><h5>Add Club to Standings</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="row"><div class="col-md-4 mb-3"><label class="form-label">Position</label><input type="number" name="position" class="form-control" min="1" required></div><div class="col-md-8 mb-3"><label class="form-label">Club Name</label><input type="text" name="club_name" class="form-control" required></div></div><div class="row"><div class="col-3 mb-3"><label class="form-label">Played</label><input type="number" name="played" class="form-control" min="0" value="0" required></div><div class="col-3 mb-3"><label class="form-label">Won</label><input type="number" name="won" class="form-control" min="0" value="0" required></div><div class="col-3 mb-3"><label class="form-label">Drawn</label><input type="number" name="drawn" class="form-control" min="0" value="0" required></div><div class="col-3 mb-3"><label class="form-label">Lost</label><input type="number" name="lost" class="form-control" min="0" value="0" required></div></div><div class="row"><div class="col-4 mb-3"><label class="form-label">Goals For</label><input type="number" name="goals_for" class="form-control" min="0" value="0" required></div><div class="col-4 mb-3"><label class="form-label">Goals Against</label><div class="input-group"><button type="button" class="btn btn-outline-secondary standing-ga-subtract" title="Subtract">−</button><input type="number" name="goals_against" class="form-control text-center standing-ga-input" min="0" value="0" required><button type="button" class="btn btn-outline-secondary standing-ga-add" title="Add">+</button></div></div><div class="col-4 mb-3"><label class="form-label">Points</label><input type="number" name="points" class="form-control" min="0" value="0" required></div></div><div class="mb-3"><label class="form-label fw-bold">Club Logo</label><input type="file" name="logo" class="form-control" accept="image/*"><small class="text-muted">Upload PNG or JPG club badge (recommended 100x100px)</small></div></div><div class="modal-footer admin-modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-success">Save Club</button></div></form></div>
</div>
<div class="modal fade" id="editStandingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg"><form class="modal-content" id="editStandingForm" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?><div class="modal-header admin-modal-header"><h5>Edit League Standing</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="row"><div class="col-md-4 mb-3"><label class="form-label">Position</label><input type="number" name="position" id="edit_standing_position" class="form-control" min="1" required></div><div class="col-md-8 mb-3"><label class="form-label">Club Name</label><input type="text" name="club_name" id="edit_standing_club" class="form-control" required></div></div><div class="row"><div class="col-3 mb-3"><label class="form-label">Played</label><input type="number" name="played" id="edit_standing_played" class="form-control" min="0" required></div><div class="col-3 mb-3"><label class="form-label">Won</label><input type="number" name="won" id="edit_standing_won" class="form-control" min="0" required></div><div class="col-3 mb-3"><label class="form-label">Drawn</label><input type="number" name="drawn" id="edit_standing_drawn" class="form-control" min="0" required></div><div class="col-3 mb-3"><label class="form-label">Lost</label><input type="number" name="lost" id="edit_standing_lost" class="form-control" min="0" required></div></div><div class="row"><div class="col-4 mb-3"><label class="form-label">Goals For</label><input type="number" name="goals_for" id="edit_standing_gf" class="form-control" min="0" required></div><div class="col-4 mb-3"><label class="form-label">Goals Against</label><div class="input-group"><button type="button" class="btn btn-outline-secondary standing-ga-subtract" title="Subtract">−</button><input type="number" name="goals_against" id="edit_standing_ga" class="form-control text-center standing-ga-input" min="0" required><button type="button" class="btn btn-outline-secondary standing-ga-add" title="Add">+</button></div></div><div class="col-4 mb-3"><label class="form-label">Points</label><input type="number" name="points" id="edit_standing_points" class="form-control" min="0" required></div></div><div class="mb-3"><label class="form-label fw-bold">Club Logo</label><div class="d-flex align-items-center gap-3 mb-2"><img id="edit_standing_logo_preview" src="" alt="Current logo" class="rounded-circle border d-none" style="width: 50px; height: 50px; object-fit: cover;"><span class="text-muted small" id="edit_standing_logo_hint">No logo uploaded</span></div><input type="file" name="logo" class="form-control" accept="image/*"><small class="text-muted">Choose a new image to replace the current logo</small></div></div><div class="modal-footer admin-modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Update Standing</button></div></form></div>
</div>

<div class="modal fade" id="viewMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content border-0 shadow-lg"><div class="modal-header admin-modal-header"><h5 class="modal-title fw-bold"><i class="bi bi-envelope-open me-2"></i> Message Details</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body p-4"><div class="mb-3"><label class="text-muted small fw-bold text-uppercase d-block">Sender Name</label><div id="modal_msg_name" class="fs-5 fw-bold text-dark"></div></div><div class="mb-3"><label class="text-muted small fw-bold text-uppercase d-block">Email Address</label><div id="modal_msg_email" class="text-secondary"></div></div><div class="mb-3"><label class="text-muted small fw-bold text-uppercase d-block">Subject</label><span id="modal_msg_subject" class="badge bg-danger px-2 py-1"></span></div><hr class="my-3"><div class="mb-1"><label class="text-muted small fw-bold text-uppercase d-block">Message Content</label><div id="modal_msg_body" class="p-3 bg-light rounded text-dark text-wrap" style="white-space: pre-wrap; word-break: break-word;"></div></div></div><div class="modal-footer admin-modal-footer bg-light"><button type="button" class="btn btn-secondary fw-bold shadow-sm" data-bs-dismiss="modal">Close Window</button></div></div></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Sidebar scroll spy — highlight active menu item while scrolling
    const navLinks = document.querySelectorAll('.admin-nav .nav-link');
    const sectionIds = ['overview', 'players-sec', 'managers-sec', 'matches-sec', 'standings-sec', 'messages-sec'];
    const sections = sectionIds.map(id => document.getElementById(id)).filter(Boolean);

    function setActiveNav(sectionId) {
        navLinks.forEach(link => {
            link.classList.toggle('active', link.getAttribute('href') === '#' + sectionId);
        });
    }

    function getCurrentSection() {
        const offset = 120;
        let current = sections[0]?.id || 'overview';
        sections.forEach(section => {
            if (window.scrollY >= section.offsetTop - offset) {
                current = section.id;
            }
        });
        return current;
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.getAttribute('href').slice(1);
            const target = document.getElementById(id);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.replaceState(null, '', '#' + id);
                setActiveNav(id);
            }
        });
    });

    let scrollTicking = false;
    window.addEventListener('scroll', function () {
        if (!scrollTicking) {
            scrollTicking = true;
            requestAnimationFrame(function () {
                setActiveNav(getCurrentSection());
                scrollTicking = false;
            });
        }
    }, { passive: true });

    if (window.location.hash) {
        const id = window.location.hash.slice(1);
        if (sectionIds.includes(id)) {
            setActiveNav(id);
            setTimeout(() => document.getElementById(id)?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
        }
    } else {
        setActiveNav(getCurrentSection());
    }

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

    // Goals Against subtract/add steppers
    document.querySelectorAll('.standing-ga-subtract').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('.standing-ga-input');
            input.value = Math.max(0, parseInt(input.value || 0, 10) - 1);
        });
    });
    document.querySelectorAll('.standing-ga-add').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('.standing-ga-input');
            input.value = parseInt(input.value || 0, 10) + 1;
        });
    });

    // Edit Standing Hook
    const standingModal = new bootstrap.Modal(document.getElementById('editStandingModal'));
    document.querySelectorAll('.edit-standing-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('editStandingForm').action = '/admin/standings/' + this.getAttribute('data-id');
            document.getElementById('edit_standing_position').value = this.getAttribute('data-position');
            document.getElementById('edit_standing_club').value = this.getAttribute('data-club');
            document.getElementById('edit_standing_played').value = this.getAttribute('data-played');
            document.getElementById('edit_standing_won').value = this.getAttribute('data-won');
            document.getElementById('edit_standing_drawn').value = this.getAttribute('data-drawn');
            document.getElementById('edit_standing_lost').value = this.getAttribute('data-lost');
            document.getElementById('edit_standing_gf').value = this.getAttribute('data-gf');
            document.getElementById('edit_standing_ga').value = this.getAttribute('data-ga');
            document.getElementById('edit_standing_points').value = this.getAttribute('data-points');
            const logoPreview = document.getElementById('edit_standing_logo_preview');
            const logoHint = document.getElementById('edit_standing_logo_hint');
            const logoUrl = this.getAttribute('data-logo');
            if (logoUrl) {
                logoPreview.src = logoUrl;
                logoPreview.classList.remove('d-none');
                logoHint.textContent = 'Current logo:';
            } else {
                logoPreview.classList.add('d-none');
                logoHint.textContent = 'No logo uploaded';
            }
            standingModal.show();
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

            const homeLogoPreview = document.getElementById('edit_match_home_logo_preview');
            const awayLogoPreview = document.getElementById('edit_match_away_logo_preview');
            const homeLogoHint = document.getElementById('edit_match_home_logo_hint');
            const awayLogoHint = document.getElementById('edit_match_away_logo_hint');
            const homeLogoUrl = this.getAttribute('data-home-logo');
            const awayLogoUrl = this.getAttribute('data-away-logo');

            if (homeLogoUrl) {
                homeLogoPreview.src = homeLogoUrl;
                homeLogoPreview.classList.remove('d-none');
                homeLogoHint.textContent = 'Current home logo:';
            } else {
                homeLogoPreview.classList.add('d-none');
                homeLogoHint.textContent = 'No logo uploaded';
            }

            if (awayLogoUrl) {
                awayLogoPreview.src = awayLogoUrl;
                awayLogoPreview.classList.remove('d-none');
                awayLogoHint.textContent = 'Current away logo:';
            } else {
                awayLogoPreview.classList.add('d-none');
                awayLogoHint.textContent = 'No logo uploaded';
            }

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

            if (this.classList.contains('admin-row-unread')) {
                const rowElement = this;
                const statusBox = document.getElementById(`read-status-box-${id}`);
                const badge = document.getElementById(`unread-badge-${id}`);

                fetch(`/admin/messages/${id}/read`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>', 'Content-Type': 'application/json', 'Accept': 'application/json' }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        rowElement.classList.remove('admin-row-unread');
                        if (badge) badge.remove();
                        if (statusBox) statusBox.innerHTML = '<span class="text-success small me-2"><i class="bi bi-check-all fs-5"></i> Read</span>';

                        const sidebarBadge = document.getElementById('sidebar-inbox-badge');
                        if (sidebarBadge) {
                            const count = parseInt(sidebarBadge.textContent, 10) - 1;
                            if (count <= 0) {
                                sidebarBadge.classList.add('d-none');
                                sidebarBadge.textContent = '0';
                            } else {
                                sidebarBadge.textContent = count;
                            }
                        }
                    }
                });
            }
        });
    });
});
</script>
</body>
</html>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>