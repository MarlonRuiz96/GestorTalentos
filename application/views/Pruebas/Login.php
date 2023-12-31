<?php require_once APPPATH . 'views/Dashboard/pruebas.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/pruebas.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>Bienvenido a Pruebas Psicométricas</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo adicionales si es necesario -->
</head>

<body>
    <header>
        <h1>Bienvenido a la Sección de Pruebas Psicométricas</h1>
    </header>
    <div class="container">

        <main>
            <h2 class="text-center">Datos del Candidato</h2>


            <form id="editForm" action="<?php echo site_url('DpiController/guardarCambios'); ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="Ingresa tu nombre Completo" name="Nombres"
                        value="<?php echo $Candidato->Nombres; ?>" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Contacto">Contacto</label>
                        <input type="text" class="form-control" id="Contacto" name="Contacto"
                            value="<?php echo $Candidato->Contacto; ?>" required
                            placeholder="Ingresa tu numero telefonico">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="DPI">DPI</label>
                        <input type="text" class="form-control" id="DPI" name="DPI"
                            value="<?php echo $Candidato->DPI; ?>" required placeholder="Ingresa tu DPI">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Correo">Correo</label>
                        <input type="email" class="form-control" id="Correo" name="Correo"
                            value="<?php echo $Candidato->Correo; ?>" required
                            placeholder="Ingresa tu correo electronico">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Puesto">Puesto</label>
                        <input type="text" class="form-control" id="Puesto" name="Puesto"
                            value="<?php echo $Candidato->Puesto; ?>" required
                            placeholder="Ingresa el puesto al que estas aplicando">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="guardarCambiosBtn" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>


        </main>
        <div class="container">

            <main>
                Pruebas a realizarse
                <div class="temperamento">
                    <a href="<?= site_url('DpiController/RealizarPruebas/' . $Candidato->DPI); ?>"
                        class="btn btn-success" type="button">Iniciar Prueba de Temperamento
                    </a>
                    <br><br><br>

                </div>
                <div class="briggs">
                    <a href="<?= site_url('DpiController/pruebaBriggs/' . $Candidato->DPI); ?>" class="btn btn-success"
                        type="button">Iniciar Prueba de Briggs
                    </a>
                </div>

                <div class="Valanti">
                    <a href="<?= site_url('DpiController/pruebaValanti/' . $Candidato->DPI); ?>" class="btn btn-success"
                        type="button">Iniciar Prueba Valanti
                    </a>
                </div>


                <div class="Sin_pruebas">
                    No hay pruebas a realizarse.
                </div>
            </main>

        </div>

    </div>
<!--
    <h1>Valores</h1>
    <ul>
        <li>Verdad: <?php echo $verdad; ?></li>
        <li>Rectitud: <?php echo $rectitud; ?></li>
        <li>Paz: <?php echo $paz; ?></li>
        <li>Amor: <?php echo $amor; ?></li>
        <li>No Violencia: <?php echo $noViolencia; ?></li>
    </ul>-->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnDivTemperamento = document.querySelector('.temperamento');

            // Verifica si el valor de temperamento no es igual a '1'
            if ('<?php echo $Candidato->temperamento; ?>' !== '1' || '<?php echo $Candidato->Temporal; ?>' === '41') {
                btnDivTemperamento.style.display = 'none'; // Oculta el div si no cumple la condición
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnDivTemperamento = document.querySelector('.briggs');

            if ('<?php echo $Candidato->Briggs; ?>' !== '1') {
                btnDivTemperamento.style.display = 'none'; // Oculta el div si no cumple la condición
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnDivTemperamento = document.querySelector('.Valanti');

            if ('<?php echo $Candidato->valanti; ?>' !== '1') {
                btnDivTemperamento.style.display = 'none'; // Oculta el div si no cumple la condición
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnDivSinPruebas = document.querySelector('.Sin_pruebas');

            // Verifica si el valor de temperamento no es igual a '0'
            if ('<?php echo $Candidato->temperamento; ?>' !== '0') {
                btnDivSinPruebas.style.display = 'none'; // Oculta el div si no cumple la condición
            }
        });
    </script>


</body>

</html>