const nav = document.querySelector('.navbar');
const scrollLogoFonce = document.getElementById('scrollLogoFonce');
const scrollLogoClair = document.getElementById('scrollLogoClair');

// Au chargement de la page, masquer scrollLogoFonce
scrollLogoFonce.style.display = 'none';

window.addEventListener('scroll', () => {
    if (window.scrollY > 80) {
        nav.classList.add('scroll');
        scrollLogoFonce.style.display = 'block';
        scrollLogoClair.style.display = 'none';
    } else {
        nav.classList.remove('scroll');
        scrollLogoFonce.style.display = 'none';
        scrollLogoClair.style.display = 'block';
    }
});
