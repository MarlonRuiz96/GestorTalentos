<?php require_once APPPATH . 'views/Dashboard/partesuperior.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">
    <title>Consulta de Producto</title>
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
        <h1>Candidatos</h1>
    </header>
    <main>
        <div class="nuevo-producto">
            <a class="btn btn-success" id="new" style="float: right; margin-right: 2px;"
                href="<?= site_url('CandidatoController/indexAlta') ?>">
                <i class="fa-solid fa-notes-medical"></i> Nuevo Candidato
            </a>
        </div>
        <div class="userList" id="userList">
            <table id="ProductoTable" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>
                            <i class="fa-solid fa-pen-to-square" style="color: #e63946;"></i>
                            Nombre Completo
                        </th>
                        <th>
                            <i class="fa-solid fa-boxes-stacked" style="color: #e63946;"></i>
                            Direccion
                        <th>
                            <i class="fa-solid fa-list" style="color: #e63946;"></i>
                            Contacto
                        </th>
                        <th>
                            <i class="fa-solid fa-bolt" style="color: #e63946;"></i>
                            Direccion
                        </th>


                        <th>
                            <i class="fa-solid fa-bolt" style="color: #e63946;"></i>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prueba_data as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row->Nombres; ?>
                            </td>
                            <td>
                                <?php echo $row->Direccion; ?>
                            </td>
                            <td>
                                <?php echo $row->Contacto; ?>
                            </td>
                            <td>
                                <?php echo $row->Correo; ?>
                            </td>


                            <td class="td_boton">
                                <a href="<?= site_url($row->idCandidato); ?>" class="edit-btn btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editarModal" data-cliente='<?php echo json_encode($row); ?>'>Editar
                                </a>
                                <a href="<?= site_url('CandidatoController/VerCandidato/' . $row->idCandidato); ?>"
                                class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarModal">Ver pruebas
                                    </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Datos del producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        <div>
                            <label for="editNombre">Nombre de producto </label>
                            <input type="text" id="editNombre" name="editNombre"
                                placeholder="Ingrese el nombre del CANDIDATO">
                        </div>
                        <br>

                        <div>
                            <label for="editDireccion">Direccion </label>
                            <input type="text" id="editDireccion" name="editDireccion"
                                placeholder="Ingrese la direccion">
                        </div>
                        <br>
                        <div>
                            <label for="editContacto">Telefono </label>
                            <input type="text" id="editContacto" name="editContacto" placeholder="Ingrese el contacto">
                        </div>
                        <br>
                        <div>
                            <label for="editCorreo">Correo </label>
                            <input type="text" id="editCorreo" name="editCorreo"
                                placeholder="Ingrese la direccion de correo ">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#ProductoTable').DataTable();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-btn');
            const editForm = document.getElementById('editForm');
            const guardarCambiosBtn = document.getElementById('guardarCambiosBtn');
            let saveChangesUrl = '';

            editButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const productoData = JSON.parse(button.getAttribute('data-cliente'));
                    const editNombre = document.getElementById('editNombre');
                    const editDireccion = document.getElementById('editDireccion');
                    const editContacto = document.getElementById('editContacto');
                    const editCorreo = document.getElementById('editCorreo');


                    editNombre.value = productoData.Nombres;
                    editDireccion.value = productoData.Direccion;
                    editContacto.value = productoData.Contacto;
                    editCorreo.value = productoData.Correo;


                    saveChangesUrl = '<?php echo site_url("CandidatoController/GuardarCambios/' + productoData.idCandidato + '"); ?>';
                    $('#editarModal').modal('show');

                });
            });

            guardarCambiosBtn.addEventListener('click', function (event) {
                if (saveChangesUrl) {
                    editForm.action = saveChangesUrl;
                    editForm.submit(); // Envía el formulario
                }
            });
        });
    </script>


    <script>
        const deleteLinks = document.querySelectorAll('.delete-btn');

        deleteLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                const deleteUrl = this.getAttribute('href');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "El producto será eliminado",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Eliminado!',
                            text: 'El producto ha sido eliminado',
                            icon: 'success',
                            confirmButtonColor: '#3085d6'
                        }).then(() => {
                            window.location.href = deleteUrl;
                        });
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
</body>

</html>