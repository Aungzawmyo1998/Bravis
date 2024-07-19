// const { main } = require("@popperjs/core");



document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById("ham-menu");
    const menu = document.querySelector(".global-container");
    const main_logo = document.querySelector(".main-logo");
    const sec_logo = document.querySelector(".sec-logo");
    const nav_container = document.querySelector(".nav-container");
    const link_data1 = document.querySelector(".link-data1");
    const link_data2 = document.querySelector(".link-data2");
    const link_data3 = document.querySelector(".link-data3");
    const link_data4 = document.querySelector(".link-data4");
    const link_data5 = document.querySelector(".link-data5");
    const link_data6 = document.querySelector(".link-data6");
    const link_data7 = document.querySelector(".link-data7");
    const searchIcon = document.querySelector(".search-icon");



     // Function to toggle the menu visibility
    const toggleMenu = ()=> {
        menu.classList.toggle("active");
        main_logo.classList.toggle("active");
        sec_logo.classList.toggle("active");
        link_data1.classList.toggle("active");
        link_data2.classList.toggle("active");
        link_data3.classList.toggle("active");
        link_data4.classList.toggle("active");
        link_data5.classList.toggle("active");
        link_data6.classList.toggle("active");
        link_data7.classList.toggle("active");
        nav_container.classList.toggle("active");
        searchIcon.classList.toggle("active");
        search_form.classList.remove('active');

    }


     // Toggle the menu when the hamburger is clicked
    hamburger.addEventListener("click", function (event){
        event.stopPropagation();
        toggleMenu();
    });

    const search_icon = document.querySelector('.search-icon');
    const search_form = document.querySelector('.search-form');
    search_icon.addEventListener('click', (e)=>{
        e.preventDefault();
        search_form.classList.toggle('active');
        menu.classList.remove('active');
        sec_logo.classList.remove('active');
        main_logo.classList.remove('active');
        link_data1.classList.remove("active");
        link_data2.classList.remove("active");
        link_data3.classList.remove("active");
        link_data4.classList.remove("active");
        link_data5.classList.remove("active");
        link_data6.classList.remove("active");
        link_data7.classList.remove("active");

    });

});
