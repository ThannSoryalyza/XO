<?php $__env->startSection('title', 'Match Schedule | XO United'); ?>

<?php $__env->startSection('content'); ?>
<section class="matches-page">
    <div class="matches-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="<?php echo e(asset('img/XO.png')); ?>" alt="XO United" class="matches-hero-logo">
            <p class="xo-eyebrow matches-hero-eyebrow mb-2">Fixtures</p>
            <h1 class="font-stadium matches-hero-title">UPCOMING MATCHES</h1>
            <p class="matches-hero-subtitle">All scheduled fixtures for XO United this season.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="match-card-grid">
            <?php $__empty_1 = true; $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginal73db34eb66297c5425e9558ed1755d11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73db34eb66297c5425e9558ed1755d11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.match-card','data' => ['match' => $match]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('match-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['match' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($match)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73db34eb66297c5425e9558ed1755d11)): ?>
<?php $attributes = $__attributesOriginal73db34eb66297c5425e9558ed1755d11; ?>
<?php unset($__attributesOriginal73db34eb66297c5425e9558ed1755d11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73db34eb66297c5425e9558ed1755d11)): ?>
<?php $component = $__componentOriginal73db34eb66297c5425e9558ed1755d11; ?>
<?php unset($__componentOriginal73db34eb66297c5425e9558ed1755d11); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="match-card-empty">
                    <span class="match-card-empty-icon">📅</span>
                    <p>No upcoming matches scheduled at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/matches.blade.php ENDPATH**/ ?>