<?php require_once APPPATH . 'views/Dashboard/partesuperior.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">
    <title>Prueba Psicometrica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <header>
        <h1 class="text-center">Pruebas Psicometricas</h1>
    </header>

    <div class="container">

        <main>
            <h2 class="text-center">Datos del Candidato</h2>

            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombres</label>
                        <input type="text" class="form-control" id="nombres"
                            value="<?php echo $candidato_data->Nombres; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Puesto</label>
                        <input type="text" class="form-control" id="Puesto"
                            value="<?php echo $candidato_data->Puesto; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Contacto</label>
                        <input type="text" class="form-control" id="Contacto"
                            value="<?php echo $candidato_data->Contacto; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Correo</label>
                        <input type="text" class="form-control" id="Correo"
                            value="<?php echo $candidato_data->Correo; ?>" readonly>
                    </div>
                </div>




            </form>
            <form id="editForm" action="<?php echo site_url('CandidatoController/guardarNotas'); ?>" method="POST">

                <div class="container">
                    <div class="row">
                        <!-- Columna 1: Gráfico -->
                        <div class="col-md-6">
                            <canvas id="myChart"></canvas>
                        </div>
                        <!-- Columna 2: Espacio para anotaciones -->

                        <div class="col-md-6">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">DPI</label>
                                <input type="text" class="form-control" id="DPI"
                                    name="DPI"
                                    value="<?php echo $candidato_data->DPI; ?>" readonly>
                            </div>
                            <h2>Anotaciones</h2>
                            <!-- Textarea más grande para anotaciones -->
                            <textarea class="form-control" rows="5" id="Anotaciones"
                                name="notas"><?php echo $candidato_data->notas; ?></textarea>
                            <!-- Botón de guardar -->
                            <button class="btn btn-primary mt-3" id="GuardarAnotaciones">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Melancólico -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Melancólico</h2>
                        <div class="d-flex flex-wrap">
                            <!-- Tabla de Fortalezas -->
                            <div class="mr-3 mb-3">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Fortalezas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($FortalezaA as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->Personalidad; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Tabla de Debilidades -->
                            <div class="mb-3">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Debilidades</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($DebilidadA as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->Personalidad; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h2>Colerico</h2>
                        <div class="d-flex flex-wrap">
                            <!-- Tabla de Fortalezas -->
                            <div class="mr-3 mb-3">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Fortalezas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($FortalezaB as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->Personalidad; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Tabla de Debilidades -->
                            <div class="mb-3">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Debilidades</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($DebilidadB as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->Personalidad; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h2>Flematico</h2>
                        <div class="d-flex flex-wrap">
                            <!-- Tabla de Fortalezas -->
                            <div class="mr-3 mb-3">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Fortalezas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($FortalezaC as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->Personalidad; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Tabla de Debilidades -->
                            <div class="mb-3">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Debilidades</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($DebilidadC as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->Personalidad; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Sanguineo</h2>
                        <div class="d-flex flex-wrap">
                            <!-- Tabla de Fortalezas -->
                            <div class="mr-3 mb-3">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Fortalezas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($FortalezaD as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->Personalidad; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Tabla de Debilidades -->
                            <div class="mb-3">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Debilidades</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($DebilidadD as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->Personalidad; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Repite la estructura para otras personalidades -->


        </main>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Convierte los datos de $dataTemperamento en formato JSON
            var temperamentoData = <?php echo json_encode($dataTemperamento); ?>;
            console.log(temperamentoData);

            // Configuración de datos para la gráfica
            var data = {
                labels: ['Melancólico', 'Flemático', 'Colérico', 'Sanguíneo'],
                datasets: [{
                    label: 'Temperamentos',
                    data: [temperamentoData.melancolico, temperamentoData.colerico, temperamentoData.flematico, temperamentoData.sanguineo],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 228, 225)'
                    ]
                }]
            };

            // Otras opciones de configuración de la gráfica
            var options = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Crear la gráfica utilizando Chart.js
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options
            });
        </script>
    </div>
</body>

</html>