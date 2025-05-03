document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const barsIcon = sidebarToggle.querySelector('.fa-bars');
    const timesIcon = sidebarToggle.querySelector('.fa-times');

    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('show');
        sidebarToggle.classList.toggle('active');
        
        // Cambiar entre los iconos
        if (sidebar.classList.contains('show')) {
            barsIcon.style.display = 'none';
            timesIcon.style.display = 'block';
        } else {
            barsIcon.style.display = 'block';
            timesIcon.style.display = 'none';
        }
    });

    // Cerrar sidebar al hacer clic fuera en móvil
    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggle = sidebarToggle.contains(event.target);
        
        if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth <= 768) {
            sidebar.classList.remove('show');
            sidebarToggle.classList.remove('active');
            barsIcon.style.display = 'block';
            timesIcon.style.display = 'none';
        }
    });
});