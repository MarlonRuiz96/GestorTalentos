
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">

    <title>Prueba de temperamentos</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/sb-admin-2.min.css'); ?>">
</head>

<header class="text-center my-4">
    <h1 class="display-4">Prueba de temperamentos</h1>
</header>
    <div class="container">
        <main>
        <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-fluid mx-auto d-block mb-4" alt="Logo">


                <p class="text-center"><br><br>A continuación, deberás elegir una de las cuatro alternativas que se te
                    presentan en cada pantalla. Toma en cuenta que no podrás regresar a corregir. Debes tomar tu tiempo
                    para elegir la mejor opción. Esta prueba, no tiene tiempo. Procura trabajar ordenadamente. 


                </p>

            <br>
            <h2 style="text-align: center;">
                Llevas
                <?php echo $Formulario->idRespuesta; ?> de preguntas de 40:
            </h2>
            <?php
            $valor_P1 = $Formulario->P1;
            $valor_P2 = $Formulario->P2;
            $valor_P3 = $Formulario->P3;
            $valor_P4 = $Formulario->P4;

            $imagen_src1 = $valor_P1 . '.jpg'; // Concatena el valor de P1 con la extensión del archivo de imagen
            $imagen_src2 = $valor_P2 . '.jpg'; // Concatena el valor de P1 con la extensión del archivo de imagen
            $imagen_src3 = $valor_P3 . '.jpg'; // Concatena el valor de P1 con la extensión del archivo de imagen
            $imagen_src4 = $valor_P4 . '.jpg'; // Concatena el valor de P1 con la extensión del archivo de imagen
            
            ?>


            <div class="container">
    <div class="row text-center">
        <!-- Opción 1 -->
        <div class="col-12 col-md-3 mb-4">
            <a href="<?= site_url('DpiController/melancolico/' . $Candidato->DPI); ?>" class="btn btn-success w-100 mb-2">
                <?php echo $Formulario->P1; ?>
            </a>
            <img src="<?php echo base_url('assets/temperamentos/' . $imagen_src1); ?>" class="img-fluid rounded" alt="Imagen 1">
        </div>

        <!-- Opción 2 -->
        <div class="col-12 col-md-3 mb-4">
            <a href="<?= site_url('DpiController/colerico/' . $Candidato->DPI); ?>" class="btn btn-success w-100 mb-2">
                <?php echo $Formulario->P2; ?>
            </a>
            <img src="<?php echo base_url('assets/temperamentos/' . $imagen_src2); ?>" class="img-fluid rounded" alt="Imagen 2">
        </div>

        <!-- Opción 3 -->
        <div class="col-12 col-md-3 mb-4">
            <a href="<?= site_url('DpiController/flematico/' . $Candidato->DPI); ?>" class="btn btn-success w-100 mb-2">
                <?php echo $Formulario->P3; ?>
            </a>
            <img src="<?php echo base_url('assets/temperamentos/' . $imagen_src3); ?>" class="img-fluid rounded" alt="Imagen 3">
        </div>

        <!-- Opción 4 -->
        <div class="col-12 col-md-3 mb-4">
            <a href="<?= site_url('DpiController/sanguineo/' . $Candidato->DPI); ?>" class="btn btn-success w-100 mb-2">
                <?php echo $Formulario->P4; ?>
            </a>
            <img src="<?php echo base_url('assets/temperamentos/' . $imagen_src4); ?>" class="img-fluid rounded" alt="Imagen 4">
        </div>
    </div>
</div>


    </div>

    </main>

    <script>
        // Selecciona todos los elementos de entrada de tipo radio
        const radioButtons = document.querySelectorAll('input[type="radio"]');

        // Agrega un evento 'change' a cada botón de opción
        radioButtons.forEach((radioButton) => {
            radioButton.addEventListener('change', (event) => {
                // Obtiene el valor del radio button seleccionado
                const valorSeleccionado = event.target.value;

                // Haz algo con el valor seleccionado, como enviarlo al servidor o mostrarlo en la interfaz
                console.log('Valor seleccionado:', valorSeleccionado);
            });
        });
    </script>
    <script>
        // Utiliza JavaScript para actualizar el valor del campo oculto cuando el usuario seleccione una opción
        var radios = document.querySelectorAll('input[type="radio"]');
        radios.forEach(function (radio) {
            radio.addEventListener('click', function () {
                var opcionSeleccionada = this.value;
                document.getElementById('opcion_seleccionada').value = opcionSeleccionada;
            });
        });
    </script>





</body>

</html>