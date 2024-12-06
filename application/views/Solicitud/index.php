<?php require_once APPPATH . 'views/Dashboard/pruebas.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Información de la Plaza</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
	<?php if ($this->session->flashdata('error')): ?>
		<script>
			alert('<?php echo $this->session->flashdata('error'); ?>');
		</script>
	<?php endif; ?>
	<div class="container mt-5">
		<h1 class="text-center">Información de la Plaza</h1>

		<?php if (!empty($plaza)): ?>
			<div class="card mt-4">
				<div class="card-header">
					<h2><?php echo $plaza->titulo; ?></h2>
				</div>
				<div class="card-body">
					<p><strong>Código:</strong> <?php echo $plaza->codigo; ?></p>
					<p><strong>Descripción:</strong> <?php echo $plaza->descripcion; ?></p>
					<p><strong>Requisitos:</strong> <?php echo $plaza->requisitos; ?></p>
					<p><strong>Salario:</strong>
						<?php echo !empty($plaza->salario) ? 'Q' . number_format($plaza->salario, 2) : 'No especificado'; ?>
					</p>
					<p><strong>Ubicación:</strong> <?php echo $plaza->ubicacion; ?></p>
				</div>
			</div>
			<div class="mt-4">
				<a href="<?php echo site_url('Solicitud'); ?>" class="btn btn-primary">Continuar con la
					Solicitud</a>
			</div>
		<?php else: ?>
			<div class="alert alert-danger" role="alert">
				No se encontraron datos de la plaza.
			</div>
		<?php endif; ?>

	</div>
	<script>
            // Convertir datos PHP en JSON para imprimirlos en la consola
            const plazaData = <?php echo json_encode($pruebas); ?>;
            console.log('Información de la Plaza:', plazaData);
        </script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
</body>

</html>