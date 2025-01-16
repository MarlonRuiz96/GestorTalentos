<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrevista Programada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
    </style>
</head>
<body>
    <h1>Entrevista Programada</h1>
    <p>Estimado/a <strong><?= htmlspecialchars($nombreCandidato) ?></strong>,</p>
    <p>Su entrevista ha sido programada para el <strong><?= htmlspecialchars($fecha) ?></strong> a las <strong><?= htmlspecialchars($hora) ?></strong> en la dirección:</p>
    <strong><?= htmlspecialchars($direccion) ?></strong>
    <p>Por favor, confirme su asistencia.</p>
</body>
</html>
