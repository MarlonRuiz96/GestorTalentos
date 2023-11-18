<?php require_once APPPATH . 'views/Dashboard/pruebas.php'; ?>

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

<body>
    <header>
        <h1>Prueba de temperamentos</h1>
    </header>
    <div class="container">
        <main>
            <div class="d-flex justify-content-start">
                <img src="<?php echo base_url('assets/img/logo.jpeg'); ?>" class="d-block" alt="Imagen"
                    style="width: 50%; height: auto;"><br><br>
                <p class="text-center"><br><br>A continuación, deberás elegir una de las cuatro alternativas que se te
                    presentan en cada pantalla. Toma en cuenta que no podrás regresar a corregir. Debes tomar tu tiempo
                    para elegir la mejor opción. Esta prueba, no tiene tiempo. Procura trabajar ordenadamente. Si tienes
                    problemas en ingresar a cualquier página haz click aquí y se te apoyará.
                <br><br><br>
                <h2>Llevas <?php echo $Formulario->idRespuesta; ?> de 40:</h2> </p>
                    
                    

            </div><br><br><br>
            <div class="text-center">
                <a href="<?= site_url('DpiController/melancolico/' . $Candidato->DPI); ?>" class="btn btn-success">
                    <?php echo $Formulario->P1; ?>
                </a>

                <a href="<?= site_url('DpiController/colerico/' . $Candidato->DPI); ?>" class="btn btn-success">
                    <?php echo $Formulario->P2; ?>
                </a>

                <a href="<?= site_url('DpiController/flematico/' . $Candidato->DPI); ?>" class="btn btn-success">
                    <?php echo $Formulario->P3; ?>
                </a>

                <a href="<?= site_url('DpiController/sanguineo/' . $Candidato->DPI); ?>" class="btn btn-success">
                    <?php echo $Formulario->P4; ?>
                </a>
            </div>

            <!-- Agrega un campo oculto para almacenar la opción seleccionada -->

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