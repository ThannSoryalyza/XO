<?php $__env->startSection('title', 'Player Roster | XO United'); ?>

<?php $__env->startSection('content'); ?>
<?php
    $roleConfig = [
        'GK' => ['title' => 'Goalkeeper', 'label' => 'GOALKEEPER'],
        'DF' => ['title' => 'Defender', 'label' => 'DEFENDER'],
        'MD' => ['title' => 'Midfielder', 'label' => 'MIDFIELDER'],
        'FW' => ['title' => 'Forward', 'label' => 'FORWARD'],
    ];
?>

<section class="squad-page">
    <div class="squad-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="squad-hero-grid">
                <div class="squad-hero-copy">
                    <img src="<?php echo e(asset('img/XO.png')); ?>" alt="XO United" class="squad-hero-logo">
                    <p class="xo-eyebrow squad-hero-eyebrow mb-2">First Team Squad</p>
                    <h1 class="font-stadium squad-hero-title">ALL PLAYERS</h1>
                    <p class="squad-hero-desc">Full squad roster organised by position.</p>
                </div>
                <div class="squad-hero-total">
                    <p class="squad-hero-total-number"><?php echo e($players->count()); ?></p>
                    <p class="squad-hero-total-sub">Total Players</p>
                </div>
            </div>
        </div>
    </div>

    <nav class="squad-filter" id="squad-filter" aria-label="Filter by position">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="squad-filter-track">
                <?php $__currentLoopData = $roleConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $posCount = $players->where('position', $code)->count(); ?>
                    <a href="#squad-<?php echo e(strtolower($code)); ?>" class="squad-filter-btn" data-squad-section="squad-<?php echo e(strtolower($code)); ?>">
                        <span class="squad-filter-code"><?php echo e($code); ?></span>
                        <span class="squad-filter-count"><?php echo e($posCount); ?> <?php echo e($posCount === 1 ? 'player' : 'players'); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <?php $__currentLoopData = $roleConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $count = $players->where('position', $code)->count(); ?>
            <section id="squad-<?php echo e(strtolower($code)); ?>" class="squad-block">
                <div class="squad-block-header">
                    <h2 class="squad-block-title"><?php echo e($data['label']); ?></h2>
                    <span class="squad-block-count"><?php echo e($count); ?> <?php echo e($count === 1 ? 'player' : 'players'); ?></span>
                </div>

                <div class="squad-grid">
                    <?php $__empty_1 = true; $__currentLoopData = $players->where('position', $code); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <article class="squad-player">
                            <?php if($player->image): ?>
                                <button
                                    type="button"
                                    class="squad-player-photo"
                                    data-lightbox-src="<?php echo e(media_asset($player->image)); ?>"
                                    data-lightbox-title="<?php echo e($player->name); ?>"
                                    data-lightbox-subtitle="#<?php echo e($player->number); ?> · <?php echo e($data['label']); ?>"
                                    aria-label="View full photo of <?php echo e($player->name); ?>"
                                >
                                    <img src="<?php echo e(media_asset($player->image)); ?>" alt="<?php echo e($player->name); ?>" loading="lazy">
                                </button>
                            <?php else: ?>
                                <div class="squad-player-photo squad-player-photo--empty">
                                    <span class="squad-player-empty-icon">⚽</span>
                                </div>
                            <?php endif; ?>
                            <div class="squad-player-info">
                                <span class="squad-player-num"><?php echo e($player->number); ?></span>
                                <div class="squad-player-details">
                                    <h3 class="squad-player-name"><?php echo e($player->name); ?></h3>
                                    <span class="squad-player-role"><?php echo e($code); ?> · <?php echo e($data['title']); ?></span>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="squad-empty">
                            <p>No <?php echo e(strtolower($data['title'])); ?>s in the squad yet.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="squad-bottom-cta">
            <h3 class="font-stadium squad-bottom-title">MANAGEMENT TEAM</h3>
            <p class="squad-bottom-text">View coaches and staff behind the squad.</p>
            <a href="<?php echo e(route('managers')); ?>" class="squad-bottom-link">View Management Team</a>
        </div>
    </div>
</section>

<?php echo $__env->make('components.image-lightbox', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/squad-nav.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/player.blade.php ENDPATH**/ ?>