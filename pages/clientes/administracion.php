<?php
    include_once("../../drivers/config/sesion.php");
    include_once("../../drivers/config//conexion.php");

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/cliente.css">
    <link href="../../css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <style>
        body{
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
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
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

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
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
            cursor:pointer;
            font-size:27px;
            text-decoration:underline;
        }

        .error{
            border-color: red;
            
        }

    </style>
</head>
<body>
    <?php
    include_once("../../inc/clientes/header.php");
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
					            <img src="../../<?php echo $_SESSION['fotoPerfil']?>" alt="...">
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
                                <form action="../../drivers/clientes/cambiarfoto.php" method="post">
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
                                <i class="bi bi-person-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i>Informacion General
                            </a>
                            <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <i class="bi bi-gear-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i>Ajustes de Cuenta
                            </a>
                            <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <i class="bi bi-shield-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i>Seguridad
                            </a>
                            <a href="#notification" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <i class="bi bi-bell-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i>Notificaciones
                            </a>
                            <a href="#billing" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <i class="bi bi-credit-card-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i>Billetera
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
                                <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><i class="bi bi-person-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#account" data-toggle="tab" class="nav-link has-icon"><i class="bi bi-gear-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#security" data-toggle="tab" class="nav-link has-icon"><i class="bi bi-shield-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#notification" data-toggle="tab" class="nav-link has-icon"><i class="bi bi-bell-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#billing" data-toggle="tab" class="nav-link has-icon"><i class="bi bi-credit-card-fill" style="font-size: 1.5rem; color: #F;padding-right:5px;"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="profile">
                            <h6>INFORMACIÓN DE TU PERFIL</h6>
                            <hr>
                            <form action="../../drivers/clientes/actualizarinfo.php" method="post">
                                <div class="form-group">
                                    <label for="nombre"><strong>Nombre</strong></label>
                                    <input type="text" class="form-control" id="nombre" aria-describedby="nombre" name="nombre" placeholder="Ingresa tu(s) nombre(s)" value="<?php echo $_SESSION['nombre'] ?>">
                                    <small id="nombre" class="form-text text-muted">Este nombre será visible por el conductor y por los demas usuarios en los comentarios que dejes. Se recomienda no modificar el nombre.</small>
                                </div>
                                <div class="form-group">
                                    <label for="apellido"><strong>Apellido</strong></label>
                                    <input type="text" class="form-control" id="apellido" aria-describedby="apellido" name="apellido" placeholder="Ingresa tu(s) apellido(s)" value="<?php echo $_SESSION['apellidos'] ?>">
                                    <small id="apellido" class="form-text text-muted">Este apellido será visible por el conductor y por los demas usuarios en los comentarios que dejes. Se recomienda no modificar el apellido.</small>
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
                        <form action="../../drivers/clientes/eliminarcuenta.php" method="post">
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
                    <div class="tab-pane" id="security">
                        <h6>AJUSTES DE SEGURIDAD</h6>
                        <hr>
                        <form action="../../drivers/clientes/cambiarpass.php" method="post">
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
                        <div class="tab-pane" id="notification">
                            <h6>AJUSTE DE LAS NOTIFICACIONES</h6>
                            <?php
                                $id=$_SESSION['id'];
                                $consulta="SELECT * FROM notificaciones WHERE usuario_id=$id";
                                $consulta=mysqli_query($conexion,$consulta);
                                $consulta=mysqli_fetch_array($consulta);
                            ?>
                            <hr>
                            <form action="../../drivers/clientes/actualizarnotif.php" method="post">
                                <div class="form-group">
                                    <label class="d-block mb-0">Alertas de Seguridad</label>
                                    <div class="small text-muted mb-3">Recibir alertar de seguridad mediante correo electrónico cuando se inicie sesión en la cuenta</div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="form-check-input" id="customCheck1" name="s1" <?php if ($consulta['inicio_sesion']==1){echo "checked";}?>>
                                            <label class="custom-control-label" for="customCheck1">Cada vez que se inicie sesión</label>
                                        </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="form-check-input" id="customCheck2" name="s2" <?php if ($consulta['error_3']==1){echo "checked";}?>>
                                        <label class="custom-control-label" for="customCheck2">Cuando se intente acceder erroneamente mas de 3 veces</label>
                                    </div>
                                </div><br>
                                <div class="form-group mb-0">
                                    <label class="d-block">Viaje</label>
                                    <ul class="list-group list-group-sm">
                                        <li class="list-group-item has-icon">
                                            Cuando se confirme el viaje
                                            <div class="form-check form-switch ml-auto">
                                                <input type="checkbox" class="form-check-input" id="customSwitch1" name="v1" <?php if ($consulta['confirmacion_viaje']==1){echo "checked";}?>>
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Cuando se confirme el pago
                                            <div class="form-check form-switch ml-auto">
                                                <input type="checkbox" class="form-check-input" id="customSwitch2" name="v2" <?php if ($consulta['confirmacion_pago']==1){echo "checked";}?>>
                                                <label class="custom-control-label" for="customSwitch2"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div><br>
                                <div class="form-group mb-0">
                                    <label class="d-block">Promoción</label>
                                    <ul class="list-group list-group-sm">
                                        <li class="list-group-item has-icon">
                                            Tendencias según tus preferencias
                                            <div class="form-check form-switch ml-auto">
                                                <input type="checkbox" class="form-check-input" id="customSwitch1" name="p1" <?php if ($consulta['tendencia']==1){echo "checked";}?>>
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Ofertas y Cupones de Descuento
                                            <div class="form-check form-switch ml-auto">
                                                <input type="checkbox" class="form-check-input" id="customSwitch2" name="p2" <?php if ($consulta['oferta']==1){echo "checked";}?>>
                                                <label class="custom-control-label" for="customSwitch2"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Novedades
                                            <div class="form-check form-switch ml-auto">
                                                <input type="checkbox" class="form-check-input" id="customSwitch3" name="p3" <?php if ($consulta['novedades']==1){echo "checked";}?>>
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Eventos
                                            <div class="form-check form-switch ml-auto">
                                                <input type="checkbox" class="form-check-input" id="customSwitch4" name="p4" <?php if ($consulta['eventos']==1){echo "checked";}?>>
                                                <label class="custom-control-label" for="customSwitch4"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div><br>
                                <div class="form-group mb-0">
                                    <label class="d-block">PLataforma</label>
                                    <ul class="list-group list-group-sm">
                                        <li class="list-group-item has-icon">
                                            Actualizaciones de la plataforma
                                            <div class="form-check form-switch ml-auto">
                                                <input type="checkbox" class="form-check-input" id="customSwitch1" name="pl1" <?php if ($consulta['actualizacion']==1){echo "checked";}?>>
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Noticias de la plataforma
                                            <div class="form-check form-switch ml-auto">
                                                <input type="checkbox" class="form-check-input" id="customSwitch2" name="pl2" <?php if ($consulta['noticias']==1){echo "checked";}?>>
                                                <label class="custom-control-label" for="customSwitch2"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div><br>
                                <div class="form-comtrol">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="reset" class="btn btn-secondary" id="cancelar-info">Cancelar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="billing">
                            <h6>AJUSTE DE LOS MÉTODOS DE PAGO</h6>
                            <hr>
                            <form>
                                <div class="form-group">
                                    <label class="d-block mb-0">Método de pago</label>
                                    <div class="small text-muted mb-3">
                                    En breve podrás pagar con tarjeta de crédito o débito, transferencia bancaria o monedero electrónico.
                                    Estos métodos de pago te permitirán realizar tus compras de forma rápida, segura y cómoda.
                                    Para poder usarlos, solo necesitarás tener una cuenta válida en la plataforma y proporcionar algunos datos personales y bancarios.
                                    </div>
                                    <div>
                                        <strong>Por el momento puedes realizar tus pagos directamente por las billeteras digitales de los conductores</strong>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="yape">
                                            <img src="../../img/yape.jpg" alt="yape" style="width:100px;height:100px;">
                                        </div>
                                        <div class="plin">
                                            <img src="../../img/plin.png" alt="plin" style="widht:100px;height:100px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="d-block">Historial de Pagos</label>
                                    <div class="border border-gray-500 bg-gray-200 p-3 text-center font-size-sm">
                                        <div class="row">
                                            <div class="col-3"><strong>Monto</strong></div>
                                            <div class="col-3"><strong>Método de pago</strong></div>
                                            <div class="col-3"><strong>Estado</strong></div>
                                            <div class="col-3"><strong>Fecha</strong></div>
                                        </div>
                                        <hr>
                                        <?php
                                            $id=$_SESSION['id'];
                                            $consulta="SELECT p.monto as monto,p.metodo_pago as metodo,p.estado_pago as estado,p.fecha_pago as fecha from pagos as p INNER JOIN reservas as r ON p.reserva_id=r.id_reserva where r.pasajero_id=$id";
                                            $consulta=mysqli_query($conexion,$consulta);
                                            while($fila=mysqli_fetch_assoc($consulta)){
                                                echo "<div class='row'>";
                                                foreach($fila as $key => $value){
                                                    echo "<div class='col-3' id='$key '>".
                                                    $value.
                                                    "</div>
                                                    ";
                                                }
                                                echo "</div>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <?php
        include_once("../../inc/clientes/footer.php"); 
    ?> 
    <script>
        function mostrarPassword(id,icon){
		    var cambio = document.getElementById(id);
		    if(cambio.type == "password"){
			    cambio.type = "text";
			    $('.'+icon).removeClass('bi bi-eye').addClass('bi bi-eye-slash');
		    }else{
			    cambio.type = "password";
			    $('.'+icon).removeClass('bi bi-eye-slash').addClass('bi bi-eye');
		    }
	    } 

        function validarContraseñas() {
            const pass1 = $('#pass_n').val();
            const pass2 = $('#pass_cn').val();

            if (pass1 !== pass2) {
                $('#pass_cn').addClass('error');
                $('#btn-pass').attr('disabled','true');
            } else {
                $('#pass_cn').removeClass('error');
                $('#btn-pass').removeAttr('disabled');
            }
        }
        

	    $(document).ready(function () {
	        $('#ShowPassword').click(function () {
		        $('#'+id).attr('type', $(this).is(':checked') ? 'text' : 'password');
	        });
            $("#formFile").click(function () {
                $(".submit-foto").removeAttr("hidden");
            });
            
            $('#pass_n').on('keyup', validarContraseñas);
            $('#pass_cn').on('keyup', validarContraseñas);

        });

        
    </script>
</body>
</html>