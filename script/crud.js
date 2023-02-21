show = document.querySelectorAll('.show-list');
table = document.querySelectorAll('table');
rUSer = false;
rGame = false;

show[0].addEventListener('click', () => {
    if (rUSer) {
        table[0].classList.add('d-none');
        rUSer = false;
    }else {
        table[0].classList.remove('d-none');
        rUSer = true;
    }
})

show[1].addEventListener('click', () => {
    if (rGame) {
        table[1].classList.add('d-none');
        rGame = false;
    }else {
        table[1].classList.remove('d-none');
        rGame = true;
    }
})