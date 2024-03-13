<?php
include_once("../../drivers/config/sesion.php");
include_once("../../drivers/config/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['nombre'];?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="../../css/public.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            color: #1a202c;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .nav-link {
            color: #4a5568;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 150px;
            height: 150px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .upload {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .upload h5 {
            margin: 0 0 10px 0;
            color: #007ae1;
        }

        .account-settings .upload h5:hover {
            margin: 0 0 10px 0;
            color: #1c6ab9;
            cursor: pointer;
            font-size: 27px;
            text-decoration: underline;
        }

        .error {
            border-color: red;

        }

        .agregar-imagen {
            width:150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #007ae1;
        }

        .agregar-imagen:hover {
            background-color: #007ae1;
            color:white;
            opacity:0.8;
            
        }

        .bi-plus-circle{
            font-size:5rem;
            vertical-align:center;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <?php
    include_once("../../inc/conductores/header.php");
    ?>

<div class="container">
        <br>
        <?php
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            $error
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            unset($_SESSION['error']);
        }
        ?>
        <br>
        <div class="row gutters-sm">
            <div class="col-md-4 d-none d-md-block">
                <div class="card">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <br>
                                <img src="../../<?php echo $_SESSION['fotoPerfil'] ?>" alt="...">
                            </div>
                            <h5 class="user-name">
                                <?php
                                echo $_SESSION['nombre'];
                                ?>
                                <?php
                                echo $_SESSION['apellidos'];
                                ?>
                            </h5>
                            <h6 class="user-email">
                                <?php
                                echo $_SESSION['correo'];
                                ?>
                            </h6>
                        </div>
                        <div class="upload">
                            <div class="mb-3">
                                <form action="../../drivers/conductores/cambiarfoto.php" method="post" enctype="multipart/form-data">
                                    <label for="formFile" class="form-label label-upload">
                                        <h5>
                                            <i class="bi bi-upload"></i>
                                            Cargar foto
                                        </h5>
                                    </label>
                                    <input class="form-control" type="file" id="formFile" name="foto" hidden="true">
                                    <input class="form-control btn btn-outline-primary submit-foto" type="submit" value="Guardar" hidden="true">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <nav class="nav flex-column nav-pills nav-gap-y-1">
                            <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                                <i class="bi bi-person-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i>
                                Informacion Personal
                            </a>
                            <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <i class="bi bi-gear-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i>
                                Ajustes de Cuenta
                            </a>
                            <a href="#requisitos" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <i class="bi bi-file-earmark-arrow-up-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i>
                                Subir y actualizar requisitos
                            </a>
                            <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <i class="bi bi-shield-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i>
                                Seguridad
                            </a>
                            <a href="#billing" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <i class="bi bi-credit-card-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i>
                                Billetera
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-bottom mb-3 d-flex d-md-none">
                        <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><i class="bi bi-person-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#account" data-toggle="tab" class="nav-link has-icon"><i class="bi bi-gear-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#requisitos" data-toggle="tab" class="nav-link has-icon"><i class="bi bi-file-earmark-arrow-up-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#security" data-toggle="tab" class="nav-link has-icon"><i class="bi bi-shield-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#billing" data-toggle="tab" class="nav-link has-icon"><i class="bi bi-credit-card-fill" style="font-size: 1.5rem; color: #000a;padding-right:5px;"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="profile">
                            <h6>INFORMACIÓN DE TU PERFIL</h6>
                            <hr>
                            <form action="../../drivers/conductores/actualizarinfo.php" method="post">
                                <div class="form-group">
                                    <label for="nombre"><strong>Nombre</strong></label>
                                    <input type="text" class="form-control" id="nombre" aria-describedby="nombre" name="nombre" placeholder="Ingresa tu(s) nombre(s)" value="<?php echo $_SESSION['nombre'] ?>">
                                    <small id="nombre" class="form-text text-muted">Este nombre será visible por los clientes. Se recomienda no modificar el nombre.</small>
                                </div>
                                <div class="form-group">
                                    <label for="apellido"><strong>Apellido</strong></label>
                                    <input type="text" class="form-control" id="apellido" aria-describedby="apellido" name="apellido" placeholder="Ingresa tu(s) apellido(s)" value="<?php echo $_SESSION['apellidos'] ?>">
                                    <small id="apellido" class="form-text text-muted">Este apellido será visible por los clientes. Se recomienda no modificar el apellido.</small>
                                </div>
                                <div class="form-group">
                                    <label for="correo"><strong>Correo</strong></label>
                                    <input type="text" class="form-control" id="correo" name="email" placeholder="Ingresa tu correo" value="<?php echo $_SESSION['correo'] ?>">
                                    <small id="apellido" class="form-text text-muted">Este es el medio por donde nos comunicamos con usted.</small>
                                </div>
                                <br>
                                <div>
                                    <div>
                                        <strong>Fecha de registro</strong>
                                    </div>
                                    <div class="form-group small text-muted">
                                        <?php
                                        echo $_SESSION['fecha'];
                                        ?>
                                    </div>
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-primary" id="guardar-info">Guardar</button>
                                <button type="reset" class="btn btn-secondary" id="cancelar-info">Cancelar</button>
                            </form>
                        </div>

                        <div class="tab-pane" id="account">
                            <h6>GESTION DE LA CUENTA</h6>
                            <hr>
                            <form action="../../drivers/conductores/eliminarcuenta.php" method="post">
                                <div class="form-group">
                                    <label class="d-block text-danger">Eliminar cuenta</label>
                                    <p class="text-muted font-size-sm">Una vez que elimine su cuenta ya no se puede dar marcha atrás. Por favor esté seguro. <br>Sus datos de eliminarán de todos los registros de Suyachiy.</p>
                                </div>
                                <button class="btn btn-danger" type="submit">
                                    Eliminar cuenta
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </div>

                        <div class="tab-pane" id="requisitos">
                            <h6>REQUISITOS NECESARIOS</h6>
                            <hr>
                            <form action="../../drivers/conductores/requisitos.php" method="post" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label for="filesoat" class="form-label"><strong>SOAT</strong></label>
                                    <input class="form-control" type="file" id="filesoat" aria-describedby="soat" name="soat">
                                    <small id="nombre" class="form-text text-muted">Seguro Obligatorio de Accidentes de Tránsito.</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="filecat" class="form-label"><strong>CAT</strong></label>
                                    <input class="form-control" type="file" id="filecat" aria-describedby="soat" name="cat">
                                    <small id="nombre" class="form-text text-muted">Certificado Contra Accidentes de Tránsito.</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="filecitv" class="form-label"><strong>CITV</strong></label>
                                    <input class="form-control" type="file" id="filecitv" aria-describedby="soat" name="citv">
                                    <small id="nombre" class="form-text text-muted">Centros de Inspección Técnica Vehicular. Se trata de la revisión tecnica vehicular.</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="filetarjeta" class="form-label"><strong>TARJETA DE PROPIEDAD</strong></label>
                                    <input class="form-control" type="file" id="filetarjeta" aria-describedby="tarjeta" name="tarjeta">
                                    <small id="nombre" class="form-text text-muted">Es necesario para identificar al vehículo.</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="filelicencia" class="form-label"><strong>LICENCIA DE CONDUCIR</strong></label>
                                    <input class="form-control" type="file" id="filelicencia" aria-describedby="licencia" name="licencia">
                                    <small id="nombre" class="form-text text-muted">Es necesario para la verificar que usted puede conducir un vehículo.</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="filedni" class="form-label"><strong>DNI</strong></label>
                                    <input class="form-control" type="file" id="filedni" aria-describedby="dni" name="dni">
                                    <small id="nombre" class="form-text text-muted">Documento Nacional de Identidad. Es necesario para identificarlo.</small>
                                </div>
                                <br><br>
                                <p class="text-danger">Antes de guardar los cambios asegurese que el formato de los documentos sea PDF (extención .pdf)</p>
                                <button type="submit" class="btn btn-primary" id="guardar-info">Guardar</button>
                                <button type="reset" class="btn btn-secondary" id="cancelar-info">Cancelar</button>
                            </form>
                        </div>

                        <div class="tab-pane" id="security">
                            <h6>AJUSTES DE SEGURIDAD</h6>
                            <hr>
                            <form action="../../drivers/conductores/cambiarpass.php" method="post">
                                <div class="form-group">
                                    <label class="d-block">Cambiar contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="pass_a" name="pass0" placeholder="Ingresa tu contraseña actual" required>
                                        <button id="show_password" class="btn btn-outline-secondary" type="button" onclick="mostrarPassword('pass_a','icon-a')">
                                            <span class="bi bi-eye icon-a"></span>
                                        </button>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="pass_n" name="pass1" placeholder="Ingresa la nueva contraseña" required>
                                        <button id="show_password" class="btn btn-outline-secondary" type="button" onclick="mostrarPassword('pass_n','icon-n')">
                                            <span class="bi bi-eye icon-n"></span>
                                        </button>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="pass_cn" name="pass2" placeholder="Vuelve a ingresar la nueva contraseña" required>
                                        <button id="show_password" class="btn btn-outline-secondary" type="button" onclick="mostrarPassword('pass_cn','icon-cn')">
                                            <span class="bi bi-eye icon-cn"></span>
                                        </button>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <button class="btn btn-info" id="btn-pass" type="submit" disabled="true">Cambiar contraseña</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>

                        <div class="tab-pane" id="billing">
                            <h6>AJUSTE DE LOS MÉTODOS DE PAGO Y COBRANZA</h6>
                            <hr>
                            <div class="form-group">
                                <label class="d-block mb-0">Método de pago y cobranza</label>
                                <div class="small text-muted mb-3">
                                    En breve podrás recibir tu dinero mediante tarjetas de crédito o débito, transferencias bancarias o monederos electrónicos.
                                    Estos métodos de cobro te permitirán visualizar tus ingresos de forma rápida, segura y cómoda.
                                    Para poder usarlos, solo necesitarás tener una cuenta válida en la plataforma y proporcionar algunos datos personales y bancarios.
                                </div>
                                <div>
                                    <strong>
                                        Por el momento puedes realizar tus cobros mediante el QR de alguna de tus billeteras digitales.
                                        <img src="../../img/yape.jpg" alt="yape" style="width:30px;height:30px;">
                                        <img src="../../img/plin.png" alt="plin" style="width:30px;height:30px;">
                                    </strong>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <div class="row">
                                        <form action="../../drivers/conductores/agregarqr.php" method="post" enctype="multipart/form-data">
                                            <div class="col-12">
                                                <label for="imagen" id="label-imagen">
                                                    <div class="bg-image agregar-imagen rounded" >
                                                        <i class="bi bi-plus-circle"></i>
                                                    </div>
                                                </label>
                                                <input type="file" id="imagen" name="qr" hidden>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary guardar" hidden>
                                                <div class="bg-image agregar-imagen rounded">
                                                        <i class="bi bi-floppy" style="font-size:3rem;"></i>
                                                    </div>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="d-block">Historial de Ingresos</label>
                                    <div class="border border-gray-500 bg-gray-200 p-3 text-center font-size-sm">
                                        <div class="row">
                                            <div class="col-3"><strong>Monto</strong></div>
                                            <div class="col-3"><strong>Método de pago</strong></div>
                                            <div class="col-3"><strong>Estado</strong></div>
                                            <div class="col-3"><strong>Fecha</strong></div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    
    <!-- Footer Start -->
    <?php
    include "../../inc/conductores/footer.php";
    ?>
    <!-- Footer End -->

    <script>
        function mostrarPassword(id, icon) {
            var cambio = document.getElementById(id);
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.' + icon).removeClass('bi bi-eye').addClass('bi bi-eye-slash');
            } else {
                cambio.type = "password";
                $('.' + icon).removeClass('bi bi-eye-slash').addClass('bi bi-eye');
            }
        }

        function validarContraseñas() {
            const pass1 = $('#pass_n').val();
            const pass2 = $('#pass_cn').val();

            if (pass1 !== pass2) {
                $('#pass_cn').addClass('error');
                $('#btn-pass').attr('disabled', 'true');
            } else {
                $('#pass_cn').removeClass('error');
                $('#btn-pass').removeAttr('disabled');
            }
        }


        $(document).ready(function() {
            $('#ShowPassword').click(function() {
                $('#' + id).attr('type', $(this).is(':checked') ? 'text' : 'password');
            });

            $("#formFile").change(function() {
                if ($(this).val() != "") {
                    $(".submit-foto").removeAttr("hidden");
                } else {
                    $(".submit-foto").attr("hidden", "hidden");
                }
            });
            $("#imagen").change(function () {
                if ($(this).val() != "") {
                    $(".guardar").removeAttr("hidden");
                    $("#label-imagen").attr("hidden","hidden")
                } else {
                    $(".guardar").attr("hidden", "hidden");
                }
            });

            $('#pass_n').on('keyup', validarContraseñas);
            $('#pass_cn').on('keyup', validarContraseñas);
            
        });
    </script>
</body>