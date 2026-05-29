<div class="card shadow-sm mb-5" id="managers-sec">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 fw-bold text-dark"><i class="bi bi-person-badge me-2"></i>Management & Coaching Staff</h5>
        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createManagerModal"><i class="bi bi-plus-lg"></i> Add Staff Member</button>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Photo</th>
                        <th>Staff Member Name</th>
                        <th>Assigned Role</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4">
                            <?php if($manager->image): ?>
                                <img src="<?php echo e(asset('storage/' . $manager->image)); ?>" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">N/A</div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold"><?php echo e($manager->name); ?></td>
                        <td><?php echo e($manager->role); ?></td>
                        <td class="text-center pe-4">
                            <button class="btn btn-sm btn-outline-primary edit-manager-btn me-1" data-id="<?php echo e($manager->id); ?>" data-name="<?php echo e($manager->name); ?>" data-role="<?php echo e($manager->role); ?>"><i class="bi bi-pencil-square"></i></button>
                            <form action="<?php echo e(route('admin.managers.destroy', $manager->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Remove staff record permanently?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="text-center py-4 text-muted">No management staff registered.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\testing\resources\views/admin/components/management-staff.blade.php ENDPATH**/ ?>