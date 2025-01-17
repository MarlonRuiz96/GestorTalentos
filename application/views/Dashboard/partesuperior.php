<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" 
        rel="stylesheet">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
  
  <!-- Font Awesome 6 (Solid) -->
  <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
        integrity="sha512-GVVIN47EnGh4NBmUH3/eAfa1A0Ncy5FQC7Jo9beFKUcu3Mw16EIWjaC8CRQC3DJkeQgaGZn8Im+2p+F/Sn63tA==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" />

  <!-- SB Admin 2 CSS (si lo usas) -->
  <link rel="stylesheet" href="<?php echo base_url('assets/sb-admin-2.min.css'); ?>">

  <title>Layout Ajustado</title>

  <!-- Estilos personalizados -->
  <style>
    /* Ajusta la altura de la sidebar para ocupar todo el alto de la pantalla */
    #accordionSidebar {
      min-height: 100vh;
      transition: all 0.3s ease;
    }
    /* Ejemplo de clase para la imagen del logo */
    .sidebar-brand img {
      width: 100%;
      height: auto;
    }
    /* Para el ícono de usuario superior */
    .img-profile {
      width: 40px;
      height: 40px;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-trdophy"></i> <!-- Ícono de ejemplo; no se solicitó cambio aquí -->
        </div>
        <img src="<?php echo base_url('assets/Reporte/enca.png'); ?>" class="d-block" alt="Imagen"
             style="width: 100%; height: auto;">
      </a>
      
      <hr class="sidebar-divider my-0">

      <!-- Menú Principal -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('Dashboard') ?>">
          <i class="fa-solid fa-house" style="font-size: 24px;"></i>
          <span class="nav-link" style="font-size: 15px;">Menú Principal</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <!-- Candidatos -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Candidatos') ?>">
          <i class="fa-solid fa-user" style="font-size: 20px;"></i>
          <span class="nav-link" style="font-size: 15px;">Candidatos</span>
        </a>
      </li>

      <!-- Plazas -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Plazas') ?>">
          <i class="fa-solid fa-briefcase" style="font-size: 20px;"></i>
          <span class="nav-link" style="font-size: 15px;">Plazas</span>
        </a>
      </li>

      <!-- Calendario -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Calendario') ?>">
          <i class="fa-solid fa-calendar-check" style="font-size: 20px;"></i>
          <span class="nav-link" style="font-size: 15px;">Calendario</span>
        </a>
      </li>

      <!-- Empresas -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Empresas') ?>">
          <i class="fa-solid fa-building" style="font-size: 20px;"></i>
          <span class="nav-link" style="font-size: 15px;">Empresas</span>
        </a>
      </li>

      <!-- Contactar -->
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('ContactoCorreo') ?>">
          <i class="fa-solid fa-envelope" style="font-size: 20px;"></i>
          <span class="nav-link" style="font-size: 15px;">Contactar</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <!-- Utilidades -->
      <div class="sidebar-heading" style="font-size: 15px;">
        Utilidades
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('Usuarios') ?>">
          <i class="fa-solid fa-users" style="font-size: 20px;"></i>
          <span class="nav-link" style="font-size: 15px;">Usuarios</span>
        </a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sesión -->
      <div class="sidebar-heading" style="font-size: 15px;">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        Sesión
      <li>
        <a href="<?= site_url('LogoutController/logout') ?>">
          <i class="fa-solid fa-right-from-bracket" style="font-size: 20px;"></i>
          <span class="nav-link" style="font-size: 15px;">Cerrar Sesión</span>
        </a>
      </li>
      </div>

    </ul>
    <!-- End Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div>
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">
          <!-- Botón toggle (pantallas pequeñas) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Right Navbar -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="me-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                <img class="img-profile rounded-circle" src="#">
              </a>
              <!-- Dropdown opcional
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                   aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
              -->
            </li>
          </ul>
        </nav>
        <!-- End Topbar -->
      <div>
    </div>
  </div>

  <!-- Bootstrap 5 JS (Popper incluido) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-w76AOHGguCr77tqX5ILpZkl6LRK1AI3QkR4iRt6/RnENOqWplpc0gn6I/E8jkF4l"
          crossorigin="anonymous"></script>
</body>
</html>
