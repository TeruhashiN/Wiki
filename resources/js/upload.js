document.addEventListener('DOMContentLoaded', () => {
    const btnCategory = document.getElementById('btnCategory');
    const btnUpload = document.getElementById('btnUpload');
    const btnManage = document.getElementById('btnManage');
    const panelCategory = document.getElementById('panelCategory');
    const panelUpload = document.getElementById('panelUpload');
    const panelManage = document.getElementById('panelManage');

    function openPanel(panel) {
        panelCategory.classList.remove('open');
        panelUpload.classList.remove('open');
        panelManage.classList.remove('open');
        panel.classList.add('open');
    }

    btnCategory.addEventListener('click', () => openPanel(panelCategory));
    btnUpload.addEventListener('click', () => openPanel(panelUpload));
    btnManage.addEventListener('click', () => openPanel(panelManage));

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
