    document.addEventListener("DOMContentLoaded", () => {
        const data16 = DATA_16PF;
        const createBarChart = (ctx, data) => {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [''],
                    datasets: [{
                        label: '',
                        data: [data],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            display: false
                        },
                        x: {
                            beginAtZero: true,
                            max: 5 // Ajusta el máximo según tus datos
                        }
                    }
                }
            });
        };

        const barChartIds = [
            'graficaReservado', 'graficaLento', 'graficaInfantil', 'graficaSumiso',
            'graficaTaciturno', 'graficaVariable', 'graficaTimido', 'graficaEmocional',
            'graficaSospechoso', 'graficaExcentrico', 'graficaSimple', 'graficaInseguro',
            'graficaRutinario', 'graficaDependiente', 'graficaDescontrolado', 'graficaTenso'
        ];

        barChartIds.forEach((id, index) => {
            const ctxElement = document.getElementById(id);
            if (ctxElement) {
                const ctx = ctxElement.getContext('2d');
                const dataKey = `p${index + 1}`;
                const value = parseInt(data16[dataKey], 10); // Convertir a número

                console.log(`Valor para ${dataKey}:`, value);

                if (isNaN(value)) {
                    console.error(`El valor para ${dataKey} no es un número válido.`);
                    createBarChart(ctx, 0); // O maneja este caso según tus necesidades
                } else {
                    createBarChart(ctx, value);
                }
            } else {
                console.error(`No se encontró el elemento canvas con ID '${id}'`);
            }
        });
    });
