const won_parent = document.querySelector(".won-parent");
const man_parent = document.querySelector(".man-parent");

const won_sub = document.querySelector(".won-sub");
const man_sub = document.querySelector(".man-sub");

won_parent.addEventListener("click", ()=> {
    won_sub.classList.toggle("active");
    man_sub.classList.remove("active");
});


man_parent.addEventListener("click", ()=> {
    man_sub.classList.toggle("active");
    won_sub.classList.remove("active");
});

// window.addEventListener("click", ()=>{
//     man_sub.classList.remove("active");
//     won_sub.classList.remove("active");
// })
