let btnInfo = document.querySelector('.btnInfo');
let formMdp = document.querySelector('.formMdp');
let formInfo = document.querySelector('.formInfo');
let btnMdp = document.querySelector('.btnMdp');
btnInfo.addEventListener('click',()=>{
    formMdp.style = `display:block;`
    formInfo.style = `display:none;`
})
btnMdp.addEventListener('click',()=>{
    formMdp.style = `display:none;`
    formInfo.style = `display:block;`
})

let btnPlusFont = document.querySelector('.btnPlusFont');
let contonair_hotel = document.querySelector('.contonair_hotel');

btnPlusFont.addEventListener('click',()=>{
    contonair_hotel.classList.toggle('contonair_hotel_flex');
})

