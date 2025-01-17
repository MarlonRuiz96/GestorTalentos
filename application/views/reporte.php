<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Solicitud de Empleo</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Arial', sans-serif;
			line-height: 1.6;
			color: #333;
			background-color: #f4f6f9;
			padding: 20px;
		}

		.header {
			width: 100%;
			padding: 10px 0;
			text-align: center;
		}

		.header img {
			max-width: 100%;
			height: auto;
		}

		.content {
			background-color: #ffffff;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			padding: 20px;
			margin-top: 20px;
			font-size: 12px; /* Reducir el tamaño de la letra */
		}

		.section {
			margin-bottom: 20px;
		}

		.section h2 {
			font-size: 18px; /* Tamaño de los títulos reducido */
			color: #002a5b;
			margin-bottom: 10px;
			border-bottom: 2px solid #002a5b;
			padding-bottom: 5px;
		}

		.info-table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 10px;
			table-layout: fixed; /* Fija el layout de la tabla */
		}

		.info-table th, .info-table td {
			padding: 8px 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
			vertical-align: top;
			width: 25%; /* Se divide el espacio en cuatro columnas iguales */
			word-wrap: break-word;
		}

		.info-table th {
			background-color: #002a5b;
			color: #ffffff;
			text-transform: uppercase;
			font-size: 12px;
		}

		.info-table td {
			font-size: 12px;
			color: #555;
		}

		.info-table tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		.section p {
			font-size: 12px;
			color: #555;
			margin-bottom: 10px;
		}

		.footer {
			text-align: center;
			font-size: 12px;
			color: #777;
			margin-top: 20px;
			border-top: 1px solid #ddd;
			padding-top: 10px;
		}

		.signature {
			margin-top: 30px;
			text-align: right;
		}

		.signature p {
			display: inline-block;
			border-top: 1px solid #000;
			padding-top: 5px;
			margin-right: 50px;
		}

		/* Responsividad */
		@media (max-width: 768px) {
			.info-table, .info-table thead, .info-table tbody, .info-table th, .info-table td, .info-table tr {
				display: block;
				width: 100%;
			}

			.info-table tr {
				margin-bottom: 15px;
			}

			.info-table th {
				background-color: transparent;
				color: #002a5b;
				border-bottom: 1px solid #ddd;
				width: 100%;
				font-weight: bold;
			}

			.info-table td {
				border-bottom: none;
				width: 100%;
				padding-left: 0;
				padding-right: 0;
			}

			.info-table tr:nth-child(even) {
				background-color: transparent;
			}

			.info-table td:before {
				content: attr(data-label);
				display: block;
				font-weight: bold;
				margin-bottom: 5px;
				color: #002a5b;
			}
		}
	</style>
</head>
<body>
<div class="header">
	<img src="<?php echo $encabezado; ?>" alt="Encabezado">
</div>

