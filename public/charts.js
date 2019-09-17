function pieCharts(data){
    console.log(data)
    let colors = ['#DB2C2C','#DB7B2C','#D8DB2C','#7BDB2C','#2CDBA7','#2C9BDB','#2C2FDB','#922CDB','#DB2CD8','#DB2C72'];
    
    for(i = 0; i<data.length;i++){
        let labels = [];
        let values = [];
        Object.keys(data[i]).map((key) => {
            labels.push(key);
        });
        Object.values(data[i]).map((value) => {
            values.push(value);
        });

        let div = document.createElement("div");
        div.setAttribute("class", "col-md-6 chart_container");
        let canvas = document.createElement("canvas");
        canvas.id = "pie_" + i;

        document.getElementById("chartArea").appendChild(div).appendChild(canvas);

        let ctx = document.getElementById("pie_" + i).getContext("2d");
        new Chart(ctx, {
            type: "pie",
            data: {
                datasets: [
                    {
                        data: values,
                        backgroundColor: colors
                    }
                ],
                labels: labels
            },
            options: {
                elements: {
                    arc: {
                        borderWidth: 1,
                        borderColor: "#fff"
                    }
                },
                legend: {
                    labels: {
                        fontColor: "black",
                        fontSize: 14
                    }
                }
            }
        });
    }
}

function radarCharts(data) {
    let labels = [];
    let values = [];
    Object.keys(data).map((key) => {
        labels.push(key);
    });
    Object.values(data).map((value) => {
        values.push(value);
    });

    let div = document.createElement("div");
    div.setAttribute("class", "col-md-6 chart_container");
    let canvas = document.createElement("canvas");
    canvas.id = "radarChart";

    document
        .getElementById("chartArea")
        .appendChild(div)
        .appendChild(canvas);

    let ctx = document.getElementById("radarChart").getContext("2d");
    new Chart(ctx, {
        type: "radar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Résultats qualité",
                    fill: true,
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 1,
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "rgba(255,99,132,1)",
                    pointBorderColor: "#fff",
                    data: values
                }
            ]
        },
        options: {
            maintainAspectRatio: true,
            scale: {
                ticks: {
                    beginAtZero: true,
                    max: 5,
                    stepSize: 1,
                    backdropColor: "#37404a",
                    fontColor: "black"
                },
                pointLabels: {
                    fontColor: "#FFF"
                }
            },
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 14
                }
            }
        }
    });
}