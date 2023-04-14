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


function initCheckboxes(checkboxesAll, checkboxes) {
  checkboxesAll.addEventListener('change', function() {
    if (this.checked) {
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
      });
    } else if (checkboxes.some(function(checkbox) {
      return checkbox.checked;
    }));
  });

  checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
      if ([...checkboxes].some(function(checkbox) {
        return checkbox.checked;
      })) {
        checkboxesAll.checked = false;
      } else {
        checkboxesAll.checked = true;
      }
    });
  });
}

initCheckboxes(checkboxesAll[0], platformCheckboxes);
initCheckboxes(checkboxesAll[1], langCheckboxes);
initCheckboxes(checkboxesAll[2], dateCheckboxes);
initCheckboxes(checkboxesAll[3], tagCheckboxes);

async function getFilters() {
  var page = document.querySelector("#pagination").value;
  var formData = new FormData();
  formData.append("filter", 1);
  formData.append("page", page);

  document.getElementsByName("platform[]").forEach((element) => {
    if(element.checked) {
      formData.append("platform[]", element.value);
    }
  });

  document.getElementsByName("lang[]").forEach((element) => {
    if(element.checked) {
      formData.append("lang[]", element.value);
    }
  });

  document.getElementsByName("date[]").forEach((element) => {
    if(element.checked) {
      formData.append("date[]", element.value);
    }
  });

  document.getElementsByName("tag[]").forEach((element) => {
    if(element.checked) {
      formData.append("tag[]", element.value);
    }
  });

  try {
    const response = await fetch("../controllers/controller_list.php", {
      method: "POST",
      body: formData,
    });
    const result = await response.json();
    console.log(result);

    const ul = document.querySelector('.dynamic-list');
    ul.innerHTML = '';

    result.finalQuery.forEach(game => {
        const li = document.createElement('li');
        li.innerHTML = `<a class="search-list" href="view_fiche_de_jeu.php?id=${game.id}">${game.name}</a>`;
        ul.appendChild(li);
    });

    const pagination = document.querySelector('.pagination');
    pagination.innerHTML = '';
    const totalPages = Math.ceil(result.nbResult / 20); // Calculate the total number of pages
    for (let i = 1; i <= totalPages; i++) {
      if (i == page) {
        const span = document.createElement('span');
        span.textContent = i;
        pagination.appendChild(span);
      } else {
        const a = document.createElement('a');
        a.href = `#`;
        a.addEventListener("click", function() {
          changePagination(i);
          document.querySelector("#form-filters").dispatchEvent(new Event("change"));
        });
        a.textContent = i;
        pagination.appendChild(a);
      }
    }

  } catch (error) {
    console.error(error);
  }

}

function changePagination(value) {
  document.querySelector("#pagination").value = value;
}

function resetFilters() {
  // sessionStorage.clear();
  checkboxesAll.forEach(checkbox => checkbox.checked = true);
  platformCheckboxes.forEach(checkbox => checkbox.checked = false);
  langCheckboxes.forEach(checkbox => checkbox.checked = false);
  dateCheckboxes.forEach(checkbox => checkbox.checked = false);
  tagCheckboxes.forEach(checkbox => checkbox.checked = false);
  window.location.reload();
}

// document.querySelector('#reset').addEventListener("click", resetFilters());

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
// let form = document.querySelector('#form-filters');
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
document.querySelector("#form-filters").onchange();