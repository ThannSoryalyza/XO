(function () {
    const filter = document.getElementById('squad-filter');
    if (!filter) return;

    const buttons = filter.querySelectorAll('.squad-filter-btn');
    const sections = Array.from(buttons)
        .map(btn => document.getElementById(btn.getAttribute('data-squad-section')))
        .filter(Boolean);

    function setActive(sectionId) {
        buttons.forEach(btn => {
            btn.classList.toggle('is-active', btn.getAttribute('data-squad-section') === sectionId);
        });
    }

    function getCurrentSection() {
        const offset = 160;
        let current = sections[0]?.id;
        sections.forEach(section => {
            if (window.scrollY >= section.offsetTop - offset) {
                current = section.id;
            }
        });
        return current;
    }

    buttons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.getAttribute('data-squad-section');
            const target = document.getElementById(id);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.replaceState(null, '', '#' + id);
                setActive(id);
            }
        });
    });

    let ticking = false;
    window.addEventListener('scroll', function () {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(function () {
                setActive(getCurrentSection());
                ticking = false;
            });
        }
    }, { passive: true });

    if (window.location.hash && document.getElementById(window.location.hash.slice(1))) {
        setActive(window.location.hash.slice(1));
    } else {
        setActive(getCurrentSection());
    }
})();
