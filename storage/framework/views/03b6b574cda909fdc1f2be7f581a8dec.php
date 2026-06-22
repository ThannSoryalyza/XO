<div id="image-lightbox" class="image-lightbox" role="dialog" aria-modal="true" aria-label="Full size image">
    <div class="image-lightbox-backdrop" data-lightbox-close></div>
    <div class="image-lightbox-panel">
        <button type="button" class="image-lightbox-close" data-lightbox-close aria-label="Close">&times;</button>
        <div class="image-lightbox-frame">
            <img id="lightbox-img" src="" alt="">
        </div>
        <div class="image-lightbox-caption">
            <p id="lightbox-title" class="image-lightbox-title"></p>
            <p id="lightbox-subtitle" class="image-lightbox-subtitle"></p>
        </div>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('d461b4df-8a53-47dd-bafc-8068c5af00fb')): $__env->markAsRenderedOnce('d461b4df-8a53-47dd-bafc-8068c5af00fb'); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('js/lightbox.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/components/image-lightbox.blade.php ENDPATH**/ ?>