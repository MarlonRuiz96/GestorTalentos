document.addEventListener("DOMContentLoaded", () => {
    // Tomamos la variable global DATA_BRIGGS (definida en la vista)
    const dataBriggs = DATA_BRIGGS;
    console.log(dataBriggs);

    // Luego creamos la gráfica con Chart.js
    const briggsCtx = document.getElementById("myCharts").getContext("2d");
    new Chart(briggsCtx, {
        type: "bar",
        data: {
            labels: [
                "Extrovertido",
                "Introvertido",
                "Sensorial",
                "Intuitivo",
                "Racional",
                "Emocional",
                "Calificador",
                "Perceptivo"
            ],
            datasets: [{
                label: "Resultados de la prueba Myers-Briggs",
                data: [
                    dataBriggs.extrovertido,
                    dataBriggs.introvertido,
                    dataBriggs.sensorial,
                    dataBriggs.intuitivo,
                    dataBriggs.racional,
                    dataBriggs.emocional,
                    dataBriggs.calificador,
                    dataBriggs.perceptivo
                ],
                backgroundColor: [
                    "#1d864a",
                    "#fcc832",
                    "#347fab",
                    "#ff5733",
                    "#8e44ad",
                    "#3498db",
                    "#f39c12",
                    "#27ae60"
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Resultados Myers-Briggs'
                }
            }
        }
    });
});
