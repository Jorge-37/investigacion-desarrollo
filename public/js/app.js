document.addEventListener('DOMContentLoaded', function () {

    // ==============================
    // NAVEGACIÓN RESPONSIVE
    // ==============================

    const toggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.main-nav');

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            nav.classList.toggle('show');
        });
    }


    // ==============================
    // AÑO DEL FOOTER
    // ==============================

    const year = document.getElementById('year');

    if (year) {
        year.textContent = new Date().getFullYear();
    }


    // ==============================
    // BOTÓN VOLVER ARRIBA
    // ==============================

    const toTop = document.getElementById('toTop');

    if (toTop) {

        window.addEventListener('scroll', function () {

            if (window.scrollY > 300) {
                toTop.style.display = 'block';
            } else {
                toTop.style.display = 'none';
            }

        });

        toTop.addEventListener('click', function () {

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        });
    }


    // ==============================
    // FORMULARIO DE CONTACTO
    // ==============================

    const contactForm = document.getElementById('contactForm');

    if (contactForm) {

        contactForm.addEventListener('submit', function (e) {

            const email = this.email.value || '';

            if (!email.includes('@')) {

                alert('Por favor ingresa un correo válido.');

                e.preventDefault();
            }

        });
    }

});


// ==========================================
// GALERÍA - DESCRIPCIONES
// ==========================================

function toggleDesc(id) {

    const element = document.getElementById(id);

    if (!element) {
        return;
    }

    element.classList.toggle('open');
}


// ==========================================
// ACORDEÓN DE PROGRAMAS
// ==========================================

function toggleAccordion(element) {

    const content = element.nextElementSibling;

    const allContents =
        document.querySelectorAll('.accordion-content');

    allContents.forEach(function (item) {

        if (item !== content) {
            item.style.display = 'none';
        }

    });

    if (content.style.display === 'block') {

        content.style.display = 'none';

    } else {

        content.style.display = 'block';

        content.scrollIntoView({
            behavior: 'smooth'
        });

    }
}