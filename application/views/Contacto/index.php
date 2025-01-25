<?php require_once APPPATH . 'views/Dashboard/partesuperior.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Gestión de Correos</title>

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
  <!-- Quill CSS -->
  <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .main-container {
      display: flex;
      height: 100vh;
      overflow: hidden;
    }
    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: #fff;
      padding: 20px;
    }
    .sidebar a {
      display: block;
      color: #fff;
      text-decoration: none;
      padding: 10px 15px;
      border-radius: 5px;
      margin-bottom: 10px;
      transition: background-color 0.3s;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #495057;
    }
    .content {
      flex-grow: 1;
      display: flex;
      overflow: hidden;
    }
    .email-list {
      width: 35%;
      border-right: 1px solid #ddd;
      overflow-y: auto;
      padding: 20px;
      background-color: #fff;
    }
    .email-preview {
      flex-grow: 1;
      padding: 20px;
      overflow-y: auto;
    }
    .card {
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .email-item {
      cursor: pointer;
      padding: 10px;
      border-bottom: 1px solid #f1f1f1;
      transition: background-color 0.3s;
    }
    .email-item:hover {
      background-color: #f8f9fa;
    }
    .email-item.active {
      background-color: #e9ecef;
    }
    /* Estilos para el contenedor de autocompletado */
    .dropdown-results {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      z-index: 9999;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 0 0 5px 5px;
      max-height: 200px;
      overflow-y: auto;
    }
    .resultado-correo:hover {
      background-color: #f1f1f1;
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="main-container">
  <!-- Sidebar -->
  <div class="sidebar">
    <h4>Gestión de Correos</h4>
    <a href="#enviar" class="active" id="linkEnviar">Enviar Correo</a>
    <a href="#bandeja" id="linkBandeja">Bandeja de Entrada</a>
  </div>

  <!-- Content -->
  <div class="content">
    <!-- Lista de correos -->
    <div id="bandeja" class="email-list d-none">
      <h5>Bandeja de Entrada</h5>
      <div id="listaCorreos">
        <!-- Lista de correos dinámicos aquí -->
      </div>
    </div>

    <!-- Vista previa del correo -->
    <div id="correoPreview" class="email-preview d-none">
      <h5>Vista previa</h5>
      <div id="correoContenido">
        <p class="text-muted">Selecciona un correo para ver su contenido.</p>
      </div>
    </div>

    <!-- Enviar correo -->
    <div id="enviar" class="email-preview">
      <h5>Enviar Correo</h5>
      <div class="card">
        <div class="card-body">
          <form id="formCorreo">
            <div class="mb-3">
              <label for="asunto" class="form-label">Asunto</label>
              <input 
                type="text" 
                name="asunto" 
                id="asunto" 
                class="form-control" 
                placeholder="Ejemplo: Información sobre nueva vacante" 
                required
              />
            </div>

            <div class="mb-3 position-relative">
              <label for="correo" class="form-label">Correo Destinatario</label>
              <input 
                type="email" 
                name="correo" 
                id="correo" 
                class="form-control" 
                placeholder="Escribe para buscar..." 
                autocomplete="off"
                required
              />
              <!-- Contenedor para los resultados del autocompletado -->
              <div id="results" class="dropdown-results"></div>
            </div>

            <div class="mb-3">
              <label for="editor-container" class="form-label">Cuerpo del Correo</label>
              <div id="editor-container" class="form-control"></div>
            </div>

            <div class="text-center">
              <button type="button" id="enviarCorreo" class="btn btn-primary px-4">
                <i class="fa-solid fa-paper-plane me-2"></i>Enviar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>
  $(document).ready(function () {
    // Inicializamos el editor Quill
    const quill = new Quill('#editor-container', {
      theme: 'snow',
      placeholder: 'Escribe el contenido del correo...'
    });

    // Navegación entre "Enviar Correo" y "Bandeja de Entrada"
    $('#linkEnviar').click(function () {
      $('.email-preview, .email-list').addClass('d-none');
      $('#enviar').removeClass('d-none');
      $('.sidebar a').removeClass('active');
      $(this).addClass('active');
    });

    $('#linkBandeja').click(function () {
      $('#enviar').addClass('d-none');
      $('#bandeja, #correoPreview').removeClass('d-none');
      $('.sidebar a').removeClass('active');
      $(this).addClass('active');
      cargarBandeja();
    });

    /**
     * ------------------
     * Autocompletado
     * ------------------
     */
    $('#correo').on('keyup', function() {
      const query = $(this).val().trim();

      // Si la longitud del input es muy corta, no buscar
      if (query.length < 2) {
        $('#results').empty();
        return;
      }

      $.ajax({
        url: '<?= site_url("ContactoController/buscarCorreos") ?>', // Ajusta la URL según tu ruta
        method: 'GET',
        data: { query: query },
        dataType: 'json',
        success: function(response) {
          let html = '';

          if (response.status === 'ok' && response.data.length > 0) {
            html += '<ul class="list-group mb-0">';
            response.data.forEach(function(item) {
              html += `
                <li class="list-group-item list-group-item-action resultado-correo" 
                    data-correo="${item.correo}">
                  ${item.correo}
                </li>
              `;
            });
            html += '</ul>';
          } else {
            html = '<p class="text-muted px-2 py-2">No se encontraron resultados.</p>';
          }

          $('#results').html(html);
        },
        error: function() {
          console.error('Error en la solicitud de autocompletado.');
        }
      });
    });

    // Al hacer clic en un resultado de la lista, completamos el input
    $(document).on('click', '.resultado-correo', function() {
      const correoSeleccionado = $(this).data('correo');
      $('#correo').val(correoSeleccionado);
      $('#results').empty(); // Limpiamos los resultados
    });

    /**
     * ------------------
     * Enviar Correo
     * ------------------
     */
    $('#enviarCorreo').click(function(e) {
      e.preventDefault();

      // Obtenemos los valores del formulario
      let asunto = $('#asunto').val().trim();
      let correo = $('#correo').val().trim();
      let cuerpo = quill.root.innerHTML; // Obtenemos el contenido del Quill editor

      // Validaciones simples
      if (!asunto || !correo || !cuerpo) {
        Swal.fire({
          icon: 'warning',
          title: 'Campos Vacíos',
          text: 'Por favor, llene todos los campos antes de enviar.'
        });
        return;
      }

      // Petición AJAX para enviar el correo
      $.ajax({
        url: '<?= site_url("ContactoController/enviarCorreo") ?>', // Ajusta la URL según tu ruta
        method: 'POST',
        data: {
          asunto: asunto,
          correo: correo,
          cuerpo: cuerpo
        },
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Correo Enviado',
              text: response.message
            }).then(() => {
              // Resetear el formulario y editor
              $('#formCorreo')[0].reset();
              quill.setContents([]);
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.message
            });
          }
        },
        error: function() {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo enviar el correo, revise su conexión.'
          });
        }
      });
    });

    /**
     * ------------------
     * Cargar Bandeja
     * ------------------
     */
    function cargarBandeja() {
      $.ajax({
        url: '<?= site_url("ContactoController/leerBandeja") ?>',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
          const listaCorreos = $('#listaCorreos');
          listaCorreos.empty();

          if (response.status === 'ok' && response.emails.length > 0) {
            response.emails.forEach((correo, index) => {
              const item = $(`
                <div class="email-item" data-index="${index}">
                  <strong>${correo.asunto}</strong>
                  <p>${correo.remitente}</p>
                  <small>${correo.fecha}</small>
                </div>
              `);

              item.click(() => mostrarContenido(correo));
              listaCorreos.append(item);
            });
          } else {
            listaCorreos.html('<p class="text-muted">No hay correos disponibles.</p>');
          }
        },
        error: function () {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo cargar la bandeja de entrada.'
          });
        }
      });
    }

    /**
     * ------------------
     * Mostrar Contenido
     * ------------------
     */
    function mostrarContenido(correo) {
      $('#correoContenido').html(`
        <div class="card">
          <div class="card-body">
            <h5>${correo.asunto}</h5>
            <p><strong>De:</strong> ${correo.remitente}</p>
            <p>${correo.cuerpo}</p>
          </div>
        </div>
      `);
    }

  });
</script>
</body>
</html>
