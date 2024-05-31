const nav = document.querySelector('.navbar');
        const scrollLogoFonce = document.getElementById('scrollLogoFonce');
        const scrollLogoClair = document.getElementById('scrollLogoClair');
        const hdrPanierNav = document.getElementById('hdr_panier_nav');
        const hdrTrait1 = document.getElementById('hdr_trait1');
        const hdrTrait2 = document.getElementById('hdr_trait2');
        const btnRondHaut = document.getElementById('btnRondHaut');
        // Ajouter la transformation à imgBgAccueil
        const imgBgAccueil = document.getElementById('imgBgAccueil');
        // Footer fixe
        const footerFixe = document.getElementById('footerFixe');
        // const footerCopyright = document.querySelector('.footerCopyright');

        // Au chargement de la page, masquer scrollLogoFonce
        scrollLogoFonce.style.display = 'none';
        btnRondHaut.style.display = 'none';

        window.addEventListener('scroll', () => {
            if (window.scrollY > 800) {
                nav.classList.add('scroll');
                btnRondHaut.style.display = 'block';
                scrollLogoFonce.style.display = 'block';
                scrollLogoClair.style.display = 'none';
                hdrPanierNav.style.color = 'var(--vertFonce)';
                hdrTrait1.style.backgroundColor = 'var(--vertFonce)';
                hdrTrait2.style.backgroundColor = 'var(--vertFonce)';

                // Ajouter la transformation à imgBgAccueil
                imgBgAccueil.style.transform = 'translateY(-126px)';

                // Footer fixe
            } else {
                nav.classList.remove('scroll');
                btnRondHaut.style.display = 'none';
                scrollLogoFonce.style.display = 'none';
                scrollLogoClair.style.display = 'block';
                hdrPanierNav.style.color = 'var(--vertClair)';
                hdrTrait1.style.backgroundColor = 'var(--vertClair)';
                hdrTrait2.style.backgroundColor = 'var(--vertClair)';

                // Ajouter la transformation à imgBgAccueil
                imgBgAccueil.style.transform = 'translateY(0)';

                // Footer fixe
            }
        });
