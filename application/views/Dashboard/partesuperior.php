<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/sb-admin-2.min.css'); ?>">
</head>
<body>
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-trdophy"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Gestor de Talentos </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('Dashboard') ?>">
                <i class="far fa-futbol" style="font-size: 24px;"></i>
                <span class="nav-link" style="font-size: 15px;">Menú Principal</span></a>
            </li>
            <hr class="sidebar-divider">
           
            <!-- Apartado de Candidatos -->
           <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Candidatos') ?>">
                    <i class="far fa-user" style="font-size: 20px;"></i>
                    <span class="nav-link" style="font-size: 15px;">Candidatos</span>
                </a>
                
            </li>
            <!-- Apartado de Ofertas  -->
            <li class="nav-item">
            <a class="nav-link" href="<?= site_url('#') ?>">
                    <i class="far fa-user" style="font-size: 20px;"></i>
                    <span class="nav-link" style="font-size: 15px;">POR DEFINIR</span>
                </a>
                
            </li>

            <!-- Apartado de Proceso de seleccion -->
            <li class="nav-item">
            <a class="nav-link" href="<?= site_url('#') ?>">
                    <i class="far fa-user" style="font-size: 20px;"></i>
                    <span class="nav-link" style="font-size: 15px;">POR DEFINIR</span>
                </a>
                
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading" style="font-size: 15px;">
                Utilidades 
            </div>

            <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Usuarios') ?>">
                    <i class="far fa-user" style="font-size: 20px;"></i>
                    <span class="nav-link" style="font-size: 15px;">Usuarios</span>
                </a>
                
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading" style="font-size: 15px;">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Sesion
            <li><a href="<?= site_url('LogoutController/logout')?>">Cerrar Sesion</a></li>
            </div>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

        
            <div>
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                                <img class="img-profile rounded-circle" src="#">
                            </a>
                        </li>
                    </ul>
                </nav>
            <div>
        </div>
    </div>
</body>
</html>