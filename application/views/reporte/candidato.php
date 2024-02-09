<!DOCTYPE html>
<html lang="es">

<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prueba de Briggs</title>
    <!-- Enlace a la hoja de estilos de Bootstrap -->

    <style>
        /* Establecer márgenes en cero para todo el HTML */
        html,
        body {
            margin: 0;
            padding: 0;
            background-color: #F1F1F1;
            font: 16px Georgia, serif;
            /* Cambia 16px por el tamaño de fuente deseado y agrega tu fuente preferida después de Georgia */
        }


        /* Estilos para el encabezado o portada */
        .h2 {
            margin-top: 5px;
            margin-bottom: 5px;
            line-height: 1.2;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        form {
            position: absolute;
            /* Posición absoluta para el formulario */
            top: 20%;
            /* Ajusta la posición verticalmente */
            left: 20%;
            /* Ajusta la posición horizontalmente */
            transform: translate(-50%, -50%);
            /* Centra el formulario */
            background-color: white;
            /* Fondo blanco para el formulario */
            border-radius: 10px;
        }

        .header {
            position: absolute;
            top: 6%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            background-color: white;
            border-radius: 10px;
        }

        .logo {
            display: block;
            margin: auto;
            width: 250px;
            height: 150px;
        }

        /* Estilo para la tabla */
        .table {
            width: 50%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            position: fixed;
            text-align: left;
        }







        .Panel {
            padding-left: 20px;
            padding-bottom: 20px;
            max-width: 700px;
            margin: 40px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #datosPersonalesDiv {
            display: block;
        }

        
    </style>

</head>

<body>

    <?php if ($candidato_data->temperamento == 1): ?>
        <style>
            #datosPersonalesDiv {
                display: none;
            }
        </style>
    <?php endif; ?>
    <?php
    // Generar la variable $base64 aquí
    $imgpath = base_url('assets/reporte/encabezado.png');
    $ext = pathinfo($imgpath, PATHINFO_EXTENSION);
    $data = file_get_contents($imgpath);
    $base64 = 'data:image/' . $ext . ';base64,' . base64_encode($data);
    ?>

    <div class="header">
        <img class="logo" src="<?php echo $base64; ?>">

    </div>
    <br><br><br><br><br><br><br>
    <div class="DatosPersonales" id="datosPersonalesDiv">
        <div class="Panel">
            <h2>Datos personales:</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nombres:</th>
                        <td>
                            <?php echo $candidato_data->Nombres; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Puesto:</th>
                        <td>
                            <?php echo $candidato_data->Puesto; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Contacto:</th>
                        <td>
                            <?php echo $candidato_data->Contacto; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Correo:</th>
                        <td>
                            <?php echo $candidato_data->Correo; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="Panel">
        <h2>Temperamentos:</h2><br>
    </div>


</body>

</html>