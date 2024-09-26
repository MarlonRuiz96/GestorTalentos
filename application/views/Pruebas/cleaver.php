<?php require_once APPPATH . 'views/Dashboard/pruebas.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">
    <title>Prueba Cleaver</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/sb-admin-2.min.css'); ?>">
    <style>
    .table td,
    .table th {
        vertical-align: middle;
        text-align: center;
    }

    .text-left {
        text-align: left;
    }
    </style>

</head>

<body>
    <header>
        <h1 class="text-center my-4">Prueba Cleaver</h1>
    </header>

    <main class="container">
        <div class="row mb-">
            <div class="col-4">
                <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-fluid" alt="Logo">
            </div>
            <div class="col-8">
                <p>
                    A continuación, encontrará una serie de características de personalidad distribuidas en grupos de
                    cuatro palabras. Para cada grupo, realice los siguientes pasos:
                </p>
                <ol>
                    <li><strong>Seleccione una característica que más se adecúe a usted</strong> colocando el número
                        <strong>1</strong> en la casilla de la columna (+) correspondiente a esa palabra.
                    </li>
                    <li><strong>Seleccione una característica que menos se adecúe a usted</strong> colocando el número
                        <strong>1</strong> en la casilla de la columna (-) correspondiente a esa palabra.
                    </li>
                </ol>
            </div>
            <div class="col">

                <strong>
                    <h5>Reglas:</h5>
                </strong>
                <ul>
                    <li>Coloque únicamente un número <strong>1</strong> en la columna (+) y un número <strong>1</strong>
                        en la columna (-) por cada grupo de cuatro palabras.</li>
                    <li>No deje ningún grupo sin contestar.</li>
                    <li>Esta prueba no tiene límite de tiempo, pero asegúrese de leer cada palabra cuidadosamente antes
                        de hacer su selección.</li>
                    <li>No puede haber más de una respuesta en cada fila (más y menos) por cada grupo de palabras.</li>
                </ul>
                <p class="mt-4">
                    Este cuestionario es propiedad de Gestor de Talentos y no está permitida su reproducción total o
                    parcial. <strong>¡Gracias y muchos éxitos!</strong>
                </p>
            </div>

        </div>

        <form id="cleaverForm" method="post" action="<?= site_url('DpiController/procesarCleaver/') ?>">
            <input type="hidden" name="DPI" value="<?= $Candidato->DPI ?>">
            <input type="hidden" name="idcleaverdata" value="<?= $Cleaverdata->idcleaverdata ?>">
            <input type="hidden" name="indice" value="<?= $indice?>">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Característica</th>
                        <th>Más</th>
                        <th>Menos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left"><?= $Cleaverdata->C1 ?></td>
                        <td><input type="radio" name="mas" value="<?= $Cleaverdata->M1 ?>"
                                onclick="toggleRadio(this, 'menos')"></td>
                        <td><input type="radio" name="menos" value="<?= $Cleaverdata->L1 ?>"
                                onclick="toggleRadio(this, 'mas')"></td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= $Cleaverdata->C2 ?></td>
                        <td><input type="radio" name="mas" value="<?= $Cleaverdata->M2 ?>"
                                onclick="toggleRadio(this, 'menos')"></td>
                        <td><input type="radio" name="menos" value="<?= $Cleaverdata->L2 ?>"
                                onclick="toggleRadio(this, 'mas')"></td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= $Cleaverdata->C3 ?></td>
                        <td><input type="radio" name="mas" value="<?= $Cleaverdata->M3 ?>"
                                onclick="toggleRadio(this, 'menos')"></td>
                        <td><input type="radio" name="menos" value="<?= $Cleaverdata->L3 ?>"
                                onclick="toggleRadio(this, 'mas')"></td>
                    </tr>
                    <tr>
                        <td class="text-left"><?= $Cleaverdata->C4 ?></td>
                        <td><input type="radio" name="mas" value="<?= $Cleaverdata->M4 ?>"
                                onclick="toggleRadio(this, 'menos')"></td>
                        <td><input type="radio" name="menos" value="<?= $Cleaverdata->L4 ?>"
                                onclick="toggleRadio(this, 'mas')"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

        <script>
        // Validar que no se seleccionen ambas opciones en la misma fila
        document.getElementById('cleaverForm').addEventListener('submit', function(event) {
            let rows = document.querySelectorAll('tbody tr');
            for (let row of rows) {
                let mas = row.querySelector('input[name="mas"]');
                let menos = row.querySelector('input[name="menos"]');
                if (mas.checked && menos.checked) {
                    alert('No puede seleccionar ambas opciones en la misma fila.');
                    event.preventDefault();
                    return false;
                }
            }
        });

        document.getElementById('cleaverForm').addEventListener('submit', function(event) {
            let rows = document.querySelectorAll('tbody tr');
            let vacioMas = true;
            let vacioMenos = true;

            console.log('Inicio de validación de formulario'); // Log para indicar el inicio de la validación

            // Recorrer todas las filas para verificar las selecciones
            for (let row of rows) {
                let masInputs = row.querySelectorAll('input[name^="mas"]');
                let menosInputs = row.querySelectorAll('input[name^="menos"]');

                let masChecked = 0;
                let menosChecked = 0;

                // Contar los "más" seleccionados en la fila actual
                masInputs.forEach(function(input) {
                    if (input.checked) {
                        masChecked++;
                    }
                });

                // Contar los "menos" seleccionados en la fila actual
                menosInputs.forEach(function(input) {
                    if (input.checked) {
                        menosChecked++;
                    }
                });

                // Log de los contadores
                console.log('Fila:', row);
                console.log('Mas seleccionados:', masChecked);
                console.log('Menos seleccionados:', menosChecked);

                // Verificar si no hay ningún "más" seleccionado  
                if (masChecked > 0) {
                    vacioMas = false;
                }

                // Verificar si no hay ningún "menos" seleccionado
                if (menosChecked > 0) {
                    vacioMenos = false;
                }
            }


            // Mostrar alerta si alguna fila no tiene una opción "más" seleccionada
            if (vacioMas) {
                alert('Debe seleccionar una opción "más" en cada fila.');
                event.preventDefault();
                return false;
            }

            // Mostrar alerta si alguna fila no tiene una opción "menos" seleccionada
            if (vacioMenos) {
                alert('Debe seleccionar una opción "menos" en cada fila.');
                event.preventDefault();
                return false;
            }
        });
        </script>


        <script>
        // Pasar los datos del servidor al cliente
        var data = <?= json_encode($indice) ?>;

        console.log(data); // Imprimir los datos en la consola
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>