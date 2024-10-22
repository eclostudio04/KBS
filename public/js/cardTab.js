document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('[data-tabs-toggle] button');
    const tabContents = document.querySelectorAll('#defaultTabContent > div');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = document.querySelector(tab.dataset.tabsTarget);

            // Sembunyikan semua konten tab
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            // Tampilkan konten tab yang dipilih
            if (target) {
                target.classList.remove('hidden');
            }

            // Atur status aria-selected
            tabs.forEach(t => {
                t.setAttribute('aria-selected', 'false');
                t.classList.remove('text-blue-600', 'dark:text-blue-500');
                t.classList.add('hover:text-gray-600', 'hover:bg-gray-100', 'dark:hover:bg-gray-700', 'dark:hover:text-gray-300');
            });

            tab.setAttribute('aria-selected', 'true');
            tab.classList.add('text-blue-600', 'dark:text-blue-500');
            tab.classList.remove('hover:text-gray-600', 'hover:bg-gray-100', 'dark:hover:bg-gray-700', 'dark:hover:text-gray-300');
        });
    });

    // Aktifkan tab pertama secara default
    if (tabs.length > 0) {
        tabs[0].click();
    }
});
