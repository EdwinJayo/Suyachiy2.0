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
        $id= password_verify($_GET['i'],$_GET['id']);
        if($id){
            $id=$_GET['i'];
        }
        else{
            header('Location: reservas.php');
        }
        $consulta="SELECT
                    r.fecha_reserva as fr,r.estado_reserva as er,
                    v.id_viaje as iv,v.fecha_salida as fs,v.fecha_llegada as fl,v.precio as p,
                    ul.ubicacion as ul,
                    us.ubicacion as us,
                    uc.nombre as nc,uc.apellido as ac,uc.foto_perfil as fc,uc.email as ec, uc.id_usuario as ic,
                    vh.marca as vm, vh.modelo as vmo,vh.año as a,vh.capacidad_pasajeros as cp, vh.foto_vehiculo as fv
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
                    WHERE up.email= '$email' and r.id_reserva=$id";
                    
        $datos = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
            $fr = $fila['fr'];
            $er = $fila['er'];
            $iv= $fila['iv'];
            $fs = $fila['fs'];
            $fl = $fila['fl'];
            $p = $fila['p'];
            $ul= $fila['ul'];
            $us= $fila['us'];
            $nc= $fila['nc'];
            $ac= $fila['ac'];
            $fc= $fila['fc'];
            $ec= $fila['ec'];
            $ic= $fila['ic'];
            $vm= $fila['vm'];
            $vmo= $fila['vmo'];
            $a= $fila['a'];
            $cp= $fila['cp'];
            $fv= $fila['fv'];
        }
        $consulta1 = "SELECT id_calificacion_conductor,calificacion_conductor,comentario_conductor,nombre,apellido,foto_perfil FROM calificaciones_conductores INNER JOIN usuarios ON pasajero_id=id_usuario WHERE conductor_id = $ic";
        $datos1 = mysqli_query($conexion, $consulta1);
        ?>
        <div class="container-fluid booking mt-5 pb-4">
            <div class="container pb-5">
                <div class="bg-primary shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div>
                        <p>Reserva</p>
                    </div>
                </div>
                <div class="bg-light shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div style="font-family: 'Courier New', Courier, monospace;">
                        <h6>Estado: <?php echo $er ?></h6>
                        <h6>Fecha de reserva: <?php echo $fr ?></h6>
                    </div>
                </div>
            </div>
            <div class="container pb-5">
                <div class="bg-primary shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div>
                        <p>Viaje</p>
                    </div>
                </div>
                <div class="bg-light shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div style="font-family: 'Courier New', Courier, monospace;">
                        <h6>Destino: <?php echo $ul ?></h6>
                        <h6>Parte de: <?php echo $us ?></h6>
                        <h6>Sale el: <?php echo $fs ?></h6>
                        <h6>Llega el: <?php echo $fl ?></h6>
                        <h6>
                            <p>Precio: 
                                <span>S/.</span>
                                <?php echo $p ?>
                            </p>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="container pb-5">
                <div class="bg-primary shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div>
                        <p>Vehículo</p>
                    </div>
                </div>
                <div class="bg-light shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div class="col-xs-12 col-sm-6">
                        <div class="foto">
                            <img src="../../img/conductores/<?php echo $ec . "/" . $fv ?>" class="rounded mx-auto d-block" id="foto" alt="...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div style="font-family: 'Courier New', Courier, monospace;">
                            <h6>Marca: <?php echo $vm ?></h6>
                            <h6>Modelo: <?php echo $vmo ?></h6>
                            <h6>Año: <?php echo $a ?></h6>
                            <h6>Numero de asientos: <?php echo $cp ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pb-5">
                <div class="bg-primary shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div>
                        <p>Concuctor</p>
                    </div>
                </div>
                <div class="bg-light shadow row resultado" style="padding: 0px; border-radius: 10px;">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="foto">
                            <img src="../../<?php echo $fc ?>" class="rounded mx-auto d-block" id="foto" alt="...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div style="font-family: 'Courier New', Courier, monospace;">
                            <h6><p class="nombre-conductor"><?php echo $nc ?></p> <p class="apellido-conductor"><?php echo $ac ?></p><h6>
                            <div class="calificacion" style="text-align: center;">
                                <div class="rating">
                                    <?php //PARA LAS ESTRELLAS DE CALIFICACION
                                    $i = 0;
                                    $contador = 0;
                                    while ($consult = mysqli_fetch_array($datos1)) {
                                        $i = $i + $consult['calificacion_conductor'];
                                        ++$contador;
                                        $icc= $consult['id_calificacion_conductor'];
                                    }
                                    if ($contador==0) {
                                        $calificacion = 0;
                                    }else{
                                        $calificacion = (int)(($i / $contador)+0.5);       //calificacion
                                    }
                                    for($iter=1;$iter<=$calificacion;$iter++){
                                    ?>
                                        <i class="bi bi-star-fill star"></i>
                                    <?php
                                    }
                                    for($ite=1;$ite<=(5-$calificacion);$ite++){
                                    ?>
                                        <i class="bi bi-star-fill star1"></i>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div>
                            <p>Califica</p>
                        </div>
                        <div>
                            <i class="bi bi-star-fill" id="star2" type="button" onclick="calificar(1,<?php echo $ic ?>,<?php echo $iv ?>,<?php echo $icc ?>)"></i>
                            <i class="bi bi-star-fill" id="star2" type="button" onclick="calificar(2,<?php echo $ic ?>,<?php echo $iv ?>,<?php echo $icc ?>)"></i>
                            <i class="bi bi-star-fill" id="star2" type="button" onclick="calificar(3,<?php echo $ic ?>,<?php echo $iv ?>,<?php echo $icc ?>)"></i>
                            <i class="bi bi-star-fill" id="star2" type="button" onclick="calificar(4,<?php echo $ic ?>,<?php echo $iv ?>,<?php echo $icc ?>)"></i>
                            <i class="bi bi-star-fill" id="star2" type="button" onclick="calificar(5,<?php echo $ic ?>,<?php echo $iv ?>,<?php echo $icc ?>)"></i>
                        </div>
                        <div>
                            <div class="mb-3">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Comenta" style="resize:none"></textarea>
                                <button class="btn btn-primary" onclick="calificar(0,<?php echo $ic ?>,<?php echo $iv ?>,<?php echo $icc ?>)">
                                    <i class="bi bi-send" type="submit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <?php
                            mysqli_data_seek($datos1, 0);
                            while ($consult = mysqli_fetch_array($datos1)) {
                        ?>
                        <div class="card mb-4">
                            <div class="card-body" style="background-color:#f0f2f5">
                                <p><?php echo $consult["comentario_conductor"] ?></p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="../../<?php echo $consult["foto_perfil"] ?>" alt="avatar" width="25" height="25" />
                                        <p class="small mb-0 ms-2"><?php echo $consult["nombre"];?> <?php echo $consult["apellido"]; ?></p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <i class="bi bi-star-fill bi-xs star" style="margin-top: -0.16rem;"></i>
                                        <p class="small text-muted mb-0"><?php echo $consult['calificacion_conductor'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contenidos End-->
    <script>
        function calificar(calificacion,c,v,cc){
            let com=document.getElementById('message').value;
            let dir="calificar.php?c="+c+"&cc="+cc+"&v="+v+"&calificacion="+calificacion+"&com="+com;
            location.href=dir;
        }
    </script>
    <?php
        include_once("../../inc/clientes/footer.php");
    ?>    
</body>
</html>