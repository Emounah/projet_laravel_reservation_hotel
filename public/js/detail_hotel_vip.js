const display2 = document.querySelector('.display2');
const totalPrixVip = document.querySelector('.totalPrixVip');
let btnNumero2 = document.querySelectorAll('.btnNumero2');
let inputPrixVip= document.querySelector('.inputPrixVip');
let btn_valide2 = document.querySelector('.btn_valide2');
let keys2 = document.querySelector('.keys2');
let heureVip = document.querySelector('#heureVip');
const prixVip = +inputPrixVip.value;
let totalpayeVip = 0;

let dateDebutVip= document.querySelector('#dateDebutVip');
let dateFinVip = document.querySelector('#dateFinVip');
let differenceInDaysVip;
function dateFonctionVip() {
    if (!(dateDebutVip.value) || !(dateFinVip.value) || heureVip.value === "") {
        keys2.style = `pointer-events: none;`
    }else{
        let dateDebutDateVip = new Date(document.querySelector('#dateDebutVip').value);
        let dateFinDateVip = new Date(document.querySelector('#dateFinVip').value);
        if (dateDebutDateVip >= dateFinDateVip) {
           keys2.style = `pointer-events: none;`
        }else{
           keys2.style = `pointer-events: visible;`
            const differenceInTimVip = Math.abs(dateFinDateVip - dateDebutDateVip);
            differenceInDaysVip = Math.ceil(differenceInTimVip / (1000*60*60*24));
            dateDebutVip.style = `pointer-events: none;`
            dateFinDateVip.style = `pointer-events: none;`
        }
    }

}
setInterval(() => {
    dateFonctionVip();
}, 100);
for (let i = 0; i < btnNumero2.length; i++) {
    btnNumero2[i].addEventListener('click',(e)=>{
    e.preventDefault();
    btnNumero2[i].style="color:hsl(0, 0%, 40%);pointer-events:none;cursor:not-allowed;"

   })
}
function appendToDisplayVip(input,id) {
    display2.value += "-"+input;
    totalpayeVip += prix;
    totalPrixVip.value = totalpayeVip*differenceInDaysVip;
    id_cle_chambre2.value += "-"+id;
    btn_valide2.style=`display:flex;`
}

// function clearDisplay(e) {
//     e.preventDefault()
//     display1.value = "";
//     totalpaye = 0;
//     totalPrix.value = ""

//     for (let i = 0; i <btnNumero.length; i++) {
//         btnNumero[i].style="color:white; pointer-events: visible;cursor:pointer;"
//     }
//     btn_valide.style=`display:none;`
// }

function calculate(e) {
    e.preventDefault();
}



