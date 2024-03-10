<?php
include("../../drivers/config//conexion.php");
include_once("../../drivers/config/sesion.php");
$fotoPerfil = $_SESSION['fotoPerfil'];
$id = $_SESSION['id']
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
        <div class="col-md-1"></div>
        <div class="container pb-5 col-md-5 color">
            <div style="padding: 30px;">
                <h4 class="fontt">Establecer Ruta:</h4>
                <?php
                $consulta = "SELECT * FROM vehiculos WHERE conductor_id = $id";
                $consulta = mysqli_query($conexion, $consulta);
                $consulta = mysqli_fetch_array($consulta); 
                $fotoVe = $consulta['foto_vehiculo'];  //foto_vehiculo
                ?>
                <img src="../../<?php echo $fotoVe ?>" style="height: 300px;" class="centreado"><br><br>
                <img class="rounded-circle me-lg-2 montado" src="../../<?php echo $fotoPerfil ?>">
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
                                        <select class="custom-select px-4" style="height: 47px;" name="origen" required>
                                            <option hidden selected></option>
                                            <?php
                                            $consulta = "SELECT ubicacion FROM ubicaciones WHERE id_ubicacion<>1";
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
                                        <select class="custom-select px-4" style="height: 47px;" name="destino" required>
                                            <option hidden selected></option>
                                            <?php
                                            $consulta = "SELECT ubicacion FROM ubicaciones WHERE id_ubicacion<>1";
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
                                            <input type="text" name="fecha" class="form-control p-4 datetimepicker-input" data-target="#date1" data-toggle="datetimepicker" required/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3 mb-md-0">hora:
                                        <select class="custom-select px-4" style="height: 47px;" name="hora" required>
                                            <option hidden selected></option>
                                            <option>01:00:00</option>
                                            <option>02:00:00</option>
                                            <option>03:00:00</option>
                                            <option>04:00:00</option>
                                            <option>05:00:00</option>
                                            <option>06:00:00</option>
                                            <option>07:00:00</option>
                                            <option>08:00:00</option>
                                            <option>09:00:00</option>
                                            <option>10:00:00</option>
                                            <option>11:00:00</option>
                                            <option>12:00:00</option>
                                            <option>13:00:00</option>
                                            <option>14:00:00</option>
                                            <option>15:00:00</option>
                                            <option>16:00:00</option>
                                            <option>17:00:00</option>
                                            <option>18:00:00</option>
                                            <option>19:00:00</option>
                                            <option>20:00:00</option>
                                            <option>21:00:00</option>
                                            <option>22:00:00</option>
                                            <option>23:00:00</option>
                                            <option>00:00:00</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3 mb-md-0">Precio:
                                            <input type="number" min="0" step=".01" name="precio" class="form-control p-4" required/>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3 mb-md-0">Plazas disponibles:
                                            <input type="number" min="0" name="plazas" class="form-control p-4" required/>
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