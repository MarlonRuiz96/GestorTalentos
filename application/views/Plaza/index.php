<?php require_once APPPATH . 'views/Dashboard/partesuperior.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestor de Talentos - Plazas</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
		crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
	<header>
		<h1>Plazas Disponibles</h1>
	</header>
	<main>
		<div class="nuevo-producto">
			<a class="btn btn-success" id="new" style="float: right; margin-right: 2px;"
				href="<?= site_url('IngregarPlaza') ?>">
				<i class="fa-solid fa-plus"></i> Nueva Plaza
			</a>
		</div>
		<div class="table-responsive">
			<table id="PlazaTable" class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Título</th>
						<th>Descripción</th>
						<th>Requisitos</th>
						<th>Salario</th>
						<th>Ubicación</th>
						<th>Estado</th>
						<th>Aspirantes</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dataplaza as $row): ?>
						<tr>
							<td><?php echo $row->titulo; ?></td>
							<td><?php echo $row->descripcion; ?></td>
							<td><?php echo $row->requisitos; ?></td>
							<td>
								<?php echo $row->salario ? 'Q' . number_format($row->salario, 2) : 'No especificado'; ?>
							</td>
							<td><?php echo $row->ubicacion; ?></td>
							<td><?php echo ucfirst($row->estado); ?></td>
							<td>
								<a href="<?= site_url('PlazasController/verPlaza/' . $row->id); ?>"
									class="btn btn-success btn-sm">Ver aspirantes</a>
							</td>
							<td class="d-flex justify-content-start flex-wrap">
								<a href="#" class="edit-btn btn btn-primary btn-sm me-2 mb-2" data-bs-toggle="modal"
									data-bs-target="#editarModal" data-plaza='<?php echo json_encode($row); ?>'>Editar
									plaza</a>
								<button class="btn btn-warning btn-sm mb-2 aplicar-btn" data-bs-toggle="modal"
									data-bs-target="#aplicarModal" data-plaza='<?php echo json_encode($row); ?>'>
									Compartir
								</button>

							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</main>

	<!-- Modal de edición -->
	<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar Plaza</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="editForm" action="" method="POST">
						<!-- Campo oculto para el ID -->
						<input type="hidden" id="editId" name="id">
						<div>
							<label for="editTitulo">Título:</label>
							<input type="text" id="editTitulo" name="titulo" class="form-control" placeholder="Título">
						</div>
						<br>
						<div>
							<label for="editDescripcion">Descripción:</label>
							<textarea id="editDescripcion" name="descripcion" class="form-control"
								placeholder="Descripción"></textarea>
						</div>
						<br>
						<div>
							<label for="editRequisitos">Requisitos:</label>
							<textarea id="editRequisitos" name="requisitos" class="form-control"
								placeholder="Requisitos"></textarea>
						</div>
						<br>
						<div>
							<label for="editSalario">Salario:</label>
							<input type="text" id="editSalario" name="salario" class="form-control"
								placeholder="Salario">
						</div>
						<br>
						<div>
							<label for="editUbicacion">Ubicación:</label>
							<input type="text" id="editUbicacion" name="ubicacion" class="form-control"
								placeholder="Ubicación">
						</div>
						<br>
						<div>
							<label for="editEstado">Estado:</label>
							<select id="editEstado" name="estado" class="form-control">
								<option value="activa">Activa</option>
								<option value="cerrada">Cerrada</option>
								<option value="en proceso">En proceso</option>
							</select>
						</div>
						<br>
						<div>
							<label for="editCodigo">Código:</label>
							<input type="text" id="editCodigo" name="codigo" class="form-control" placeholder="Código">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="guardarCambiosBtn" type="button" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>


	<!--Modal para compartir la plaza -->


	<!-- Modal para mostrar instrucciones de aplicación -->
	<div class="modal fade" id="aplicarModal" tabindex="-1" aria-labelledby="aplicarModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="aplicarModalLabel">Cómo aplicar a la plaza</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Para aplicar a la plaza, ingresa al sitio
						<a href="http://www.pruebasgestordetalentos.com"
							target="_blank">www.pruebasgestordetalentos.com</a>
						y utiliza el siguiente código: <strong id="codigoPlaza"></strong>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary copiar-body-btn">Copiar contenido</button>
				</div>


			</div>
		</div>
	</div>

	<!-- Scripts -->
	<!-- Definir siteUrl para usar en JavaScript -->
	<script type="text/javascript">
		// Definir siteUrl asegurando que termine con una barra inclinada
		var siteUrl = '<?php echo site_url(); ?>';
		if (!siteUrl.endsWith('/')) {
			siteUrl += '/';
		}
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		$(document).ready(function () {
			$('#PlazaTable').DataTable();
		});

		document.addEventListener('DOMContentLoaded', function () {
			const editButtons = document.querySelectorAll('.edit-btn');
			const editForm = document.getElementById('editForm');
			const guardarCambiosBtn = document.getElementById('guardarCambiosBtn');
			let saveChangesUrl = '';

			editButtons.forEach(button => {
				button.addEventListener('click', function (event) {
					event.preventDefault();
					const plazaData = JSON.parse(button.getAttribute('data-plaza'));
					// Rellenar el formulario con los datos de la plaza
					document.getElementById('editId').value = plazaData.id;
					document.getElementById('editTitulo').value = plazaData.titulo;
					document.getElementById('editDescripcion').value = plazaData.descripcion;
					document.getElementById('editRequisitos').value = plazaData.requisitos;
					document.getElementById('editSalario').value = plazaData.salario;
					document.getElementById('editUbicacion').value = plazaData.ubicacion;
					document.getElementById('editEstado').value = plazaData.estado;
					document.getElementById('editCodigo').value = plazaData.codigo;

					saveChangesUrl = siteUrl + 'PlazaController/guardarCambios/' + plazaData.id;
					$('#editarModal').modal('show');
				});
			});

			guardarCambiosBtn.addEventListener('click', function (event) {
				if (saveChangesUrl) {
					Swal.fire({
						title: '¿Estás seguro?',
						text: '¿Quieres guardar los cambios?',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Sí, guardar cambios'
					}).then((result) => {
						if (result.isConfirmed) {
							Swal.fire({
								title: 'Cambios',
								text: 'Cambios guardados con éxito.',
								icon: 'success',
								confirmButtonColor: '#3085d6'
							}).then(() => {
								editForm.action = saveChangesUrl;
								editForm.submit();
							});
						}
					});
				}
			});

		});
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const aplicarBtns = document.querySelectorAll('.aplicar-btn');
			const codigoPlazaElement = document.getElementById('codigoPlaza');

			aplicarBtns.forEach(btn => {
				btn.addEventListener('click', function () {
					const plazaData = JSON.parse(btn.getAttribute('data-plaza'));
					const codigo = plazaData.codigo;
					codigoPlazaElement.textContent = codigo ? codigo : 'No disponible';
				});
			});
		});
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const copiarBodyBtn = document.querySelector('.copiar-body-btn');
			const modalBody = document.querySelector('#aplicarModal .modal-body');

			copiarBodyBtn.addEventListener('click', function () {
				const contenido = modalBody.innerText;

				if (navigator.clipboard && navigator.clipboard.writeText) {
					// Intentar con la API moderna
					navigator.clipboard.writeText(contenido)
						.then(() => {
							alert('¡Contenido copiado al portapapeles con navigator.clipboard!');
						})
						.catch(err => {
							console.error('Error al copiar con navigator.clipboard: ', err);
							// Si falla, usar el fallback
							fallbackCopyTextToClipboard(contenido);
							alert('¡Contenido copiado al portapapeles usando el método alternativo!');
						});
				} else {
					// Si no está disponible navigator.clipboard, usar directamente el fallback
					fallbackCopyTextToClipboard(contenido);
					alert('¡Contenido copiado al portapapeles usando el método alternativo!');
				}
			});
		});


	</script>


</body>

</html>