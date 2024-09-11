let nav = document.querySelector('nav');

function fonctionscroll() {
    nav.classList.toggle('styck', window.scrollY > 100);
}
 setInterval(fonctionscroll,100);

let ulFC = document.querySelector('.ulFC');
let ulFCBtn = document.querySelector('.ulFCBtn');

ulFCBtn.addEventListener('click',()=>{
    ulFC.classList.toggle('activeClientFourniseur');
    if (ulFC.classList[1] == 'activeClientFourniseur') {     
        ulFCBtn.classList.add('active');
    }else{
        ulFCBtn.classList.remove('active');
    }
})

function NavbarJS() {
    let bars = document.querySelector('.bars')
    let bar = document.querySelectorAll('.bar')
    let nav_links = document.querySelector('.nav_links')
    // console.log(bars);
    bars.addEventListener('click',()=>{
        for (let i = 0; i < bar.length; i++) {
            bar[i].classList.toggle(`bar${i}`)
        }
        if (bar[0].classList.length == 2) {
            nav_links.style = `transform: translate(-50%,0);`
        }else{
            nav_links.style = `transform: translate(-50%,-300%);`
        }
    })
}
NavbarJS();