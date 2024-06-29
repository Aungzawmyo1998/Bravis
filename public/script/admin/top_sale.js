

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



// all top sale

var menCount = document.getElementById('menCount').value;
var womenCount = document.getElementById('womenCount').value;
var sportCount = document.getElementById('sportCount').value;
var accessoresCount = document.getElementById('accessoresCount').value;

// console.log(sportCount);


const Labels = ["Women", "Men", "Accessories", "Sport"];
const Data = [womenCount, menCount, accessoresCount, sportCount];
const Color = ["#b91d47","#00aba9","#2b5797","#e8c3b9"];

new Chart("DoughnutChart", {
    type: "doughnut",
    data: {
        labels: Labels,
        datasets: [{
            backgroundColor: Color,
            data: Data
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

