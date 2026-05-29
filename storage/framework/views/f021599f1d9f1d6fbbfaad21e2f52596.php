<div class="card shadow-sm mb-4" id="messages-sec">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 fw-bold text-dark"><i class="bi bi-envelope me-2"></i>User Message Inbox Logs</h5>
        <?php if($new_messages_count > 0): ?>
            <span class="badge bg-danger rounded-pill px-3 py-2">
                <?php echo e($new_messages_count); ?> New Alert(s)
            </span>
        <?php endif; ?>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Sender Profile</th>
                        <th>Message Details Block</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr id="message-row-<?php echo e($message->id); ?>"
                        class="view-message-trigger <?php echo e($message->is_read == 0 ? 'table-primary fw-bold' : 'text-muted'); ?>"
                        style="cursor: pointer; transition: background-color 0.2s;"
                        data-id="<?php echo e($message->id); ?>"
                        data-name="<?php echo e($message->name); ?>"
                        data-email="<?php echo e($message->email); ?>"
                        data-subject="<?php echo e($message->subject ?? 'General Inquiry'); ?>"
                        data-message="<?php echo e($message->message); ?>">

                        <td class="ps-4">
                            <div class="text-dark d-flex align-items-center">
                                <span><?php echo e($message->name); ?></span>
                                <?php if($message->is_read == 0): ?>
                                    <span class="badge bg-danger ms-2" id="unread-badge-<?php echo e($message->id); ?>" style="font-size: 10px;">NEW</span>
                                <?php endif; ?>
                            </div>
                            <small class="text-muted d-block"><?php echo e($message->email); ?></small>
                        </td>
                        <td>
                            <div class="text-truncate text-secondary" style="max-width: 400px;">
                                <?php echo e($message->message); ?>

                            </div>
                        </td>
                        <td class="text-center pe-4" onclick="event.stopPropagation();">
                            <div class="d-inline" id="read-status-box-<?php echo e($message->id); ?>">
                                <?php if($message->is_read == 0): ?>
                                <button type="button" class="btn btn-sm btn-outline-primary mark-read-btn me-1" data-id="<?php echo e($message->id); ?>">
                                    <i class="bi bi-check2-circle"></i>
                                </button>
                                <?php else: ?>
                                <span class="text-success small me-2"><i class="bi bi-check-all fs-5"></i> Read</span>
                                <?php endif; ?>
                            </div>

                            <form action="<?php echo e(route('admin.messages.destroy', $message->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Permanently clear this entry from database?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>

                            <form action="<?php echo e(route('admin.messages.block', $message->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Block this address and erase histories?');">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm btn-outline-dark ms-1"><i class="bi bi-slash-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="3" class="text-center py-4 text-muted">Inbox folder empty. No contact requests received.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\testing\resources\views/admin/components/message-inbox.blade.php ENDPATH**/ ?>