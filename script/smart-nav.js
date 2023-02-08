ham = document.querySelector('.hamburger');
nav = document.querySelector('#smart-nav');
showNav = false;

ham.addEventListener('click', show => {
    if (showNav) {
        console.log('goodbye');
        nav.classList.add('display-none');
        nav.classList.remove('smart-nav');
        showNav = false;
    }else {
        console.log('hello');
        nav.classList.remove('display-none');
        nav.classList.add('smart-nav');
        showNav = true;
        console.log(showNav);
    }
});