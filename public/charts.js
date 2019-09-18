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
                    position:'left',
                    labels: {
                        fontColor: "white",
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

    document.getElementById("chartArea").appendChild(div).appendChild(canvas);
    

    let ctx = document.getElementById("radarChart").getContext("2d");
    new Chart(ctx, {
        type: "radar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Qualité du produit",
                    fill: true,
                    backgroundColor: "#d4793d56",
                    borderColor: "#d47a3d",
                    borderWidth: 1,
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "#d47a3d",
                    pointBorderColor: "#fff",
                    data: values
                }
            ]
        },
        options: {
            maintainAspectRatio: true,
            scale: {
                gridLines: {
                    color: "black"
                },
                ticks: {
                    beginAtZero: true,
                    max: 5,
                    stepSize: 1,
                    backdropColor: "transparent",
                    fontColor: "white"
                },
                pointLabels: {
                    fontColor: "#FFF"
                }
            },
            legend: {
                position:'left',
                labels: {
                    fontColor: "white",
                    fontSize: 14
                }
            }
        }
    });
}