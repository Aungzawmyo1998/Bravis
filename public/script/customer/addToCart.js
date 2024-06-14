const openCartBtn = document.getElementById("open-cart");
const closeCartBtn = document.getElementById("close-cart");
const showCart = document.querySelector(".add-to-cart");

openCartBtn.addEventListener("click", ()=>{

    // console.log("click");
    showCart.classList.add("active");
});

closeCartBtn.addEventListener('click', ()=> {
    showCart.classList.remove('active');
});

