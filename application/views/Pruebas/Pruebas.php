<?php require_once APPPATH . 'views/Dashboard/pruebas.php'; ?>

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
	<div class="container d-flex align-items-center">
		<img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Gestor de Talentos Logo" class="logo me-3" style="height: 200px;">
		<br>
		<h1 class="title h3 mb-0">Pruebas psicométricas a realizar</h1>
	</div>
</header>




<div class="container my-5">
	<!-- Formulario Unificado -->

	<!-- Sección IV: Pruebas a Realizarse (Fuera del Formulario) -->
	<section class="tests-section">
		<div class="card">
			<div class="card-header bg-warning text-white">
				<i class="fas fa-clipboard-list"></i> IV. Pruebas a Realizarse
			</div>
			<div class="card-body">
				<h2 class="card-title">Pruebas a realizarse:</h2>
				<div class="d-flex flex-wrap gap-3 mt-3">
					<?php if ($candidato->temperamento == 1): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/RealizarPruebas/' . $Candidato->DPI); ?>" class="btn btn-success">
								<i class="fas fa-running"></i> Iniciar Prueba de Temperamento
							</a>
						</div>
					<?php endif; ?>

					<?php if ($candidato->Briggs == 1): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/pruebaBriggs/' . $Candidato->DPI); ?>" class="btn btn-success">
								<i class="fas fa-brain"></i> Iniciar Prueba de Briggs
							</a>
						</div>
					<?php endif; ?>

					<?php if ($candidato->Valanti == 1): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/pruebaValanti/' . $Candidato->DPI); ?>" class="btn btn-success">
								<i class="fas fa-heart"></i> Iniciar Prueba Valanti
							</a>
						</div>
					<?php endif; ?>

					<?php if ($candidato->fp16 == 1): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/prueba16pf/' . $candidato->DPI); ?>" class="btn btn-success">
								<i class="fas fa-list-alt"></i> Iniciar Cuestionario 16 P.F
							</a>
						</div>
					<?php endif; ?>

					<?php if ($candidato->cleaver == 1): ?>
						<div class="test-item">
							<a href="<?= site_url('DpiController/cleaver/' . $candidato->DPI . '/1'); ?>" class="btn btn-success">
								<i class="fas fa-eye"></i> Ver Prueba Cleaver
							</a>
						</div>
					<?php endif; ?>

					<?php if ($candidato->temperamento == 0 && $candidato->Briggs == 0 && $candidato->Valanti == 0 && $candidato->fp16 == 0 && $candidato->cleaver == 0): ?>
						<div class="test-item no-tests">
							<p class="text-muted">No hay pruebas a realizarse.</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wyVpmf1xO1oaxM5v9n0pDvIvy7sqMyi6ErPf1Gyra2eXYtcx/5E+5bXf8i8G8bS7" crossorigin="anonymous"></script>
</body>
</html>
