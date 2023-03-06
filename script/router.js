

let whereIAm = window.location.pathname.split("/");
whereIAm = whereIAm[whereIAm.length - 1];

if(whereIAm === "view_index.php"){
    const { initSlider } = await import("../script/slider.js")   ;
    initSlider();
}