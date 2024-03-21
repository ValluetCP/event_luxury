// const nav = document.querySelector('.navbar');
const navHomePage = document.querySelector('.nav_home_page');
// const scrollImage = document.getElementById('scrollImage');
// const hpTrait1 = document.getElementById('hp_trait1');

window.addEventListener('scroll', () => {
    if (window.scrollY > 80) {
        // nav.classList.add('scroll');
        navHomePage.classList.add('scroll');
        // navBlanc.classList.add('scroll');
        // scrollImage.style.display = 'block';
        // hpTrait1.style.color = 'block';
    } else {
        navHomePage.classList.remove('scroll');
        // scrollImage.style.display = 'none';
    }
});
