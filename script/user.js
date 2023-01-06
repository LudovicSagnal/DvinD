user = document.querySelector(".user");
modal = document.querySelector("#modal");
cross = document.querySelector("#cross");
var show = false;

user.addEventListener("click", showModal => {
    console.log("Hello !");
    if(show == false) {
        modal.classList.remove("login-modal-none");
        modal.classList.add("login-modal-show");
        show = true;
    }
})

cross.addEventListener("click", closeModal => {
    console.log("Goodbye");
    if(show) {
        modal.classList.remove("login-modal-show");
        modal.classList.add("login-modal-none");
        show = false;
    }
})