<?php require_once APPPATH . 'views/Dashboard/partesuperior.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">
	<title>Prueba Psicometrica</title>
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
		<a href="<?= site_url('Plazas'); ?>" class="btn btn-secondary mb-3">
			<i class="fa fa-arrow-left"></i> Volver a la plaza
		</a>
		<a href="<?= site_url('PdfController/vervista/' . $candidato_data->plaza); ?>"
		   class="btn btn-success sweetalert-linkReporte"
		   style="float: right; margin-bottom: 10px;">
			Generar Pruebas
		</a>

		<a href="<?= site_url('PdfController/solicitud/' . $candidato_data->DPI); ?>"
		   class="btn btn-success sweetalert-linkReporte"
		   style="float: right; margin-bottom: 10px;">
			 Solicitud de empleo
		</a>



		<h2 class="text">Datos del Candidato</h2>

		<!-- Formulario Principal -->
		<form>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="nombres">Nombres</label>
					<input type="text" class="form-control" id="nombres"
						   value="<?php echo $candidato_data->Nombres; ?>" readonly>
				</div>
				<div class="form-group col-md-6">
					<label for="Puesto">Puesto</label>
					<input type="text" class="form-control" id="Puesto"
						   value="<?php echo $candidato_data->Puesto; ?>" readonly>
				</div>
				<div class="form-group col-md-6">
					<label for="Contacto">Contacto</label>
					<input type="text" class="form-control" id="Contacto"
						   value="<?php echo $candidato_data->Contacto; ?>" readonly>
				</div>
				<div class="form-group col-md-6">
					<label for="Correo">Correo</label>
					<input type="email" class="form-control" id="Correo"
						   value="<?php echo $candidato_data->Correo; ?>" readonly>
				</div>
				<div class="form-group col-md-6">
					<label for="DPI">DPI</label>
					<input type="text" class="form-control" id="DPI" value="<?php echo $candidato_data->DPI; ?>"
						   readonly>
				</div>
				<div class="form-group col-md-6">
					<label for="DPI">Plaza a la que aplicó:</label>
					<input type="text" class="form-control" id="DPI" value="<?php echo $candidato_data->plaza; ?>"
						   readonly>
				</div>
			</div>
		</form>

		<!-- Formulario de Anotaciones -->
		<div class="form-row mt-3">
			<div class="form-group col-md-12">
				<label for="Anotaciones">Anotaciones</label>
				<form id="editForm" action="<?php echo site_url('CandidatoController/guardarNotas'); ?>"
					  method="POST">
					<div class="anotaciones-container">
                            <textarea class="form-control" id="Anotaciones" name="notas"
									  style="width: 100%;"><?php echo $candidato_data->notas; ?></textarea>
						<button type="submit" class="btn btn-primary sweetalert-guardar mt-2" id="GuardarAnotaciones"
								style="margin-left: 10px;">Guardar</button>
					</div>
				</form>
			</div>
		</div>

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
							   class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar Prueba</a>
						<?php else: ?>
							<a href="#" class="btn btn-success disabled"
							   style="pointer-events: none; opacity: 0.5;">Prueba activada</a>
						<?php endif; ?>

						<?php if ($candidato_data->temperamento): ?>
							<a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/temperamento'); ?>"
							   class="btn btn-danger sweetalert-desactivar" data-title="¿Desactivar la Prueba">Desactivar
								Prueba</a>
						<?php else: ?>
							<a href="#" class="btn btn-danger disabled"
							   style="pointer-events: none; opacity: 0.5;">Prueba desactivada</a>
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
							   style="pointer-events: none; opacity: 0.5;">Prueba activada</a>
						<?php endif; ?>

						<?php if ($candidato_data->Briggs): ?>
							<a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/Briggs'); ?>"
							   class="btn btn-danger sweetalert-desactivar" data-title="¿Desactivar la Prueba">Desactivar
								Prueba</a>
						<?php else: ?>
							<a href="#" class="btn btn-danger disabled"
							   style="pointer-events: none; opacity: 0.5;">Prueba desactivada</a>
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
											<input type="text" class="form-control" id="Rectitud" name="Rectitud"
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
							   style="pointer-events: none; opacity: 0.5;">Prueba activada</a>
						<?php endif; ?>

						<?php if ($candidato_data->Valanti): ?>
							<a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/valanti'); ?>"
							   class="btn btn-danger sweetalert-desactivar" data-title="¿Desactivar la Prueba">Desactivar
								Prueba</a>
						<?php else: ?>
							<a href="#" class="btn btn-danger disabled"
							   style="pointer-events: none; opacity: 0.5;">Prueba desactivada</a>
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
											<input type="text" class="form-control" id="Rectitud" name="Rectitud"
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
							   style="pointer-events: none; opacity: 0.5;">Prueba activada</a>
						<?php endif; ?>

						<?php if ($candidato_data->fp16): ?>
							<a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/fp16'); ?>"
							   class="btn btn-danger sweetalert-desactivar" data-title="¿Desactivar la Prueba">Desactivar
								Prueba</a>
						<?php else: ?>
							<a href="#" class="btn btn-danger disabled"
							   style="pointer-events: none; opacity: 0.5;">Prueba desactivada</a>
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
								<td class="description">ADULTO. Persona madura. Toma las decisiones naturalmente
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
								<td class="title">TACITURNO. Introspectivo, melancólico, lánguido y sin consuelo
								</td>
								<td class="chart"><canvas id="graficaTaciturno"></canvas></td>
								<td class="description">ENTUSIASTA. Alegre, franco y enérgico. Tiene empuje e
									iniciativa</td>
							</tr>
							<tr>
								<td class="title">VARIABLE. Tendencia a ser inconstante, sin decisiones fijas
								</td>
								<td class="chart"><canvas id="graficaVariable"></canvas></td>
								<td class="description">CONSTANTE. Responsable, decidido, bien organizado</td>
							</tr>
							<tr>
								<td class="title">TIMIDO. Cauteloso, capacidad de contacto social baja
								</td>
								<td class="chart"><canvas id="graficaTimido"></canvas></td>
								<td class="description">AVENTURADO. Sociable, dinámico, arriesgado, comprometido
								</td>
							</tr>
							<tr>
								<td class="title">EMOCIONAL. Imaginativo, soñador, con ilusiones e impetuoso
								</td>
								<td class="chart"><canvas id="graficaEmocional"></canvas></td>
								<td class="description">RACIONAL. Práctico, lógico con fundamentos teóricos y
									experiencia</td>
							</tr>
							<tr>
								<td class="title">SOSPECHOSO. Interesado en sí mismo. No siempre es bueno para
									trabajar en grupo
								</td>
								<td class="chart"><canvas id="graficaSospechoso"></canvas></td>
								<td class="description">CONFIABLE. Tendencia a estar libre de celos, es bueno
									para trabajar en grupo.</td>
							</tr>
							<tr>
								<td class="title">EXCÉNTRICO. Curioso, humorístico, raro, paradójico
								</td>
								<td class="chart"><canvas id="graficaExcentrico"></canvas></td>
								<td class="description">CONVENCIONAL. Aceptado, normal, obligado, acomedido</td>
							</tr>
							<tr>
								<td class="title">SIMPLE. Sencillo, se satisface fácilmente y sin complicaciones
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
								<td class="title">DEPENDIENTE. No le gusta tomar decisiones sin contar con la
									aprobación de los demás
								</td>
								<td class="chart"><canvas id="graficaDependiente"></canvas></td>
								<td class="description">AUTOSUFICIENTE. Actúa por sí mismo, independiente y toma
									sus propias decisiones sean o no correctas</td>
							</tr>
							<tr>
								<td class="title">DESCONTROLADO. Poco cuidadoso, desordenado y excesivo en
									emociones
								</td>
								<td class="chart"><canvas id="graficaDescontrolado"></canvas></td>
								<td class="description">CONTROLADO. Domina sus emociones, cuidadoso y tranquilo
								</td>
							</tr>
							<tr>
								<td class="title">TENSO. Excitable, impaciente, rígido, se desespera y desespera
									a los demás
								</td>
								<td class="chart"><canvas id="graficaTenso"></canvas></td>
								<td class="description">ESTABLE. Seguro y libre de tensiones emocionales. Firme
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
							   class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar Prueba</a>
						<?php else: ?>
							<a href="#" class="btn btn-success disabled"
							   style="pointer-events: none; opacity: 0.5;">Prueba activada</a>
						<?php endif; ?>

						<?php if ($candidato_data->cleaver): ?>
							<a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/cleaver'); ?>"
							   class="btn btn-danger sweetalert-desactivar" data-title="¿Desactivar la Prueba">Desactivar Prueba</a>
						<?php else: ?>
							<a href="#" class="btn btn-danger disabled"
							   style="pointer-events: none; opacity: 0.5;">Prueba desactivada</a>
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
						<div style="display: flex; flex-direction: column; align-items: center; width: 150px; height: 150px;">
							<canvas id="dominanceChart"></canvas>
						</div>
						<p style="font-weight: bold; margin-top: 10px;">Valor: <span id="dominanceValue"></span>%</p>
					</div>

					<div style="text-align: center;">
						<h3>I - Influencia</h3>
						<div style="display: flex; flex-direction: column; align-items: center; width: 150px; height: 150px;">
							<canvas id="influenceChart"></canvas>
						</div>
						<p style="font-weight: bold; margin-top: 10px;">Valor: <span id="influenceValue"></span>%</p>
					</div>

					<div style="text-align: center;">
						<h3>S - Estabilidad</h3>
						<div style="display: flex; flex-direction: column; align-items: center; width: 150px; height: 150px;">
							<canvas id="stabilityChart"></canvas>
						</div>
						<p style="font-weight: bold; margin-top: 10px;">Valor: <span id="stabilityValue"></span>%</p>
					</div>

					<div style="text-align: center;">
						<h3>C - Conciencia</h3>
						<div style="display: flex; flex-direction: column; align-items: center; width: 150px; height: 150px;">
							<canvas id="conscientiousnessChart"></canvas>
						</div>
						<p style="font-weight: bold; margin-top: 10px;">Valor: <span id="conscientiousnessValue"></span>%</p>
					</div>
				</div>

				<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
					<!-- Imagen al lado izquierdo -->
					<div style="width: 35%; text-align: center;">
						<img src="https://static.vecteezy.com/system/resources/previews/023/254/079/non_2x/smiling-male-teacher-character-pointing-free-png.png"
							 alt="Smiling Male Teacher" style="width: 100%; max-width: 300px; border-radius: 8px;">
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

