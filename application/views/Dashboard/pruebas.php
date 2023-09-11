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
                <a class="nav-link" href="<?= site_url('TokenController') ?>">
                <i class="far fa-futbol" style="font-size: 24px;"></i>
                <span class="nav-link" style="font-size: 15px;">Menú Principal</span></a>
            </li>
            <hr class="sidebar-divider">
           
            <!-- Apartado de Candidatos -->
            <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Temperamento') ?>">
                    <i class="far fa-user" style="font-size: 20px;"></i>
                    <span class="nav-link" style="font-size: 15px;">Prueba 1</span>
                </a>
                <div id="clientes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Consultar Candidatos</h6>
                        <a class="collapse-item" href="<?= site_url('Candidatos') ?>">Consultar Candidatos
                        </a>
                        <a class="collapse-item" href="<?= site_url('Clientes') ?>">Nuevo Candidato
                        </a>
                    </div>
                </div>
            </li>
            <!-- Apartado de Ofertas  -->
        

            <!-- Apartado de Proceso de seleccion -->
            

            

            
            

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

        
            <div>
            
            <div>
        </div>
    </div>
</body>
</html>