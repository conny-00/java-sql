const menuToggle = document.getElementById('menu-toggle');
const menu = document.getElementById('menuAlumno');

menuToggle.addEventListener('click', () => {
    menu.classList.toggle('show');
});