<!-- APARTADO PARA OCULTAR LOS DIVS -->
<script>
	document.addEventListener("DOMContentLoaded", () => {
		// Funciones para ocultar y mostrar divs
		const toggleDivs = {
			ocultar: (clases) => {
				clases.forEach(clase => {
					document.querySelectorAll(`.${clase}`).forEach(div => {
						div.style.display = 'none';
					});
				});
			},
			mostrar: (clase) => {
				document.querySelectorAll(`.${clase}`).forEach(div => {
					div.style.display = 'block';
				});
			}
		};

		// Manejo de la paginación para mostrar y ocultar divs
		const linksPaginacion = document.querySelectorAll('.pagination .page-link');
		const divClasses = ['div-ocultar', 'div-ocultar-2', 'div-ocultar-3', 'div-ocultar-4', 'div-ocultar-5'];

		linksPaginacion.forEach((link, index) => {
			link.addEventListener('click', (e) => {
				e.preventDefault();
				toggleDivs.ocultar(divClasses);
				toggleDivs.mostrar(divClasses[index]);
			});
		});

		// Mostrar el primer div por defecto al cargar la página
		toggleDivs.ocultar(divClasses); // Primero ocultar todos
		toggleDivs.mostrar(divClasses[0]); // Luego mostrar el primero

		// Función general para manejar SweetAlert2
		const handleSweetAlert = (selector, options) => {
			const links = document.querySelectorAll(selector);
			links.forEach(link => {
				link.addEventListener('click', (event) => {
					event.preventDefault();
					const targetUrl = link.getAttribute('href');
					const title = link.getAttribute('data-title');

					Swal.fire({
						title: title,
						text: options.text,
						icon: options.icon,
						showCancelButton: true,
						confirmButtonColor: options.confirmButtonColor,
						cancelButtonColor: options.cancelButtonColor,
						confirmButtonText: options.confirmButtonText,
						cancelButtonText: options.cancelButtonText
					}).then((result) => {
						if (result.isConfirmed) {
							Swal.fire({
								title: options.successTitle,
								text: options.successText,
								icon: 'success',
								confirmButtonColor: '#3085d6'
							}).then(() => {
								window.location.href = targetUrl;
							});
						}
					});
				});
			});
		};

		// Configuración para diferentes tipos de SweetAlert2
		const sweetAlertConfigs = [{
			selector: '.sweetalert-guardar',
			options: {
				text: '¿Estás seguro?',
				icon: 'warning',
				confirmButtonColor: '#28a745',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Sí, Guardar',
				cancelButtonText: 'Cancelar',
				successTitle: 'Observaciones',
				successText: 'Observaciones guardadas con éxito.'
			}
		},
			{
				selector: '.sweetalert-activar',
				options: {
					text: '¿Estás seguro?',
					icon: 'warning',
					confirmButtonColor: '#28a745',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Sí, activar.',
					cancelButtonText: 'Cancelar',
					successTitle: 'Prueba activada.',
					successText: 'La prueba fue activada con éxito.'
				}
			},
			{
				selector: '.sweetalert-desactivar',
				options: {
					text: '¿Estás seguro?',
					icon: 'warning',
					confirmButtonColor: '#d33',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Sí, Desactivar',
					cancelButtonText: 'Cancelar',
					successTitle: 'Prueba desactivada.',
					successText: 'La prueba fue desactivada con éxito.'
				}
			},
			{
				selector: '.sweetalert-reiniciar',
				options: {
					text: '¿Estás seguro?',
					icon: 'warning',
					confirmButtonColor: '#d33',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Sí, Reiniciar datos',
					cancelButtonText: 'Cancelar',
					successTitle: 'Acción realizada con éxito.',
					successText: 'Los datos de la prueba fueron reiniciados con éxito.'
				}
			}
		];

		// Aplicar las configuraciones de SweetAlert2
		sweetAlertConfigs.forEach(config => handleSweetAlert(config.selector, config.options));

		// Optimizar la ocultación de múltiples divs al final del documento
		document.querySelectorAll('.div-ocultar-2, .div-ocultar-3, .div-ocultar-4, .div-ocultar-5').forEach(
			div => {
				div.style.display = 'none';
			});
	});
