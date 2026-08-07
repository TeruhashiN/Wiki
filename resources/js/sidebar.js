/**
 * Sidebar behavior
 * - Mobile open/close (toggle button + overlay + Escape)
 * - Animated profile dropdown (toggle, outside click, Escape, arrow-key nav)
 *
 * The dropdown is driven entirely by the `.dropdown-open` class on the
 * container. All visual transitions/animation are defined in app.css.
 */

document.addEventListener('DOMContentLoaded', () => {
    initSidebarToggle();
    initProfileDropdown();
});

/* -------------------------------------------------------------------------- */
/*  Mobile sidebar toggle                                                     */
/* -------------------------------------------------------------------------- */

function initSidebarToggle() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle = document.getElementById('sidebarToggle');

    if (!sidebar || !overlay) return;

    const isOpen = () => !sidebar.classList.contains('-translate-x-full');

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        sidebar.setAttribute('aria-hidden', 'false');
        if (toggle) toggle.setAttribute('aria-expanded', 'true');
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
        sidebar.setAttribute('aria-hidden', 'true');
        if (toggle) toggle.setAttribute('aria-expanded', 'false');
    }

    toggle?.addEventListener('click', (e) => {
        e.stopPropagation();
        isOpen() ? closeSidebar() : openSidebar();
    });

    overlay.addEventListener('click', closeSidebar);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen()) closeSidebar();
    });
}

/* -------------------------------------------------------------------------- */
/*  Profile dropdown                                                          */
/* -------------------------------------------------------------------------- */

function initProfileDropdown() {
    const container = document.getElementById('profileMenuContainer');
    const menu = document.getElementById('profileMenu');
    const trigger = document.getElementById('profileMenuTrigger');

    if (!container || !menu || !trigger) return;

    const isOpen = () => container.classList.contains('dropdown-open');

    function openDropdown() {
        container.classList.add('dropdown-open');
        trigger.setAttribute('aria-expanded', 'true');
        menu.setAttribute('aria-hidden', 'false');
    }

    function closeDropdown({ restoreFocus = false } = {}) {
        if (!isOpen()) return;
        container.classList.remove('dropdown-open');
        trigger.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-hidden', 'true');
        if (restoreFocus) trigger.focus();
    }

    // Toggle on trigger click
    trigger.addEventListener('click', (e) => {
        e.stopPropagation();
        isOpen() ? closeDropdown() : openDropdown();
    });

    // Close when clicking outside
    document.addEventListener('click', (e) => {
        if (isOpen() && !container.contains(e.target)) closeDropdown();
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeDropdown({ restoreFocus: true });
    });

    // Arrow-key navigation inside the open menu
    const items = [...menu.querySelectorAll('[role="menuitem"]')];

    menu.addEventListener('keydown', (e) => {
        if (!isOpen()) return;

        const currentIndex = items.indexOf(document.activeElement);

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            items[(currentIndex + 1) % items.length]?.focus();
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            items[(currentIndex - 1 + items.length) % items.length]?.focus();
        } else if (e.key === 'Home') {
            e.preventDefault();
            items[0]?.focus();
        } else if (e.key === 'End') {
            e.preventDefault();
            items[items.length - 1]?.focus();
        }
    });
}

