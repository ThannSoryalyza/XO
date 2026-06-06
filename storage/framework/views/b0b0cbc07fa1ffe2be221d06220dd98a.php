<?php $__env->startSection('title', 'Management Team | XO United'); ?>

<?php $__env->startSection('content'); ?>
<section class="roster-page">
    <div class="roster-hero">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="<?php echo e(asset('img/XO.png')); ?>" alt="XO United" class="roster-hero-logo">
            <p class="xo-eyebrow roster-hero-eyebrow mb-2">Staff</p>
            <h1 class="font-stadium roster-hero-title">MANAGEMENT TEAM</h1>
            <p class="roster-hero-subtitle">The strategic brains behind our operations and team growth.</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="staff-grid">
            <?php $__empty_1 = true; $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="staff-card">
                    <?php if($manager->image): ?>
                        <button
                            type="button"
                            class="staff-card-media"
                            data-lightbox-src="<?php echo e(media_asset($manager->image)); ?>"
                            data-lightbox-title="<?php echo e($manager->name); ?>"
                            data-lightbox-subtitle="<?php echo e($manager->role); ?>"
                            aria-label="View full photo of <?php echo e($manager->name); ?>"
                        >
                            <img src="<?php echo e(media_asset($manager->image)); ?>" alt="<?php echo e($manager->name); ?>" loading="lazy">
                            <span class="staff-card-zoom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/><path d="M11 8v6M8 11h6"/></svg>
                                View photo
                            </span>
                        </button>
                    <?php else: ?>
                        <div class="staff-card-media staff-card-media--placeholder">
                            <span class="staff-card-placeholder">XO</span>
                        </div>
                    <?php endif; ?>
                    <div class="staff-card-body">
                        <h3 class="staff-card-name"><?php echo e($manager->name); ?></h3>
                        <span class="staff-card-role"><?php echo e($manager->role); ?></span>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="roster-empty roster-empty--wide">
                    <span class="roster-empty-icon">📋</span>
                    <h3 class="font-stadium text-2xl text-zinc-400 uppercase">Roster Empty</h3>
                    <p class="text-zinc-400 text-sm mt-1">Management staff will appear here once added.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php echo $__env->make('components.image-lightbox', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/manager.blade.php ENDPATH**/ ?>