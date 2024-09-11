let fermerMessage = document.querySelectorAll('.fermerMessage');
let message_container = document.querySelectorAll('.message_container');
let non = document.querySelectorAll('.non');
for (let i = 0; i < fermerMessage.length; i++) {
    fermerMessage[i].addEventListener('click',()=>{
        message_container[i].style = `display:none;`
    })
}

for (let j = 0; j < non.length; j++) {
    non[j].addEventListener('click',()=>{
        message_container[j].style = `display:none;`
    })
}