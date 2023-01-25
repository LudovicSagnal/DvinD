var show = true;
var selectBox = document.querySelectorAll(".selectBox");
var checkboxes = document.querySelectorAll(".checkBoxes");

for (let i = 0; i < selectBox.length; i++) {
    selectBox[i].addEventListener("click", showCheckboxes => {
        var checkboxes = document.querySelectorAll(".checkBoxes");
        if (show) {
            checkboxes[i].style.display = "block";
            show = false;
            // console.log(checkboxes[i]);
        } else {
            checkboxes[i].style.display = "none";
            show = true;
        }
    });
}

// let multipleSelectBox = document.querySelectorAll(".multipleSelection")
// let count = 0;
// multipleSelectBox.forEach(box => {
//     box.addEventListener("click", showCheckboxes => {
//         console.log(box.lastElementChild);
//         if (show) {
//             box.lastElementChild.style.display = "block";
//             show = false;
//             // console.log(checkboxes[i]);
//         } else {
//             box.lastElementChild.style.display = "none";
//             show = true;
//         }
//     });

// });