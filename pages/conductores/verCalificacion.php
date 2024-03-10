<?php
include("../../drivers/config//conexion.php");
include_once("../../drivers/config/sesion.php");
$id = $_SESSION['id']
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Historial de Rutas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="../../css/conductor.css">

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
    <br><br><br><br>

    <!-- Contenidos Start-->


    <?php
    $consulta = "SELECT * FROM calificaciones_conductores WHERE conductor_id = $id";
    $consulta = mysqli_query($conexion, $consulta);
    $i = 0;
    $contador = 0;
    while ($consult = mysqli_fetch_array($consulta)) {
        $i = $i + $consult['calificacion_conductor'];
        ++$contador;
    }

    $calificacion = (int)(($i / $contador) + 0.5);       //calificacion
    ?>

    <div class="container-fluid booking mt-5 pb-4">
        <div class="container pb-5">
            <div class="bg-light shadow row resultado pruebaaa" style="padding: 0px; border-radius: 10px;">
                <div class="col-lg-1"></div>
                <div class="col-xs-12 col-sm-6 col-lg-9 my-4">
                    <div style="font-family: 'Courier New', Courier, monospace;">
                        <h4>Total de calificacion:</h4>
                        <div class="calificacion" style="text-align: center;">
                            <div class="rating">

                                <?php //PARA LAS ESTRELLAS DE CALIFICACION
                                for ($iter = 1; $iter <= $calificacion; $iter++) {

                                ?>

                                    <i class="bi bi-star-fill star2"></i>

                                <?php
                                }
                                for ($ite = 1; $ite <= (5 - $calificacion); $ite++) {

                                ?>

                                    <i class="bi bi-star-fill star3"></i>

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container-fluid booking mt-5 pb-4">
        <div class="container pb-5"><h5>Calificacion de tus pasajeros:</h5>
            <div class="bg-light shadow row resultado" style="padding: 0px; border-radius: 10px;">
                <?php
                $consulta = "SELECT * FROM calificaciones_conductores WHERE conductor_id = $id";
                $consulta = mysqli_query($conexion, $consulta);
                while ($fila = mysqli_fetch_array($consulta)) {
                    $idPasajero = $fila['pasajero_id'];      //id pasajero
                    $calificacionn = $fila['calificacion_conductor'];      //calificacion
                    $comentario = $fila['comentario_conductor'];      //comentario

                    $consulta8 = "SELECT * FROM usuarios WHERE id_usuario = $idPasajero";
                    $consulta8 = mysqli_query($conexion, $consulta8);
                    $consulta8 = mysqli_fetch_array($consulta8);

                    $nombre = $consulta8['nombre'];     //nombre
                    $apellido = $consulta8['apellido']; // apellido
                    $foto = $consulta8['foto_perfil'];  //foto perfil
                ?>
                    <div class="col-xs-12 col-sm-6 col-lg-2 my-4">
                        <img class="rounded-circle me-lg-2" src="../../<?php echo $foto ?>" style="width: 150px; height: 150px;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-5 my-4">
                        <div style="font-family: 'Courier New', Courier, monospace;">

                            <h4>• <?php echo $nombre . " " . $apellido ?></h4>
                            <div class="calificacion" style="text-align: center;">
                                <div class="rating">

                                    <?php //PARA LAS ESTRELLAS DE CALIFICACION
                                    for ($iter = 1; $iter <= $calificacionn; $iter++) {

                                    ?>

                                        <i class="bi bi-star-fill star4"></i>

                                    <?php
                                    }
                                    for ($ite = 1; $ite <= (5 - $calificacionn); $ite++) {

                                    ?>

                                        <i class="bi bi-star-fill star5"></i>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-5 my-4">
                        <div style="font-family: 'Courier New', Courier, monospace;">
                            <h5>Comentarios: <?php echo $comentario ?></h5><br><br><br><br><br>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Contenidos End-->


    <?php
    include "../../inc/conductores/footer.php";
    ?>
</body>

</html>