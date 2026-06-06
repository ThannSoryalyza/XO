<div class="admin-panel" id="matches-sec">
    <div class="admin-panel-head">
        <div class="admin-panel-title">
            <span class="admin-panel-icon"><i class="bi bi-calendar-event"></i></span>
            <div>
                <h5>Match Fixtures</h5>
                <p>Schedule and manage upcoming matches</p>
            </div>
        </div>
        <button class="btn admin-btn-add" data-bs-toggle="modal" data-bs-target="#createMatchModal"><i class="bi bi-plus-lg"></i> Add Match</button>
    </div>
    <div class="admin-panel-body">
        <div class="admin-match-grid">
            <?php $__empty_1 = true; $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginal612ddd0234969e1f40e9792356c9a82b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal612ddd0234969e1f40e9792356c9a82b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-match-card','data' => ['match' => $match]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-match-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['match' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($match)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal612ddd0234969e1f40e9792356c9a82b)): ?>
<?php $attributes = $__attributesOriginal612ddd0234969e1f40e9792356c9a82b; ?>
<?php unset($__attributesOriginal612ddd0234969e1f40e9792356c9a82b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal612ddd0234969e1f40e9792356c9a82b)): ?>
<?php $component = $__componentOriginal612ddd0234969e1f40e9792356c9a82b; ?>
<?php unset($__componentOriginal612ddd0234969e1f40e9792356c9a82b); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="admin-match-empty">
                    <i class="bi bi-calendar-x display-6 text-muted"></i>
                    <p class="text-muted mb-0 mt-2">No matches scheduled yet.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/admin/components/match-fixtures.blade.php ENDPATH**/ ?>