var show = false;
var selectBox = document.querySelectorAll(".selectBox");
var checkboxes = document.querySelectorAll(".checkBoxes");

for (let i = 0; i < selectBox.length; i++) {
    selectBox[i].addEventListener("click", showCheckboxes => {
        console.log("egor");     
        if (show) {
            checkboxes[i].style.display = "block";
            show = false;
            console.log(checkboxes[i]);
        } else {
            checkboxes[i].style.display = "none";
            show = true;
        }
    });
}