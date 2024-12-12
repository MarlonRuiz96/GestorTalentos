<?php require_once APPPATH . 'views/Dashboard/partesuperior.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestor de Talentos - Aspirantes</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>

<header>
	<h1>Aspirantes</h1>
</header>

<main>
	<a href="<?= site_url('Plazas'); ?>" class="btn btn-secondary mb-3">
		<i class="fa fa-arrow-left"></i> Volver a Plazas
	</a>

	<!-- Pie Chart Section -->
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<canvas id="chartAspirantes"></canvas>
			</div>
		</div>
	</div>

	<!-- Applicants Table -->
	<div class="table-responsive mt-4">
		<?php if (isset($aspirantes) && !empty($aspirantes)) : ?>
			<table id="AspirantesTable" class="table table-hover table-striped">
				<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Correo</th>
					<th>Teléfono</th>
					<th>Edad</th>
					<th>DPI</th>
					<th>Profesión</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($aspirantes as $aspirante): ?>
					<tr>
						<td><?= htmlspecialchars($aspirante->primer_nombre . ' ' . $aspirante->segundo_nombres) ?></td>
						<td><?= htmlspecialchars($aspirante->primer_apellido . ' ' . $aspirante->segundo_apellido) ?></td>
						<td><?= htmlspecialchars($aspirante->correo) ?></td>
						<td><?= htmlspecialchars($aspirante->telefono_movil) ?></td>
						<td><?= htmlspecialchars($aspirante->edad_actual) ?></td>
						<td><?= htmlspecialchars($aspirante->numero_documento) ?></td>
						<td><?= htmlspecialchars($aspirante->profesion) ?></td>
						<td>
							<button class="btn btn-info btn-sm view-btn" data-bs-toggle="modfveal" data-bs-target="#viewModal"
									data-aspirante='<?= json_encode($aspirante) ?>'>
								<i class="fa fa-eye"></i> Resumen
							</button>
							<a href="<?= site_url('CandidatoController/VerCandidato/' . $aspirante->numero_documento); ?>"
							   class="btn btn-success">Ver pruebas
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<div class="alert alert-warning text-center">
				<strong>No hay aspirantes disponibles para esta plaza.</strong>
			</div>
		<?php endif; ?>
	</div>
</main>

<!-- Modal to View Applicant Details -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewModalLabel">Información Completa del Aspirante</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tbody id="modalAspiranteBody"></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	$(document).ready(function () {
		// DataTable Initialization
		$('#AspirantesTable').DataTable({
			"language": {
				"lengthMenu": "Mostrar _MENU_ registros por página",
				"zeroRecords": "No se encontraron resultados",
				"info": "Mostrando página _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"infoFiltered": "(filtrado de _MAX_ registros totales)",
				"search": "Buscar:",
				"paginate": {
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});

		// Chart.js Pie Chart
		const ctx = document.getElementById('chartAspirantes').getContext('2d');
		const chartAspirantes = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ['Aprobados', 'Rechazados', 'Finalistas'],
				datasets: [{
					data: [40, 30, 30], // Datos ficticios
					backgroundColor: ['#4CAF50', '#F44336', '#FFC107']
				}]
			},
			options: {
				responsive: true,
				plugins: {
					legend: {
						position: 'bottom'
					}
				}
			}
		});

		// View Modal for Applicant Details
		const viewButtons = document.querySelectorAll('.view-btn');
		const modalAspiranteBody = document.getElementById('modalAspiranteBody');

		viewButtons.forEach(button => {
			button.addEventListener('click', function () {
				const aspirante = JSON.parse(this.getAttribute('data-aspirante'));

				// Limpiar contenido previo
				modalAspiranteBody.innerHTML = '';

				// Crear una fila para cada campo del aspirante
				Object.entries(aspirante).forEach(([key, value]) => {
					if (value === null) value = 'No especificado';
					const formattedKey = key.replace(/_/g, ' ').toUpperCase();
					const row = `
						<tr>
							<th>${formattedKey}</th>
							<td>${value}</td>
						</tr>
					`;
					modalAspiranteBody.innerHTML += row;
				});
			});
		});
	});
</script>

</body>
</html>
