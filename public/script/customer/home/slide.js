// const { Button } = require("bootstrap");



const slide_buttons = document.querySelectorAll("#slide .slide-btn");
const slider = document.querySelector("#slide .card-container");
const max_scroll_left = slider.scrollWidth - slider.clientWidth;
const sliderScrollbar = document.querySelector("#slide .scroll-bar");
const scrollbarThumb = sliderScrollbar.querySelector(".scroll-thumb");



const initSlide = ()=>{

    slide_buttons.forEach(button => {
        button.addEventListener("click",()=>{

            const direction = button.id === "previus" ? -1 : 1;
            const scrollAmount = slider.clientWidth * direction;

            slider.scrollBy({ left: scrollAmount, behavior:"smooth"});

        });
    });

    const handleSlidebutton = () => {
        slide_buttons[0].style.display = slider.scrollLeft <= 0 ? "none" : "block";
        slide_buttons[1].style.display = slider.scrollLeft >= max_scroll_left ? "none" : "block";
    }

    // scroll bar slide
    const  updateScrollThumbPosition = ()=> {
        const scrollPosition = slider.scrollLeft;
        const thumbPosition = (scrollPosition / max_scroll_left) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);

        scrollbarThumb.style.left = `${thumbPosition}px`;
        // console.log(thumbPosition);

    }

    // scroll bar mouse down
    scrollbarThumb.addEventListener("mousedown", (e)=>{
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;

        const handleMouseMove = (e)=>{
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;


            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * max_scroll_left;

            scrollbarThumb.style.left = `${boundedPosition}px`;
            slider.scrollLeft = scrollPosition;
        }
        // remove event listener
        const handleMouseUp = ()=> {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        }
        // add event listening
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });


    slider.addEventListener("scroll", ()=>{
        handleSlidebutton();
        updateScrollThumbPosition();
    });


}

window.addEventListener("load", initSlide);
