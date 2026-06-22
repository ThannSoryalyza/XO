<?php $__env->startSection('title', 'XO United | Home'); ?>

<?php $__env->startSection('content'); ?>
    <section class="home-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-hero-grid">
                <div class="home-hero-copy">
                    <p class="xo-eyebrow mb-2">Season 2025/26</p>
                    <h1 class="font-stadium home-hero-title">PLAY FOR <span class="text-red-600">THE BADGE.</span></h1>
                    <p class="home-hero-desc">Professional player management and scouting for the next generation of football stars.</p>
                    <div class="home-hero-actions">
                        <a href="<?php echo e(route('matches')); ?>" class="home-btn home-btn--primary">View Matches</a>
                        <a href="<?php echo e(route('standings')); ?>" class="home-btn home-btn--outline">Standings</a>
                    </div>
                    <div class="home-hero-stats">
                        <div class="home-hero-stat">
                            <span class="home-hero-stat-num"><?php echo e($upcomingMatches->count()); ?></span>
                            <span class="home-hero-stat-label">Upcoming</span>
                        </div>
                        <div class="home-hero-stat">
                            <span class="home-hero-stat-num"><?php echo e($playersCount); ?></span>
                            <span class="home-hero-stat-label">Players</span>
                        </div>
                        <div class="home-hero-stat">
                            <span class="home-hero-stat-num"><?php echo e($standings->count()); ?></span>
                            <span class="home-hero-stat-label">Clubs</span>
                        </div>
                    </div>
                </div>
                <div class="home-hero-media">
                    <div class="home-hero-photo">
                        <img src="<?php echo e(asset('img/capitan.jpg')); ?>" alt="XO United Captain" class="home-hero-photo-img">
                        <div class="home-hero-photo-overlay"></div>
                        <div class="home-hero-photo-caption">
                            <p class="font-stadium home-hero-photo-title">XO UNITED FC</p>
                            <p class="home-hero-photo-sub">Pride · Passion · Performance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section home-section--muted">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-section-head">
                <div>
                    <p class="xo-eyebrow mb-1">Fixtures</p>
                    <h2 class="font-stadium home-section-title">UPCOMING MATCHES</h2>
                </div>
                <a href="<?php echo e(route('matches')); ?>" class="home-section-link">View All →</a>
            </div>

            <div class="match-card-grid">
                <?php $__empty_1 = true; $__currentLoopData = $upcomingMatches->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                    <div class="home-empty">No upcoming matches scheduled yet.</div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if($standings->isNotEmpty()): ?>
    <section class="home-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-section-head">
                <div>
                    <p class="xo-eyebrow mb-1">League Table</p>
                    <h2 class="font-stadium home-section-title">TOP STANDINGS</h2>
                </div>
                <a href="<?php echo e(route('standings')); ?>" class="home-section-link">Full Table →</a>
            </div>

            <div class="home-standings-card">
                <table class="home-standings-table">
                    <thead>
                        <tr>
                            <th>Pos</th>
                            <th>Club</th>
                            <th class="home-standings-hide-sm">P</th>
                            <th class="home-standings-hide-sm">W</th>
                            <th class="home-standings-hide-sm">D</th>
                            <th class="home-standings-hide-sm">L</th>
                            <th>GD</th>
                            <th>Pts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $standings->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="home-standings-pos"><?php echo e($team->position); ?></td>
                                <td>
                                    <div class="home-standings-club">
                                        <?php if($team->logo): ?>
                                            <img src="<?php echo e(media_asset($team->logo)); ?>" alt="" class="home-standings-logo">
                                        <?php else: ?>
                                            <span class="home-standings-logo-fallback"><?php echo e(strtoupper(substr($team->club_name, 0, 1))); ?></span>
                                        <?php endif; ?>
                                        <span><?php echo e($team->club_name); ?></span>
                                    </div>
                                </td>
                                <td class="home-standings-hide-sm"><?php echo e($team->played); ?></td>
                                <td class="home-standings-hide-sm"><?php echo e($team->won); ?></td>
                                <td class="home-standings-hide-sm"><?php echo e($team->drawn); ?></td>
                                <td class="home-standings-hide-sm"><?php echo e($team->lost); ?></td>
                                <td class="<?php echo e($team->goal_difference >= 0 ? 'text-emerald-600' : 'text-red-600'); ?>"><?php echo e($team->goal_difference >= 0 ? '+' : ''); ?><?php echo e($team->goal_difference); ?></td>
                                <td class="home-standings-pts"><?php echo e($team->points); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section id="services" class="home-section home-section--red">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-section-head home-section-head--light">
                <div class="home-section-head-center">
                    <p class="home-eyebrow-light mb-1">XO United Football Club</p>
                    <h2 class="font-stadium home-section-title home-section-title--light">CLUB SERVICES</h2>
                    <p class="home-services-desc">Built for players, coaches, and supporters.</p>
                </div>
            </div>

            <div class="home-services-grid">
                <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="home-service-card">
                        <div class="home-service-icon"><?php echo e($service->icon); ?></div>
                        <h3 class="font-stadium home-service-title"><?php echo e($service->title); ?></h3>
                        <p class="home-service-text"><?php echo e($service->description); ?></p>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="home-empty home-empty--light">Club services coming soon.</div>
                <?php endif; ?>
            </div>

            <?php if($services->isNotEmpty()): ?>
                <div class="home-services-cta">
                    <a href="mailto:xounited@gmail.com" class="home-btn home-btn--white">Get Started →</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="home-section home-section--muted">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-team-grid">
                <button
                    type="button"
                    class="home-team-photo"
                    data-lightbox-src="<?php echo e(asset('img/team.jpg')); ?>"
                    data-lightbox-title="Our Team"
                    data-lightbox-subtitle="United under one badge."
                    aria-label="View full team photo"
                >
                    <img src="<?php echo e(asset('img/team.jpg')); ?>" alt="Our Team" loading="lazy">
                    <div class="home-team-photo-overlay"></div>
                    <div class="home-team-photo-caption">
                        <h2 class="font-stadium">OUR TEAM</h2>
                        <p>United under one badge.</p>
                    </div>
                </button>
                <div class="home-team-copy">
                    <p class="xo-eyebrow mb-1">Squad & Staff</p>
                    <h3 class="font-stadium home-section-title">MEET THE SQUAD</h3>
                    <p class="home-team-desc">Explore our full roster and management team.</p>
                    <div class="home-team-actions">
                        <a href="<?php echo e(route('player')); ?>" class="home-btn home-btn--primary">All Players</a>
                        <a href="<?php echo e(route('managers')); ?>" class="home-btn home-btn--outline">Manager Team</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section home-join">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-join-card">
                <div class="home-join-copy">
                    <p class="xo-eyebrow mb-1">Get Involved</p>
                    <h2 class="font-stadium home-join-title">INTERESTED IN JOINING?</h2>
                    <p class="home-join-text">Contact us to learn about trials, training sessions, and becoming part of XO United.</p>
                </div>
                <a href="mailto:xounited@gmail.com" class="home-btn home-btn--primary home-join-btn">Email Us</a>
            </div>
        </div>
    </section>

    <?php echo $__env->make('components.image-lightbox', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/home.blade.php ENDPATH**/ ?>