<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="<?php echo base_url('assets/login2.css'); ?>">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor de Talentos</title>
</head>

<body>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="<?php echo base_url('assets/reporte/encabezado.png'); ?>" class="img-fluid" alt="Sample image">


        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="<?php echo site_url('PlazaController/login'); ?>" method="post">

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Ingresa el numero de la plaza</p>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example3" class="form-control form-control-lg"
                placeholder="Ingresa el codigo de la plaza" name="codigo"/>
            </div>




            <div class="text-center text-lg-start mt-4 pt-2">
              <div class="text-center">
              <input type="submit" value="Iniciar" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">

              </div>

              <p class="text-center small fw-bold mt-2 pt-1 mb-0">Ingresa como administrador <br><a href="<?php echo site_url('LoginController/admin'); ?>" class="link-danger">Ingreso</a></p>

            </div>

          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-custom">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Copyright © 2024. Todos los derechos reservados - Desarrollado por BroDevs.
      </div>
      <!-- Copyright -->

      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>