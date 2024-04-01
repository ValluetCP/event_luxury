const nav = document.querySelector('.navbar');
        const scrollLogoFonce = document.getElementById('scrollLogoFonce');
        const scrollLogoClair = document.getElementById('scrollLogoClair');
        const hdrPanierNav = document.getElementById('hdr_panier_nav');
        const hdrTrait1 = document.getElementById('hdr_trait1');
        const hdrTrait2 = document.getElementById('hdr_trait2');

        // Au chargement de la page, masquer scrollLogoFonce
        scrollLogoFonce.style.display = 'none';

        window.addEventListener('scroll', () => {
            if (window.scrollY > 700) {
                nav.classList.add('scroll');
                scrollLogoFonce.style.display = 'block';
                scrollLogoClair.style.display = 'none';
                hdrPanierNav.style.color = 'var(--vertFonce)';
                hdrTrait1.style.backgroundColor = 'var(--vertFonce)';
                hdrTrait2.style.backgroundColor = 'var(--vertFonce)';
            } else {
                nav.classList.remove('scroll');
                scrollLogoFonce.style.display = 'none';
                scrollLogoClair.style.display = 'block';
                hdrPanierNav.style.color = 'var(--vertClair)';
                hdrTrait1.style.backgroundColor = 'var(--vertClair)';
                hdrTrait2.style.backgroundColor = 'var(--vertClair)';
            }
        });
