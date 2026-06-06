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

@once
    @push('scripts')
        <script src="{{ asset('js/lightbox.js') }}"></script>
    @endpush
@endonce
