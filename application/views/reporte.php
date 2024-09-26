<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Candidato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFFFFF;
        }
        .header {
            width: 100vw;
            overflow: hidden;
        }
        .header img {
            width: 100%;
            height: auto;
            display: block;
        }
        .content {
            padding: 20px;
        }
        .section {
            background-color: #FFFFFF;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .section h2 {
            border-bottom: 2px solid #002a5b;
            padding-bottom: 5px;
        }
        .section p, .section li {
            margin: 10px 0;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .info-table th, .info-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .info-table th {
            background-color: #F4F6F6;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="<?php echo $encabezado; ?>" alt="Encabezado">
    </div>
    <div class="content">
        <div class="section">
            <h2>Información Personal</h2>
            <table class="info-table">
                <tr>
                    <th>Nombres</th>
                    <td><?php echo $candidato_data->Nombres; ?></td>
                </tr>
                <tr>
                    <th>Puesto</th>
                    <td><?php echo $candidato_data->Puesto; ?></td>
                </tr>
                <tr>
                    <th>Contacto</th>
                    <td><?php echo $candidato_data->Contacto; ?></td>
                </tr>
                <tr>
                    <th>Correo</th>
                    <td><?php echo $candidato_data->Correo; ?></td>
                </tr>
            </table>
        </div>
        <div class="section">
            <h2>Experiencia Laboral</h2>
            <p><strong>Empresa XYZ</strong> - Desarrollador de Software (2018 - Presente)</p>
            <p>Descripción del trabajo: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper felis vel metus tincidunt, ut dignissim ex efficitur.</p>
            <p><strong>Empresa ABC</strong> - Analista de Sistemas (2015 - 2018)</p>
            <p>Descripción del trabajo: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper felis vel metus tincidunt, ut dignissim ex efficitur.</p>
        </div>
        <div class="section">
            <h2>Habilidades</h2>
            <ul>
                <li>Programación en Python</li>
                <li>Desarrollo Web con CodeIgniter</li>
                <li>Base de Datos con MariaDB</li>
                <li>Análisis de Datos con Power BI</li>
            </ul>
        </div>
        <div class="section">
            <h2>Educación</h2>
            <p><strong>Universidad Mariano Gálvez</strong> - Ingeniería en Sistemas (2010 - 2015)</p>
        </div>
        <div class="section">
            <h2>Referencias</h2>
            <p>Disponible a solicitud</p>
        </div>
    </div>
</body>
</html>
