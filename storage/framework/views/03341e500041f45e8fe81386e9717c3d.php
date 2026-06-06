<div class="admin-panel" id="messages-sec">
    <div class="admin-panel-head">
        <div class="admin-panel-title">
            <span class="admin-panel-icon"><i class="bi bi-envelope"></i></span>
            <div>
                <h5>Inbox Messages</h5>
                <p>Contact form submissions from users</p>
            </div>
        </div>
        <?php if($new_messages_count > 0): ?>
            <span class="admin-alert-new"><?php echo e($new_messages_count); ?> New</span>
        <?php endif; ?>
    </div>
    <div class="admin-panel-body">
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Sender</th>
                        <th>Message</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr id="message-row-<?php echo e($message->id); ?>"
                        class="view-message-trigger <?php echo e($message->is_read == 0 ? 'admin-row-unread' : ''); ?>"
                        data-id="<?php echo e($message->id); ?>"
                        data-name="<?php echo e($message->name); ?>"
                        data-email="<?php echo e($message->email); ?>"
                        data-subject="<?php echo e($message->subject ?? 'General Inquiry'); ?>"
                        data-message="<?php echo e($message->message); ?>">

                        <td class="ps-4">
                            <div class="fw-semibold d-flex align-items-center">
                                <span><?php echo e($message->name); ?></span>
                                <?php if($message->is_read == 0): ?>
                                    <span class="badge bg-danger ms-2" id="unread-badge-<?php echo e($message->id); ?>">NEW</span>
                                <?php endif; ?>
                            </div>
                            <small class="text-muted d-block"><?php echo e($message->email); ?></small>
                        </td>
                        <td>
                            <div class="text-truncate text-secondary admin-message-preview">
                                <?php echo e($message->message); ?>

                            </div>
                        </td>
                        <td class="text-center pe-4" onclick="event.stopPropagation();">
                            <div class="d-inline" id="read-status-box-<?php echo e($message->id); ?>">
                                <?php if($message->is_read == 0): ?>
                                <button type="button" class="btn btn-sm btn-outline-primary admin-btn-icon mark-read-btn me-1" data-id="<?php echo e($message->id); ?>">
                                    <i class="bi bi-check2-circle"></i>
                                </button>
                                <?php else: ?>
                                <span class="text-success small me-2"><i class="bi bi-check-all"></i> Read</span>
                                <?php endif; ?>
                            </div>

                            <form action="<?php echo e(route('admin.messages.destroy', $message->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Permanently delete this message?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger admin-btn-icon"><i class="bi bi-trash"></i></button>
                            </form>

                            <form action="<?php echo e(route('admin.messages.block', $message->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Block this sender?');">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm btn-outline-secondary admin-btn-icon ms-1"><i class="bi bi-slash-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="3" class="admin-empty">No messages received yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/admin/components/message-inbox.blade.php ENDPATH**/ ?>