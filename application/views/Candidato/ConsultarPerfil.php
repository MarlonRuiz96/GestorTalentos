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
                        <a class="page-link" href="#">Meyer-Briggs</a>
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
                        <h2 style="margin-right: 500px;">BRIGGS</h2>
                        <div>
                            <a href="<?= site_url('CandidatoController/activarbriggs/' . $candidato_data->DPI); ?>"
                                class="btn btn-success sweetalert-briggs"
                                data-title="¿Activar la prueba Meyer-Briggs? ">Activar</a>
                            <a href="<?= site_url('CandidatoController/desactivarbriggs/' . $candidato_data->DPI); ?>"
                                class="btn btn-danger sweetalert-briggs2"
                                data-title="¿Desactivar la prueba Meyer-Briggs?">Desactivar</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <!-- Columna 1: Gráfico -->
                            <canvas id="myCharts" width="50" height="20"></canvas>

                            <!-- Columna 2: Espacio para anotaciones -->


                        </div>
                    </div>
                </main>

            </div>
<!-- PRUEBA VALANTI-->
            <div class="contenido div-ocultar-3">
                <main>

                    <div class="d-flex justify-content-between align-items-center">
                        <h2 style="margin-right: 500px;">VALANTI</h2>
                        <div>
                            <a href="<?= site_url('CandidatoController/activarValanti/' . $candidato_data->DPI); ?>"
                                class="btn btn-success sweetalert-briggs"
                                data-title="¿Activar la prueba Valanti? ">Activar</a>
                            <a href="<?= site_url('CandidatoController/desactivarValanti/' . $candidato_data->DPI); ?>"
                                class="btn btn-danger sweetalert-briggs2"
                                data-title="¿Desactivar la prueba Valanti?">Desactivar</a>
                        </div>
                    </div>

                </main>

            </div>

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
            console.log(temperamentoData);
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