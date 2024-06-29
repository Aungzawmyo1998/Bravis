const monthLabels = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
const monthData = [65, 59, 80, 81, 56, 55, 40, 45, 60, 70, 75, 90];
const monthColors = ["#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9", "#447EA9"];

new Chart("monthlyChart",{
    type: "bar",
    data: {
        labels: monthLabels,
        datasets: [{
            backgroundColor: monthColors,
            data: monthData
          }]
    },
    options: {
        legend: { display: false },
        title: {
          display: true,
          text: "Monthly Data for the Year"
        }
    },


} );
