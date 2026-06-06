(function () {
    function openLightbox(src, title, subtitle) {
        const lightbox = document.getElementById('image-lightbox');
        const img = document.getElementById('lightbox-img');
        const titleEl = document.getElementById('lightbox-title');
        const subtitleEl = document.getElementById('lightbox-subtitle');

        if (!lightbox || !img) return;

        img.src = src;
        img.alt = title || 'Full image';
        titleEl.textContent = title || '';
        subtitleEl.textContent = subtitle || '';

        lightbox.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const lightbox = document.getElementById('image-lightbox');
        const img = document.getElementById('lightbox-img');

        if (!lightbox) return;

        lightbox.classList.remove('is-open');
        document.body.style.overflow = '';

        if (img) {
            img.src = '';
        }
    }

    document.addEventListener('click', function (e) {
        const btn = e.target.closest('[data-lightbox-src]');
        if (btn) {
            e.preventDefault();
            openLightbox(
                btn.getAttribute('data-lightbox-src'),
                btn.getAttribute('data-lightbox-title') || '',
                btn.getAttribute('data-lightbox-subtitle') || ''
            );
            return;
        }

        if (e.target.closest('[data-lightbox-close]')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });

    window.openLightbox = openLightbox;
    window.closeLightbox = closeLightbox;
})();
