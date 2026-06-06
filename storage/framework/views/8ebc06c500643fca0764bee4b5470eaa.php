<div class="admin-panel" id="managers-sec">
    <div class="admin-panel-head">
        <div class="admin-panel-title">
            <span class="admin-panel-icon"><i class="bi bi-person-badge"></i></span>
            <div>
                <h5>Management & Staff</h5>
                <p>Coaches and staff behind the squad</p>
            </div>
        </div>
        <button class="btn admin-btn-add" data-bs-toggle="modal" data-bs-target="#createManagerModal"><i class="bi bi-plus-lg"></i> Add Staff</button>
    </div>
    <div class="admin-panel-body">
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Photo</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4">
                            <?php if($manager->image): ?>
                                <img src="<?php echo e(media_asset($manager->image)); ?>" alt="<?php echo e($manager->name); ?>" class="admin-avatar">
                            <?php else: ?>
                                <div class="admin-avatar-fallback">N/A</div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-semibold"><?php echo e($manager->name); ?></td>
                        <td><?php echo e($manager->role); ?></td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary admin-btn-icon edit-manager-btn me-1" data-id="<?php echo e($manager->id); ?>" data-name="<?php echo e($manager->name); ?>" data-role="<?php echo e($manager->role); ?>"><i class="bi bi-pencil-square"></i></button>
                            <form action="<?php echo e(route('admin.managers.destroy', $manager->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Remove staff record permanently?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger admin-btn-icon"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="admin-empty">No management staff registered.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/admin/components/management-staff.blade.php ENDPATH**/ ?>