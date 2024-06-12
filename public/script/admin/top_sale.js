// const men = document.querySelector(".men-item");
// const women = document.querySelector(".women-item");
// const menSale = document.querySelector(".men-top-sale");
// const switch_container = document.querySelector(".switch-container");
// for switch container
// men.addEventListener("click", ()=>{
//     men.classList.add("active");
//     women.classList.remove("active");
//     menSale.classList.add("active");
// });

// women.addEventListener("click", ()=>{
//     men.classList.remove("active");
//     women.classList.add("active");
//     menSale.classList.remove("active");
// })

// const switchItem = document.getElementsByClassName("switch-item");
// const men = document.getElementById("men");
// const women = document.getElementById("womwn");

function selectItem(item,switchBtn) {
    const selectContainer = document.getElementsByClassName('sale');
    const switchItem = document.getElementsByClassName('switch-item');
    for (let i=0; i<selectContainer.length; i++) {
        selectContainer[i].style.display = "none";
    }
    for (let i=0; i<switchItem.length; i++ ) {
        switchItem[i].style.backgroundColor = "transparent";
        switchItem[i].style.boxShadow = "2px 2px 5px #777777 inset";
    }
    // console.log(switch.length);
    document.getElementById(switchBtn).style.backgroundColor = "#63C7FF";
    document.getElementById(switchBtn).style.boxShadow = "2px 2px 5px #777777";
    document.getElementById(item).style.display="block";
}



// men top sale

const menLabels = ["Italy", "France", "Spain", "USA", "Argentina"];
const menData = [55, 49, 44, 24, 15];
const menColor = ["#b91d47","#00aba9","#2b5797","#e8c3b9","#1e7145"];

new Chart("menDoughnutChart", {
    type: "doughnut",
    data: {
        labels: menLabels,
        datasets: [{
            backgroundColor: menColor,
            data: menData
        }]
    },
    Option: {
        title: {
            display: true,
            text: "men"

        }
    }
});
const womenLabels = ["TShirt", "France", "Spain", "USA", "Argentina"];
const womenData = [55, 49, 44, 24, 15];
const womenColor = ["#b91d47","#00aba9","#2b5797","#e8c3b9","#1e7145"];
new Chart("womenDoughnutChart", {
    type: "doughnut",
    data: {
        labels: womenLabels,
        datasets: [{
            backgroundColor: womenColor,
            data: womenData,
        }]
    },
    Option: {
        title: {
            display: true,
            text: "women"
        }
    }
});

