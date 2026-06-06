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
                    <?php $__empty_1 = true; $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4">
                            <?php if($player->image): ?>
                                <img src="<?php echo e(media_asset($player->image)); ?>" alt="<?php echo e($player->name); ?>" class="admin-avatar">
                            <?php else: ?>
                                <div class="admin-avatar-fallback">N/A</div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-semibold"><?php echo e($player->name); ?></td>
                        <td><span class="admin-badge">#<?php echo e($player->number); ?></span></td>
                        <td><span class="admin-badge-pos"><?php echo e($player->position); ?></span></td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary admin-btn-icon edit-player-btn me-1" data-id="<?php echo e($player->id); ?>" data-name="<?php echo e($player->name); ?>" data-number="<?php echo e($player->number); ?>" data-position="<?php echo e($player->position); ?>"><i class="bi bi-pencil-square"></i></button>
                            <form action="<?php echo e(route('admin.players.destroy', $player->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Remove player permanently?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger admin-btn-icon"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="admin-empty">No squad players registered yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/admin/components/squad-players.blade.php ENDPATH**/ ?>