<?php
include("../../drivers/config//conexion.php");
include_once("../../drivers/config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Establecer Ruta</title>
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
    <!-- establecer ruta Start -->
    <div class="container-fluid booking mt-5 pb-5 row">
        <div class="container pb-5 col-md-6">
            <div style="padding: 30px;">
                <h5>Establecer Ruta:</h5>
                <img src="../../img/auto.jpg" style="height: 300px; border: 10px solid #1c6ab9" class="centreado"><br><br>
            </div>
        </div>
        <div class="container pb-5 col-md-6">
            <div class="" style="padding: 30px;">
                <form name="establecer" method="POST" action="../../drivers/conductores/estableceRuta.php">
                    <div class="row align-items-end" style="min-height: 60px;">
                        <div>
                            <div>
                                <div>
                                    <div class="mb-3 mb-md-0">Origen:
                                        <select class="custom-select px-4" style="height: 47px;" name="origen">

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
                                <div>
                                    <div class="mb-3 mb-md-0">Destino:
                                        <select class="custom-select px-4" style="height: 47px;" name="destino">

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
                                <div>
                                    <div class="mb-3 mb-md-0">Fecha:
                                        <div class="date" id="date1" data-target-input="nearest">
                                            <input type="text" name="fecha" class="form-control p-4 datetimepicker-input" placeholder="Fecha" data-target="#date1" data-toggle="datetimepicker" />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3 mb-md-0">hora:
                                        <select class="custom-select px-4" style="height: 47px;" name="hora">
                                            <option selected>Sin establecer</option>
                                            <option value="1">01:00</option>
                                            <option value="2">02:00</option>
                                            <option value="3">03:00</option>
                                            <option value="4">04:00</option>
                                            <option value="5">05:00</option>
                                            <option value="6">06:00</option>
                                            <option value="7">07:00</option>
                                            <option value="8">08:00</option>
                                            <option value="9">09:00</option>
                                            <option value="10">10:00</option>
                                            <option value="11">11:00</option>
                                            <option value="12">12:00</option>
                                            <option value="13">13:00</option>
                                            <option value="14">14:00</option>
                                            <option value="15">15:00</option>
                                            <option value="16">16:00</option>
                                            <option value="17">17:00</option>
                                            <option value="18">18:00</option>
                                            <option value="19">19:00</option>
                                            <option value="20">20:00</option>
                                            <option value="21">21:00</option>
                                            <option value="22">22:00</option>
                                            <option value="23">23:00</option>
                                            <option value="24">00:00</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3 mb-md-0">Precio:
                                            <input type="number" min="0" step=".01" name="precio" class="form-control p-4 datetimepicker-input" placeholder="Precio"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex; justify-content: center;">
                            <div>
                                <button class="btn btn-primary btn-block dest" type="submit" name="enviar" value="fff">Establecer</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Establecer ruta End -->

    <br><br><br><br><br><br><br>


    <?php
    include "../../inc/conductores/footer.php";
    ?>
</body>

</html>