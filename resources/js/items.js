/**
 * Items page behavior
 * - Ctrl+K keyboard shortcut focuses the header search
 * - Collapsible "Contents" section (hide / unhide dropdown)
 *
 * The Contents toggle is driven by toggling the `hidden` class on the
 * list container, and rotates the chevron to indicate the open/closed state.
 */

document.addEventListener('DOMContentLoaded', () => {
    initSearchShortcut();
    initContentsToggle();
});

/* -------------------------------------------------------------------------- */
/*  Ctrl+K search shortcut                                                    */
/* -------------------------------------------------------------------------- */

function initSearchShortcut() {
    document.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            const input = document.querySelector('header input[type="text"]');
            if (input) input.focus();
        }
    });
}

/* -------------------------------------------------------------------------- */
/*  Collapsible Contents section                                              */
/* -------------------------------------------------------------------------- */

function initContentsToggle() {
    const toggle = document.getElementById('contentsToggle');
    const list = document.getElementById('contentsList');
    const chevron = document.getElementById('contentsChevron');

    if (!toggle || !list || !chevron) return;

    toggle.addEventListener('click', () => {
        const isHidden = list.classList.toggle('hidden');
        toggle.setAttribute('aria-expanded', String(!isHidden));
        // Rotate chevron to indicate open/closed state
        chevron.style.transform = isHidden ? 'rotate(-90deg)' : 'rotate(0deg)';
    });
}
