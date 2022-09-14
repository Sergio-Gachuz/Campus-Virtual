$(document).ready(function () {
    $.ajax({
        url: "grafico_norma_3.php",
        type: "GET",
        success: function (data) {
            var data = JSON.parse(data);
            var descripcion = [];
            var realizado = [];
            var norealizado = [];
            for (var i in data) {
                descripcion.push("" + data[i].descripcion);
                realizado.push(data[i].realizado);
                norealizado.push(data[i].norealizado);
            }

            var chartdata = {
                labels: descripcion,
                datasets: [
                    {
                        label: " # Realizado",
                        fill: false,
                        lineTension: 0.3,
                        backgroundColor: chartColors.green,
                        borderColor: chartColors.green,
                        pointHoverBackgroundColor: chartColors.green,
                        pointHoverBorderColor: chartColors.green,
                        hoverBackgroundColor: chartColors.green,
                        data: realizado,
                        yAxisID: "y-axis-1"
                    },
                    {
                        label: " # No Realizado",
                        fill: false,
                        lineTension: 0.3,
                        backgroundColor: chartColors.red,
                        borderColor: chartColors.red,
                        pointHoverBackgroundColor: chartColors.red,
                        pointHoverBorderColor: chartColors.red,
                        hoverBackgroundColor: chartColors.red,
                        data: norealizado,
                        yAxisID: "y-axis-2"
                    }
                ]
            };

            var ctx = $("#tomo_3");
            ctx.height = 300;
            ctx.width = 300;

            var LineGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    title: {
                        display: true,
                        text: '',
                        maintainAspectRatio: false,
                        fontColor: chartColors.green
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: ''
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }],
                        yAxes: [{
                            type: "linear",
                            display: true,
                            position: "left",
                            id: "y-axis-1",
                            scaleLabel: {
                                display: false,
                                labelString: 'value'
                            },ticks: {
                                display: false,
                                beginAtZero: true
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        },{
                            type: "linear",
                            display: true,
                            position: "left",
                            id: "y-axis-2",
                            scaleLabel: {
                                display: false,
                                labelString: 'value'
                            },ticks: {
                                display: false,
                                beginAtZero: true
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }]
                    }
                }
            });
        },
        error: function (data) {

        }
    });
});
window.chartColors = {
    red: '#af62b3',
    green: '#3cbd9b',
};