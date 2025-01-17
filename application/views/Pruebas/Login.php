
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Solicitud de Empleo</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/pruebaslogin.css'); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
<header class="header py-3 bg-light">
	<img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-fluid mx-auto d-block mb-4" alt="Logo">

</header>

<div class="text-center mt-3">
<h1>Solicitud de empleo</h1></div>


<div class="container my-5">
	<!-- Formulario Unificado -->
	<form id="mainForm" action="<?php echo site_url('DpiController/guardarCambios'); ?>" method="POST">

		<!-- Sección I: Datos Generales -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-primary text-white">
					<i class="fas fa-user"></i> I. Datos Generales
				</div>
				<div class="card-body">
					<!-- Datos Personales -->
					<div class="mb-4">
						<h5 class="card-title">Datos Personales</h5>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="primer_nombre" class="form-label">Primer Nombre</label>
								<input type="text" class="form-control" name="primer_nombre" id="primer_nombre" maxlength="35" required>
							</div>
							<div class="col-md-6">
								<label for="segundo_nombres" class="form-label">Segundo y demás nombres</label>
								<input type="text" class="form-control" name="segundo_nombres" id="segundo_nombres" maxlength="35">
							</div>

						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="primer_apellido" class="form-label">Primer Apellido</label>
								<input type="text" class="form-control" name="primer_apellido" id="primer_apellido" maxlength="35" required>
							</div>
							<div class="col-md-6">
								<label for="segundo_apellido" class="form-label">Segundo Apellido</label>
								<input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" maxlength="35">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="apellido_casada" class="form-label">Apellido de casada (aplica mujeres)</label>
								<input type="text" class="form-control" name="apellido_casada" id="apellido_casada" maxlength="35">
							</div>
							<div class="col-md-6">
								<label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
								<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="edad_actual" class="form-label">Edad actual</label>
								<input type="number" class="form-control" name="edad_actual" id="edad_actual" min="0" required>
							</div>
							<div class="col-md-6">
								<label for="genero" class="form-label">Género</label>
								<select class="form-select" name="genero" id="genero" required>
									<option value="" disabled selected>Seleccione...</option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="estado_civil" class="form-label">Estado Civil</label>
								<select class="form-select" name="estado_civil" id="estado_civil" required>
									<option value="" disabled selected>Seleccione...</option>
									<option value="Soltero/a">Soltero/a</option>
									<option value="Casado/a">Casado/a</option>
									<option value="Divorciado/a">Divorciado/a</option>
									<option value="Viudo/a">Viudo/a</option>
								</select>
							</div>
						</div>
					</div>

					<!-- Información de Identificación -->
					<div class="mb-4">
						<h5 class="card-title">Información de Identificación</h5>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="documento_identificacion" class="form-label">Documento de Identificación</label>
								<select class="form-select" name="documento_identificacion" id="documento_identificacion" required>
									<option value="" disabled selected>Seleccione...</option>
									<option value="DPI">DPI</option>
									<option value="Pasaporte">Pasaporte</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="numero_documento" class="form-label">Número de Documento</label>
								<input type="text" class="form-control" name="numero_documento" id="numero_documento" maxlength="35" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="lugar_extension" class="form-label">Lugar de Extensión</label>
								<input type="text" class="form-control" name="lugar_extension" id="lugar_extension" maxlength="35" required>
							</div>
							<div class="col-md-6">
								<label for="tipo_licencia" class="form-label">Tipo de Licencia para conducir (si posee)</label>
								<select class="form-select" name="tipo_licencia" id="tipo_licencia" required>
									<option value="" disabled selected>Seleccione...</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
									<option value="No Posee">No Posee</option>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="numero_licencia" class="form-label">Número de Licencia</label>
								<input type="text" class="form-control" name="numero_licencia" id="numero_licencia" maxlength="35">
							</div>
							<div class="col-md-6">
								<label for="nit" class="form-label">N.I.T</label>
								<input type="text" class="form-control" name="nit" id="nit" maxlength="35" required>
							</div>
						</div>
					</div>

					<!-- Información Profesional -->
					<div class="mb-4">
						<h5 class="card-title">Información Profesional</h5>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="profesion" class="form-label">Profesión u oficio</label>
								<input type="text" class="form-control" name="profesion" id="profesion" maxlength="35" placeholder="Maestro, Doctor, Ama de casa, etc." required>
							</div>
							<div class="col-md-6">
								<label for="numero_colegiado" class="form-label">No. Colegiado, matrícula o licencia</label>
								<input type="text" class="form-control" name="numero_colegiado" id="numero_colegiado" maxlength="35" placeholder="Lo puede dejar en blanco si no procede" >
							</div>
						</div>
					</div>

					<!-- Información de Contacto -->
					<div class="mb-4">
						<h5 class="card-title">Información de Contacto</h5>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="telefono_casa" class="form-label">Número de Teléfono (casa u oficina)</label>
								<input type="text" class="form-control" name="telefono_casa" id="telefono_casa" maxlength="35" required>
							</div>
							<div class="col-md-6">
								<label for="telefono_movil" class="form-label">Número de Celular (Móvil)</label>
								<input type="text" class="form-control" name="telefono_movil" id="telefono_movil" maxlength="35" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="correo" class="form-label">Correo electrónico</label>
								<input type="email" class="form-control" name="correo" id="correo" maxlength="35" placeholder="Ejemplo@gmail.com" required>
							</div>
							<div class="col-md-6">
								<label for="emergencia_contacto" class="form-label">En caso de emergencia avisar a:</label>
								<input type="text" class="form-control" name="emergencia_contacto" id="emergencia_contacto" maxlength="35" placeholder="Nombre" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="parentesco" class="form-label">Parentesco o relación</label>
								<input type="text" class="form-control" name="parentesco" id="parentesco" maxlength="35" placeholder="Madre, padre, hermano, tío, etc." required>
							</div>
							<div class="col-md-6">
								<label for="telefono_localizacion" class="form-label">Teléfono de localización</label>
								<input type="text" class="form-control" name="telefono_localizacion" id="telefono_localizacion" maxlength="35" placeholder="Numero de familiar" required>
							</div>
						</div>
					</div>

					<!-- Dirección -->
					<div class="mb-4">
						<h5 class="card-title">Dirección</h5>

						<!-- Dirección de Residencia -->
						<div class="row mb-3">
							<div class="col-12"> <!-- Columna completa para ocupar el 100% -->
								<label for="direccion_residencia" class="form-label">Dirección de Residencia</label>
								<input type="text" class="form-control" name="direccion_residencia" id="direccion_residencia" maxlength="100" placeholder="Ingrese su direccion actual" required>
							</div>
						</div>

						<!-- Municipio y Departamento -->
						<div class="row mb-3">
							<div class="col-md-6"> <!-- Ocupa el 50% del ancho -->
								<label for="municipio" class="form-label">Municipio</label>
								<input type="text" class="form-control" name="municipio" id="municipio" maxlength="35" required>
							</div>
							<div class="col-md-6"> <!-- Ocupa el 50% del ancho -->
								<label for="departamento" class="form-label">Departamento</label>
								<input type="text" class="form-control" name="departamento" id="departamento" maxlength="35" required>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<!-- Sección II: Datos Familiares -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<i class="fas fa-users"></i> II. Datos Familiares
				</div>
				<div class="card-body">
					<!-- Información de los Padres -->
					<div class="card mb-4">
						<div class="card-header bg-primary text-white">
							<i class="fas fa-user-friends"></i> Información de los Padres
						</div>
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="nombre_padre" class="form-label">Nombre del Padre</label>
									<input type="text" class="form-control" name="nombre_padre" id="nombre_padre" >
								</div>
								<div class="col-md-6">
									<label for="ocupacion_padre" class="form-label">Ocupación del Padre</label>
									<input type="text" class="form-control" name="ocupacion_padre" id="ocupacion_padre">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="nombre_madre" class="form-label">Nombre de la Madre</label>
									<input type="text" class="form-control" name="nombre_madre" id="nombre_madre" >
								</div>
								<div class="col-md-6">
									<label for="ocupacion_madre" class="form-label">Ocupación de la Madre</label>
									<input type="text" class="form-control" name="ocupacion_madre" id="ocupacion_madre" >
								</div>
							</div>
						</div>
					</div>

					<!-- Información del Cónyuge e Hijos -->
					<div class="card mb-4">
						<div class="card-header bg-secondary text-white">
							<i class="fas fa-heart"></i> Información del Cónyuge e Hijos
						</div>
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="nombre_conyuge" class="form-label">Nombre del (la) Cónyuge</label>
									<input type="text" class="form-control" name="nombre_conyuge" id="nombre_conyuge" >
								</div>
								<div class="col-md-6">
									<label for="ocupacion_conyuge" class="form-label">Ocupación del (la) Cónyuge</label>
									<input type="text" class="form-control" name="ocupacion_conyuge" id="ocupacion_conyuge" >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="numero_hijos" class="form-label">Número de Hijos</label>
									<input type="number" class="form-control" name="numero_hijos" id="numero_hijos" min="0" value="0" >
								</div>
								<div class="col-md-6">
									<label for="edades_sexos_hijos" class="form-label">Edades y sexos de los hijos</label>
									<input type="text" class="form-control" name="edades_sexos_hijos" id="edades_sexos_hijos" placeholder="Ej: 5 años, M; 3 años, F" >
								</div>
							</div>
						</div>
					</div>

					<!-- Información Adicional -->
					<div class="card mb-4">
						<div class="card-header bg-danger text-white">
							<i class="fas fa-home"></i> Información Adicional
						</div>
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="actividades_recreativas" class="form-label">Actividades Recreativas</label>
									<input type="text" class="form-control" name="actividades_recreativas" id="actividades_recreativas" placeholder="Ej: Deportes, Lectura">
								</div>

							</div>
						</div>
					</div>

					<!-- Aportes Económicos -->
					<div class="card mb-4">
						<div class="card-header bg-info text-white">
							<i class="fas fa-money-bill-wave"></i> Aportes Económicos
						</div>
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="aporte_alimentacion" class="form-label">Aporte Mensual en Alimentación</label>
									<input type="number" class="form-control" name="aporte_alimentacion" id="aporte_alimentacion" min="0" step="0.01" placeholder="Cuanto aporta usted a su familia">
								</div>
								<div class="col-md-6">
									<label for="aporte_servicios" class="form-label">Aporte Mensual en Servicios Básicos</label>
									<input type="number" class="form-control" name="aporte_servicios" id="aporte_servicios" min="0" step="0.01" placeholder="Ejemplo: 300 Luz, 200 Agua, 200 Internet">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="aporte_educacion" class="form-label">Aporte Mensual en Educación de Hijos</label>
									<input type="number" class="form-control" name="aporte_educacion" id="aporte_educacion" min="0" step="0.01" placeholder="Monto aproximado, puede dejar en blanco si no tiene.">
								</div>
								<div class="col-md-6">
									<label for="aporte_medicamentos" class="form-label">Aporte Mensual en Medicamentos</label>
									<input type="number" class="form-control" name="aporte_medicamentos" id="aporte_medicamentos" min="0" step="0.01" placeholder="Monto aproximado, puede dejar en blanco si no tiene.">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="otros_aportes" class="form-label">Otros Aportes</label>
									<input type="text" class="form-control" name="otros_aportes" id="otros_aportes" placeholder="Describa otros aportes económicos. Ejemplo: Guarderia, seguridad, etc.">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Sección III: Datos Académicos (Destrezas y Habilidades) -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					<i class="fas fa-book"></i> III. Datos Académicos (Destrezas y Habilidades)
				</div>
				<div class="card-body">
					<!-- Periodo de Nivel -->
					<h5>Historial Académico</h5>
					<?php
					// Formulario y Controlador
					$niveles = [
						'Primario' => ['titulo' => 'Diplomas o reconocimientos', 'suffix' => 'primario'],
						'Básico' => ['titulo' => 'Diplomas o reconocimientos', 'suffix' => 'básico'],
						'Diversificado' => ['titulo' => 'Título Obtenido', 'suffix' => 'diversificado'],
						'Uni' => ['titulo' => 'Título Obtenido o Carrera', 'suffix' => 'uni'],
						'Post Grado' => ['titulo' => 'Título Obtenido o Carrera', 'suffix' => 'postgrado']
					];

					foreach ($niveles as $nivel => $data) : ?>
					<div class="row mb-3">
						<div class="col-md-3">
							<label class="form-label">Periodo del Nivel <?php echo $nivel; ?></label>
							<input type="text" class="form-control" name="periodo_<?php echo $data['suffix']; ?>" placeholder="Ejem: 2012-2015">
						</div>
						<div class="col-md-3">
							<label class="form-label">Establecimiento</label>
							<input type="text" class="form-control" name="establecimiento_<?php echo $data['suffix']; ?>" placeholder="Nombre del establecimiento">
						</div>
						<div class="col-md-3">
							<label class="form-label">Situación</label>
							<select class="form-select" name="situacion_<?php echo $data['suffix']; ?>">
								<option value="" disabled selected>Seleccione...</option>
								<option value="Completo">Completo</option>
								<option value="Incompleto">Incompleto</option>
								<option value="En Curso">En Curso</option>
							</select>
						</div>
						<div class="col-md-3">
							<label class="form-label"><?php echo $data['titulo']; ?></label>
							<input type="text" class="form-control" name="titulo_<?php echo $data['suffix']; ?>">
						</div>
					</div>
					<?php endforeach; ?>


					<!-- Estudios Actuales -->
					<h5 class="mt-4">Estudios Actuales</h5>
					<div class="row mb-3">
						<div class="col-md-3">
							<label class="form-label">Estudia Actualmente</label>
							<input type="text" class="form-control" name="estudia_actualmente" placeholder="Si/No" required>
						</div>
						<div class="col-md-3">
							<label class="form-label">Días de Estudio</label>
							<input type="text" class="form-control" name="dias_estudio" placeholder="Que dias de la semana">
						</div>
						<div class="col-md-3">
							<label class="form-label">Horarios de Estudio</label>
							<input type="text" class="form-control" name="horarios_estudio" placeholder="En qué horarios estudia">
						</div>
						<div class="col-md-3">
							<label class="form-label">Carrera o Diplomado que Estudia</label>
							<input type="text" class="form-control" name="carrera_actual" placeholder="Qué esta estudiando actualmente">
						</div>
					</div>

					<!-- Cursos Extra Académicos -->
					<h5 class="mt-4">Capacitaciones y Otros Estudios</h5>
					<div class="mb-3">
						<label class="form-label">Mencione las capacitaciones, charlas, talleres, diplomados u otros estudios obtenidos extra académicamente</label>
						<textarea class="form-control" name="capacitaciones" rows="3"></textarea>
					</div>

					<!-- Programas y Herramientas -->
					<div class="row mb-3">
						<div class="col-md-6">
							<label class="form-label">Programas, paquetes y lenguajes de computación que domina</label>
							<textarea class="form-control" name="programas_computacion" rows="3"></textarea>
						</div>
						<div class="col-md-6">
							<label class="form-label">Equipos de oficina, herramientas o maquinaria que puede operar</label>
							<textarea class="form-control" name="equipos_operar" rows="3"></textarea>
						</div>
					</div>

					<!-- Idiomas -->
					<h5 class="mt-4">Idiomas</h5>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>Idiomas</th>
								<th> (%) en escritura</th>
								<th> (%) en lectura</th>
								<th> (%) en conversación</th>
								<th>Establecimiento donde aprendió</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td><input type="text" class="form-control" name="idioma_1"></td>
								<td><input type="number" class="form-control" name="escritura_1" min="0" max="100"></td>
								<td><input type="number" class="form-control" name="lectura_1" min="0" max="100"></td>
								<td><input type="number" class="form-control" name="conversacion_1" min="0" max="100"></td>
								<td><input type="text" class="form-control" name="establecimiento_1"></td>
							</tr>
							<tr>
								<td><input type="text" class="form-control" name="idioma_2"></td>
								<td><input type="number" class="form-control" name="escritura_2" min="0" max="100"></td>
								<td><input type="number" class="form-control" name="lectura_2" min="0" max="100"></td>
								<td><input type="number" class="form-control" name="conversacion_2" min="0" max="100"></td>
								<td><input type="text" class="form-control" name="establecimiento_2"></td>
							</tr>
							<!-- Puedes agregar más filas si es necesario -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>

		<!-- Sección IV: Experiencia Laboral -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					<i class="fas fa-briefcase"></i> IV. Experiencia Laboral
				</div>
				<div class="card-body">
					<p>Comience desde el último o el más reciente, puede ser su empleo actual hasta llegar al primero, no es neceario que llene las 4, puede dejar en blanco esta seccion si no cuenta con experiencia.</p>

					<?php for ($i = 1; $i <= 3; $i++): // Repite la estructura para tres experiencias laborales ?>
						<div class="experiencia-item mb-4">
							<h5 class="card-title">Experiencia Laboral <?php echo $i; ?></h5>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Nombre de la Empresa, Organización o Institución</label>
									<input type="text" class="form-control" name="nombre_empresa[]" >
								</div>
								<div class="col-md-6">
									<label class="form-label">Dirección (Ubicación de la empresa)</label>
									<input type="text" class="form-control" name="direccion_empresa[]" >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Números de Teléfono</label>
									<input type="text" class="form-control" name="telefono_empresa[]" >
								</div>
								<div class="col-md-6">
									<label class="form-label">Correo electrónico o página Web</label>
									<input type="text" class="form-control" name="email_empresa[]">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Actividad Comercial</label>
									<input type="text" class="form-control" name="actividad_comercial[]" placeholder="Aduanas, restaurante, transporte, etc" >
								</div>
								<div class="col-md-6">
									<label class="form-label">Puesto inicial desempeñado</label>
									<input type="text" class="form-control" name="puesto_inicial[]" PLACEHOLDER="Puesto con el que inició a laboral" >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Puesto final desempeñado</label>
									<input type="text" class="form-control" name="puesto_final[]" PLACEHOLDER="El ultimo puesto que tuvo en la empresa"  >
								</div>
								<div class="col-md-3">
									<label class="form-label">Fecha de Inicio</label>
									<input type="date" class="form-control" name="fecha_inicio[]" placeholder="En que fecha inicio: Ejemplo: 12/01/2022" >
								</div>
								<div class="col-md-3">
									<label class="form-label">Fecha de Retiro</label>
									<input type="date" class="form-control" name="fecha_retiro[]" placeholder="En que fecha se retiró: Ejemplo 30/11/2024" >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Salario Inicial</label>
									<input type="number" class="form-control" name="salario_inicial[]" placeholder="Con que salario inicio laborando" >
								</div>
								<div class="col-md-6">
									<label class="form-label">Salario Final</label>
									<input type="number" class="form-control" name="salario_final[]" placeholder="Cual fue su ultimo salario" >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-12">
									<label class="form-label">Motivo de Retiro</label>
									<input type="text" class="form-control" name="motivo_retiro[]" PLACEHOLDER="Por qué se retiró de la empresa." >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-12">
									<label class="form-label">Mencione las atribuciones realizadas</label>
									<textarea class="form-control" name="atribuciones[]" rows="3"></textarea>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">¿Se pueden pedir referencias?</label>
									<select class="form-select" name="referencias[]" >
										<option value="Sí">Sí</option>
										<option value="No">No</option>
									</select>
								</div>
								<div class="col-md-6">
									<label class="form-label">¿Por qué?</label>
									<input type="text" class="form-control" name="porque_referencias[]" >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Nombre de su Jefe Inmediato</label>
									<input type="text" class="form-control" name="jefe_inmediato[]" >
								</div>
								<div class="col-md-6">
									<label class="form-label">¿Qué valoró en esa empresa?</label>
									<input type="text" class="form-control" name="valores_empresa[]">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-12">
									<label class="form-label">¿Qué no le gustó de esa empresa?</label>
									<input type="text" class="form-control" name="disgusto_empresa[]">
								</div>
							</div>
							<hr>
						</div>
					<?php endfor; // Fin del bucle para tres experiencias laborales ?>
				</div>
			</div>
		</section>

		<!-- Sección V: Referencias Laborales y Personales -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					<i class="fas fa-address-book"></i> V. Referencias Laborales y Personales
				</div>
				<div class="card-body">
					<p>Incluir el nombre de personas o antiguos patrones que den referencia. No amigos cercanos ni familiares.</p>

					<?php for ($j = 1; $j <= 4; $j++): // Repite la estructura para cuatro referencias ?>
						<div class="referencia-item mb-4">
							<h5 class="card-title">Referencia <?php echo $j; ?></h5>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Nombre de la persona</label>
									<input type="text" class="form-control" name="nombre_referencia[]" >
								</div>
								<div class="col-md-6">
									<label class="form-label">Tipo de Referencia</label>
									<select class="form-select" name="tipo_referencia[]" >
										<option value="" disabled selected>Seleccione...</option>
										<option value="Personal">Personal</option>
										<option value="Laboral">Laboral</option>
										<option value="Académica">Académica</option>
									</select>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Lugar donde trabaja</label>
									<input type="text" class="form-control" name="lugar_trabajo_referencia[]" value=""  >
								</div>
								<div class="col-md-3">
									<label class="form-label">Tiempo de Conocerle</label>
									<input type="text" class="form-control" name="tiempo_conocer[]" placeholder="Años de conocerle">
								</div>
								<div class="col-md-3">
									<label class="form-label">Número de Teléfono</label>
									<input type="text" class="form-control" name="telefono_referencia[]" >
								</div>
							</div>
							<hr>
						</div>
					<?php endfor; // Fin del bucle para cuatro referencias ?>
				</div>
			</div>
		</section>

		<!-- Sección VI: Datos de salud y fisiológicos -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					<i class="fas fa-heartbeat"></i> VI. Datos de salud y fisiológicos
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<!-- Tipo de Sangre -->
						<div class="col-md-3">
							<label class="form-label">Tipo de Sangre</label>
							<select class="form-select" name="tipo_sangre" required>
								<option value="" disabled selected>Seleccione...</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
								<option value="No sabe">No sabe</option>

							</select>
						</div>

						<!-- Estatura -->
						<div class="col-md-3">
							<label class="form-label">Estatura</label>
							<input
								type="text"
								class="form-control"
								name="estatura"
								placeholder="Ej: 1.75 m"
								required
							>
						</div>

						<!-- Peso -->
						<div class="col-md-3">
							<label class="form-label">Peso</label>
							<input
								type="text"
								class="form-control"
								name="peso"
								placeholder="Ej: 70 kg"
								required
							>
						</div>

						<!-- Condición de Salud -->
						<div class="col-md-3">
							<label class="form-label">¿Alguna Condición de Salud?</label>
							<input
								type="text"
								class="form-control"
								name="condicion_salud"
								placeholder="Ej: Diabetes, Hipertensión, Ninguna"
								required
							>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6">
							<label class="form-label">Enfermedades que padece</label>
							<input type="text" class="form-control" name="enfermedades" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Alergias</label>
							<input type="text" class="form-control" name="alergias">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label">Accidentes</label>
							<input type="text" class="form-control" name="accidentes" placeholder="En caso de no tener colocar ninguna">
						</div>
						<div class="col-md-4">
							<label class="form-label">Operaciones</label>
							<input type="text" class="form-control" name="operaciones" placeholder="En caso de no tener colocar ninguna">
						</div>
						<div class="col-md-4">
							<label class="form-label">¿Usa anteojos para ver?</label>
							<select class="form-select" name="usa_anteojos">
								<option value="Sí">Sí</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label class="form-label">¿Toma Medicamentos?</label>
							<select class="form-select" name="toma_medicamentos">
								<option value="Sí">Sí</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Sección VII: Situación Social y Económica -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					<i class="fas fa-home"></i> VI. Situación Social y Económica
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label">Tipo de Vivienda</label>
							<select class="form-select" name="tipo_vivienda" required>
								<option value="" disabled selected>Seleccione...</option>
								<option value="Propia">Propia</option>
								<option value="Alquiler">Alquiler</option>
								<option value="Prestada">Prestada</option>
								<option value="Hipoteca">Hipoteca</option>
								<option value="Otra">Otra</option>
							</select>
						</div>

						<div class="col-md-4">
							<label class="form-label">Renta o cuota mensual</label>
							<input type="number" class="form-control" name="renta_mensual" placeholder="Cuanto paga por vivienda." required>
						</div>
						<div class="col-md-4">
							<label class="form-label">Tipo de Vehículo que posee</label>
							<select class="form-select" name="tipo_vehiculo">
								<option value="" disabled selected>Seleccione...</option>
								<option value="Automóvil">Automóvil</option>
								<option value="Motocicleta">Motocicleta</option>
								<option value="No Posee">No Posee</option>
							</select>
						</div>

					</div>
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label">Tipo de deudas que posee</label>
							<select class="form-select" name="tipo_deudas">
								<option value="" disabled selected>Seleccione...</option>
								<option value="Hipoteca">Hipoteca</option>
								<option value="Vehículo">Vehículo</option>
								<option value="Préstamo Personal">Préstamo Personal</option>
								<option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
								<option value="Educación">Educación</option>
								<option value="Otro">Otro</option>
								<option value="No Posee">No Posee</option>
							</select>
						</div>

						<div class="col-md-4">
							<label class="form-label">Deuda total</label>
							<input type="number" class="form-control" name="deuda_total">
						</div>
						<div class="col-md-4">
							<label class="form-label">Ingresos Extraordinarios</label>
							<input type="text" class="form-control" name="ingresos_extraordinarios">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label class="form-label">Monto de sus otros ingresos</label>
							<input type="number" class="form-control" name="monto_otros_ingresos">
						</div>
						<div class="col-md-6">
							<label class="form-label">Religión a la que pertenece</label>
							<input type="text" class="form-control" name="religion">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label class="form-label">Asociaciones a las que pertenece</label>
							<input type="text" class="form-control" name="asociaciones">
						</div>
						<div class="col-md-6">
							<label class="form-label">Deportes que practica</label>
							<input type="text" class="form-control" name="deportes">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label class="form-label">¿A qué dedica su tiempo libre?</label>
							<input type="text" class="form-control" name="tiempo_libre">
						</div>
						<div class="col-md-6">
							<label class="form-label">Indique aquellas cualidades que tiene como persona</label>
							<input type="text" class="form-control" name="cualidades">
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Sección VIII: Disposición de Contratación -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					<i class="fas fa-briefcase"></i> VII. Disposición de Contratación
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label">Puesto que desea ocupar</label>
							<input type="text" class="form-control" name="puesto_deseado" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">Indique qué otros puestos tiene en interés</label>
							<input type="text" class="form-control" name="otros_puestos_interes">
						</div>
						<div class="col-md-4">
							<label class="form-label">¿Qué tipo de empresa busca?</label>
							<input type="text" class="form-control" name="tipo_empresa">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label">¿Qué áreas desea trabajar?</label>
							<input type="text" class="form-control" name="areas_deseadas">
						</div>
						<div class="col-md-4">
							<label class="form-label">¿Cuál es su pretensión salarial?</label>
							<input type="number" class="form-control" name="pretension_salarial" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">¿Es negociable su sueldo?</label>
							<select class="form-select" name="sueldo_negociable">
								<option value="Sí">Sí</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label">¿Qué horarios desea laborar?</label>
							<select class="form-select" name="horarios_deseados">
								<option value="" disabled selected>Seleccione...</option>
								<option value="Tiempo Completo">Tiempo Completo</option>
								<option value="Medio Tiempo">Medio Tiempo</option>
								<option value="Turno Matutino">Turno Matutino</option>
								<option value="Turno Vespertino">Turno Vespertino</option>
								<option value="Turno Nocturno">Turno Nocturno</option>
								<option value="Turnos Rotativos">Turnos Rotativos</option>
								<option value="Otro">Otro</option>
							</select>
						</div>

						<div class="col-md-4">
							<label class="form-label">Disponibilidad para trabajar</label>
							<select class="form-select" name="disponibilidad_trabajo"  required>
								<option value="" disabled selected>Seleccione...</option>
								<option value="Inmediata">Inmediata</option>
								<option value="15 Días">15 Días</option>
								<option value="1 Mes">1 Mes</option>
							</select>
						</div>

						<div class="col-md-4">
							<label class="form-label">Disponibilidad en viajar</label>
							<select class="form-select" name="disponibilidad_viajar">
								<option value="Sí">Sí</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label">Disposición en vivir en el interior</label>
							<select class="form-select" name="disposicion_interior">
								<option value="Sí">Sí</option>
								<option value="No">No</option>
							</select>
						</div>
						<div class="col-md-4">
							<label class="form-label">¿Por qué le gustaría trabajar en la posición que se está ofertando?</label>
							<input type="text" class="form-control" name="motivo_posicion">
						</div>
						<div class="col-md-4">
							<label class="form-label">¿Tiene la experiencia?</label>
							<select class="form-select" name="tiene_experiencia">
								<option value="Sí">Sí</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label">Tiempo de Experiencia</label>
							<input type="text" class="form-control" name="tiempo_experiencia">
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Declaración y Firma -->
		<section class="mb-5">
			<div class="card">
				<div class="card-header bg-secondary text-white">
					<i class="fas fa-clipboard-check"></i> Declaración y Firma
				</div>
				<div class="card-body">
					<p>Juro y declaro que todos los datos proporcionados son verdaderos, sujetos a verificación y autorizo a Gestor de Talentos para realizar las pesquisas necesarias.</p>
					<div class="row mb-3">
						<div class="col-md-6">
							<label class="form-label">Firma (cuando la empresa imprima esta solicitud)</label>
							<input type="text" class="form-control" name="firma">
						</div>
						<div class="col-md-6">
							<label class="form-label">Fecha de hoy</label>
							<input type="date" class="form-control" name="fecha_hoy" required>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- otra seccion
		-->
		<!-- Botón de Guardar al Final -->
		<div class="text-end mb-5">
			<button id="guardarCambiosBtn" type="submit" class="btn btn-primary">Guardar Cambios</button>
		</div>
	</form>

</div>

<script>
	// Convertir datos PHP a JavaScript
	var candidato = <?= json_encode($candidato); ?>;
	console.log(candidato);

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wyVpmf1xO1oaxM5v9n0pDvIvy7sqMyi6ErPf1Gyra2eXYtcx/5E+5bXf8i8G8bS7" crossorigin="anonymous"></script>
</body>
</html>
