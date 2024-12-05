<?php require_once APPPATH . 'views/Dashboard/partesuperior.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Plaza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Crear Nueva Plaza</h1>
        <form action="<?= site_url('PlazaController/guardarPlaza'); ?>" method="post" class="mt-4">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de la plaza" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"
                    placeholder="Descripción detallada de la plaza" required></textarea>
            </div>
            <div class="mb-3">
                <label for="requisitos" class="form-label">Requisitos</label>
                <textarea class="form-control" id="requisitos" name="requisitos" rows="4"
                    placeholder="Requisitos para la plaza" required></textarea>
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario" placeholder="Salario (opcional)">
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ubicación" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="activa">Activa</option>
                    <option value="cerrada">Cerrada</option>
                    <option value="en proceso">En proceso</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Plaza</button>
            <a href="<?= site_url('Plazas'); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
