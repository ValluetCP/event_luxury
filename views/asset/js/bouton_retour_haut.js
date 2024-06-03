// const btn = document.querySelector('.btn_f');
const btnHaut = document.getElementById('btnRondHaut');
 
btnHaut.addEventListener('click', () => {
 
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    })
 
})