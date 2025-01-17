<?php require_once APPPATH . 'views/Dashboard/partesuperior.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Correo a Candidatos</title>

    <!-- Bootstrap 5 CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet"
        crossorigin="anonymous"
    >
    <!-- Font Awesome -->
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
        crossorigin="anonymous"
    >

    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 700px;
            margin: 30px auto;
        }
        .card {
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
        .dropdown-results {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
        }
        .dropdown-results div {
            padding: 10px;
            cursor: pointer;
        }
        .dropdown-results div:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h1 class="mb-4 text-center">Enviar Correo</h1>
    <div class="card">
        <div class="card-body">
            <form id="formCorreo">
                <!-- Campo: Asunto -->
                <div class="mb-3">
                    <label for="asunto" class="form-label fw-semibold">Asunto</label>
                    <input 
                        type="text" 
                        name="asunto" 
                        id="asunto" 
                        class="form-control" 
                        placeholder="Ejemplo: Información sobre nueva vacante" 
                        required
                    />
                </div>

                <!-- Campo: Correo -->
                <div class="mb-3 position-relative">
                    <label for="correo" class="form-label fw-semibold">Correo Destinatario</label>
                    <input 
                        type="email" 
                        name="correo" 
                        id="correo" 
                        class="form-control" 
                        placeholder="Escribe para buscar..." 
                        autocomplete="off"
                        required
                    />
                    <div id="results" class="dropdown-results"></div>
                </div>

                <!-- Campo: Cuerpo del Correo -->
                <div class="mb-3">
                    <label for="cuerpo" class="form-label fw-semibold">Cuerpo del Correo</label>
                    <textarea 
                        name="cuerpo" 
                        id="cuerpo" 
                        rows="5" 
                        class="form-control" 
                        placeholder="Escribe el contenido del correo..." 
                        required
                    ></textarea>
                </div>

                <!-- Botón de Enviar -->
                <div class="text-center">
                    <button type="button" id="enviarCorreo" class="btn btn-primary px-4">
                        <i class="fa-solid fa-paper-plane me-2"></i>Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    const correoInput = $('#correo');
    const resultsDiv = $('#results');

    // Datos dinámicos del controlador
    const candidatosData = <?= json_encode($contactoCorreo); ?>;

    // Búsqueda dinámica
    correoInput.on('input', function () {
        const query = $(this).val().toLowerCase();
        resultsDiv.empty();

        if (query === '') {
            resultsDiv.hide();
            return;
        }

        const filtered = candidatosData.filter(c => 
            c.Correo.toLowerCase().includes(query) || 
            c.Nombres.toLowerCase().includes(query)
        );

        if (filtered.length > 0) {
            resultsDiv.show();
            filtered.forEach(c => {
                const resultItem = $(`<div>${c.Nombres} - <strong>${c.Correo}</strong></div>`);
                resultItem.on('click', function () {
                    correoInput.val(c.Correo);
                    resultsDiv.hide();
                });
                resultsDiv.append(resultItem);
            });
        } else {
            resultsDiv.hide();
        }
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('#correo, #results').length) {
            resultsDiv.hide();
        }
    });

    // Enviar correo
    $('#enviarCorreo').on('click', function () {
        const formData = {
            asunto: $('#asunto').val(),
            correo: $('#correo').val(),
            cuerpo: $('#cuerpo').val(),
        };

        if (!formData.asunto || !formData.correo || !formData.cuerpo) {
            Swal.fire({
                icon: 'warning',
                title: 'Campos incompletos',
                text: 'Por favor completa todos los campos.',
            });
            return;
        }

        $.ajax({
            url: '<?= site_url("ContactoController/EnviarCorreo") ?>',
            method: 'POST',
            data: formData,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Correo enviado',
                    text: 'El correo fue enviado exitosamente.',
                });
                $('#formCorreo')[0].reset();
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al enviar el correo.',
                });
            },
        });
    });
});
</script>
</body>
</html>
