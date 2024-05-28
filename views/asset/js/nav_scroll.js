// const nav = document.querySelector('.navbar');
const navHomePage = document.querySelector('.nav_home_page');
const btnRondHaut = document.getElementById('btnRondHaut');
// const scrollImage = document.getElementById('scrollImage');
// const hpTrait1 = document.getElementById('hp_trait1');

// Au chargement de la page, masquer :
btnRondHaut.style.display = 'none';

window.addEventListener('scroll', () => {
    if (window.scrollY > 80) {
        // nav.classList.add('scroll');
        navHomePage.classList.add('scroll');
        btnRondHaut.style.display = 'block';
        // navBlanc.classList.add('scroll');
        // scrollImage.style.display = 'block';
        // hpTrait1.style.color = 'block';
    } else {
        navHomePage.classList.remove('scroll');
        btnRondHaut.style.display = 'none';
        // scrollImage.style.display = 'none';
    }
});
