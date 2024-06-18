const navHomePage = document.querySelector('.nav_home_page');
const btnRondHaut = document.getElementById('btnRondHaut');

// Au chargement de la page, masquer :
btnRondHaut.style.display = 'none';

window.addEventListener('scroll', () => {
    if (window.scrollY > 80) {
        navHomePage.classList.add('scroll');
        btnRondHaut.style.display = 'block';
    } else {
        navHomePage.classList.remove('scroll');
        btnRondHaut.style.display = 'none';
    }
});
