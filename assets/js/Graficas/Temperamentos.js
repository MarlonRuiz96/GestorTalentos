document.addEventListener("DOMContentLoaded", () => {
    // Tomamos la variable global DATA_TEMPERAMENTOS (definida en la vista)
    const dataTemperamentos = DATA_TEMPERAMENTOS;

    // Gráfico Doughnut para Temperamentos
    const doughnutCtx = document.getElementById('myChart').getContext('2d');
    new Chart(doughnutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Melancólico', 'Flemático', 'Colérico', 'Sanguíneo'],
            datasets: [{
                label: 'Temperamentos',
                data: [
                    dataTemperamentos.melancolico,
                    dataTemperamentos.flematico,
                    dataTemperamentos.colerico,
                    dataTemperamentos.sanguineo
                ],
                backgroundColor: [
                    'rgb(23, 162, 184)', // Melancólico
                    'rgb(40, 167, 69)',  // Flemático
                    'rgb(220, 53, 69)',  // Colérico
                    'rgb(255, 193, 7)'   // Sanguíneo
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Distribución de Temperamentos'
                }
            }
        }
    });
});
