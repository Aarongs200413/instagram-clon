document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.getElementById('openSearchPanelBtn');
    const closeBtn = document.getElementById('closeSearchPanelBtn');
    const panel = document.getElementById('searchPanel');

    if (openBtn && closeBtn && panel) {
        openBtn.addEventListener('click', () => {
            panel.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            panel.classList.remove('active');
        });

        document.addEventListener('click', (e) => {
            if (!panel.contains(e.target) && !openBtn.contains(e.target)) {
                panel.classList.remove('active');
            }
        });
    }
});
