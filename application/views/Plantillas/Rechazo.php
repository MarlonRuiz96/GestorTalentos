<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de Selección Finalizado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
        }
        .header {
            background: #dc3545;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gracias por tu participación</h1>
        </div>
        <div class="content">
            <p>Estimado/a <strong><?= htmlspecialchars($nombreCandidato) ?></strong>,</p>
            <p>
                Queremos agradecerte por tu interés en la posición de <strong>Programador</strong> y por haberte tomado el tiempo para participar en nuestro proceso de selección.
            </p>
            <p>
                Después de una cuidadosa consideración, lamentamos informarte que en esta ocasión hemos decidido avanzar con otros candidatos cuyas experiencias y habilidades se alinean más estrechamente con los requerimientos del puesto.
            </p>
            <p>
                Valoramos mucho tu perfil y las capacidades que nos mostraste durante este proceso. Nos encantaría que sigas pendiente de futuras oportunidades en nuestra empresa y no dudes en postularte nuevamente si encuentras una posición que sea de tu interés.
            </p>
            <p>
                Te deseamos mucho éxito en tus próximos proyectos y carreras profesionales.
            </p>
            <p>
                Atentamente,<br>
                <strong>Equipo de Gestor de Talentos</strong><br>
            </p>
        </div>
        <div class="footer">
            <p>Este correo es confidencial y fue enviado desde el sitio web.</p>
        </div>
    </div>
</body>
</html>
