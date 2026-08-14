document.addEventListener('DOMContentLoaded', () => {
    const btnCategory = document.getElementById('btnCategory');
    const btnUpload = document.getElementById('btnUpload');
    const btnManage = document.getElementById('btnManage');
    const btnNews = document.getElementById('btnNews');
    const panelCategory = document.getElementById('panelCategory');
    const panelUpload = document.getElementById('panelUpload');
    const panelManage = document.getElementById('panelManage');
    const panelNews = document.getElementById('panelNews');

    function openPanel(panel) {
        if (panelCategory) panelCategory.classList.remove('open');
        if (panelUpload) panelUpload.classList.remove('open');
        if (panelManage) panelManage.classList.remove('open');
        if (panelNews) panelNews.classList.remove('open');
        panel.classList.add('open');
    }

    if (btnCategory) btnCategory.addEventListener('click', () => openPanel(panelCategory));
    if (btnUpload) btnUpload.addEventListener('click', () => openPanel(panelUpload));
    if (btnManage) btnManage.addEventListener('click', () => openPanel(panelManage));
    if (btnNews) btnNews.addEventListener('click', () => openPanel(panelNews));

    const categorySelect = document.getElementById('categorySelect');
    const seedFields = document.getElementById('seedFields');
    const toolFields = document.getElementById('toolFields');

    function toggleSeedFields() {
        if (!categorySelect || !seedFields) {
            return;
        }
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const isSeeds = selectedOption && selectedOption.dataset.slug === 'seeds';
        seedFields.classList.toggle('hidden', !isSeeds);
    }

    function toggleToolFields() {
        if (!categorySelect || !toolFields) {
            return;
        }
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const isTools = selectedOption && selectedOption.dataset.slug === 'tools';
        toolFields.classList.toggle('hidden', !isTools);
    }

    if (categorySelect && seedFields) {
        categorySelect.addEventListener('change', toggleSeedFields);
        toggleSeedFields();
    }

    if (categorySelect && toolFields) {
        categorySelect.addEventListener('change', toggleToolFields);
        toggleToolFields();
    }

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('panel') === 'manage') {
        openPanel(panelManage);
    }

    const searchInput = document.getElementById('manageSearchInput');
    const manageItemsList = document.getElementById('manageItemsList');
    let debounceTimer;

    if (searchInput && manageItemsList) {
        searchInput.addEventListener('input', (e) => {
            clearTimeout(debounceTimer);
            const query = e.target.value.trim();

            debounceTimer = setTimeout(async () => {
                const url = new URL(window.location.href);
                url.searchParams.set('panel', 'manage');
                url.searchParams.set('search', query);
                url.searchParams.delete('page');

                try {
                    const response = await fetch(url.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    if (response.ok) {
                        const data = await response.json();
                        manageItemsList.innerHTML = data.html;
                    }
                } catch (error) {
                    console.error('Search failed:', error);
                }
            }, 300);
        });
    }
});
