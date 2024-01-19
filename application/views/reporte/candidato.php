<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>assets/css/bootstrap.min.css">

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

        }

        /* Estilos para el encabezado o portada */

        form {
            position: absolute;
            /* Posición absoluta para el formulario */
            top: 20%;
            /* Ajusta la posición verticalmente */
            left: 20%;
            /* Ajusta la posición horizontalmente */
            transform: translate(-50%, -50%);
            /* Centra el formulario */
            padding: 20px;
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
    margin-left: 50px;
    margin-right: 20px;
    width: 90%;
    color: #212529;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table th {
    background-color: #fff;
}

.table tbody tr:nth-child(odd) {
    background-color: rgba(0, 123, 255, 0.05);
}

.table tbody tr:nth-child(even) {
    background-color: #fff;
}

.Panel {
    max-width: 700px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border: 2px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

    </style>

</head>

<body>
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
    <div class="Panel">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nombres</th>
                    <td>
                        <?php echo $candidato_data->Nombres; ?>
                    </td>
                </tr>
                <tr>
                    <th>Puesto</th>
                    <td>
                        <?php echo $candidato_data->Puesto; ?>
                    </td>
                </tr>
                <tr>
                    <th>Contacto</th>
                    <td>
                        <?php echo $candidato_data->Contacto; ?>
                    </td>
                </tr>
                <tr>
                    <th>Correo</th>
                    <td>
                        <?php echo $candidato_data->Correo; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>





    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w7Qk5FlJz7I5Mou9DqI5owlr9xHtJK5RdeYiiJZu9VZwvAymatzsZVxmJW5eDsfQ"
        crossorigin="anonymous"></script>
</body>

</html>