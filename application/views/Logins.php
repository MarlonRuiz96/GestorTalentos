<!doctype html>
<html lang="en">

<head>
    <title>Gestor de Talentos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/login.css'); ?>">
    <link rel="stylesheet" href="assets/login.css">

</head>

<body>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Realizar Prueba </span><span>Administrador</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <form action="<?php echo site_url('DpiController/login'); ?>"
                                            method="post">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Ingrese su DPI </h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-style" placeholder="Ingrese su DPI"
                                                        name="DPI">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <input type="submit" value="Iniciar" class="btn mt-4">
                                                <p class="mb-0 mt-4 text-center">
                                                    <a href="https://api.whatsapp.com/send?phone=50517389&text=Necesito ayuda con mi Token"
                                                        class="link">
                                                        ¿Necesitas ayuda?
                                                    </a>
                                                </p>
                                            </div>
                                        </form>

                                    </div>


                                    <div class="card-back">
                                        <div class="center-wrap">
                                            <form action="<?php echo site_url('LoginController/login'); ?>"
                                                method="post">
                                                <div class="section text-center">
                                                    <h4 class="mb-3 pb-3">Iniciar Sesión</h4>
                                                    <div class="form-group">
                                                        <input type="text" class="form-style" placeholder="Usuario"
                                                            name="usuario">
                                                        <i class="input-icon uil uil-user"></i>
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <input type="password" class="form-style"
                                                            placeholder="Contraseña" name="clave">
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>
                                                    <input type="submit" value="Iniciar" class="btn mt-4">
                                                    
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>