</script>

<!-- Librerías necesarias -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Separar la lógica de cada gráfica en su propio script -->
<script>
	document.addEventListener("DOMContentLoaded", () => {
		// Datos provenientes del servidor para Cleaver
		const cleaver = <?php echo json_encode($dataCleaver); ?>;
		const cleaver2 = <?php echo json_encode($interpretacionCleaver); ?>;

		console.log('Datos Cleaver:', cleaver2);

		const createLineChart = (ctx, label, data, color) => {
			// Convertir los datos de cadena a número
			const numericData = data.map(value => parseInt(value, 10));

			new Chart(ctx, {
				type: 'line',
				data: {
					labels: ['D', 'I', 'S', 'C'], // Ajusta las etiquetas si es necesario
					datasets: [{
						label: label,
						data: numericData,
						backgroundColor: color,
						borderColor: color,
						fill: false,
						tension: 0.1
					}]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false, // Permite que el gráfico se adapte al alto del contenedor
					scales: {
						y: {
							beginAtZero: true,
							max: 100,
							ticks: {
								stepSize: 5 // Escala de 5 en 5
							}
						}
					},
					plugins: {
						legend: {
							display: true
						}
					}
				}
			});
		};

		// Crear gráficos de línea para Cleaver
		createLineChart(
			document.getElementById('normalChart').getContext('2d'),
			'NORMAL',
			[cleaver.T1, cleaver.T2, cleaver.T3, cleaver.T4],
			'blue'
		);
		createLineChart(
			document.getElementById('motivacionChart').getContext('2d'),
			'MOTIVACIÓN',
			[cleaver.M1, cleaver.M2, cleaver.M3, cleaver.M4],
			'green'
		);
		createLineChart(
			document.getElementById('presionChart').getContext('2d'),
			'PRESIÓN',
			[cleaver.L1, cleaver.L2, cleaver.L3, cleaver.L4],
			'red'
		);
	});

