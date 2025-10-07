// Carrusel de imágenes
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel img');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) slide.classList.add('active');
    });
}

setInterval(() => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}, 3000);

// Avisos dinámicos
const avisos = [
    "Aviso 1: La biblioteca cerrará a las 5 PM.",
    "Aviso 2: Nueva inscripción de cursos comienza mañana.",
    "Aviso 3: Mantenimiento del sistema este fin de semana.",
    "Aviso 4: Entrega de calificaciones disponible hoy."
];

const avisosContainer = document.getElementById('avisos');
let avisoIndex = 0;

function actualizarAviso() {
    avisosContainer.textContent = avisos[avisoIndex];
    avisoIndex = (avisoIndex + 1) % avisos.length;
}

actualizarAviso();
setInterval(actualizarAviso, 5000);
