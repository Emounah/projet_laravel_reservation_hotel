const selectBox1 = document.querySelector('.select-box1');
const selectOption1 = document.querySelector('.select-option1');
const soValue1 = document.querySelector('#soValue1');
const optionSearch1 = document.querySelector('#optionSearch1');
const options1 = document.querySelector('.options1');
const optionsList1 = document.querySelectorAll('.options1 li');

selectOption1.addEventListener('click',function(){
    selectBox1.classList.toggle('active');
});

// optionsList.forEach(function(optionsListSingle){
//     optionsListSingle.addEventListener('click',function(){
//         text = this.textContent;
//         soValue.value = text;
//         selectBox.classList.remove('active');
//     })
// });
//ou
for (let i = 0; i < optionsList1.length; i++) {
    optionsList1[i].addEventListener('click',()=>{
        soValue1.value = optionsList1[i].textContent;
        selectBox1.classList.remove('active');
    })
}

optionSearch1.addEventListener('keyup',function(){
    let filter, li, textValue;
    filter = optionSearch1.value.toUpperCase();
    li = options1.getElementsByTagName('li');
    for (let j = 0; j < li.length; j++) {
        liCount = li[j];
        textValue = liCount.textContent || liCount.innerText;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            li[j].style.display = '';
        }else{
            li[j].style.display = 'none';
        }
    }
})


const selectBox2 = document.querySelector('.select-box2');
const selectOption2 = document.querySelector('.select-option2');
const soValue2 = document.querySelector('#soValue2');
const optionSearch2 = document.querySelector('#optionSearch2');
const options2 = document.querySelector('.options2');
const optionsList2 = document.querySelectorAll('.options2 li');
console.log(optionsList2);
selectOption2.addEventListener('click',function(){
    selectBox2.classList.toggle('active');
});


for (let i = 0; i < optionsList2.length; i++) {
    optionsList2[i].addEventListener('click',()=>{
        soValue2.value = optionsList2[i].textContent;
        selectBox2.classList.remove('active');
    })
}

optionSearch2.addEventListener('keyup',function(){
    let filter, li, textValue;
    filter = optionSearch2.value.toUpperCase();
    li = options2.getElementsByTagName('li');
    for (let j = 0; j < li.length; j++) {
        liCount = li[j];
        textValue = liCount.textContent || liCount.innerText;
        if (textValue.toUpperCase().indexOf(filter) > -2) {
            li[j].style.display = '';
        }else{
            li[j].style.display = 'none';
        }
    }
})


//variable globales
let compteur = 0;
let timer, section_card_remise, slides, slideWidth;

window.onload = () => {
    const diapo = document.querySelector(".diapo");
    section_card_remise = document.querySelector(".section_card_remise");
    slides = Array.from(section_card_remise.children)
    //On calcule la largeur du diaporama
    slideWidth = diapo.getBoundingClientRect().width

    let next = document.querySelector("#nav-droite");
    let prev = document.querySelector("#nav-gauche");

    next.addEventListener("click", slideNext);
    prev.addEventListener("click", slidePrev);

    //Automatiser le diaporama
    timer = setInterval(slideNext,4000);
    //Gérer le survol de la souris
    diapo.addEventListener("mouseover", stopTimer);
    diapo.addEventListener("mouseout", startTimer);
 
    //Mise en oeuvre du responsive
    window.addEventListener("resize", () => {
        slideWidth = diapo.getBoundingClientRect().width
        slideNext();
    })
}
//Cett fonction fait défiler le diaporama vers la droite
function slideNext() {
    compteur++
    if (compteur == slides.length) {
        compteur = 0;
    }
    let decal = -slideWidth * compteur;
    section_card_remise.style = `transform:translateX(${decal}px);`
}
//Cett fonction fait défiler le diaporama vers la gauche
function slidePrev() {
    compteur--
    if (compteur < 0) {
        compteur = slides.length-1;
    }
    let decal = -slideWidth * compteur;
    section_card_remise.style = `transform:translateX(${decal}px);`
}

//fonction Timer
function stopTimer(){
   clearInterval(timer);
}
function startTimer(){
    timer=setInterval(slideNext, 4000);
}