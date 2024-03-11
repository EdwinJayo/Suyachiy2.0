<?php
include("../../drivers/config//conexion.php");
session_start();
$origenn = $_SESSION['origen'];
$destinoo = $_SESSION['destino'];

$consul = "SELECT * FROM ubicaciones WHERE ubicacion = '$origenn'";
$consul = mysqli_query($conexion, $consul);
$consul = mysqli_fetch_array($consul);
$idOrigenn = $consul['id_ubicacion'];     //idubicacion de origen

$consul2 = "SELECT * FROM ubicaciones WHERE ubicacion = '$destinoo'";
$consul2 = mysqli_query($conexion, $consul2);
$consul2 = mysqli_fetch_array($consul2);
$idDestinoo = $consul2['id_ubicacion'];     //idubicacion de destino
?>

<!DOCTYPE html>
<html lang="eS">

<head>
    <meta charset="utf-8">
    <title>Buscar Ruta</title>
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
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">

    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Navbar Start -->
    <?php
    include "../../inc/public/header.php";
    ?>
    <!-- Navbar End -->
    <br><br><br><br><br>
    <!-- Buscar Start -->
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <form name="busqueda" method="POST" action="../../drivers/public/elemBusqueda.php">
                    <div class="row align-items-center" style="min-height: 60px;">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <select class="custom-select px-4" style="height: 47px;" name="origen" required>
                                            <option hidden selected><?php echo $_SESSION['origen'] ?></option>
                                            <?php
                                            $consulta = "SELECT ubicacion FROM ubicaciones";
                                            $datos = mysqli_query($conexion, $consulta);

                                            while ($fila = mysqli_fetch_array($datos)) {
                                            ?>

                                                <option><?php echo $fila['ubicacion'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <select class="custom-select px-4" style="height: 47px;" name="destino" required>
                                            <option hidden selected><?php echo $_SESSION['destino'] ?></option>
                                            <?php
                                            $consulta = "SELECT ubicacion FROM ubicaciones";
                                            $datos = mysqli_query($conexion, $consulta);

                                            while ($fila = mysqli_fetch_array($datos)) {
                                            ?>
                                                <option><?php echo $fila['ubicacion'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <div class="date" id="date1" data-target-input="nearest">
                                            <input type="text" name="fecha" class="form-control p-4 datetimepicker-input" placeholder="<?php echo $_SESSION['fecha'] ?>" data-target="#date1" data-toggle="datetimepicker" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block" type="submit" name="enviar" value="fff" style="height: 47px; margin-top: -2px;">Buscar</button>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Buscar End -->
    <br>
    <!-- Contenidos Start-->
    <div>
        <?php
        if ($idOrigenn == 1) {
            if($idDestinoo == 1){
                $consulta = "SELECT * FROM viajes WHERE estado=1";
                //echo "TODOS"; 
            }
            else{
                $consulta = "SELECT * FROM viajes WHERE estado=1 AND (destino_id='$idDestinoo')";
                //echo "TODOS - DESTINO"; 
            }
            
        } else {
            if($idDestinoo == 1){
                $consulta = "SELECT * FROM viajes WHERE estado=1 AND (origen_id='$idOrigenn')";
                //echo "ORIGEN - TODOS"; 
            }
            else{
                $consulta = "SELECT * FROM viajes WHERE estado=1 AND (origen_id='$idOrigenn' AND destino_id='$idDestinoo')";
                //echo "ORIGEN - DESTINO"; 
            }
        }

        $datos = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
            $con = $fila['conductor_id'];
            $ori = $fila['origen_id'];
            $des = $fila['destino_id'];

            $fechaSalida = $fila['fecha_salida'];   //fecha salida
            $hora = $fila['hora'];                  //hora
            $plazas = $fila['plazas_disponibles'];  //plazas disponibles
            $precio = $fila['precio'];              //precio

            $consulta2 = "SELECT * FROM usuarios WHERE id_usuario = $con";
            $consulta2 = mysqli_query($conexion, $consulta2);
            $consulta2 = mysqli_fetch_array($consulta2);

            $nombre = $consulta2['nombre'];     //nombre
            $apellido = $consulta2['apellido']; // apellido

            $consulta3 = "SELECT * FROM calificaciones_conductores WHERE conductor_id = $con";
            $consulta3 = mysqli_query($conexion, $consulta3);
            $i = 0;
            $contador = 0;
            while ($consult = mysqli_fetch_array($consulta3)) {
                $i = $i + $consult['calificacion_conductor'];
                ++$contador;
            }

            $calificacion = (int)(($i / $contador) + 0.5);       //calificacion

            $consulta4 = "SELECT * FROM vehiculos WHERE conductor_id = $con";
            $consulta4 = mysqli_query($conexion, $consulta4);
            $consulta4 = mysqli_fetch_array($consulta4);

            $fotoVe = $consulta4['foto_vehiculo'];              //foto_vehiculo
            $marca = $consulta4['marca'];                       //marca
            $modelo = $consulta4['modelo'];                     //modelo

            $consulta5 = "SELECT * FROM ubicaciones WHERE id_ubicacion = $ori";
            $consulta5 = mysqli_query($conexion, $consulta5);
            $consulta5 = mysqli_fetch_array($consulta5);

            $origen = $consulta5['ubicacion'];      //origen

            $consulta6 = "SELECT * FROM ubicaciones WHERE id_ubicacion = $des";
            $consulta6 = mysqli_query($conexion, $consulta6);
            $consulta6 = mysqli_fetch_array($consulta6);

            $destino = $consulta6['ubicacion'];      //destino
        ?>


            <div class="container-fluid booking mt-5 pb-4">
                <div class="container pb-5">
                    <div class="bg-light shadow row resultado" style="padding: 0px; border-radius: 10px;">
                        <div class="col-xs-12 col-sm-6 col-lg-3">
                            <div class="foto">
                                <img src="../../<?php echo $fotoVe ?>" class="rounded mx-auto d-block" id="foto" alt="...">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3 my-4">
                            <div style="font-family: 'Courier New', Courier, monospace;">
                                <h6>Conductor: <?php echo $nombre . " " . $apellido ?></h6>
                                <h6>De: <?php echo $origen ?></h6>
                                <h6>A: <?php echo $destino ?></h6>
                                <h6>Fecha Salida: <?php echo $fechaSalida ?></h6>
                                <h6>Hora: <?php echo $hora ?></h6>
                                <h6>Marca/Vehiculo: <?php echo $marca ?></h6>
                                <h6>Modelo/Vehiculo: <?php echo $modelo ?></h6>
                                <h6>Plaza disponible: <?php echo $plazas ?></h6>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3" style="font-size: 2rem;font-family: 'Courier New', Courier, monospace;">
                            <div style="text-align: center;">
                                <div>
                                    <span>S/.</span>
                                </div>
                                <p><?php echo $precio ?></p>
                            </div>
                            <div class="calificacion" style="text-align: center;">
                                <div class="rating">

                                    <?php //PARA LAS ESTRELLAS DE CALIFICACION
                                    for ($iter = 1; $iter <= $calificacion; $iter++) {

                                    ?>

                                        <i class="bi bi-star-fill star"></i>

                                    <?php
                                    }
                                    for ($ite = 1; $ite <= (5 - $calificacion); $ite++) {

                                    ?>

                                        <i class="bi bi-star-fill star1"></i>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3">
                            <div>
                                <button type="button" class="btn btn-primary btnreserva" onclick="location.href='../../drivers/public/exitSuperglobal.php'">Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- Contenidos End-->
    <div class="foto">

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Footer Start -->
    <div class="container-fluid text-white border-top py-md-3 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important; background: #1190CB;">
        <div class="text-center">
            <div class="text-center">
                <p class="m-0 text-white">Copyright &copy; <a href="../../pages/public/index.php">Suyachiy</a>. Todos los derechos
                    reservados.
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/easing/easing.min.js"></script>
    <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Bootstrap Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Contact Javascript File -->
    <script src="../../js/jqBootstrapValidation.min.js"></script>
    <script src="../../js/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../../js/main.js"></script>
</body>

</html>