<div class="content">
	<!-- Información Personal -->
	<div class="section">
		<h2>Datos Personales</h2>
		<table class="info-table">
			<tr>
				<th>Nombre Completo</th>
				<td data-label="Nombre Completo">
					<?php
					echo $candidato_data->primer_nombre . ' ' .
						$candidato_data->segundo_nombres . ' ' .
						$candidato_data->primer_apellido . ' ' .
						$candidato_data->segundo_apellido;
					if (!empty($candidato_data->apellido_casada)) {
						echo ' de ' . $candidato_data->apellido_casada;
					}
					?>
				</td>
				<th>Documento de Identificación</th>
				<td data-label="Documento de Identificación"><?php echo $candidato_data->documento_identificacion . ' - ' . $candidato_data->numero_documento . ' (' . $candidato_data->lugar_extension . ')'; ?></td>
			</tr>
			<tr>
				<th>Fecha de Nacimiento</th>
				<td data-label="Fecha de Nacimiento"><?php echo $candidato_data->fecha_nacimiento; ?> (Edad: <?php echo $candidato_data->edad_actual; ?> años)</td>
				<th>Género</th>
				<td data-label="Género"><?php echo $candidato_data->genero; ?></td>
			</tr>

			<tr>
				<th>Estado Civil</th>
				<td data-label="Estado Civil"><?php echo $candidato_data->estado_civil; ?></td>
				<th>NIT</th>
				<td data-label="NIT"><?php echo !empty($candidato_data->nit) ? $candidato_data->nit : '-'; ?></td>
			</tr>
			<tr>
				<th>Licencia</th>
				<td data-label="Licencia">
					<?php
					if (!empty($candidato_data->tipo_licencia) && !empty($candidato_data->numero_licencia)) {
						echo $candidato_data->tipo_licencia . ' - ' . $candidato_data->numero_licencia;
					} else {
						echo 'No posee';
					}
					?>
				</td>
				<th>Profesión</th>
				<td data-label="Profesión"><?php echo !empty($candidato_data->profesion) ? $candidato_data->profesion : 'No posee'; ?></td>
			</tr>
			<tr>
				<th>Número de Colegiado</th>
				<td data-label="Número de Colegiado"><?php echo !empty($candidato_data->numero_colegiado) ? $candidato_data->numero_colegiado : 'No posee'; ?></td>
				<th>Correo Electrónico</th>
				<td data-label="Correo Electrónico"><?php echo $candidato_data->correo; ?></td>
			</tr>

			<tr>
				<th>Dirección Residencia</th>
				<td data-label="Dirección Residencia"><?php echo $candidato_data->direccion_residencia . ', Zona/KM: ' . $candidato_data->zona_kilometro . ', Colonia: ' . $candidato_data->colonia . ', ' . $candidato_data->municipio . ', ' . $candidato_data->departamento; ?></td>
				<th>Contacto de Emergencia</th>
				<td data-label="Contacto de Emergencia"><?php echo $candidato_data->emergencia_contacto . ' (' . $candidato_data->parentesco . ') - ' . $candidato_data->telefono_localizacion; ?></td>
			</tr>
			<tr>
				<th>Teléfono (Casa)</th>
				<td data-label="Teléfono (Casa)"><?php echo $candidato_data->telefono_casa; ?></td>
				<th>Teléfono (Móvil)</th>
				<td data-label="Teléfono (Móvil)"><?php echo $candidato_data->telefono_movil; ?></td>
			</tr>
		</table>
	</div>


	<!-- Seccion de información familiar-->
	<div class="section">
		<h2>Información familiar</h2>
		<table class="info-table">
			<tr>
				<th>Nombre del padre</th>
				<td data-label="Nombre del padre"><?php echo $family_data->nombre_padre; ?></td>
				<th>Ocupación del padre</th>
				<td data-label="Ocupación del padre"><?php echo $family_data->ocupacion_padre; ?></td>
			</tr>
			<tr>
				<th>Nombre de la madre</th>
				<td data-label="Nombre de la madre"><?php echo $family_data->nombre_madre; ?></td>
				<th>Ocupación de la madre</th>
				<td data-label="Ocupación de la madre"><?php echo $family_data->ocupacion_madre; ?></td>
			</tr>
			<tr>
				<th>Cónyuge</th>
				<td data-label="Cónyuge"><?php echo !empty($family_data->nombre_conyuge) ? $family_data->nombre_conyuge : 'No posee'; ?></td>
				<th>Ocupación</th>
				<td data-label="Ocupación"><?php echo !empty($family_data->ocupacion_conyuge) ? $family_data->ocupacion_conyuge : 'No posee'; ?></td>
			</tr>
		</table>
		<br><br><br>
		<h2>Información adicional familiar</h2>
		<table class="info-table">
			<tr>
				<th>Hijos</th>
				<td data-label="Hijos"><?php echo !empty($family_data->numero_hijos) ? $family_data->numero_hijos : 'No posee'; ?></td>
				<th>Edades</th>
				<td data-label="Edades"><?php echo !empty($family_data->edades_sexos_hijos) ? $family_data->edades_sexos_hijos : 'No posee'; ?></td>
			</tr>
			<tr>
				<th>Actividades recreativas</th>
				<td data-label="Actividades recreativas"><?php echo !empty($family_data->actividades_recreativas) ? $family_data->actividades_recreativas : 'No posee'; ?></td>
				<th>Relación Familiar</th>
				<td data-label="Relación Familiar"><?php echo !empty($family_data->relacion_familiar) ? $family_data->relacion_familiar : 'Sin responder'; ?></td>
			</tr>
		</table>
	</div>

	<!-- Experiencia Laboral -->
	<div class="section">
		<h2>Experiencia Laboral</h2>
		<?php if (!empty($workExperience)) : ?>
			<?php $counter = 1; ?>
			<?php foreach ($workExperience as $work) : ?>
				<h3>Experiencia <?php echo $counter++; ?></h3>
				<table class="info-table">
					<tr>
						<th>Nombre de la Empresa</th>
						<td data-label="Nombre de la Empresa"><?php echo $work->nombre_empresa; ?></td>
						<th>Dirección</th>
						<td data-label="Dirección"><?php echo $work->direccion_empresa; ?></td>
					</tr>
					<tr>
						<th>Teléfono</th>
						<td data-label="Teléfono"><?php echo $work->telefono_empresa; ?></td>
						<th>Email</th>
						<td data-label="Email"><?php echo $work->email_empresa; ?></td>
					</tr>
					<tr>
						<th>Actividad Comercial</th>
						<td data-label="Actividad Comercial"><?php echo $work->actividad_comercial; ?></td>
						<th>Puesto Inicial / Final</th>
						<td data-label="Puesto Inicial / Final"><?php echo $work->puesto_inicial . ' / ' . $work->puesto_final; ?></td>
					</tr>
					<tr>
						<th>Fecha Inicio / Retiro</th>
						<td data-label="Fecha Inicio / Retiro"><?php echo $work->fecha_inicio . ' / ' . $work->fecha_retiro; ?></td>
						<th>Salario Inicial / Final</th>
						<td data-label="Salario Inicial / Final"><?php echo 'Q.'.$work->salario_inicial . ' / ' .'Q.'. $work->salario_final; ?></td>
					</tr>
					<tr>
						<th>Motivo de Retiro</th>
						<td data-label="Motivo de Retiro"><?php echo $work->motivo_retiro; ?></td>
						<th>Jefe Inmediato</th>
						<td data-label="Jefe Inmediato"><?php echo $work->jefe_inmediato; ?></td>
					</tr>
					<tr>
						<th>Referencias</th>
						<td data-label="Referencias"><?php echo $work->referencias . ' - ' . $work->porque_referencias; ?></td>
						<th>Valores de la Empresa</th>
						<td data-label="Valores de la Empresa"><?php echo $work->valores_empresa; ?></td>
					</tr>
					<tr>
						<th>Atribuciones</th>
						<td data-label="Atribuciones"><?php echo nl2br($work->atribuciones); ?></td>
						<th>Disgustos de la Empresa</th>
						<td data-label="Disgustos de la Empresa"><?php echo $work->disgusto_empresa; ?></td>
					</tr>
				</table>
				<br>
			<?php endforeach; ?>
		<?php else : ?>
			<p>No se encontró información de experiencia laboral.</p>
		<?php endif; ?>
	</div>

	<?php
	// Definimos el orden y los títulos deseados para cada registro educativo
	$educationLevels = [
		'Educación Primaria',
		'Educación Básica',
		'Diversificado',
		'Universitario',
		'Postgrado'
	];
	?>

	<?php if (!empty($educationHistory)) : ?>
		<div class="section">
			<h2>Historial Educativo</h2>
			<?php $counter = 1; ?>
			<?php foreach ($educationHistory as $edu) : ?>
				<?php
				// Selecciona el título según el contador
				// Si hubieran más registros que títulos, podrías manejarlo con una condición
				$title = isset($educationLevels[$counter - 1]) ? $educationLevels[$counter - 1] : "Educación #$counter";
				?>
				<h3><?php echo $title; ?></h3>
				<table class="info-table">
					<tr>
						<th>Nivel</th>
						<td data-label="Nivel"><?php echo !empty($edu->nivel) ? $edu->nivel : 'Sin información'; ?></td>
						<th>Período</th>
						<td data-label="Período"><?php echo !empty($edu->periodo) ? $edu->periodo : 'Sin información'; ?></td>
					</tr>
					<tr>
						<th>Establecimiento</th>
						<td data-label="Establecimiento"><?php echo !empty($edu->establecimiento) ? $edu->establecimiento : 'Sin información'; ?></td>
						<th>Situación</th>
						<td data-label="Situación"><?php echo !empty($edu->situacion) ? $edu->situacion : 'Sin información'; ?></td>
					</tr>
					<tr>
						<th>Título</th>
						<td data-label="Título"><?php echo !empty($edu->titulo) ? $edu->titulo : 'Sin información'; ?></td>
						<th></th>
						<td></td>
					</tr>
				</table>
				<br>
				<?php $counter++; ?>
			<?php endforeach; ?>
		</div>
	<?php else : ?>
		<p>No se encontró información de historial educativo.</p>
	<?php endif; ?>



	<?php if (!empty($currentStudies)) : ?>
		<div class="section">
			<h2>Estudios Actuales</h2>
			<?php $counter = 1; ?>
			<?php foreach ($currentStudies as $study) : ?>
				<h3>Estudio Actual <?php echo $counter++; ?></h3>
				<table class="info-table">
					<tr>
						<th>Estudia Actualmente</th>
						<td data-label="Estudia Actualmente"><?php echo $study->estudia_actualmente; ?></td>
						<th>Días de Estudio</th>
						<td data-label="Días de Estudio"><?php echo $study->dias_estudio; ?></td>
					</tr>
					<tr>
						<th>Horarios de Estudio</th>
						<td data-label="Horarios de Estudio"><?php echo $study->horarios_estudio; ?></td>
						<th>Carrera Actual</th>
						<td data-label="Carrera Actual"><?php echo $study->carrera_actual; ?></td>
					</tr>
				</table>
				<br>
			<?php endforeach; ?>
		</div>
	<?php else : ?>
		<p>No se encontró información de estudios actuales.</p>
	<?php endif; ?>

	<!-- Capacitaciones -->
	<div class="section">
		<h2>Capacitaciones</h2>
		<?php if (!empty($capacitaciones)) : ?>
			<table class="info-table">
				<tr>
					<th>Descripción</th>
					<td><?php echo nl2br($capacitaciones->descripcion); ?></td>
				</tr>
			</table>
		<?php else : ?>
			<p>No se encontró información de capacitaciones.</p>
		<?php endif; ?>
	</div>

	<!-- Skills -->
	<div class="section">
		<h2>Habilidades</h2>
		<?php if (!empty($skils)) : ?>
			<table class="info-table">
				<tr>
					<th>Programas de Computación</th>
					<td><?php echo nl2br($skils->programas_computacion); ?></td>
				</tr>
				<tr>
					<th>Equipos que Opera</th>
					<td><?php echo nl2br($skils->equipos_operar); ?></td>
				</tr>
			</table>
		<?php else : ?>
			<p>No se encontró información de habilidades.</p>
		<?php endif; ?>
	</div>

	<!-- Capacitaciones -->
	<div class="section">
		<h2>Capacitaciones</h2>
		<?php if (!empty($capacitaciones)) : ?>
			<table class="info-table">
				<tr>
					<th>Descripción</th>
					<td><?php echo nl2br($capacitaciones->descripcion); ?></td>
				</tr>
			</table>
		<?php else : ?>
			<p>No se encontró información de capacitaciones.</p>
		<?php endif; ?>
	</div>

	<!-- Skills -->
	<div class="section">
		<h2>Habilidades</h2>
		<?php if (!empty($skils)) : ?>
			<table class="info-table">
				<tr>
					<th>Programas de Computación</th>
					<td><?php echo nl2br($skils->programas_computacion); ?></td>
				</tr>
				<tr>
					<th>Equipos que Opera</th>
					<td><?php echo nl2br($skils->equipos_operar); ?></td>
				</tr>
			</table>
		<?php else : ?>
			<p>No se encontró información de habilidades.</p>
		<?php endif; ?>
	</div>

	<!-- Aportes Económicos -->
	<div class="section">
		<h2>Aportes Económicos</h2>
		<?php if (!empty($economic_contributions)) : ?>
			<table class="info-table">
				<tr>
					<th>Aporte Alimentación</th>
					<td>Q. <?php echo number_format($economic_contributions->aporte_alimentacion, 2); ?></td>
				</tr>
				<tr>
					<th>Aporte Servicios</th>
					<td>Q. <?php echo number_format($economic_contributions->aporte_servicios, 2); ?></td>
				</tr>
				<tr>
					<th>Aporte Educación</th>
					<td>Q. <?php echo number_format($economic_contributions->aporte_educacion, 2); ?></td>
				</tr>
				<tr>
					<th>Aporte Medicamentos</th>
					<td>Q. <?php echo number_format($economic_contributions->aporte_medicamentos, 2); ?></td>
				</tr>
				<tr>
					<th>Otros Aportes</th>
					<td><?php echo nl2br($economic_contributions->otros_aportes); ?></td>
				</tr>
			</table>
		<?php else : ?>
			<p>No se encontró información de aportes económicos.</p>
		<?php endif; ?>
	</div>
	<br><br><br><br>
	<!-- Referencias -->
	<div class="section">
		<h2>Referencias</h2>
		<?php if (!empty($references)) : ?>
			<?php foreach ($references as $reference) : ?>
				<table class="info-table">
					<tr>
						<th>Nombre de la Referencia</th>
						<td><?php echo $reference->nombre_referencia; ?></td>
					</tr>
					<tr>
						<th>Tipo de Referencia</th>
						<td><?php echo $reference->tipo_referencia; ?></td>
					</tr>
					<tr>
						<th>Lugar de Trabajo</th>
						<td><?php echo $reference->lugar_trabajo; ?></td>
					</tr>
					<tr>
						<th>Tiempo de Conocer</th>
						<td><?php echo $reference->tiempo_conocer; ?></td>
					</tr>
					<tr>
						<th>Teléfono</th>
						<td><?php echo $reference->telefono; ?></td>
					</tr>
				</table>
				<br>
			<?php endforeach; ?>
		<?php else : ?>
			<p>No se encontró información de referencias.</p>
		<?php endif; ?>
	</div>

	<!-- Datos Socioeconómicos -->
	<div class="section">
		<h2>Datos Socioeconómicos</h2>
		<?php if (!empty($socialEconomicData)) : ?>
			<table class="info-table">
				<tr>
					<th>Tipo de Vivienda</th>
					<td><?php echo !empty($socialEconomicData->tipo_vivienda) ? $socialEconomicData->tipo_vivienda : 'No respondió'; ?></td>
					<th>Renta Mensual</th>
					<td>Q. <?php echo !empty($socialEconomicData->renta_mensual) ? number_format($socialEconomicData->renta_mensual, 2) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Tipo de Vehículo</th>
					<td><?php echo !empty($socialEconomicData->tipo_vehiculo) ? $socialEconomicData->tipo_vehiculo : 'No respondió'; ?></td>
					<th>Tipo de Deudas</th>
					<td><?php echo !empty($socialEconomicData->tipo_deudas) ? nl2br($socialEconomicData->tipo_deudas) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Deuda Total</th>
					<td>Q. <?php echo !empty($socialEconomicData->deuda_total) ? number_format($socialEconomicData->deuda_total, 2) : 'No respondió'; ?></td>
					<th>Ingresos Extraordinarios</th>
					<td><?php echo !empty($socialEconomicData->ingresos_extraordinarios) ? nl2br($socialEconomicData->ingresos_extraordinarios) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Monto de Otros Ingresos</th>
					<td>Q. <?php echo !empty($socialEconomicData->monto_otros_ingresos) ? number_format($socialEconomicData->monto_otros_ingresos, 2) : 'No respondió'; ?></td>
					<th>Religión</th>
					<td><?php echo !empty($socialEconomicData->religion) ? $socialEconomicData->religion : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Asociaciones</th>
					<td><?php echo !empty($socialEconomicData->asociaciones) ? nl2br($socialEconomicData->asociaciones) : 'No respondió'; ?></td>
					<th>Deportes</th>
					<td><?php echo !empty($socialEconomicData->deportes) ? nl2br($socialEconomicData->deportes) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Tiempo Libre</th>
					<td><?php echo !empty($socialEconomicData->tiempo_libre) ? nl2br($socialEconomicData->tiempo_libre) : 'No respondió'; ?></td>
					<th>Cualidades</th>
					<td><?php echo !empty($socialEconomicData->cualidades) ? nl2br($socialEconomicData->cualidades) : 'No respondió'; ?></td>
				</tr>
			</table>
		<?php else : ?>
			<p>No se encontró información de datos socioeconómicos.</p>
		<?php endif; ?>
	</div>
	<br><br><br><br><br>
	<!-- Idiomas -->
	<div class="section">
		<h2>Idiomas</h2>
		<?php if (!empty($languages)) : ?>
			<?php foreach ($languages as $language) : ?>
				<table class="info-table">
					<tr>
						<th>Idioma</th>
						<td><?php echo !empty($language->idioma) ? $language->idioma : 'No respondió'; ?></td>
						<th>Establecimiento</th>
						<td><?php echo !empty($language->establecimiento) ? $language->establecimiento : 'No respondió'; ?></td>
					</tr>
					<tr>
						<th>Escritura</th>
						<td><?php echo isset($language->escritura) ? $language->escritura . '%' : 'No respondió'; ?></td>
						<th>Lectura</th>
						<td><?php echo isset($language->lectura) ? $language->lectura . '%' : 'No respondió'; ?></td>
					</tr>
					<tr>
						<th>Conversación</th>
						<td><?php echo isset($language->conversacion) ? $language->conversacion . '%' : 'No respondió'; ?></td>
					</tr>
				</table>
				<br>
			<?php endforeach; ?>
		<?php else : ?>
			<p>No se encontró información de idiomas.</p>
		<?php endif; ?>
	</div>

	<!-- Datos de Salud -->
	<div class="section">
		<h2>Datos de Salud</h2>
		<?php if (!empty($heath_data)) : ?>
			<table class="info-table">
				<tr>
					<th>Tipo de Sangre</th>
					<td><?php echo !empty($heath_data->tipo_sangre) ? $heath_data->tipo_sangre : 'No respondió'; ?></td>
					<th>Estatura</th>
					<td><?php echo !empty($heath_data->estatura) ? $heath_data->estatura : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Peso</th>
					<td><?php echo !empty($heath_data->peso) ? $heath_data->peso : 'No respondió'; ?></td>
					<th>Condición de Salud</th>
					<td><?php echo !empty($heath_data->condicion_salud) ? nl2br($heath_data->condicion_salud) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Enfermedades</th>
					<td><?php echo !empty($heath_data->enfermedades) ? nl2br($heath_data->enfermedades) : 'No respondió'; ?></td>
					<th>Alergias</th>
					<td><?php echo !empty($heath_data->alergias) ? nl2br($heath_data->alergias) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Accidentes</th>
					<td><?php echo !empty($heath_data->accidentes) ? nl2br($heath_data->accidentes) : 'No respondió'; ?></td>
					<th>Operaciones</th>
					<td><?php echo !empty($heath_data->operaciones) ? nl2br($heath_data->operaciones) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Usa Anteojos</th>
					<td><?php echo !empty($heath_data->usa_anteojos) ? $heath_data->usa_anteojos : 'No respondió'; ?></td>
					<th>Toma Medicamentos</th>
					<td><?php echo !empty($heath_data->toma_medicamentos) ? $heath_data->toma_medicamentos : 'No respondió'; ?></td>
				</tr>
			</table>
		<?php else : ?>
			<p>No se encontró información de datos de salud.</p>
		<?php endif; ?>
	</div>

	<!-- Preferencias de Empleo -->
	<div class="section">
		<h2>Preferencias de Empleo</h2>
		<?php if (!empty($employment_preferences)) : ?>
			<table class="info-table">
				<tr>
					<th>Puesto Deseado</th>
					<td><?php echo !empty($employment_preferences->puesto_deseado) ? $employment_preferences->puesto_deseado : 'No respondió'; ?></td>
					<th>Otros Puestos de Interés</th>
					<td><?php echo !empty($employment_preferences->otros_puestos_interes) ? nl2br($employment_preferences->otros_puestos_interes) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Tipo de Empresa</th>
					<td><?php echo !empty($employment_preferences->tipo_empresa) ? nl2br($employment_preferences->tipo_empresa) : 'No respondió'; ?></td>
					<th>Áreas Deseadas</th>
					<td><?php echo !empty($employment_preferences->areas_deseadas) ? nl2br($employment_preferences->areas_deseadas) : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Pretensión Salarial</th>
					<td>Q. <?php echo !empty($employment_preferences->pretension_salarial) ? number_format($employment_preferences->pretension_salarial, 2) : 'No respondió'; ?></td>
					<th>Sueldo Negociable</th>
					<td><?php echo !empty($employment_preferences->sueldo_negociable) ? $employment_preferences->sueldo_negociable : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Horarios Deseados</th>
					<td><?php echo !empty($employment_preferences->horarios_deseados) ? $employment_preferences->horarios_deseados : 'No respondió'; ?></td>
					<th>Disponibilidad para Trabajar</th>
					<td><?php echo !empty($employment_preferences->disponibilidad_trabajo) ? $employment_preferences->disponibilidad_trabajo : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Disponibilidad para Viajar</th>
					<td><?php echo !empty($employment_preferences->disponibilidad_viajar) ? $employment_preferences->disponibilidad_viajar : 'No respondió'; ?></td>
					<th>Disposición para Trabajo en Interior</th>
					<td><?php echo !empty($employment_preferences->disposicion_interior) ? $employment_preferences->disposicion_interior : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Motivo de la Posición</th>
					<td><?php echo !empty($employment_preferences->motivo_posicion) ? nl2br($employment_preferences->motivo_posicion) : 'No respondió'; ?></td>
					<th>Tiene Experiencia</th>
					<td><?php echo !empty($employment_preferences->tiene_experiencia) ? $employment_preferences->tiene_experiencia : 'No respondió'; ?></td>
				</tr>
				<tr>
					<th>Tiempo de Experiencia</th>
					<td><?php echo !empty($employment_preferences->tiempo_experiencia) ? $employment_preferences->tiempo_experiencia : 'No respondió'; ?></td>
				</tr>
			</table>
		<?php else : ?>
			<p>No se encontró información de preferencias de empleo.</p>
		<?php endif; ?>
	</div>

	<!-- Firma -->
	<div class="signature">
		<p>Firma del Candidato</p>
	</div>
</div>


<div class="footer">
	<p>Este informe ha sido generado de forma automática por el sistema de información de la empresa.</p>
</div>
</body>
</html>
