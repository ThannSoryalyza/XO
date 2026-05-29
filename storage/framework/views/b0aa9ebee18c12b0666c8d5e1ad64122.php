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
                    <?php $__empty_1 = true; $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4">
                            <?php if($player->image): ?>
                                <img src="<?php echo e(asset( $player->image)); ?>" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">N/A</div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold"><?php echo e($player->name); ?></td>
                        <td><span class="badge bg-secondary"># <?php echo e($player->number); ?></span></td>
                        <td><?php echo e($player->position); ?></td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary edit-player-btn me-1" data-id="<?php echo e($player->id); ?>" data-name="<?php echo e($player->name); ?>" data-number="<?php echo e($player->number); ?>" data-position="<?php echo e($player->position); ?>"><i class="bi bi-pencil-square"></i></button>
                            <form action="<?php echo e(route('admin.players.destroy', $player->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Remove player permanently?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center py-4 text-muted">No squad players registered yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\testing\resources\views/admin/components/squad-players.blade.php ENDPATH**/ ?>