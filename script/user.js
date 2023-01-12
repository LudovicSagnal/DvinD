user = document.querySelector(".user");
modalUser = document.querySelector("#modal-user");
crossUser = document.querySelector("#cross");
overlay = document.querySelector("#overlay");
var show = false;

user.addEventListener("click", showModal => {
    console.log("Hello !");
    if(show == false) {
        modalUser.classList.remove("display-none");
        modalUser.classList.add("login-modal-show");
        overlay.classList.add("modal-overlay");
        overlay.classList.remove("display-none");
        show = true;
    }
})

crossUser.addEventListener("click", closeModal => {
    console.log("Goodbye");
    if(show) {
        console.log();
        modalUser.classList.remove("login-modal-show");
        modalUser.classList.add("display-none");
        overlay.classList.remove("modal-overlay");
        overlay.classList.add("display-none");
        show = false;
    }
})