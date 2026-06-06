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

<?php if (! $__env->hasRenderedOnce('177d6518-a283-4cc7-b85d-3da95cecd78b')): $__env->markAsRenderedOnce('177d6518-a283-4cc7-b85d-3da95cecd78b'); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('js/lightbox.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\CG-HENG\Documents\Xounited\resources\views/components/image-lightbox.blade.php ENDPATH**/ ?>