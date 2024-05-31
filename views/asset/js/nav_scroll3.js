document.addEventListener('DOMContentLoaded', function() {
    const nav = document.querySelector('.navbar');
    const scrollLogoFonce = document.getElementById('scrollLogoFonce');
    const scrollLogoClair = document.getElementById('scrollLogoClair');
    const hdrPanierNav = document.getElementById('hdr_panier_nav');
    const hdrTrait1 = document.getElementById('hdr_trait1');
    const hdrTrait2 = document.getElementById('hdr_trait2');
    const btnRondHaut = document.getElementById('btnRondHaut');
    const imgBgAccueil = document.getElementById('imgBgAccueil');
    const footerFixe = document.getElementById('footerFixe');
    // const test = document.getElementById('test');
    const test = document.querySelector('.footerFixe');
    

    // Masquer scrollLogoFonce, btnRondHaut et footerFixe au chargement de la page
    scrollLogoFonce.style.display = 'none';
    btnRondHaut.style.display = 'none';
    test.style.display = 'none';
    // footerFixe.style.display = 'none';

    window.addEventListener('scroll', () => {
        if (window.scrollY > 800) {
            nav.classList.add('scroll');
            btnRondHaut.style.display = 'block';
            test.style.display = 'block';
            test.style.display = 'flex';
            scrollLogoFonce.style.display = 'block';
            scrollLogoClair.style.display = 'none';
            hdrPanierNav.style.color = 'var(--vertFonce)';
            hdrTrait1.style.backgroundColor = 'var(--vertFonce)';
            hdrTrait2.style.backgroundColor = 'var(--vertFonce)';
            imgBgAccueil.style.transform = 'translateY(-126px)';
            // footerFixe.style.display = 'block';
        } else {
            nav.classList.remove('scroll');
            btnRondHaut.style.display = 'none';
            test.style.display = 'none';
            scrollLogoFonce.style.display = 'none';
            scrollLogoClair.style.display = 'block';
            hdrPanierNav.style.color = 'var(--vertClair)';
            hdrTrait1.style.backgroundColor = 'var(--vertClair)';
            hdrTrait2.style.backgroundColor = 'var(--vertClair)';
            imgBgAccueil.style.transform = 'translateY(0)';
            // footerFixe.style.display = 'none';
        }
    });
});
