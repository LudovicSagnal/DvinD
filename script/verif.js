let mail = document.querySelector('#mail');
let remail = document.querySelector('#remail');
let button = document.querySelector('#button');
let pass = document.querySelector('#pass');
let repass = document.querySelector('#repass');
let validmail = false;
let validpass = false;

mail.addEventListener("blur", () => {
    var regMail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (mail.value.match(regMail)) {
        mail.classList.replace('invalid', 'valid');
        remail.addEventListener("blur", () => {
            if (mail.value != remail.value || mail.value == "") {
                mail.classList.replace('valid', 'invalid');
                remail.classList.replace('valid', 'invalid');
                alert('Correspond pas');
                return false;
            } else if (mail.value == remail.value && mail.value != "") {
                mail.classList.replace('invalid', 'valid');
                remail.classList.replace('invalid', 'valid');
                validmail = true;
                alert("c'est bon gros");
                return true;
            }
        })
    } else {
        mail.classList.replace('valid', 'invalid');
        alert('mail pas bon format')
        return false;
    }
})

pass.addEventListener("blur", () => {
    var regPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (pass.value.match(regPass)) {
        pass.classList.replace('invalid', 'valid');
        repass.addEventListener("blur", () => {
            if (pass.value != repass.value) {
                pass.classList.replace('valid', 'invalid');
                repass.classList.replace('valid', 'invalid');
                alert('Correspond pas');
                return false;
            } else if (pass.value == "") {
                alert("champ vide")
                return false;
            } else {
                pass.classList.replace('invalid', 'valid');
                repass.classList.replace('invalid', 'valid');
                validpass = true;
                alert("c'est bon gros");
                if (validmail == true && validpass == true) {
                    button.removeAttribute("disabled");
                    return true;
                }
            }
        })
    } else {
        pass.classList.replace('valid', 'invalid');
        return false;
    }
})

let question = document.querySelector('.question');
let explainPass = document.querySelector('#explain-pass');

question.addEventListener('mouseover', () => {
    explainPass.classList.replace('dnone', 'modal-question');
})
question.addEventListener('mouseout', () => {
    explainPass.classList.replace('modal-question', 'dnone');
})