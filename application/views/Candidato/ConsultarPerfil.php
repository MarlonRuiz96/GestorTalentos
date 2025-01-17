<?php require_once APPPATH . 'views/Dashboard/partesuperior.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">
    <title>Vista del candidato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


</head>

<body>
    <header>
        <h1 class="text-center">Candidato</h1>
    </header>
    <div class="container">
        <main>


            <!-- Botón para generar la solicitud de empleo en PDF -->
            <a href="<?= site_url('PdfController/solicitud/' . $candidato_data->DPI); ?>"
                class="btn btn-success sweetalert-linkReporte float-right mb-3">
                Solicitud de empleo
            </a>

            <div class="clearfix"></div>

            <!-- Encabezado principal -->
            <h2 class="my-4 text-center">Datos del Candidato</h2>


            <!-- Tarjeta con información principal del candidato -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <!-- Datos personales del candidato -->
                        <div class="col-md-6">
                            <h5><strong>Nombres:</strong> <?= $candidato_data->Nombres ?></h5>
                            <p><strong>Contacto:</strong> <?= $candidato_data->Contacto ?></p>
                            <p><strong>Correo:</strong> <?= $candidato_data->Correo ?></p>
                        </div>
                        <!-- Datos de la plaza y DPI -->
                        <div class="col-md-6">
                            <h5><strong>Puesto:</strong> <?= $candidato_data->Puesto ?></h5>
                            <p><strong>DPI:</strong> <?= $candidato_data->DPI ?></p>
                            <p><strong>Plaza a la que aplicó:</strong> <?= $candidato_data->plaza ?></p>
                            <p><strong>Proceso:</strong> <?= $candidato_data->progreso ?></p>

                        </div>
                    </div>
                </div>
            </div>
            <?php if ($candidato_data->progreso == 6): ?>
                <div class="alert alert-danger mt-3 text-center" role="alert">
                    <strong>Este candidato ya no continua en el proceso.</strong><br>
                    Motivo: <?= $candidato_data->comentario ?>
                </div>
            <?php endif; ?>
            <?php if ($candidato_data->progreso == 3): ?>
                <?php if ($candidato_data->Entrevista == null): ?>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Programar Entrevista</h5>
                            <form
                                action="<?= site_url('CandidatoController/ProgramarEvento/' . $candidato_data->idCandidato . '/Entrevista'); ?>"
                                method="post">
                                <input type="hidden" name="idCandidato" value="<?= $candidato_data->idCandidato; ?>">
                                <input type="hidden" name="Evento" value="Entrevista">

                                <div class="mb-3">
                                    <label for="fechaEntrevista" class="form-label">Fecha de la Entrevista</label>
                                    <input type="date" class="form-control" id="fechaEntrevista" name="fechaEntrevista"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="horaEntrevista" class="form-label">Hora de la Entrevista</label>
                                    <input type="time" class="form-control" id="horaEntrevista" name="horaEntrevista" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lugarEntrevista" class="form-label">Lugar de la Entrevista</label>
                                    <input type="text" class="form-control" id="lugarEntrevista" name="lugarEntrevista"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Programar Entrevista</button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-success mt-3 text-left" role="alert">
                        <h5><i class="fa-solid fa-calendar-check"></i> <strong>Entrevista Programada</strong></h5>
                        <p>
                            <i class="fa-solid fa-calendar-day"></i> Fecha: <?= $eventos->Fecha ?><br>
                            <i class="fa-solid fa-clock"></i> Hora: <?= $eventos->Hora ?><br>
                            <i class="fa-solid fa-map-marker-alt"></i> Lugar: <?= $eventos->Lugar ?>
                        </p>
                        <hr>
                        <p>
                            <i class="fa-solid fa-info-circle"></i> <strong>Nota:</strong> Una vez concluida la entrevista,
                            puede continuar o rechazar al candidato utilizando las opciones disponibles en la parte inferior de
                            esta página. Además, puede agregar su feedback sobre la entrevista en la sección de comentarios para
                            un mejor seguimiento del proceso.
                        </p>

                    </div>

                <?php endif; ?>
            <?php endif; ?>

            <?php if ($candidato_data->progreso == 4): ?>
                <div class="alert alert-success mt-3 text-center" role="alert">
                    <strong>El candidato ha completado el proceso de la entrevista exitosamente.</strong>
                </div>

            <?php endif; ?>
            <?php if ($candidato_data->progreso == 5): ?>
                <div class="alert alert-success mt-3 text-center" role="alert">
                    <strong>El candidato ha completado el proceso de seleccion con éxito.</strong>
                </div>

            <?php endif; ?>


            <div class="timeline-container">
                <ul class="timeline">
                    <?php
                    $progreso = $candidato_data->progreso; // Obtener el progreso del candidato
                    $steps = [
                        1 => ["title" => "Solicitud", "icon" => "fa-file-alt"], // Icono: Archivo
                        2 => ["title" => "Pruebas", "icon" => "fa-vial"],      // Icono: Probeta
                        3 => ["title" => "Entrevista", "icon" => "fa-user-tie"], // Icono: Persona con corbata
                        4 => ["title" => "Contrato", "icon" => "fa-file-contract"],// Icono: Contrato
                    ];
                    $isRejected = ($progreso == 6); // Verificar si el candidato fue rechazado
                    
                    foreach ($steps as $step => $data) {
                        $class = "step";
                        $statusText = $data['title'] . " pendiente";
                        $iconClass = $data['icon'];
                        $iconStatus = '<i class="fa-solid fa-regular fa-circle"></i>'; // Icono por defecto (círculo vacío)
                    
                        if ($isRejected) {
                            $class .= " rejected";
                            $statusText = "Rechazado";
                            $iconStatus = '<i class="fa-solid fa-xmark"></i>'; // Icono de rechazo (X)
                        } elseif ($step < $progreso) {
                            $class .= " completed";
                            $statusText = $data['title'] . " realizada";
                            $iconStatus = '<i class="fa-solid fa-check"></i>'; // Icono de completado (check)
                        } elseif ($step == $progreso) {
                            $class .= " active";
                            $statusText = $data['title'] . " en progreso";
                            $iconStatus = '<i class="fa-solid fa-spinner fa-spin"></i>'; // Icono de en progreso (spinner)
                        }
                        ?>
                        <li class="<?= $class ?>">
                            <div class="step-icon"><?= $iconStatus ?></div>
                            <div class="step-content">
                                <h3 class="step-title"><?= $data['title'] ?></h3>
                                <p class="step-status"><?= $statusText ?></p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="timeline-wrapper">
                <div class="timeline-container2">
                    <?php if (!empty($comentario)): ?>
                        <?php foreach ($comentario as $comentarios): ?>
                            <?php
                            // Determinamos el nombre y color de la etapa
                            $etapa = '';
                            $stageColorClass = '';

                            switch ($comentarios->Etapa) {
                                case 1:
                                    $etapa = 'Solicitud';
                                    $stageColorClass = 'stage-solicitud';
                                    break;
                                case 2:
                                    $etapa = 'Pruebas';
                                    $stageColorClass = 'stage-pruebas';
                                    break;
                                case 3:
                                    $etapa = 'Entrevista';
                                    $stageColorClass = 'stage-entrevista';
                                    break;
                                case 4:
                                    $etapa = 'Contrato';
                                    $stageColorClass = 'stage-contrato';
                                    break;
                                default:
                                    $etapa = 'Desconocida';
                                    $stageColorClass = 'stage-desconocida';
                                    break;
                            }
                            ?>
                            <div class="timeline-item <?= $stageColorClass ?>">
                                <div class="timeline-content">
                                    <h5>
                                        <?= $etapa ?>
                                        <span class="date"><?= $comentarios->Fecha ?></span>
                                    </h5>
                                    <p><?= $comentarios->comment ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="no-comments" id="comentarios">Aún no hay comentarios.</p>
                    <?php endif; ?>
                </div>
            </div>
            <br>
            <!-- Formulario para agregar comentarios -->
            <form id="formAgregarComentario">
                <input type="hidden" name="idCandidato" value="<?= $candidato_data->idCandidato; ?>">

                <div class="mb-3">
                    <label for="etapa" class="form-label">Seleccionar etapa</label>
                    <select class="form-select" id="etapa" name="etapa" required>
                        <option value="" disabled selected>Selecciona una etapa</option>
                        <option value="1">Solicitud</option>
                        <option value="2">Pruebas</option>
                        <option value="3">Entrevista</option>
                        <option value="4">Contrato</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario</label>
                    <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
                </div>

                <button type="button" id="btnAgregarComentario" class="btn btn-primary">
                    Agregar Comentario
                </button>
            </form>
            <!-- Botones para cambiar el estado del candidato -->

            
            <div class="form-row mt-3" id= "BotonAcciones">
                <div class="form-group col-md-12">

                    <!-- Contenedor para los botones centrados -->
                    <div class="d-flex justify-content-center">
                        <!-- Botón Aceptar -->

                        <!-- Botón Rechazar -->
                        <button type="button" class="btn btn-danger mx-2 custom-button" id="RechazarCandidato">
                            <i class="fa-solid fa-xmark"></i> Terminar Proceso
                        </button>
                        <!-- Botón Aceptar -->
                        <button id="btnContinuar" class="btn btn-success">Continuar Proceso</button>


                    </div>
                </div>
            </div>



            </form>
            <form action="formRechazarCandidato">
                <input type="hidden" name="idCandidato" value="<?= $candidato_data->idCandidato; ?>">
                <div class="mb-3" id="divComentarioRechazo">
                    <label for="comentarioRechazo" class="form-label"></label>
                    <textarea class="form-control" id="comentarioRechazo" name="comentarioRechazo" rows="3"
                        required></textarea>
                    <br>
                    <button type="button" id="btnRechazarCandidato" class="btn btn-danger">
                        Rechazar Candidato
                    </button>
                </div>



            </form>

            <main>

                <!-- Navegación de Pruebas -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" data-target="div-ocultar">Temperamentos</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" data-target="div-ocultar-2">Myers-Briggs</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" data-target="div-ocultar-3">Valanti</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" data-target="div-ocultar-4">16 PF</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" data-target="div-ocultar-5">Cleaver</a>
                        </li>
                    </ul>
                </nav>

                <!-- PRUEBA TEMPERAMENTOS -->
                <div class="contenido div-ocultar" style="display: none;">
                    <section>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 style="margin-right: 400px;">Temperamento</h3>
                            <div>
                                <?php if (!($candidato_data->temperamento)): ?>
                                    <a href="<?= site_url('CandidatoController/activarPruebas/' . $candidato_data->DPI . '/temperamento'); ?>"
                                        class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-success disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        activada</a>
                                <?php endif; ?>

                                <?php if ($candidato_data->temperamento): ?>
                                    <a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/temperamento'); ?>"
                                        class="btn btn-danger sweetalert-desactivar"
                                        data-title="¿Desactivar la Prueba">Desactivar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-danger disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        desactivada</a>
                                <?php endif; ?>

                                <a href="<?= site_url('CandidatoController/reiniciarDatos/' . $candidato_data->DPI . '/temperamento'); ?>"
                                    class="btn btn-warning sweetalert-reiniciar"
                                    data-title="Estas a punto de reiniciar los datos, la prueba será desactivada, tendrás que activarla nuevamente.">
                                    Reiniciar datos
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <canvas id="myChart"></canvas>
                        </div>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <?php echo $textoFortaleza['temperamento']; ?> <br>
                                        <?php echo $textoFortaleza['texto']; ?><br>
                                        FORTALEZAS
                                    </th>
                                </tr>
                                <tr>
                                    <th>Las emociones del <?php echo $textoFortaleza['temperamento']; ?></th>
                                    <th>El <?php echo $textoFortaleza['temperamento']; ?> en el trabajo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $textoFortaleza['emociones']; ?></td>
                                    <td><?php echo $textoFortaleza['trabajo']; ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>El <?php echo $textoFortaleza['temperamento']; ?> como padre.</th>
                                    <th>El <?php echo $textoFortaleza['temperamento']; ?> como amigo.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $textoFortaleza['familia']; ?></td>
                                    <td><?php echo $textoFortaleza['amigo']; ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <br><br>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <?php echo $textoFortaleza['temperamento']; ?> <br>
                                        <?php echo $textoFortaleza['texto']; ?><br>
                                        DEBILIDADES
                                    </th>
                                </tr>
                                <tr>
                                    <th>Las emociones del <?php echo $textoFortaleza['temperamento']; ?></th>
                                    <th>El <?php echo $textoFortaleza['temperamento']; ?> en el trabajo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $textoFortaleza['emocionesD']; ?></td>
                                    <td><?php echo $textoFortaleza['trabajoD']; ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>El <?php echo $textoFortaleza['temperamento']; ?> como padre.</th>
                                    <th>El <?php echo $textoFortaleza['temperamento']; ?> como amigo.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $textoFortaleza['familiaD']; ?></td>
                                    <td><?php echo $textoFortaleza['amigoD']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>

                <!-- PRUEBA MYERS BRIGGS -->
                <div class="contenido div-ocultar-2" style="display: none;">
                    <section>
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 style="margin-right: 400px;">Myers-Briggs</h2>
                            <div>
                                <?php if (!($candidato_data->Briggs)): ?>
                                    <a href="<?= site_url('CandidatoController/activarPruebas/' . $candidato_data->DPI . '/Briggs'); ?>"
                                        class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-success disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        activada</a>
                                <?php endif; ?>

                                <?php if ($candidato_data->Briggs): ?>
                                    <a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/Briggs'); ?>"
                                        class="btn btn-danger sweetalert-desactivar"
                                        data-title="¿Desactivar la Prueba">Desactivar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-danger disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        desactivada</a>
                                <?php endif; ?>

                                <a href="<?= site_url('CandidatoController/reiniciarDatos/' . $candidato_data->DPI . '/Briggs'); ?>"
                                    class="btn btn-warning sweetalert-reiniciar"
                                    data-title="Estas a punto de reiniciar los datos, la prueba será desactivada, tendrás que activarla nuevamente.">
                                    Reiniciar datos
                                </a>
                            </div>
                        </div>

                        <div class="container mt-3">
                            <div class="row">
                                <!-- Columna 1: Gráfico -->
                                <div class="col-md-6">
                                    <canvas id="myCharts" width="400" height="400"></canvas>
                                </div>
                                <!-- Columna 2: Espacio para anotaciones -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <!-- Formulario 1 -->
                                        <div class="col-md-6">
                                            <form id="datosForm">
                                                <h2>Participante:</h2>
                                                <div class="form-group">
                                                    <label for="Verdad">Verdad:</label>
                                                    <input type="text" class="form-control" id="Verdad" name="Verdad"
                                                        value="<?php echo isset($dataValanti->Verdad) ? $dataValanti->Verdad : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Rectitud">Rectitud:</label>
                                                    <input type="text" class="form-control" id="Rectitud"
                                                        name="Rectitud"
                                                        value="<?php echo isset($dataValanti->Rectitud) ? $dataValanti->Rectitud : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Paz">Paz:</label>
                                                    <input type="text" class="form-control" id="Paz" name="Paz"
                                                        value="<?php echo isset($dataValanti->Paz) ? $dataValanti->Paz : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Amor">Amor:</label>
                                                    <input type="text" class="form-control" id="Amor" name="Amor"
                                                        value="<?php echo isset($dataValanti->Amor) ? $dataValanti->Amor : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NoViolencia">No Violencia:</label>
                                                    <input type="text" class="form-control" id="NoViolencia"
                                                        name="NoViolencia"
                                                        value="<?php echo isset($dataValanti->No_violencia) ? $dataValanti->No_violencia : ''; ?>">
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Formulario 2 DEL GESTOR DE TALENTOS -->
                                        <div class="col-md-6">
                                            <form id="datosFormNuevo"
                                                action="<?php echo site_url('CandidatoController/guardarValanti'); ?>"
                                                method="POST">
                                                <input type="hidden" class="form-control" id="DPI" name="DPI"
                                                    value="<?php echo $candidato_data->DPI; ?>">

                                                <h2> Gestor:</h2>
                                                <div class="form-group">
                                                    <label for="VerdadEmpresa">Verdad:</label>
                                                    <input type="number" class="form-control" id="VerdadEmpresa"
                                                        name="VerdadEmpresa"
                                                        value="<?php echo isset($dataValanti->verdadEmpresa) ? $dataValanti->verdadEmpresa : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="RectitudEmpresa">Rectitud:</label>
                                                    <input type="number" class="form-control" id="RectitudEmpresa"
                                                        name="RectitudEmpresa"
                                                        value="<?php echo isset($dataValanti->rectitudEmpresa) ? $dataValanti->rectitudEmpresa : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="PazEmpresa">Paz:</label>
                                                    <input type="number" class="form-control" id="PazEmpresa"
                                                        name="PazEmpresa"
                                                        value="<?php echo isset($dataValanti->pazEmpresa) ? $dataValanti->pazEmpresa : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="AmorEmpresa">Amor:</label>
                                                    <input type="number" class="form-control" id="AmorEmpresa"
                                                        name="AmorEmpresa"
                                                        value="<?php echo isset($dataValanti->amorEmpresa) ? $dataValanti->amorEmpresa : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NoViolenciaEmpresa">No Violencia:</label>
                                                    <input type="number" class="form-control" id="NoViolenciaEmpresa"
                                                        name="NoViolenciaEmpresa"
                                                        value="<?php echo isset($dataValanti->noViolenciaEmpresa) ? $dataValanti->noViolenciaEmpresa : ''; ?>">
                                                </div>
                                                <!-- Botón de guardar -->
                                                <button type="submit" class="btn btn-primary mt-3"
                                                    id="GuardarDatosNuevo">Guardar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- PRUEBA VALANTI -->
                <div class="contenido div-ocultar-3" style="display: none;">
                    <section>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 style="margin-right: 500px;">Valanti</h3>
                            <div>
                                <?php if (!($candidato_data->Valanti)): ?>
                                    <a href="<?= site_url('CandidatoController/activarPruebas/' . $candidato_data->DPI . '/valanti'); ?>"
                                        class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-success disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        activada</a>
                                <?php endif; ?>

                                <?php if ($candidato_data->Valanti): ?>
                                    <a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/valanti'); ?>"
                                        class="btn btn-danger sweetalert-desactivar"
                                        data-title="¿Desactivar la Prueba">Desactivar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-danger disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        desactivada</a>
                                <?php endif; ?>

                                <a href="<?= site_url('CandidatoController/reiniciarDatos/' . $candidato_data->DPI . '/valanti'); ?>"
                                    class="btn btn-warning sweetalert-reiniciar"
                                    data-title="Estas a punto de reiniciar los datos, la prueba será desactivada, tendrás que activarla nuevamente.">
                                    Reiniciar datos
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="row">
                                <!-- Columna 1: Gráfico -->
                                <div class="col-md-6">
                                    <canvas id="radiaGlChart"></canvas>
                                </div>
                                <!-- Columna 2: Espacio para anotaciones -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <!-- Formulario 1 -->
                                        <div class="col-md-6">
                                            <form id="datosForm">
                                                <h2>Participante:</h2>
                                                <div class="form-group">
                                                    <label for="Verdad">Verdad:</label>
                                                    <input type="text" class="form-control" id="Verdad" name="Verdad"
                                                        value="<?php echo isset($dataValanti->Verdad) ? $dataValanti->Verdad : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Rectitud">Rectitud:</label>
                                                    <input type="text" class="form-control" id="Rectitud"
                                                        name="Rectitud"
                                                        value="<?php echo isset($dataValanti->Rectitud) ? $dataValanti->Rectitud : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Paz">Paz:</label>
                                                    <input type="text" class="form-control" id="Paz" name="Paz"
                                                        value="<?php echo isset($dataValanti->Paz) ? $dataValanti->Paz : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Amor">Amor:</label>
                                                    <input type="text" class="form-control" id="Amor" name="Amor"
                                                        value="<?php echo isset($dataValanti->Amor) ? $dataValanti->Amor : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NoViolencia">No Violencia:</label>
                                                    <input type="text" class="form-control" id="NoViolencia"
                                                        name="NoViolencia"
                                                        value="<?php echo isset($dataValanti->No_violencia) ? $dataValanti->No_violencia : ''; ?>">
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Formulario 2 DEL GESTOR DE TALENTOS -->
                                        <div class="col-md-6">
                                            <form id="datosFormNuevo"
                                                action="<?php echo site_url('CandidatoController/guardarValanti'); ?>"
                                                method="POST">
                                                <input type="hidden" class="form-control" id="DPI" name="DPI"
                                                    value="<?php echo $candidato_data->DPI; ?>">

                                                <h2> Gestor:</h2>
                                                <div class="form-group">
                                                    <label for="VerdadEmpresa">Verdad:</label>
                                                    <input type="number" class="form-control" id="VerdadEmpresa"
                                                        name="VerdadEmpresa"
                                                        value="<?php echo isset($dataValanti->verdadEmpresa) ? $dataValanti->verdadEmpresa : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="RectitudEmpresa">Rectitud:</label>
                                                    <input type="number" class="form-control" id="RectitudEmpresa"
                                                        name="RectitudEmpresa"
                                                        value="<?php echo isset($dataValanti->rectitudEmpresa) ? $dataValanti->rectitudEmpresa : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="PazEmpresa">Paz:</label>
                                                    <input type="number" class="form-control" id="PazEmpresa"
                                                        name="PazEmpresa"
                                                        value="<?php echo isset($dataValanti->pazEmpresa) ? $dataValanti->pazEmpresa : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="AmorEmpresa">Amor:</label>
                                                    <input type="number" class="form-control" id="AmorEmpresa"
                                                        name="AmorEmpresa"
                                                        value="<?php echo isset($dataValanti->amorEmpresa) ? $dataValanti->amorEmpresa : ''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NoViolenciaEmpresa">No Violencia:</label>
                                                    <input type="number" class="form-control" id="NoViolenciaEmpresa"
                                                        name="NoViolenciaEmpresa"
                                                        value="<?php echo isset($dataValanti->noViolenciaEmpresa) ? $dataValanti->noViolenciaEmpresa : ''; ?>">
                                                </div>
                                                <!-- Botón de guardar -->
                                                <button type="submit" class="btn btn-primary mt-3"
                                                    id="GuardarDatosNuevo">Guardar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- PRUEBA 16PF -->
                <div class="contenido div-ocultar-4" style="display: none;">
                    <section>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 style="margin-right: 500px;">16 P.F</h3>
                            <div>
                                <?php if (!($candidato_data->fp16)): ?>
                                    <a href="<?= site_url('CandidatoController/activarPruebas/' . $candidato_data->DPI . '/fp16'); ?>"
                                        class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-success disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        activada</a>
                                <?php endif; ?>

                                <?php if ($candidato_data->fp16): ?>
                                    <a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/fp16'); ?>"
                                        class="btn btn-danger sweetalert-desactivar"
                                        data-title="¿Desactivar la Prueba">Desactivar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-danger disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        desactivada</a>
                                <?php endif; ?>

                                <a href="<?= site_url('CandidatoController/reiniciarDatos/' . $candidato_data->DPI . '/fp16'); ?>"
                                    class="btn btn-warning sweetalert-reiniciar"
                                    data-title="Estas a punto de reiniciar los datos, la prueba será desactivada, tendrás que activarla nuevamente.">
                                    Reiniciar datos
                                </a>
                            </div>
                        </div>
                        <div style="display: flex; align-items: flex-start;">
                            <div>
                                <table id="combinedTable" class="table table-bordered mt-3">
                                    <tbody>
                                        <tr>
                                            <td class="title">RESERVADO. No se relaciona con facilidad hacia las demás
                                                personas
                                            </td>
                                            <td class="chart"><canvas id="graficaReservado"></canvas></td>
                                            <td class="description">SOCIABLE. Fácil de tratar, cooperador y muy
                                                adaptable
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title">LENTO. Despacioso en sus actos. Demorado para aprender
                                            </td>
                                            <td class="chart"><canvas id="graficaLento"></canvas></td>
                                            <td class="description">RÁPIDO. Percibe y comprende con velocidad</td>
                                        </tr>
                                        <tr>
                                            <td class="title">INFANTIL. Curioso, cambiante y toma las decisiones con
                                                inmadurez
                                            </td>
                                            <td class="chart"><canvas id="graficaInfantil"></canvas></td>
                                            <td class="description">ADULTO. Persona madura. Toma las decisiones
                                                naturalmente
                                                sin apuros</td>
                                        </tr>
                                        <tr>
                                            <td class="title">SUMISO. Tiende a depender de otras personas y carece de
                                                opinión
                                            </td>
                                            <td class="chart"><canvas id="graficaSumiso"></canvas></td>
                                            <td class="description">DOMINANTE. Una persona que demanda mucho de forma
                                                autoritaria</td>
                                        </tr>
                                        <tr>
                                            <td class="title">TACITURNO. Introspectivo, melancólico, lánguido y sin
                                                consuelo
                                            </td>
                                            <td class="chart"><canvas id="graficaTaciturno"></canvas></td>
                                            <td class="description">ENTUSIASTA. Alegre, franco y enérgico. Tiene empuje
                                                e
                                                iniciativa</td>
                                        </tr>
                                        <tr>
                                            <td class="title">VARIABLE. Tendencia a ser inconstante, sin decisiones
                                                fijas
                                            </td>
                                            <td class="chart"><canvas id="graficaVariable"></canvas></td>
                                            <td class="description">CONSTANTE. Responsable, decidido, bien organizado
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title">TIMIDO. Cauteloso, capacidad de contacto social baja
                                            </td>
                                            <td class="chart"><canvas id="graficaTimido"></canvas></td>
                                            <td class="description">AVENTURADO. Sociable, dinámico, arriesgado,
                                                comprometido
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title">EMOCIONAL. Imaginativo, soñador, con ilusiones e impetuoso
                                            </td>
                                            <td class="chart"><canvas id="graficaEmocional"></canvas></td>
                                            <td class="description">RACIONAL. Práctico, lógico con fundamentos teóricos
                                                y
                                                experiencia</td>
                                        </tr>
                                        <tr>
                                            <td class="title">SOSPECHOSO. Interesado en sí mismo. No siempre es bueno
                                                para
                                                trabajar en grupo
                                            </td>
                                            <td class="chart"><canvas id="graficaSospechoso"></canvas></td>
                                            <td class="description">CONFIABLE. Tendencia a estar libre de celos, es
                                                bueno
                                                para trabajar en grupo.</td>
                                        </tr>
                                        <tr>
                                            <td class="title">EXCÉNTRICO. Curioso, humorístico, raro, paradójico
                                            </td>
                                            <td class="chart"><canvas id="graficaExcentrico"></canvas></td>
                                            <td class="description">CONVENCIONAL. Aceptado, normal, obligado, acomedido
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title">SIMPLE. Sencillo, se satisface fácilmente y sin
                                                complicaciones
                                            </td>
                                            <td class="chart"><canvas id="graficaSimple"></canvas></td>
                                            <td class="description">ESTRUCTURADO. Cuidadoso, experimentado, analítico y
                                                sofisticado</td>
                                        </tr>
                                        <tr>
                                            <td class="title">INSEGURO. Incierto, presenta sentimientos de inseguridad
                                            </td>
                                            <td class="chart"><canvas id="graficaInseguro"></canvas></td>
                                            <td class="description">SEGURO DE SÍ MISMO. Confiado en lo que hace y piensa
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title">RUTINARIO. Tradicional, conservador y moderado
                                            </td>
                                            <td class="chart"><canvas id="graficaRutinario"></canvas></td>
                                            <td class="description">INNOVADOR. Le gustan las ideas nuevas</td>
                                        </tr>
                                        <tr>
                                            <td class="title">DEPENDIENTE. No le gusta tomar decisiones sin contar con
                                                la
                                                aprobación de los demás
                                            </td>
                                            <td class="chart"><canvas id="graficaDependiente"></canvas></td>
                                            <td class="description">AUTOSUFICIENTE. Actúa por sí mismo, independiente y
                                                toma
                                                sus propias decisiones sean o no correctas</td>
                                        </tr>
                                        <tr>
                                            <td class="title">DESCONTROLADO. Poco cuidadoso, desordenado y excesivo en
                                                emociones
                                            </td>
                                            <td class="chart"><canvas id="graficaDescontrolado"></canvas></td>
                                            <td class="description">CONTROLADO. Domina sus emociones, cuidadoso y
                                                tranquilo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title">TENSO. Excitable, impaciente, rígido, se desespera y
                                                desespera
                                                a los demás
                                            </td>
                                            <td class="chart"><canvas id="graficaTenso"></canvas></td>
                                            <td class="description">ESTABLE. Seguro y libre de tensiones emocionales.
                                                Firme
                                                en decisiones</td>
                                        </tr>
                                        <!-- Agrega más filas según sea necesario -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- FORMULARIO CLEAVER -->
                <div class="contenido div-ocultar-5" style="display: none;">
                    <section>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 style="margin-right: 500px;">Cleaver</h3>
                            <div>
                                <?php if (!($candidato_data->cleaver)): ?>
                                    <a href="<?= site_url('CandidatoController/activarPruebas/' . $candidato_data->DPI . '/cleaver'); ?>"
                                        class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-success disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        activada</a>
                                <?php endif; ?>

                                <?php if ($candidato_data->cleaver): ?>
                                    <a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/cleaver'); ?>"
                                        class="btn btn-danger sweetalert-desactivar"
                                        data-title="¿Desactivar la Prueba">Desactivar
                                        Prueba</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-danger disabled"
                                        style="pointer-events: none; opacity: 0.5;">Prueba
                                        desactivada</a>
                                <?php endif; ?>

                                <a href="<?= site_url('CandidatoController/reiniciarDatos/' . $candidato_data->DPI . '/cleaver'); ?>"
                                    class="btn btn-warning sweetalert-reiniciar"
                                    data-title="Estás a punto de reiniciar los datos, la prueba será desactivada, tendrás que activarla nuevamente.">
                                    Reiniciar datos
                                </a>
                            </div>
                        </div>

                        <br>

                        <div class="d-flex justify-content-around">
                            <div class="text-center">
                                <div class="chart-container" style="width: 300px; height: 500px;">
                                    <canvas id="normalChart"></canvas>
                                </div>
                            </div>

                            <div class="text-center">
                                <div class="chart-container" style="width: 300px; height: 500px;">
                                    <canvas id="motivacionChart"></canvas>
                                </div>
                            </div>

                            <div class="text-center">
                                <div class="chart-container" style="width: 300px; height: 500px;">
                                    <canvas id="presionChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div style="display: flex; justify-content: space-around; align-items: center;">
                            <div style="text-align: center;">
                                <h3>D - Dominio</h3>
                                <div
                                    style="display: flex; flex-direction: column; align-items: center; width: 150px; height: 150px;">
                                    <canvas id="dominanceChart"></canvas>
                                </div>
                                <p style="font-weight: bold; margin-top: 10px;">Valor: <span
                                        id="dominanceValue"></span>%</p>
                            </div>

                            <div style="text-align: center;">
                                <h3>I - Influencia</h3>
                                <div
                                    style="display: flex; flex-direction: column; align-items: center; width: 150px; height: 150px;">
                                    <canvas id="influenceChart"></canvas>
                                </div>
                                <p style="font-weight: bold; margin-top: 10px;">Valor: <span
                                        id="influenceValue"></span>%</p>
                            </div>

                            <div style="text-align: center;">
                                <h3>S - Estabilidad</h3>
                                <div
                                    style="display: flex; flex-direction: column; align-items: center; width: 150px; height: 150px;">
                                    <canvas id="stabilityChart"></canvas>
                                </div>
                                <p style="font-weight: bold; margin-top: 10px;">Valor: <span
                                        id="stabilityValue"></span>%</p>
                            </div>

                            <div style="text-align: center;">
                                <h3>C - Conciencia</h3>
                                <div
                                    style="display: flex; flex-direction: column; align-items: center; width: 150px; height: 150px;">
                                    <canvas id="conscientiousnessChart"></canvas>
                                </div>
                                <p style="font-weight: bold; margin-top: 10px;">Valor: <span
                                        id="conscientiousnessValue"></span>%</p>
                            </div>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
                            <!-- Imagen al lado izquierdo -->
                            <div style="width: 35%; text-align: center;">
                                <img src="https://static.vecteezy.com/system/resources/previews/023/254/079/non_2x/smiling-male-teacher-character-pointing-free-png.png"
                                    alt="Smiling Male Teacher"
                                    style="width: 100%; max-width: 300px; border-radius: 8px;">
                            </div>

                            <!-- Interpretación al lado derecho -->
                            <div style="width: 60%; padding-left: 20px;">
                                <h2 style="color: #2c3e50; font-weight: bold;">Interpretación del Perfil</h2>
                                <p style="font-size: 16px; line-height: 1.6; color: #555;">
                                    <?php
                                    if (!empty($interpretacionCleaver['interpretacion'])) {
                                        echo $interpretacionCleaver['interpretacion'];
                                    } else {
                                        echo 'No hay interpretación disponible.';
                                    }
                                    ?>
                                </p>

                            </div>

                        </div>
                </div> <!-- Fin del cleaver-->
            </main>
    </div>

    </main>
    </div>


    <!-- Librerías necesarias -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- En tu vista, por ejemplo: application/views/mi_vista.php -->
    <script>
        // Crear variable global o local, según tu conveniencia
        var CANDIDATO_PROGRESO = <?php echo $candidato_data->progreso; ?>;
        var SITE_URL_AGREGAR_COMENTARIO = "<?php echo site_url('CandidatoController/agregarComentario'); ?>";
        var SITE_URL_RECHAZAR_CANDIDATO = "<?php echo site_url('CandidatoController/rechazarCandidato'); ?>";
        var RUTA_CONTINUAR_PROCESO = "<?php echo site_url('CandidatoController/ContinuarProceso/' . $candidato_data->idCandidato . '/' . $candidato_data->progreso); ?>";


        //GRAFICAS DE LAS PREUBAS
        var DATA_BRIGGS = <?php echo json_encode($dataBriggs); ?>;
        var DATA_TEMPERAMENTOS = <?php echo json_encode($dataTemperamento); ?>;
        var DATA_VALANTI = <?php echo json_encode($dataValanti); ?>;
        var CANDIDATO_DATA = <?php echo json_encode($candidato_data); ?>;
        var DATA_16PF = <?php echo json_encode($data16pf); ?>;
        var CLEAVER = <?php echo json_encode($dataCleaver); ?>;
        var CLEAVER2 = <?php echo json_encode($candidato_data); ?>;
        var INTERPRETACION_CLEAVER = <?php echo json_encode($interpretacionCleaver); ?>;


    </script>

    <!-- Luego incluyes tu script externo -->
    <script src="<?php echo base_url('assets/js/Perfil.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/SweetAlerts.js'); ?>"></script>

    <!--GRAFICAS DE LAS PREUBAS-->
    <script src="<?php echo base_url('assets/js/Graficas/Briggs.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/Graficas/Temperamentos.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/Graficas/Valanti.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/Graficas/Fp16.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/Graficas/Cleaver.js'); ?>"></script>

    <!-- Funcionalidades -->
    <script src="<?php echo base_url('assets/js/Admin/Paginacion.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/Comentarios.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/Admin/AvanzarFase.js'); ?>"></script>





</body>

</html>