document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarClose = document.getElementById('sidebar-close');

    // Open sidebar when menu toggle is clicked
    menuToggle.addEventListener('click', function() {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
    });

    // Close sidebar when close button is clicked
    sidebarClose.addEventListener('click', function() {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
    });

    // Close sidebar when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
        }
    });
});