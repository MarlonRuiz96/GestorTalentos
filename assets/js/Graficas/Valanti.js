document.addEventListener("DOMContentLoaded", () => {
    // Tomamos las variables globales definidas en la vista
    const dataValanti = DATA_VALANTI;
    const candidato = CANDIDATO_DATA;

    // Gráfico Radar para Valanti
    const radarCtx = document.getElementById("radiaGlChart").getContext("2d");
    new Chart(radarCtx, {
        type: "radar",
        data: {
            labels: ["Verdad", "Rectitud", "Paz", "Amor", "No Violencia"],
            datasets: [
                {
                    label: candidato.Nombres,
                    data: [
                        dataValanti.Verdad,
                        dataValanti.Rectitud,
                        dataValanti.Paz,
                        dataValanti.Amor,
                        dataValanti.No_violencia
                    ],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 3
                },
                {
                    label: 'Gestor de Talentos',
                    data: [
                        dataValanti.verdadEmpresa,
                        dataValanti.rectitudEmpresa,
                        dataValanti.pazEmpresa,
                        dataValanti.amorEmpresa,
                        dataValanti.noViolenciaEmpresa
                    ],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 3
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Resultados Valanti'
                }
            }
        }
    });
});
