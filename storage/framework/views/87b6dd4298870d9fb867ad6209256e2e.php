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
                    <?php $__empty_1 = true; $__currentLoopData = $standings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4">
                            <?php if($team->logo): ?>
                                <img src="<?php echo e(media_asset($team->logo)); ?>" alt="<?php echo e($team->club_name); ?>" class="admin-avatar rounded-circle">
                            <?php else: ?>
                                <div class="admin-avatar-fallback rounded-circle">N/A</div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold text-danger"><?php echo e($team->position); ?></td>
                        <td class="fw-semibold"><?php echo e($team->club_name); ?></td>
                        <td class="text-center"><?php echo e($team->played); ?></td>
                        <td class="text-center"><?php echo e($team->won); ?></td>
                        <td class="text-center"><?php echo e($team->drawn); ?></td>
                        <td class="text-center"><?php echo e($team->lost); ?></td>
                        <td class="text-center"><?php echo e($team->goals_for); ?></td>
                        <td class="text-center fw-medium text-danger">-<?php echo e($team->goals_against); ?></td>
                        <td class="text-center"><?php echo e($team->goal_difference >= 0 ? '+' : ''); ?><?php echo e($team->goal_difference); ?></td>
                        <td class="text-center fw-bold"><?php echo e($team->points); ?></td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary admin-btn-icon edit-standing-btn me-1"
                                    data-id="<?php echo e($team->id); ?>"
                                    data-logo="<?php echo e($team->logo ? media_asset($team->logo) : ''); ?>"
                                    data-position="<?php echo e($team->position); ?>"
                                    data-club="<?php echo e($team->club_name); ?>"
                                    data-played="<?php echo e($team->played); ?>"
                                    data-won="<?php echo e($team->won); ?>"
                                    data-drawn="<?php echo e($team->drawn); ?>"
                                    data-lost="<?php echo e($team->lost); ?>"
                                    data-gf="<?php echo e($team->goals_for); ?>"
                                    data-ga="<?php echo e($team->goals_against); ?>"
                                    data-points="<?php echo e($team->points); ?>"><i class="bi bi-pencil-square"></i></button>
                            <form action="<?php echo e(route('admin.standings.destroy', $team->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Remove this club from standings?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger admin-btn-icon"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="12" class="admin-empty">No league standings added yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/admin/components/league-standings.blade.php ENDPATH**/ ?>