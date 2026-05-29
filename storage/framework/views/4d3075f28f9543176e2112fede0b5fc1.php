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
                    <?php $__empty_1 = true; $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4">
                            <?php if($match->image): ?>
                                <img src="<?php echo e(asset('storage/' . $match->image)); ?>" class="rounded shadow-sm" style="width: 55px; height: 38px; object-fit: cover;">
                            <?php endif; ?>
                        </td>
                        <td><strong><?php echo e($match->home_team); ?></strong> <span class="text-muted mx-1">vs</span> <strong><?php echo e($match->away_team); ?></strong></td>
                        <td>
                            <div class="fw-bold"><?php echo e($match->match_date); ?></div>
                            <small class="text-muted"><i class="bi bi-clock"></i> <?php echo e($match->match_time); ?> - <?php echo e($match->Finish_time); ?></small>
                        </td>
                        <td><?php echo e($match->stadium); ?></td>
                        <td><span class="badge <?php echo e($match->location_type === 'Home' ? 'bg-primary' : 'bg-dark'); ?>"><?php echo e($match->location_type); ?></span></td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary edit-match-btn me-1"
                                    data-id="<?php echo e($match->id); ?>"
                                    data-home="<?php echo e($match->home_team); ?>"
                                    data-away="<?php echo e($match->away_team); ?>"
                                    data-date="<?php echo e($match->match_date); ?>"
                                    data-time="<?php echo e($match->match_time); ?>"
                                    data-finish="<?php echo e($match->Finish_time); ?>"
                                    data-stadium="<?php echo e($match->stadium); ?>"
                                    data-location="<?php echo e($match->location_type); ?>"><i class="bi bi-pencil-square"></i></button>
                            <form action="<?php echo e(route('admin.matches.destroy', $match->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this match fixture layout?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="text-center py-4 text-muted">No matches scheduled in system records.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\testing\resources\views/admin/components/match-fixtures.blade.php ENDPATH**/ ?>