</script>

<!--Esto es para la interpretacion del DISC del cleaver -->

<script>
	document.addEventListener("DOMContentLoaded", () => {
		// Obtenemos los datos dinámicamente de `cleaver2`
		const cleaver2 = <?php echo json_encode($interpretacionCleaver); ?>;

		const createDoughnutChart = (ctx, label, value, color, valueElementId) => {
			new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: [label, ''],
					datasets: [{
						data: [value, 100 - value],
						backgroundColor: [color, '#e0e0e0'],
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					cutout: '70%',
					plugins: {
						tooltip: {
							enabled: false
						},
						legend: {
							display: false
						}
					}
				}
			});

			// Mostrar el valor en el elemento HTML debajo de la gráfica
			document.getElementById(valueElementId).textContent = value;
		};

		// Crear gráficos de dona para cada valor en `cleaver2`
		createDoughnutChart(
			document.getElementById('dominanceChart').getContext('2d'),
			'Dominio',
			cleaver2.D,
			'rgb(75, 192, 192)',
			'dominanceValue'
		);

		createDoughnutChart(
			document.getElementById('influenceChart').getContext('2d'),
			'Influencia',
			cleaver2.I,
			'rgb(255, 159, 64)',
			'influenceValue'
		);

		createDoughnutChart(
			document.getElementById('stabilityChart').getContext('2d'),
			'Estabilidad',
			cleaver2.S,
			'rgb(54, 162, 235)',
			'stabilityValue'
		);

		createDoughnutChart(
			document.getElementById('conscientiousnessChart').getContext('2d'),
			'Conciencia',
			cleaver2.C,
			'rgb(153, 102, 255)',
			'conscientiousnessValue'
		);
	});
