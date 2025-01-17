document.addEventListener("DOMContentLoaded", () => {
    /*
     * 1. Gráficas lineales Cleaver
     */

    // Tomamos las variables globales definidas en la vista
    const cleaver = CLEAVER;     // dataCleaver
    const cleaver2 = CLEAVER2;   // candidato_data (si necesitas usarlo)
    console.log('Datos Cleaver:', cleaver2);

    // Función para crear gráficas de línea
    const createLineChart = (ctx, label, data, color) => {
        // Convertir los datos de cadena a número
        const numericData = data.map(value => parseInt(value, 10));

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['D', 'I', 'S', 'C'], // Ajusta si es necesario
                datasets: [{
                    label: label,
                    data: numericData,
                    backgroundColor: color,
                    borderColor: color,
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 5 // Escala de 5 en 5
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    };

    // Crear gráficos de línea para Cleaver (NORMAL / MOTIVACIÓN / PRESIÓN)
    createLineChart(
        document.getElementById('normalChart').getContext('2d'),
        'NORMAL',
        [cleaver.T1, cleaver.T2, cleaver.T3, cleaver.T4],
        'blue'
    );
    createLineChart(
        document.getElementById('motivacionChart').getContext('2d'),
        'MOTIVACIÓN',
        [cleaver.M1, cleaver.M2, cleaver.M3, cleaver.M4],
        'green'
    );
    createLineChart(
        document.getElementById('presionChart').getContext('2d'),
        'PRESIÓN',
        [cleaver.L1, cleaver.L2, cleaver.L3, cleaver.L4],
        'red'
    );


    /*
     * 2. Gráficas Doughnut para la interpretación DISC
     */

    // Tomamos los datos de interpretación DISC
    const discData = INTERPRETACION_CLEAVER; // interpretacionCleaver

    // Función para crear gráficas de dona
    const createDoughnutChart = (ctx, label, value, color, valueElementId) => {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [label, ''],
                datasets: [{
                    data: [value, 100 - value], // ejemplo: 70 vs 30
                    backgroundColor: [color, '#e0e0e0'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    tooltip: {
                        enabled: false
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Mostrar el valor numérico en el elemento HTML debajo de la gráfica
        document.getElementById(valueElementId).textContent = value;
    };

    // Crear doughnuts
    createDoughnutChart(
        document.getElementById('dominanceChart').getContext('2d'),
        'Dominio',
        discData.D,
        'rgb(75, 192, 192)',
        'dominanceValue'
    );
    createDoughnutChart(
        document.getElementById('influenceChart').getContext('2d'),
        'Influencia',
        discData.I,
        'rgb(255, 159, 64)',
        'influenceValue'
    );
    createDoughnutChart(
        document.getElementById('stabilityChart').getContext('2d'),
        'Estabilidad',
        discData.S,
        'rgb(54, 162, 235)',
        'stabilityValue'
    );
    createDoughnutChart(
        document.getElementById('conscientiousnessChart').getContext('2d'),
        'Conciencia',
        discData.C,
        'rgb(153, 102, 255)',
        'conscientiousnessValue'
    );
});
