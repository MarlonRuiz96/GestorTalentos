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
            <h2 class="text-center">Elije una la opcion con la que mas te sientas idenficado</h2>
            <!-- En tu vista 'Pruebas/Temperamento.php' -->

                <div class="text-center">
                    <a href="<?= site_url('DpiController/sanguineo/' . $Candidato->DPI); ?>" class="btn btn-success">
                        <?php echo $Formulario->P1; ?>
                    </a>

                    <a href="<?= site_url('DpiController/sanguineo/' . $Candidato->DPI); ?>" class="btn btn-success">
                        <?php echo $Formulario->P2; ?>
                    </a>

                    <a href="<?= site_url('DpiController/sanguineo/' . $Candidato->DPI); ?>" class="btn btn-success">
                        <?php echo $Formulario->P3; ?>
                    </a>

                    <a href="<?= site_url('DpiController/sanguineo/' . $Candidato->DPI); ?>" class="btn btn-success">
                        <?php echo $Formulario->P4; ?>
                    </a>
                </div>

                <!-- Agrega un campo oculto para almacenar la opción seleccionada -->



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