</script>

<!-- Script para la gráfica 16PF -->

<script>
	document.addEventListener("DOMContentLoaded", () => {
		const data16 = <?php echo json_encode($data16pf); ?>;
		console.log('Datos 16PF:', data16);

		const createBarChart = (ctx, data) => {
			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [''],
					datasets: [{
						label: '',
						data: [data],
						backgroundColor: 'rgba(54, 162, 235, 0.6)',
						borderColor: 'rgba(54, 162, 235, 1)',
						borderWidth: 1
					}]
				},
				options: {
					indexAxis: 'y',
					maintainAspectRatio: false,
					responsive: true,
					plugins: {
						legend: {
							display: false
						}
					},
					scales: {
						y: {
							display: false
						},
						x: {
							beginAtZero: true,
							max: 5 // Ajusta el máximo según tus datos
						}
					}
				}
			});
		};

		const barChartIds = [
			'graficaReservado', 'graficaLento', 'graficaInfantil', 'graficaSumiso',
			'graficaTaciturno', 'graficaVariable', 'graficaTimido', 'graficaEmocional',
			'graficaSospechoso', 'graficaExcentrico', 'graficaSimple', 'graficaInseguro',
			'graficaRutinario', 'graficaDependiente', 'graficaDescontrolado', 'graficaTenso'
		];

		barChartIds.forEach((id, index) => {
			const ctxElement = document.getElementById(id);
			if (ctxElement) {
				const ctx = ctxElement.getContext('2d');
				const dataKey = `p${index + 1}`;
				const value = parseInt(data16[dataKey], 10); // Convertir a número

				console.log(`Valor para ${dataKey}:`, value);

				if (isNaN(value)) {
					console.error(`El valor para ${dataKey} no es un número válido.`);
					createBarChart(ctx, 0); // O maneja este caso según tus necesidades
				} else {
					createBarChart(ctx, value);
				}
			} else {
				console.error(`No se encontró el elemento canvas con ID '${id}'`);
			}
		});
	});
</script>

<!-- Script para la gráfica Valanti -->
<script>
	document.addEventListener("DOMContentLoaded", () => {
		// Datos provenientes del servidor para Valanti
		const dataValanti = <?php echo json_encode($dataValanti); ?>;
		const candidato = <?php echo json_encode($candidato_data); ?>;

		// Gráfico Radar para Valanti
		const radarCtx = document.getElementById("radiaGlChart").getContext("2d");
		new Chart(radarCtx, {
			type: "radar",
			data: {
				labels: ["Verdad", "Rectitud", "Paz", "Amor", "No Violencia"],
				datasets: [{
					label: candidato.Nombres,
					data: [
						dataValanti.Verdad,
						dataValanti.Rectitud,
						dataValanti.Paz,
						dataValanti.Amor,
						dataValanti.No_violencia
					],
					borderColor: 'rgba(54, 162, 235, 1)',
					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderWidth: 3
				},
					{
						label: 'Gestor de Talentos',
						data: [
							dataValanti.verdadEmpresa,
							dataValanti.rectitudEmpresa,
							dataValanti.pazEmpresa,
							dataValanti.amorEmpresa,
							dataValanti.noViolenciaEmpresa
						],
						borderColor: 'rgba(255, 99, 132, 1)',
						backgroundColor: 'rgba(255, 99, 132, 0.2)',
						borderWidth: 3
					}]
			},
			options: {
				responsive: true,
				plugins: {
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Resultados Valanti'
					}
				}
			}
		});
	});
