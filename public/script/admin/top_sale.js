const men = document.querySelector(".men-item");
const women = document.querySelector(".women-item");
const switch_container = document.querySelector(".switch-container");

const toggle = ()=> {
    men.classList.toggle("active");
    women.classList.toggle("active");
}
const removeToggle = ()=> {
    men.classList.remove("active")
    women.classList.to
}

switch_container.addEventListener("click",()=>{
    toggle();
}
);
