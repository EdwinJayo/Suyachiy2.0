<?php
    include_once("../../drivers/config/sesion.php");
    include_once("../../drivers/config//conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reservas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="../../css/cliente.css">

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

</head>
<body>
    <?php
        include_once("../../inc/clientes/header.php");
    ?>

    <!-- Contenidos Start-->
    <br><br><br><br>
    <div>
        <?php
        $email= $_SESSION['correo'];
        $consulta="SELECT
                    r.id_reserva as ir,r.fecha_reserva as fr,r.estado_reserva as er,
                    v.fecha_salida as fs,v.fecha_llegada as fl,v.precio as p,
                    ul.ubicacion as ul,
                    us.ubicacion as us,
                    uc.nombre as nc,uc.apellido as ac,uc.email as ec,
                    vh.marca as vm, vh.foto_vehiculo as fv
                    FROM usuarios as up
                    INNER JOIN reservas as r 
                    ON up.id_usuario=r.pasajero_id 
                    INNER JOIN tipos_usuario as tu
                    ON up.tipo_usuario_id=tu.id_tipo_usuario
                    INNER JOIN viajes as v 
                    ON r.viaje_id=v.id_viaje 
                    INNER JOIN ubicaciones as ul 
                    ON v.origen_id=ul.id_ubicacion 
                    INNER JOIN ubicaciones as us 
                    ON v.destino_id=us.id_ubicacion 
                    INNER JOIN vehiculos as vh 
                    ON v.conductor_id=vh.conductor_id
                    INNER JOIN usuarios as uc 
                    ON vh.conductor_id=uc.id_usuario 
                    WHERE up.email= '$email'";
                    
        $datos = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
            $ir= password_hash($fila['ir'], PASSWORD_BCRYPT);
            $irc= $fila['ir'];
            $fr = $fila['fr'];
            $er = $fila['er'];
            $fs = $fila['fs'];
            $fl = $fila['fl'];
            $p = $fila['p'];
            $ul= $fila['ul'];
            $us= $fila['us'];
            $nc= $fila['nc'];
            $ac= $fila['ac'];
            $ec= $fila['ec'];
            $vm= $fila['vm'];
            $fv= $fila['fv'];

        ?>
        <div class="container-fluid booking mt-5 pb-4">
            <div class="container pb-5">
                <div class="row  g-2">
                    <div>
                        <spam class="er"><?php echo $er ?></spam>
                    </div>
                </div>
                <div class="bg-light shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="foto">
                            <img src="../../img/conductores/<?php echo $ec . "/" . $fv ?>" class="rounded mx-auto d-block" id="foto" alt="...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3 my-4">
                        <div style="font-family: 'Courier New', Courier, monospace;">
                            <h6>Destino: <?php echo $ul?></h6>
                            <h6>Parte de: <?php echo $us ?></h6>
                            <h6>Sale el: <?php echo $fs ?></h6>
                            <h6>Llega el: <?php echo $fl ?></h6>
                            <h6>Conductor: <?php echo $nc . " " . $ac ?></h6>
                            <h6>Marca/Vehiculo: <?php echo $vm ?></h6>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3" style="font-size: 2rem;font-family: 'Courier New', Courier, monospace;">
                        <div style="text-align: center;">
                            <div>
                                <span>S/.</span>
                            </div>
                            <p><?php echo $p ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div>
                            <button type="button" class="btn btn-primary btnreserva" onclick="location.href='reserva.php?id=<?php echo $ir; ?>&i=<?php echo $irc; ?>'">Ver</button>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <span class="fr"><?php echo $fr ?></span>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    </div>
        <!-- Contenidos End-->
    <?php
        include_once("../../inc/clientes/footer.php");
    ?>    
</body>
</html>