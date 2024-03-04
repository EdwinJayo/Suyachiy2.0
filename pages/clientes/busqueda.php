<?php
include("../../drivers/config//conexion.php");
session_start();

if($_SESSION['origen']){
    $ori = $_SESSION['origen'];
}
else{
    $ori = " ";
}

if($_SESSION['destino']){
    $des = $_SESSION['destino'];
}
else{
    $des = " ";
}
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
    include "../../inc/clientes/header.php";
    ?>
    <!-- Navbar End -->
    <br><br><br><br><br>
    <!-- Buscar Start -->
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <form name="busqueda" method="POST" action="../../drivers/clientes/busqueda.php">
                    <div class="row align-items-center" style="min-height: 60px;">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <select class="custom-select px-4" style="height: 47px;" name="origen" required>

                                            <option selected><?php echo $ori ?></option>

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

                                            <option selected><?php echo $des ?></option>

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
                                            <input type="text" name="fecha" class="form-control p-4 datetimepicker-input" placeholder="Fecha" data-target="#date1" data-toggle="datetimepicker" required />
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
    $consulta = "SELECT * FROM viajes";
    $datos = mysqli_query($conexion, $consulta);
    while ($fila = mysqli_fetch_array($datos)) {
        $con = $fila['conductor_id'];
        $ori = $fila['origen_id'];
        $des = $fila['destino_id'];

        $fechaSalida = $fila['fecha_salida'];   //fecha salida
        $precio = $fila['precio'];              //precio

        $consulta2 = "SELECT * FROM usuarios WHERE id_usuario = $con";
        $consulta2 = mysqli_query($conexion, $consulta2);
        $consulta2 = mysqli_fetch_array($consulta2);

        $nombre = $consulta2['nombre'];     //nombre
        $apellido = $consulta2['apellido']; // apellido
        $email = $consulta2['email'];       //correo

        $consulta3 = "SELECT * FROM calificaciones_conductores WHERE conductor_id = $con";
        $consulta3 = mysqli_query($conexion, $consulta3);
        $i = 0;
        $contador = 0;
        while ($consult = mysqli_fetch_array($consulta3)) {
            $i = $i + $consult['calificacion_conductor'];
            ++$contador;
        }
        if ($contador==0) {
            $calificacion=1;
        } else {
            $calificacion = (int)(($i / $contador) + 0.5);       //calificacion
        }
        

        $consulta4 = "SELECT * FROM vehiculos WHERE conductor_id = $con";
        $consulta4 = mysqli_query($conexion, $consulta4);
        $consulta4 = mysqli_fetch_array($consulta4);

        $fotoVe = $consulta4['foto_vehiculo'];  //foto_vehiculo
        $marca = $consulta4['marca'];                       //marca
        $modelo = $consulta4['modelo'];                     //modelo
        $capacidadPa = $consulta4['capacidad_pasajeros'];   //capacidad pasajeros

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
                            <img src="../../img/conductores/<?php echo $email . "/" . $fotoVe ?>" class="rounded mx-auto d-block" id="foto" alt="...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3 my-4">
                        <div style="font-family: 'Courier New', Courier, monospace;">
                            <h6>Conductor: <?php echo $nombre . " " . $apellido ?></h6>
                            <h6>De: <?php echo $origen ?></h6>
                            <h6>A: <?php echo $destino ?></h6>
                            <h6>fecha/hora: <?php echo $fechaSalida ?></h6>
                            <h6>Marca/Vehiculo: <?php echo $marca ?></h6>
                            <h6>Modelo/Vehiculo: <?php echo $modelo ?></h6>
                            <h6>Capacidad pasajeros: <?php echo $capacidadPa ?></h6>
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
    ?></div>
    <!-- Contenidos End-->

    <!-- Footer Start -->
    <?php
    include "../../inc/clientes/footer.php";
    ?>
    <!-- Footer End -->
</body>

</html>