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
            <!-- Campo Título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de la plaza"
                    required>
            </div>

            <!-- Campo Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"
                    placeholder="Descripción detallada de la plaza" required></textarea>
            </div>

            <!-- Campo Requisitos -->
            <div class="mb-3">
                <label for="requisitos" class="form-label">Requisitos</label>
                <textarea class="form-control" id="requisitos" name="requisitos" rows="4"
                    placeholder="Requisitos para la plaza" required></textarea>
            </div>

            <!-- Campo Salario -->
            <div class="mb-3">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario"
                    placeholder="Salario (opcional)">
            </div>

            <!-- Campo Ubicación -->
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ubicación"
                    required>
            </div>

            <!-- Campo Estado -->
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="activa">Activa</option>
                    <option value="cerrada">Cerrada</option>
                    <option value="en proceso">En proceso</option>
                </select>
            </div>

            <!-- Nuevo Apartado para activar pruebas -->
            <div class="mb-3">
                <label class="form-label">Pruebas a aplicar</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="temperamento" name="temperamento" value="si">
                    <label class="form-check-label" for="temperamento">Temperamentos</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="briggs" name="Briggs" value="si">
                    <label class="form-check-label" for="briggs">Myers-Briggs</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="valanti" name="Valanti" value="si">
                    <label class="form-check-label" for="valanti">Valanti</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="fp16" name="fp16" value="si">
                    <label class="form-check-label" for="fp16">16 PF</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cleaver" name="cleaver" value="si">
                    <label class="form-check-label" for="cleaver">Cleaver</label>
                </div>
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