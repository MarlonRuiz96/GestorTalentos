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
            <h2 class="text-center">Marca una de las opciones de abajo con las que te sientas mas identificado</h2>

            <form action="<?php echo site_url("DpiController/temperamento"); ?>" method="post">
                <main>
                    <label for="respuesta">¿Cuál es la opción que mejor describe tu personalidad?</label>
                    <br>
                    <input type="radio" name="respuesta" id="respuesta" value="Animado" data-posicion="1"> Animado
                    <input type="radio" name="respuesta" id="respuesta" value="Aventurero" data-posicion="2"> Aventurero
                    <input type="radio" name="respuesta" id="respuesta" value="Analítico" data-posicion="3"> Analítico
                    <input type="radio" name="respuesta" id="respuesta" value="Adaptable" data-posicion="4"> Adaptable
                </main>
                <input type="hidden" name="respuesta_posicion" id="respuesta_posicion">
                <a href="<?= site_url('DpiController/temperamento/' . $Candidato->idCandidato); ?>"
                                class="btn btn-success" type="button" type="submit">ENVIAR
                                    </a>
            </form>


        </main>



        <script>
    // Selecciona todos los elementos de entrada de tipo radio
    const radioButtons = document.querySelectorAll('input[type="radio"]');

    // Agrega un evento 'change' a cada botón de opción
    radioButtons.forEach((radioButton) => {
        radioButton.addEventListener('change', (event) => {
            // Obtiene la posición del botón de opción seleccionado
            const posicion = event.target.getAttribute('data-posicion');

            // Asigna la posición al campo de entrada oculto
            document.getElementById('respuesta_posicion').value = posicion;
        });
    });
</script>

</body>

</html>