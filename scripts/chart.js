const myChart = document.querySelector('.my-chart');
const chartData = {
    labels: ["Purchases", "Sales", "Suppliers"],
    data: [10, 60, 30],
};

new Chart(myChart, {
    type: "doughnut",
    data: {
        labels: chartData.labels,
        datasets: [
            {
                label: "Count",
                data: chartData.data,
            }
        ]
    }
})