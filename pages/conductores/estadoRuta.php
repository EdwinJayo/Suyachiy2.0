<?php
include("../../drivers/config//conexion.php");
include_once("../../drivers/config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Mis Rutas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="../../css/conductor.css">
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
    <?php
    include "../../inc/conductores/header.php";
    ?>
    <br>
    <div>
        <div style="text-align: center;"><h5>Mis rutas:</h5>
    </div>
    <br><br><br>

    <!-- Contenidos Start-->
    
        
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
        
        $calificacion = (int)(($i / $contador) + 0.5);       //calificacion

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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="foto">
                            <img src="../../img/conductores/<?php echo $email . "/" . $fotoVe ?>" class="rounded mx-auto d-block" id="foto" alt="...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-4">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4" style="font-size: 2rem;font-family: 'Courier New', Courier, monospace;">
                        <div style="text-align: center;">
                            <div>
                                <span>S/.</span>
                            </div>
                            <p><?php echo $precio ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-4">
                        <div style="font-family: 'Courier New', Courier, monospace;">
                            <h4>Personas que reservaron:</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-4">
                        <div style="font-family: 'Courier New', Courier, monospace;">
                            <h6>1. <?php echo $nombre . " " . $apellido ?></h6>
                            <h6>2. <?php echo $nombre . " " . $apellido ?></h6>
                            <h6>3. <?php echo $nombre . " " . $apellido ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?></div>
    <!-- Contenidos End-->


    <?php
    include "../../inc/conductores/footer.php";
    ?>
</body>

</html>