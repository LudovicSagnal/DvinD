const multipleSelectBoxes = document.querySelectorAll(".multipleSelection");

multipleSelectBoxes.forEach(multipleSelectBox => {
    const selectBox = multipleSelectBox.querySelector(".selectBox");
    const checkboxes = multipleSelectBox.querySelector(".checkBoxes");

    selectBox.addEventListener("click", () => {
        if (!checkboxes.style.display || checkboxes.style.display === "none") {
            checkboxes.style.display = "block";
        } else {
            checkboxes.style.display = "none";
        }
    });
});

const checkboxesAll = document.querySelectorAll('input[value="Tous"]');
const platformCheckboxes = document.querySelectorAll('input[name="platform[]"]:not([value="Tous"])');
const langCheckboxes = document.querySelectorAll('input[name="lang[]"]:not([value="Tous"])');
const dateCheckboxes = document.querySelectorAll('input[name="date[]"]:not([value="Tous"])');
const tagCheckboxes = document.querySelectorAll('input[name="tag[]"]:not([value="Tous"])');

checkboxesAll[0].addEventListener('change', function() {
  if (this.checked) {
    platformCheckboxes.forEach(function(checkbox) {
      checkbox.checked = true;
    });
  } else {
    platformCheckboxes.forEach(function(checkbox) {
      checkbox.checked = false;
    });
  }
});
checkboxesAll[1].addEventListener('change', function() {
  if (this.checked) {
    langCheckboxes.forEach(function(checkbox) {
      checkbox.checked = true;
    });
  } else {
    langCheckboxes.forEach(function(checkbox) {
      checkbox.checked = false;
    });
  }
});
checkboxesAll[2].addEventListener('change', function() {
  if (this.checked) {
    dateCheckboxes.forEach(function(checkbox) {
      checkbox.checked = true;
    });
  } else {
    dateCheckboxes.forEach(function(checkbox) {
      checkbox.checked = false;
    });
  }
});
checkboxesAll[3].addEventListener('change', function() {
  if (this.checked) {
    tagCheckboxes.forEach(function(checkbox) {
      checkbox.checked = true;
    });
  } else {
    tagCheckboxes.forEach(function(checkbox) {
      checkbox.checked = false;
    });
  }
});

// list = document.querySelector('#search-list');

// function initPlatform() {

//     fetch("../controllers/controller_list.php?", {
//     })
//     .then((response) => response.json())
//     .then((result) => {
//         list.innerHTML = `<a href="view_fiche_de_jeu.php?id=`+result.id`"><`+result.name`</a>result.`
//     });
// }

// let list = document.querySelector('#search-list');
// let form = document.querySelector('#form-platform');
// form.preventDefault;

// function initPlatform() {
//     fetch("../controllers/controller_list.php", {})
//         .then((response) => response.json())
//         .then((result) => {
//             console.log(result);
//             result.forEach((platform) => {
//                 const li = document.createElement('li');
//                 const a = document.createElement('a');
//                 a.href = 'view_fiche_de_jeu.php?id=' + platform.id;
//                 a.innerText = platform.name;
//                 li.appendChild(a);
//                 list.appendChild(li);
//             });
//         });
// }

// const multipleSelectBoxes = document.querySelectorAll(".multipleSelection");

// multipleSelectBoxes.forEach(multipleSelectBox => {
//     multipleSelectBox.addEventListener("click", () => {
//         const checkboxes = multipleSelectBox.querySelector(".checkBoxes");

//         if (!checkboxes.style.display || checkboxes.style.display === "none") {
//             checkboxes.style.display = "block";
//         } else {
//             checkboxes.style.display = "none";
//         }
//     });
// });

// function checkUncheck(checkBox) {

// get = document.getElementsByName('platform');

// for(var i=0; i<get.length; i++) {

// get[i].checked = checkBox.checked;}

// }

// var show = true;
// var selectBox = document.querySelectorAll(".selectBox");
// var checkboxes = document.querySelectorAll(".checkBoxes");

// for (let i = 0; i < selectBox.length; i++) {
//     selectBox[i].addEventListener("click", showCheckboxes => {
//         var checkboxes = document.querySelectorAll(".checkBoxes");
//         if (show) {
//             checkboxes[i].style.display = "block";
//             show = false;
//         } else {
//             checkboxes[i].style.display = "none";
//             show = true;
//         }
//     });
// }

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