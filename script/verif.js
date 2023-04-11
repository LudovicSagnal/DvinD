let mail = document.querySelector('#mail');
let remail = document.querySelector('#remail');
let button = document.querySelector('#button');
let pass = document.querySelector('#pass');
let repass = document.querySelector('#repass');
let message = document.querySelector('.message-to');
let validmail = false;
let validpass = false;

mail.addEventListener("blur", () => {
    var regMail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    message.innerHTML = '';
    if (mail.value.match(regMail)) {
        mail.classList.replace('invalid', 'valid');
        remail.addEventListener("blur", () => {
            if (mail.value != remail.value || mail.value == "") {
                mail.classList.replace('valid', 'invalid');
                remail.classList.replace('valid', 'invalid');
                message.innerHTML = 'Les deux champs ne correspondent pas';
                return false;
            } else if (mail.value == remail.value && mail.value != "") {
                mail.classList.replace('invalid', 'valid');
                remail.classList.replace('invalid', 'valid');
                message.innerHTML = '';
                validmail = true;
                return true;
            }
        })
    } else {
        mail.classList.replace('valid', 'invalid');
        message.innerHTML = 'Votre mail n\'est pas au bon format';
        return false;
    }
})

pass.addEventListener("blur", () => {
    var regPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    message.innerHTML = '';
    if (pass.value.match(regPass)) {
        pass.classList.replace('invalid', 'valid');
        repass.addEventListener("blur", () => {
            if (pass.value != repass.value) {
                pass.classList.replace('valid', 'invalid');
                repass.classList.replace('valid', 'invalid');
                message.innerHTML = 'Les mots de passes ne correspondent pas';
                return false;
            } else if (pass.value == "") {
                message.innerHTML = 'Vous devez choisir un mot de passe';
                return false;
            } else {
                pass.classList.replace('invalid', 'valid');
                repass.classList.replace('invalid', 'valid');
                validpass = true;
                message.innerHTML = '';
                if (validmail == true && validpass == true) {
                    button.removeAttribute("disabled");
                    return true;
                }
            }
        })
    } else {
        pass.classList.replace('valid', 'invalid');
        message.innerHTML = 'Votre mot de passe ne contient pas les caractères nécessaires';
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