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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


</head>

<body>
    <header>
        <h1 class="text-center">Candidato</h1>
    </header>

    <div class="container">

        <main>
            <a href="<?= site_url('CandidatoController/reporte/' . $candidato_data->idCandidato); ?>"
                class="btn btn-warning sweetalert-linkReporte" data-title="Generar Reporte"
                style="float: right;">Generar Reporte</a>

            <h2 class="text">
                Datos del Candidato

            </h2>

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


            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                    <li class="page-item">
                        <a class="page-link" href="#">Temperamentos</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Myers-Briggs</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Valanti</a>
                    </li>

                </ul>
            </nav>


            <div class="contenido div-ocultar">
                <main>
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 style="margin-right: 500px;">Temperamentos</h2>
                        <div>
                            <a href="<?= site_url('CandidatoController/activarTemperamento/' . $candidato_data->DPI); ?>"
                                class="btn btn-success sweetalert-link" data-title="Activar temperamento">Activar</a>

                            <a href="<?= site_url('CandidatoController/desactivarTemperamento/' . $candidato_data->DPI); ?>"
                                class="btn btn-danger sweetalert-link2"
                                data-title="Desactivar temperamento">Desactivar</a>
                        </div>
                    </div>



                    <form id="editForm" action="<?php echo site_url('CandidatoController/guardarNotas'); ?>"
                        method="POST">

                        <div class="container">
                            <div class="row">
                                <!-- Columna 1: Gráfico -->
                                <div class="col-md-6">
                                    <canvas id="myChart"></canvas>
                                </div>
                                <button id="saveChartButton">Guardar Gráfico</button>

                                <!-- Columna 2: Espacio para anotaciones -->

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="DPI" name="DPI"
                                        value="<?php echo $candidato_data->DPI; ?>" style="display: none;">

                                    <h2>Anotaciones</h2>
                                    <!-- Textarea más grande para anotaciones -->
                                    <textarea class="form-control" rows="5" id="Anotaciones"
                                        name="notas"><?php echo $candidato_data->notas; ?></textarea>
                                    <!-- Botón de guardar -->
                                    <button class="btn btn-primary mt-3 sweetalert-guardadsr"
                                        id="GuardarAnotaciones">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>



                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> <br>
                                    <?php echo $textoFortaleza['texto'];
                                    ?><br>
                                    FORTALEZAS
                                </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Las emociones del
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?>
                                </th>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> en el trabajo
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $textoFortaleza['emociones'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $textoFortaleza['trabajo'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                        <thead>
                            <tr>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> como padre.
                                </th>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> como amigo.
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $textoFortaleza['familia'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $textoFortaleza['amigo'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                    <!-- Repite la estructura para otras personalidades -->
                    <br><br>

                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> <br>
                                    <?php echo $textoFortaleza['texto'];
                                    ?><br>
                                    DEBILIDADES
                                </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Las emociones del
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?>
                                </th>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> en el trabajo
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $textoFortaleza['emocionesD'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $textoFortaleza['trabajoD'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                        <thead>
                            <tr>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> como padre.
                                </th>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> como amigo.
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $textoFortaleza['familiaD'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $textoFortaleza['amigoD'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>

                    </table>
            </div>
            <div class="contenido div-ocultar-2">
                <main>

                    <div class="d-flex justify-content-between align-items-center">
                        <h2 style="margin-right: 500px;">Resultados de la Prueba Myers-Briggs</h2>
                        <div>
                            <a href="<?= site_url('CandidatoController/activarbriggs/' . $candidato_data->DPI); ?>"
                                class="btn btn-success sweetalert-briggs"
                                data-title="¿Activar la prueba Myers-Briggs? ">Activar</a>
                            <a href="<?= site_url('CandidatoController/desactivarbriggs/' . $candidato_data->DPI); ?>"
                                class="btn btn-danger sweetalert-briggs2"
                                data-title="¿Desactivar la prueba Myers-Briggs?">Desactivar</a>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <!-- Columna 1: Gráfico -->
                            <canvas id="myCharts" width="50" height="20"></canvas>

                            <!-- Columna 2: Espacio para anotaciones -->


                        </div>

                        <div class="Extrovertido">
                            <h2>Extrovertido</h2>
                            <p>
                                Remite al adjetivo extravertido, al que define como “dado a la extraversión”. Y a su
                                vez, considera a la extraversión como la inclinación de la persona hacia el mundo
                                exterior, propia de quienes tienen un carácter abierto, gracias a lo cual les resulta
                                fácil vincularse con los demás. Si bien ambos términos están admitidos, se considera más
                                adecuado extravertido; se cree que extrovertido surge por influencia de su antónimo,
                                introvertido.
                            </p>
                        </div>
                        <div class="Introvertido">
                            <h2>Introvertido</h2>
                            <p>
                                Está preocupado por el mundo interior, de la mente, disfrutan pensar, explorar sus
                                pensamientos y emociones. La introversión es una actitud típica que se caracteriza por
                                la concentración del interés en los procesos internos del sujeto. Tienden a ser
                                sumamente introspectivos.
                            </p>
                        </div>
                        <div class="Sensorial">
                            <h2>Sensorial</h2>
                            <p>
                                Los sentidos son las distintas capacidades de un ser vivo para, apelando a ciertos
                                órganos, lograr la percepción de estímulos internos o externos. El ser humano tiene
                                cinco sentidos primordiales: el olfato, el tacto, el oído, el gusto y la vista. La
                                sensibilidad, asimismo, es la facultad que permite sentir (experimentar una sensación).
                            </p>
                        </div>

                        <div class="Intuitivo">
                            <h2>Intuitivo</h2>
                            <p>
                                Persona que tiene la facultad de comprender las cosas al instante, sin necesidad de
                                realizar complejos razonamiento. El término también se utiliza para hacer referencia al
                                resultado de intuir. Se utiliza como sinónimo de presentimiento (tener la sensación de
                                que algo va a ocurrir o adivinar algo antes de que suceda)
                            </p>
                        </div>

                        <div class="Racional">
                            <h2>Racional</h2>
                            <p>
                                Persona que emplea la razón y tiene la facultad de discutir el motivo o causa, el
                                argumento que se esgrime para apoyar algo, o el cociente intelectual que en ocasiones no
                                necesita ser alto para mostrar su capacidad de razonamiento, son personas que se guían
                                por las objetividades y no son aptas para aceptar cualquier teoría que no haya ninguna
                                prueba.
                            </p>
                        </div>

                        <div class="Emocional">
                            <h2>Emocional</h2>
                            <p>
                                Se clasifica como emocional a una persona o situación en la cual diferentes tipos de
                                sentimientos están visibles y a flor de piel. Es importante entender que una emoción es
                                un fenómeno tanto físico como psíquico y que, por tanto, tales eventos no son siempre
                                manejables y medibles de manera voluntaria por los individuos, derivando en
                                personalidades en las cuales el sector emocional ejerce mayor influencia o poder sobre
                                el sector racional del comportamiento.
                            </p>
                        </div>

                        <div class="Calificador">
                            <h2>Calificador</h2>
                            <p>
                                Personalidad que emplea distintos criterios para calificar a las personas, situaciones y
                                objetos que se proponga a distinguir. Tiende a enumerar y clasificar varios eventos
                                conforme lo establece su ideología y muy pocas veces comparte la opinión de los demás
                                dando a entender que su opinión es la verdadera porque lo ha entendido en varias formas.
                            </p>
                        </div>

                        <div class="Perceptivo">
                            <h2>Perceptivo</h2>
                            <p>
                                Personalidad que interpreta y entiende mejor la información que recibe a través de la
                                experiencia (probar, ver, saborear, etc.). y entiende que las cosas tienen un
                                significado de manera inteligente. No es necesario que la persona obtenga una formación
                                académica adecuada; porque, se basa en su método empírico.
                            </p>
                        </div>


                    </div>
                </main>
                <br>
            </div>
            <!-- PRUEBA VALANTI-->
            <div class="contenido div-ocultar-3">
                <main>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 style="margin-right: 500px;">Perfil valoral, cuestionario Valanti</h2>
                            <div>
                                <a href="<?= site_url('CandidatoController/activarValanti/' . $candidato_data->DPI); ?>"
                                    class="btn btn-success sweetalert-briggs"
                                    data-title="¿Activar la prueba Valanti? ">Activar</a>
                                <a href="<?= site_url('CandidatoController/desactivarValanti/' . $candidato_data->DPI); ?>"
                                    class="btn btn-danger sweetalert-briggs2"
                                    data-title="¿Desactivar la prueba Valanti?">Desactivar</a>
                            </div>


                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <!-- Columna 1: Gráfico -->
                            <div class="col-md-6">
                                <canvas id="radiaGlChart"></canvas>
                            </div>
                            <!-- Columna 2: Espacio para anotaciones -->

                            <div class="col-md-6">
                                <div class="row">
                                    <!-- Formulario 1 -->
                                    <div class="col-md-6">
                                        <form id="datosForm">

                                            <h2>Participante:</h2>
                                            <div class="form-group">
                                                <label for="rectitud">Verdad:</label>
                                                <input type="text" class="form-control" id="Verdad" name="Verdad"
                                                    value="<?php echo isset($dataValanti->Verdad) ? $dataValanti->Verdad : ''; ?>">


                                            </div>
                                            <div class="form-group">
                                                <label for="rectitud">Rectitud:</label>
                                                <input type="text" class="form-control" id="Rectitud" name="Rectitud"
                                                    value="<?php echo isset($dataValanti->Rectitud) ? $dataValanti->Rectitud : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="paz">Paz:</label>
                                                <input type="text" class="form-control" id="Paz" name="Paz"
                                                    value="<?php echo isset($dataValanti->Paz) ? $dataValanti->Paz : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="amor">Amor:</label>
                                                <input type="text" class="form-control" id="Amor" name="Amor"
                                                    value="<?php echo isset($dataValanti->Amor) ? $dataValanti->Amor : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="noViolencia">No Violencia:</label>
                                                <input type="text" class="form-control" id="NoViolencia"
                                                    name="NoViolencia"
                                                    value="<?php echo isset($dataValanti->No_violencia) ? $dataValanti->No_violencia : ''; ?>">

                                            </div>


                                        </form>

                                    </div>

                                    <!-- Formulario 2 DEL GESTOR DE TALENTOS -->
                                    <div class="col-md-6">
                                        <form id="datosFormNuevo"
                                            action="<?php echo site_url('CandidatoController/guardarValanti'); ?>"
                                            method="POST">
                                            <input type="hidden" class="form-control" id="DPI" name="DPI"
                                                value="<?php echo $candidato_data->DPI; ?>">

                                            <h2> Gestor:</h2>
                                            <div class="form-group">
                                                <label for="Verdad">Verdad:</label>
                                                <input type="number" class="form-control" id="Verdad" name="Verdad"
                                                    value="<?php echo isset($dataValanti->verdadEmpresa) ? $dataValanti->verdadEmpresa : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="Rectitud">Rectitud:</label>
                                                <input type="number" class="form-control" id="Rectitud" name="Rectitud"
                                                    value="<?php echo isset($dataValanti->rectitudEmpresa) ? $dataValanti->rectitudEmpresa : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="Paz">Paz:</label>
                                                <input type="number" class="form-control" id="Paz" name="Paz"
                                                    value="<?php echo isset($dataValanti->pazEmpresa) ? $dataValanti->pazEmpresa : ''; ?>">

                                            </div>


                                            <div class="form-group">
                                                <label for="Amor">Amor:</label>
                                                <input type="number" class="form-control" id="Amor" name="Amor"
                                                    value="<?php echo isset($dataValanti->amorEmpresa) ? $dataValanti->amorEmpresa : ''; ?>">

                                            </div>
                                            <div class="form-group">
                                                <label for="NoViolencia">No Violencia:</label>
                                                <input type="number" class="form-control" id="NoViolencia"
                                                    name="NoViolencia"
                                                    value="<?php echo isset($dataValanti->noViolenciaEmpresa) ? $dataValanti->noViolenciaEmpresa : ''; ?>">

                                            </div>
                                            <!-- Botón de guardar -->
                                            <button type="submit" class="btn btn-primary mt-3"
                                                id="GuardarDatosNuevo">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </main>

            </div>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script><!-- Esta linea siempre va al inicio
    En esta parte va los SCRIPT de las graficas, recuerda cambiar el ID de cada grafica para no tener problema-->

        <script>
            // Convierte los datos de $dataTemperamento en formato JSON
            var dataValanti = <?php echo json_encode($dataValanti); ?>;
            var candidato = <?php echo json_encode($candidato_data); ?>;
            var ctx = document.getElementById("radiaGlChart").getContext("2d");

            var myChart = new Chart(ctx, {
                type: "radar",
                data: {
                    labels: ["Verdad", "Rectitud", "Paz", "Amor", "No_Violencia"],
                    datasets: [
                        {
                            label: [candidato.Nombres],
                            data: [dataValanti.Verdad, dataValanti.Rectitud, dataValanti.Paz, dataValanti.Amor, dataValanti.No_violencia],
                            borderColor: 'rgba(54, 162, 235, 1)', // Color de la línea
                            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color del área debajo de la línea
                            borderWidth: 3
                        },
                        // Coma faltante aquí
                        {
                            label: 'Gestor de Talentos', // Coma faltante después de 'Gestor de Talentos'
                            data: [dataValanti.verdadEmpresa, dataValanti.rectitudEmpresa, dataValanti.pazEmpresa, dataValanti.amorEmpresa, dataValanti.noViolenciaEmpresa],
                            borderColor: 'rgba(255, 99, 132, 1)', // Color de la línea
                            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Color del área debajo de la línea
                            borderWidth: 3
                        }

                    ]

                },
                options: {
                    responsive: true,
                    display: true,

                    elements: {
                        line: {
                            borderWidth: 3
                        }
                    },
                    scales: {
                        r: {
                            angleLines: {
                                display: false
                            },
                            suggestedMin: 0,
                            suggestedMax: 70
                        }
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return data.datasets[tooltipItem.datasetIndex].label + ': ' + tooltipItem.yLabel;
                            }
                        }
                    }
                }
            });
        </script>


        <script>
            // Configuración de datos para la gráfica (tendrías que ajustar esto según tu estructura de datos)
            var temperamentoData = <?php echo json_encode($dataTemperamento); ?>;
            var data = {
                labels: ['Melancólico', 'Flemático', 'Colérico', 'Sanguíneo'],
                datasets: [{
                    label: 'Temperamentos',
                    data: [temperamentoData.melancolico, temperamentoData.flematico, temperamentoData.colerico, temperamentoData.sanguineo],
                    backgroundColor: [
                        'rgb(23, 162, 184)',
                        'rgb(40, 167, 69)',
                        'rgb(220, 53, 69)',
                        'rgb(255, 193, 7)'
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

            // Función para guardar la gráfica como imagen
            document.getElementById('saveChartButton').addEventListener('click', function () {
                html2canvas(document.getElementById('myChart')).then(function (canvas) {
                    var link = document.createElement('a');
                    link.download = 'grafico_temperamentos.png';
                    link.href = canvas.toDataURL();
                    link.click();
                });
            });
        </script>
        <script>
            // Espera a que el documento esté cargado
            document.addEventListener('DOMContentLoaded', function () {
                // Selecciona todos los elementos con la clase 'sweetalert-link'
                const sweetalertLinks = document.querySelectorAll('.sweetalert-guardar');

                // Itera sobre cada enlace y agrega un evento de clic
                sweetalertLinks.forEach(function (link) {
                    link.addEventListener('click', function (event) {
                        event.preventDefault(); // Previene el comportamiento predeterminado del enlace

                        const targetUrl = this.getAttribute('href'); // Obtiene la URL del atributo href

                        // Muestra el SweetAlert2 de confirmación
                        Swal.fire({
                            title: this.getAttribute('data-title'),
                            text: '¿Estás seguro?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#28a745',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Sí, Guardar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Observaciones',
                                    text: 'Observaciones guardadas con éxito.',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6'
                                }).then(() => {
                                    window.location.href = targetUrl;
                                });
                            }
                        });
                    });
                });
            });
        </script>

        <script>
            // Espera a que el documento esté cargado
            document.addEventListener('DOMContentLoaded', function () {
                // Selecciona todos los elementos con la clase 'sweetalert-link'
                const sweetalertLinks = document.querySelectorAll('.sweetalert-link');

                // Itera sobre cada enlace y agrega un evento de clic
                sweetalertLinks.forEach(function (link) {
                    link.addEventListener('click', function (event) {
                        event.preventDefault(); // Previene el comportamiento predeterminado del enlace

                        const targetUrl = this.getAttribute('href'); // Obtiene la URL del atributo href

                        // Muestra el SweetAlert2 de confirmación
                        Swal.fire({
                            title: this.getAttribute('data-title'),
                            text: '¿Estás seguro?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#28a745',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Sí, Activar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Prueba activada.',
                                    text: 'La prueba fue activada con éxito.',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6'
                                }).then(() => {
                                    window.location.href = targetUrl; // Cambio de deleteUrl a targetUrl
                                });
                            }
                        });
                    });
                });
            });
        </script>
        <script>
            // Espera a que el documento esté cargado
            document.addEventListener('DOMContentLoaded', function () {
                // Selecciona todos los elementos con la clase 'sweetalert-link'
                const sweetalertLinks = document.querySelectorAll('.sweetalert-briggs');

                // Itera sobre cada enlace y agrega un evento de clic
                sweetalertLinks.forEach(function (link) {
                    link.addEventListener('click', function (event) {
                        event.preventDefault(); // Previene el comportamiento predeterminado del enlace

                        const targetUrl = this.getAttribute('href'); // Obtiene la URL del atributo href

                        // Muestra el SweetAlert2 de confirmación
                        Swal.fire({
                            title: this.getAttribute('data-title'),
                            text: '¿Estás seguro?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#28a745',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Sí, Activar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Prueba activada.',
                                    text: 'La prueba fue activada con éxito.',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6'
                                }).then(() => {
                                    window.location.href = targetUrl;
                                });
                            }
                        });
                    });
                });
            });
        </script>

        <script>
            // Espera a que el documento esté cargado
            document.addEventListener('DOMContentLoaded', function () {
                // Selecciona todos los elementos con la clase 'sweetalert-link'
                const sweetalertLinks = document.querySelectorAll('.sweetalert-briggs2');

                // Itera sobre cada enlace y agrega un evento de clic
                sweetalertLinks.forEach(function (link) {
                    link.addEventListener('click', function (event) {
                        event.preventDefault(); // Previene el comportamiento predeterminado del enlace

                        const targetUrl = this.getAttribute('href'); // Obtiene la URL del atributo href

                        // Muestra el SweetAlert2 de confirmación
                        Swal.fire({
                            title: this.getAttribute('data-title'),
                            text: '¿Estás seguro?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#28a745',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Sí, desactivar.',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Prueba desactivada.',
                                    text: 'La prueba fue desactivada con éxito.',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6'
                                }).then(() => {
                                    window.location.href = targetUrl;
                                });
                            }
                        });
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const sweetalertLinks = document.querySelectorAll('.sweetalert-link2');

                sweetalertLinks.forEach(function (link) {
                    link.addEventListener('click', function (event) {
                        event.preventDefault();

                        const targetUrl = this.getAttribute('href');

                        Swal.fire({
                            title: this.getAttribute('data-title'),
                            text: '¿Estás seguro?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Sí, Desactivar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Prueba desactivada.',
                                    text: 'La prueba fue desactivada con éxito.',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6'
                                }).then(() => {
                                    window.location.href = targetUrl;
                                });
                            }
                        });
                    });
                });
            });
        </script>


        <script>
            function ocultarDivs(clase) {
                const divsAOcultar = document.querySelectorAll(`.${clase}`);
                divsAOcultar.forEach(div => {
                    div.style.display = 'none';
                });
            }

            function mostrarDivs(clase) {
                const divsAMostrar = document.querySelectorAll(`.${clase}`);
                divsAMostrar.forEach(div => {
                    div.style.display = 'block';
                });
            }

            const linksPaginacion = document.querySelectorAll('.pagination .page-link');

            linksPaginacion.forEach((link, index) => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (index === 0) {
                        mostrarDivs('div-ocultar');//mostrar primero
                        ocultarDivs('div-ocultar-2'); //ocultar segundo
                        ocultarDivs('div-ocultar-3'); //ocultar tercero

                    } else if (index === 1) {
                        mostrarDivs('div-ocultar-2');//mostrar segundo
                        ocultarDivs('div-ocultar');//ocultar primero
                        ocultarDivs('div-ocultar-3'); // ocultar tercero
                    } else if (index === 2) {
                        mostrarDivs('div-ocultar-3'); //mostrar tercero
                        ocultarDivs('div-ocultar'); //ocultar primero
                        ocultarDivs('div-ocultar-2'); //ocultar segundo
                    }
                    // Agrega más condiciones para manejar más páginas si es necesario
                });
            });

            mostrarDivs('div-ocultar'); // Mostrar el primer div 'div-ocultar' por defecto al cargar la página
        </script>


        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Función para ocultar los elementos con la clase div-ocultar-2
                function ocultarDivOcultar2() {
                    const divsOcultar2 = document.querySelectorAll('.div-ocultar-2');
                    divsOcultar2.forEach(div => {
                        div.style.display = 'none';
                    });
                }

                // Función para ocultar los elementos con la clase div-ocultar-3
                function ocultarDivOcultar3() {
                    const divsOcultar3 = document.querySelectorAll('.div-ocultar-3');
                    divsOcultar3.forEach(div => {
                        div.style.display = 'none';
                    });
                }

                ocultarDivOcultar2(); // Ocultar div-ocultar-2 al cargar la página
                ocultarDivOcultar3(); // Ocultar div-ocultar-3 al cargar la página
            });

        </script>


        <script>
            // Convierte los datos de $dataTemperamento en formato JSON
            var dataBriggs = <?php echo json_encode($dataBriggs); ?>;
            var ctx = document.getElementById("myCharts").getContext("2d");

            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Extrovertido", "Introvertido", "Sensorial", "Intuitivo", "Racional", "Emocional", "Calificador", "Perceptivo"],
                    datasets: [{
                        label: "Resultados de la prueba BRIGGS",//esto que es?
                        data: [dataBriggs.extrovertido, dataBriggs.introvertido, dataBriggs.sensorial, dataBriggs.intuitivo, dataBriggs.racional, dataBriggs.emocional, dataBriggs.calificador, dataBriggs.perceptivo],
                        backgroundColor: ["#1d864a", "#fcc832", "#347fab", "#ff5733", "#8e44ad", "#3498db", "#f39c12", "#27ae60"]
                    }]
                },
                options: {
                    title: {
                        text: "Datos de la personalidad"
                    }
                }
            });
        </script>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>