</script>

<!-- Script para la gráfica de Temperamentos -->
<script>
	document.addEventListener("DOMContentLoaded", () => {
		// Datos provenientes del servidor para Temperamentos
		const dataTemperamentos = <?php echo json_encode($dataTemperamento); ?>;

		// Gráfico Doughnut para Temperamentos
		const doughnutCtx = document.getElementById('myChart').getContext('2d');
		new Chart(doughnutCtx, {
			type: 'doughnut',
			data: {
				labels: ['Melancólico', 'Flemático', 'Colérico', 'Sanguíneo'],
				datasets: [{
					label: 'Temperamentos',
					data: [
						dataTemperamentos.melancolico,
						dataTemperamentos.flematico,
						dataTemperamentos.colerico,
						dataTemperamentos.sanguineo
					],
					backgroundColor: [
						'rgb(23, 162, 184)',
						'rgb(40, 167, 69)',
						'rgb(220, 53, 69)',
						'rgb(255, 193, 7)'
					]
				}]
			},
			options: {
				responsive: true,
				plugins: {
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Distribución de Temperamentos'
					}
				}
			}
		});
	});
</script>

<!-- Script para la gráfica Myers-Briggs -->
<script>
	document.addEventListener("DOMContentLoaded", () => {
		// Datos provenientes del servidor para Myers-Briggs
		const dataBriggs = <?php echo json_encode($dataBriggs); ?>;
		console.log(dataBriggs);

		// Gráfico de barras para Myers-Briggs
		const briggsCtx = document.getElementById("myCharts").getContext("2d");
		new Chart(briggsCtx, {
			type: "bar",
			data: {
				labels: ["Extrovertido", "Introvertido", "Sensorial", "Intuitivo", "Racional",
					"Emocional", "Calificador", "Perceptivo"
				],
				datasets: [{
					label: "Resultados de la prueba Myers-Briggs",
					data: [
						dataBriggs.extrovertido,
						dataBriggs.introvertido,
						dataBriggs.sensorial,
						dataBriggs.intuitivo,
						dataBriggs.racional,
						dataBriggs.emocional,
						dataBriggs.calificador,
						dataBriggs.perceptivo
					],
					backgroundColor: ["#1d864a", "#fcc832", "#347fab", "#ff5733", "#8e44ad",
						"#3498db", "#f39c12", "#27ae60"
					]
				}]
			},
			options: {
				responsive: true,
				scales: {
					y: {
						beginAtZero: true
					}
				},
				plugins: {
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Resultados Myers-Briggs'
					}
				}
			}
		});
	});
</script>

<!-- Script para la función de captura y envío de imagen -->
<script>
	document.addEventListener("DOMContentLoaded", () => {
		// Función para capturar y enviar la imagen
		const captureAndSendImage = (event) => {
			event.preventDefault();

			const chartImage = document.getElementById('chartImage');
			chartImage.src = document.getElementById('myChart').toDataURL();

			chartImage.onload = () => {
				const xhr = new XMLHttpRequest();
				xhr.open('POST', '<?= site_url('PdfController/uploadImage'); ?>', true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.onreadystatechange = () => {
					if (xhr.readyState === 4 && xhr.status === 200) {
						document.getElementById('imagePathInput').value = xhr.responseText;
						window.location.href =
							`${document.getElementById('generateReportLink').href}?imagePath=${encodeURIComponent(xhr.responseText)}`;
					}
				};
				xhr.send(`image=${encodeURIComponent(chartImage.src)}`);
			};
		};

		// Agregar el evento al enlace para generar el reporte
		document.getElementById('generateReportLink').addEventListener('click', captureAndSendImage);
	});
</script>
</body>

</html>
