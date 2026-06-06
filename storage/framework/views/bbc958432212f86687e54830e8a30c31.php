<?php
    $homeLogo = match_team_logo($match, 'home');
    $awayLogo = match_team_logo($match, 'away');
    $finishTime = match_finish_time($match);
?>

<article class="match-card admin-match-card">
    <div class="match-card-logos">
        <div class="match-card-side">
            <?php if($homeLogo): ?>
                <img src="<?php echo e($homeLogo); ?>" alt="<?php echo e($match->home_team); ?>" class="match-card-logo">
            <?php else: ?>
                <div class="match-card-logo-fallback"><?php echo e(strtoupper(substr($match->home_team, 0, 1))); ?></div>
            <?php endif; ?>
            <span class="match-card-side-name"><?php echo e($match->home_team); ?></span>
        </div>

        <span class="match-card-vs">VS</span>

        <div class="match-card-side">
            <?php if($awayLogo): ?>
                <img src="<?php echo e($awayLogo); ?>" alt="<?php echo e($match->away_team); ?>" class="match-card-logo">
            <?php else: ?>
                <div class="match-card-logo-fallback"><?php echo e(strtoupper(substr($match->away_team, 0, 1))); ?></div>
            <?php endif; ?>
            <span class="match-card-side-name"><?php echo e($match->away_team); ?></span>
        </div>
    </div>

    <div class="match-card-body">
        <h3 class="match-card-title admin-match-title">
            <?php echo e($match->home_team); ?> <span class="admin-match-vs">VS</span> <?php echo e($match->away_team); ?>

        </h3>
        <p class="match-card-detail">
            <span class="match-card-pin" aria-hidden="true">📍</span>
            <?php echo e($match->stadium); ?>

            <span class="match-card-location">(<?php echo e($match->location_type); ?>)</span>
        </p>
        <p class="match-card-detail">
            <span class="match-card-label">Date:</span>
            <?php echo e(\Carbon\Carbon::parse($match->match_date)->format('d M Y')); ?>

        </p>
        <p class="match-card-detail">
            <span class="match-card-label">Kick off:</span> <?php echo e(format_match_time($match->match_time)); ?>

            <?php if($finishTime): ?>
                · <span class="match-card-label">Finish:</span> <?php echo e(format_match_time($finishTime)); ?>

            <?php endif; ?>
        </p>
    </div>

    <div class="admin-match-actions">
        <button type="button" class="btn btn-sm btn-outline-primary edit-match-btn"
                data-id="<?php echo e($match->id); ?>"
                data-home="<?php echo e($match->home_team); ?>"
                data-away="<?php echo e($match->away_team); ?>"
                data-date="<?php echo e($match->match_date); ?>"
                data-time="<?php echo e($match->match_time); ?>"
                data-finish="<?php echo e($finishTime); ?>"
                data-stadium="<?php echo e($match->stadium); ?>"
                data-location="<?php echo e($match->location_type); ?>"
                data-home-logo="<?php echo e(match_team_logo($match, 'home')); ?>"
                data-away-logo="<?php echo e(match_team_logo($match, 'away')); ?>">
            <i class="bi bi-pencil-square"></i> Edit
        </button>
        <form action="<?php echo e(route('admin.matches.destroy', $match->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this match fixture?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</article>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/components/admin-match-card.blade.php ENDPATH**/ ?>