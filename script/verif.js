let mail = document.querySelector('#mail');
let remail = document.querySelector('#remail');
let button = document.querySelector('#button'); 
let ok =false;

mail.addEventListener("blur", ()=> {
    var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (mail.value.match(regex)) {
        mail.classList.remove('invalid');
        mail.classList.add('valid');
        return true;
    } else {
        mail.classList.remove('valid');
        mail.classList.add('invalid');
        return false;
    }
})
remail.addEventListener("blur", ()=> {
    if(mail.value != remail.value) {
        mail.classList.remove('valid');
        mail.classList.add('invalid');
        remail.classList.remove('valid');
        remail.classList.add('invalid');
        alert('Correspond pas');
    } else {
        mail.classList.add('valid');
        mail.classList.remove('invalid');
        remail.classList.add('valid');
        remail.classList.remove('invalid');
        ok = true;
        alert("c'est bon gros");
    }
})

if(ok) {
    button.removeAttribute("disabled")
}