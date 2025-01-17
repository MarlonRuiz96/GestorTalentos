
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
<img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-fluid mx-auto d-block mb-4" alt="Logo">





<div class="container my-5">
	<!-- Formulario Unificado -->

	<!-- Sección IV: Pruebas a Realizarse (Fuera del Formulario) -->
	<section class="tests-section">
		<div class="card">
			<div class="card-header bg-warning text-white">
				<i class="fas fa-clipboard-list"></i> IV. Pruebas a Realizarse
			</div>
			<div class="card-body">
<h5>
	A continuacion se le persentan una serie de pruebas que debera realizar para poder continuar con el proceso de seleccion.
</h5>				<div class="d-flex flex-wrap gap-3 mt-3">
					<?php if (isset($pruebas) && $pruebas->temperamento == "si" && isset($Candidato) && $Candidato->temperamento == "1"): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/RealizarPruebas/' . htmlspecialchars($DPI)); ?>" class="btn btn-success">
								<i class="fas fa-running"></i> Iniciar Prueba de Temperamento
							</a>
						</div>
					<?php endif; ?>

					<?php if ($pruebas->Briggs == "si" && isset($Candidato) && $Candidato->Briggs == "1"): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/pruebaBriggs/' . htmlspecialchars($DPI)); ?>" class="btn btn-success">
								<i class="fas fa-brain"></i> Iniciar Prueba de Briggs
							</a>
						</div>
					<?php endif; ?>

					<?php if ($pruebas->Valanti == "si" && isset($Candidato) && $Candidato->Valanti == "1"): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/pruebaValanti/' . htmlspecialchars($DPI)); ?>" class="btn btn-success">
								<i class="fas fa-heart"></i> Iniciar Prueba Valanti
							</a>
						</div>
					<?php endif; ?>

					<?php if ($pruebas->fp16 == "si"&& isset($Candidato) && $Candidato->fp16 == "1"): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/prueba16pf/' . htmlspecialchars($DPI)); ?>" class="btn btn-success">
								<i class="fas fa-list-alt"></i> Iniciar Cuestionario 16 P.F
							</a>
						</div>
					<?php endif; ?>

					<?php if ($pruebas->cleaver == "si" && isset($Candidato) && $Candidato->cleaver == "1"): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/cleaver/' . htmlspecialchars($DPI) . '/1'); ?>" class="btn btn-success">
								<i class="fas fa-eye"></i> Ver Prueba Cleaver
							</a>
						</div>
					<?php endif; ?>


				</div>
			</div>
		</div>
	</section>
</div>
<?php if (!empty($pruebas) && !empty($Candidato)): ?>
	<script>
		const dataPlaza = <?php echo json_encode($pruebas); ?>;
		const dataDPI = <?php echo json_encode($Candidato); ?>;

		console.log('Datos de la Plaza:', dataPlaza);
		console.log('DPI:', dataDPI);

		// Si deseas combinarlos en un solo objeto:
		const combinedData = {
			plaza: dataPlaza,
			dpi: dataDPI
		};
		console.log('Datos Combinados:', combinedData);
	</script>
<?php else: ?>
	<script>
		console.log('No hay datos de la plaza o del DPI disponibles.');
	</script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wyVpmf1xO1oaxM5v9n0pDvIvy7sqMyi6ErPf1Gyra2eXYtcx/5E+5bXf8i8G8bS7" crossorigin="anonymous"></script>
</body>
</html>
