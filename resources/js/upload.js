document.addEventListener('DOMContentLoaded', () => {
    const btnCategory = document.getElementById('btnCategory');
    const btnUpload = document.getElementById('btnUpload');
    const panelCategory = document.getElementById('panelCategory');
    const panelUpload = document.getElementById('panelUpload');

    function openPanel(panel) {
        panelCategory.classList.remove('open');
        panelUpload.classList.remove('open');
        panel.classList.add('open');
    }

    btnCategory.addEventListener('click', () => openPanel(panelCategory));
    btnUpload.addEventListener('click', () => openPanel(panelUpload));
});
