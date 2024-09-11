const display1 = document.querySelector('.display1');
const totalPrixSimple = document.querySelector('.totalPrixSimple');
let btnNumero = document.querySelectorAll('.btnNumero');
let inputPrix = document.querySelector('.inputPrix');
let btn_valide1 = document.querySelector('.btn_valide1');
let keys1 = document.querySelector('.keys1');
let heureSimple = document.querySelector('#heureSimple');
let id_cle_chambre = document.querySelector('#id_cle_chambre');
const prix = +inputPrix.value;
let totalpaye = 0;

let dateDebutid = document.querySelector('#dateDebut');
let dateFinid = document.querySelector('#dateFin');
let differenceInDays;

//algo pour date de resevation
let dateDebutReserver = document.querySelectorAll('.dateDebutReserver');
let dateFinReserver = document.querySelectorAll('.dateFinReserver');
const dates = [];
if (dateDebutReserver) {
    for (let j = 0; j < dateDebutReserver.length; j++) {
         dates.push({startDate: new Date(dateDebutReserver[j].value), endDate: new Date(dateFinReserver[j].value) });
    }
    // console.log(dates);


}
function dateFonction() {
    if (!(dateDebutid.value) || !(dateFinid.value) || heureSimple.value === "") {
        keys1.style = `pointer-events: none;`
    }else{
        let dateDebutDate = new Date(document.querySelector('#dateDebut').value);
        let dateFinDate = new Date(document.querySelector('#dateFin').value);
        // console.log(dateFinDate);
        if (dateDebutDate >= dateFinDate) {
           keys1.style = `pointer-events: none;`
        }else{

           keys1.style = `pointer-events: visible;`
            const differenceInTim = Math.abs(dateFinDate - dateDebutDate);

            differenceInDays = Math.ceil(differenceInTim / (1000*60*60*24));
            dateDebutDate.style = `pointer-events: none;`
            dateFinDate.style = `pointer-events: none;`
            if (dateDebutReserver) {

                //Filtrer les dates qui se trouve entre dateDebut et dateFin
                let datesEntreDebutEtFIn = dates.filter(function(enregistrement){
                    return (enregistrement.startDate >= dateDebutDate && enregistrement.startDate < dateFinDate) || (enregistrement.endDate >= dateDebutDate && enregistrement.endDate <= dateFinDate) || (enregistrement.startDate <= dateDebutDate && enregistrement.endDate >= dateFinDate);
                });
                //Afficher les Dates Trouvées
                datesEntreDebutEtFIn.forEach(function(enregistrement){
                     console.log(`Date de debut : ${enregistrement.startDate}, Date de Fin : ${enregistrement.endDate}`);
                });
            }
        }
    }

}
setInterval(() => {
    dateFonction();
}, 100);
for (let i = 0; i < btnNumero.length; i++) {
   btnNumero[i].addEventListener('click',(e)=>{
    e.preventDefault();
    btnNumero[i].style="color:hsl(0, 0%, 40%);pointer-events:none;cursor:not-allowed;"
   })
}
function appendToDisplay(input,id) {
    display1.value += "-"+input;
    totalpaye += prix;
    totalPrixSimple.value = totalpaye*differenceInDays;
    id_cle_chambre.value += "-"+id;
    btn_valide1.style=`display:flex;`
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



